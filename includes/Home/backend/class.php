<?php
class Home
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        if (!$conn instanceof mysqli) {
            throw new Exception("Invalid MySQLi connection object provided");
        }

        $this->conn = $conn;
    }

    public function getList()
    {
        $now = date("Y-m-d");
        $sql = "SELECT `st`.`price`,`st`.`id` as `id`, `s`.`id` as `sid` ,`st`.`brand`,`st`.`price`, `st`.`stock`, `st`.`product`, `s`.`quantity`, `s`.`total_price` FROM `sales` `s` INNER JOIN `stock` `st` ON `s`.`stock_id` = `st`.`id` WHERE 
        DATE(s.created_at) = CURDATE() ORDER BY `s`.`created_at` ASC";
        $result = $this->conn->query($sql);
        $list = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[] = $row;
            }
        }
        return $list;
    }

    public function getItem()
    {
        $sql = "SELECT * FROM `stock` WHERE `stock` > 0";
        $result = $this->conn->query($sql);
        $item = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item[] = $row;
            }
        }
        return $item;
    }

    public function addTransaction($item, $qty, $prc)
    {
        $stmt = $this->conn->prepare("INSERT INTO `sales`(`stock_id`, `quantity`, `total_price`) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $item, $qty, $prc);

        if ($stmt->execute()) {
            $sql = "SELECT * FROM `report` WHERE `stock_id` =" . $item . " AND `created_at` = CURDATE()";
            $result = $this->conn->query($sql);
            if (mysqli_num_rows($result) == 0) {
                $add = $this->conn->prepare("INSERT INTO `report`(`stock_id`, `quantity`, `total_price`) VALUES (?,?,?)");
                $add->bind_param("ssi", $item, $qty, $prc);
                $add->execute();
            } else {
                $update = $this->conn->prepare("UPDATE `report` SET `quantity`= `quantity` + ?,`total_price`= `total_price` + ? WHERE `stock_id` = ?");
                $update->bind_param("sis", $qty, $prc, $item);
                $update->execute();
            }

            $deduct = $this->conn->prepare("UPDATE `stock` SET `stock` = `stock` - ? WHERE `id` = ?");
            $deduct->bind_param("ss", $qty, $item);
            $deduct->execute();

            $log = $this->conn->prepare("INSERT INTO `log`(`action`, `stock_id`, `quantity`) VALUES ('deduct stock',?,?)");
            $log->bind_param("ss", $item, $qty);
            $log->execute();

            return true;
        } else {
            return false;
        }
    }

    public function refund($id, $stock, $price)
    {
        $sql = "SELECT * FROM `report` WHERE `stock_id` = ? AND `created_at` = CURDATE()";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $stock);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $deduct_income = $this->conn->prepare("UPDATE `report` SET `total_price` = `total_price` - ? WHERE `stock_id` = ?");
            $deduct_income->bind_param("di", $price, $stock);
            $deduct_income_success = $deduct_income->execute();
            $deduct_income->close();

            if ($deduct_income_success) {
                $log = $this->conn->prepare("INSERT INTO `log`(`action`, `stock_id`, `quantity`) VALUES ('deduct income', ?, ?)");
                $log->bind_param("id", $stock, $price);
                $log_success = $log->execute();
                $log->close();
            }

            $stmt = $this->conn->prepare("DELETE FROM `sales` WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            $delete_success = $stmt->execute();
            $stmt->close();

            return $deduct_income_success && $log_success && $delete_success;
        } else {

            return false;
        }
    }
}
