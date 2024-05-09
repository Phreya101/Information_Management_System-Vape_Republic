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
        $sql = "SELECT * FROM `stock`";
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
            return true;
        } else {
            return false;
        }
    }

    public function refund($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `sales` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
