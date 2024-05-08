<?php
class home
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }
}
