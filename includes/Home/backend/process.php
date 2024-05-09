<?php

include("class.php");
include("../../../auth/conn.php");
$home = new home($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getItems':
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $list = $home->getItem();
                foreach ($list as $item) {
                    $item['name'] = $item['brand'] . ' - ' . $item['product'];
                }
                echo json_encode($list, JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'addTransaction':
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $item = $_POST['item'];
                $qty = $_POST['qty'];
                $prc = $_POST['prc'];

                $success = $home->addTransaction($item, $qty, $prc);

                $response = array();

                if ($success) {
                    $response['success'] = true;
                    $response['message'] = "Transaction added successfully";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Failed to add transaction. Please try again later.";
                }

                echo json_encode($response);
            }
            break;
        case "refund":
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $id = $_POST['id'];
                $success = $home->refund($id);

                $response = array();

                if ($success) {
                    $response['success'] = true;
                    $response['message'] = "Refunded successfully";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Failed to refund. Please try again later.";
                }

                echo json_encode($response);
            }
            break;
    }
}
