<?php
class nav
{
    private $conn;

    public function __construct(mysqli $conn)
    {
        if (!$conn instanceof mysqli) {
            throw new Exception("Invalid MySQLi connection object provided");
        }

        $this->conn = $conn;
    }

    public function modalEdit($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `branch` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function editBranch($id, $name)
    {
        $stmt = $this->conn->prepare("UPDATE `branch` SET `branch_name`= ? WHERE `id` = ?");
        $stmt->bind_param("si", $name, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBranch($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `branch` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addBranch($name)
    {
        $stmt = $this->conn->prepare("INSERT INTO `branch`(`branch_name`) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

include("../auth/conn.php");
$nav = new nav($conn);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    switch ($_GET["action"]) {
        case "editModal":
            $id = $_POST['id'];
            $content = $nav->modalEdit($id);
            if (!empty($content)) {

                echo '
                <div class="form-group mb-3">
                <label for="name" class="fw-bold mb-2">Branch Name</label>
                <input type="hidden" name="id" value="' . $content['id'] . '">
                <input type="text" value="' . $content['branch_name'] . '" name="name" id="name" class="form-control shadow-sm" required>
                </div>';
            }
            break;
        case 'edit-branch':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $success = $nav->editBranch($id, $name);

            $response = array();

            if ($success) {
                $response['success'] = true;
                $response['message'] = 'Branch edited successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to update branch. Please try again later!';
            }

            echo json_encode($response);
            break;
        case 'delete-branch':
            $id = $_POST['id'];
            $success = $nav->deleteBranch($id);
            $response = array();
            if ($success) {
                $response['success'] = true;
                $response['message'] = 'Branch deleted successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to delete branch. Please try again later!';
            }
            echo json_encode($response);
            break;
        case 'add-branch':
            $name = $_POST['name'];
            $success = $nav->addBranch($name);
            $response = array();
            if ($success) {
                $response['success'] = true;
                $response['message'] = 'Branch added successfully!';
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to add branch. Please try again later!';
            }
            echo json_encode($response);
            break;
    }
}
