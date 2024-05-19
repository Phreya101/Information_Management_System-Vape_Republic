<?php
class main
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        if (!$conn instanceof mysqli) {
            throw new Exception("Invalid MySQLi connection object provided");
        }

        $this->conn = $conn;
    }

    public function update($id, $username, $password)
    {
        $stmt = $this->conn->prepare("UPDATE `accounts` SET `username`= ?,`password`= ? WHERE ?");
        $stmt->bind_param("ssi", $username, $password, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

include("../../auth/conn.php");
$main = new main($conn);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST['id'];

    $success = $main->update($id, $username, $password);
    $response = array();
    if ($success) {
        $response['success'] = true;
        $response['message'] = 'Credentials updated successfully';
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to update credentials. Please try again.';
    }

    echo json_encode($response);
}
