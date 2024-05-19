<?php

class Report
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        if (!$conn instanceof mysqli) {
            throw new Exception("Invalid MySQLi connection object provided");
        }

        $this->conn = $conn;
    }

    public function view($date)
    {
        $pathView = "includes/Report/backend/pdf/view.php?view=" . $date;

        return $pathView;
    }
}
