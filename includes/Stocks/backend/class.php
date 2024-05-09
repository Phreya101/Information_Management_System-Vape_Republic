<?php

class Stock
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        if (!$conn instanceof mysqli) {
            throw new Exception("Invalid MySQLi connection object provided");
        }

        $this->conn = $conn;
    }

    public function addStock($brand, $product, $stockQty, $price)
    {
        $stmt = $this->conn->prepare("INSERT INTO `stock` (`brand`, `product`, `stock`, `price`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $brand, $product, $stockQty, $price);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function stockList()
    {
        $stmt = "SELECT * FROM `stock`";
        $result = $this->conn->query($stmt);
        $list = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[] = $row;
            }
        }

        return $list;
    }

    public function deleteStock($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `stock` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editStock($id)
    {
        $stmt = "SELECT * FROM `stock` WHERE `id` = " . $id;
        $result = $this->conn->query($stmt);
        $content = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $content[] = $row;
            }
        }

        return $content;
    }

    public function updateStock($id, $brand, $product, $stockQty, $price)
    {
        $stmt = $this->conn->prepare("UPDATE `stock` SET `brand` = ?, `product` = ?, `stock` = ?, `price` = ? WHERE `id` = ?");
        $stmt->bind_param("ssssi", $brand, $product, $stockQty, $price, $id);
        if ($stmt->execute()) {

            $add = $this->conn->prepare("INSERT INTO `log`(`action`, `stock_id`) VALUES ('updated stock',?)");
            $add->bind_param("i", $id);
            $add->execute();

            return true;
        } else {
            return false;
        }
    }
}
