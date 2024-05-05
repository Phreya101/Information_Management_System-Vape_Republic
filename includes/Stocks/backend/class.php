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
        }
    }
}
