<?php

include("class.php");
include("../../../auth/conn.php");
$stock = new Stock($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case 'addStock':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $branch = $_POST['branch'];
                $brand = $_POST['brand'];
                $product = $_POST['product'];
                $stockQty = $_POST['stockQty'];
                $price = $_POST['price'];

                if ($brand && $product && $stockQty !== false && $price !== false) {

                    $success = $stock->addStock($branch, $brand, $product, $stockQty, $price);


                    $response = array();

                    if ($success) {
                        $response['success'] = true;
                        $response['message'] = "Stock added successfully";
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Failed to add stock. Please try again later.";
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = "Invalid input. Please check your data and try again.";
                }

                echo json_encode($response);
            }
            break;
        case "deleteStock":
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $success = $stock->deleteStock($id, $name);


                $response = array();

                if ($success) {
                    $response['success'] = true;
                    $response['message'] = "Stock deleted successfully";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Failed to delete stock. Please try again later.";
                }

                echo json_encode($response);
            }
            break;
        case "editStock":
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $id = $_GET["id"];

                $content = $stock->editStock($id);
                if (!empty($content)) {
                    echo '<div class="modal-header">';
                    echo '<h1 class="modal-title fs-5" id="editStockLabel"><i class="fa-solid fa-pen text-success me-2"></i> Edit Stock</h1>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>';
                    echo '<form method="post" id="editForm" class="d-flex flex-column bg-transparent">';
                    echo '<div class="modal-body">';
                    foreach ($content as $key) {
                        echo '<input name="id" type="hidden" value="' . $key['id'] . '">';
                        echo '<div class="form-group mb-3">';
                        echo '<label for="brand" class="fw-bold mb-2">Brand</label>';
                        echo '<input type="text" name="brand" id="brand" value="' . $key['brand'] . '" class="form-control shadow-sm" required>';
                        echo '</div>';

                        echo '<div class="form-group mb-3">';
                        echo '<label for="product" class="fw-bold mb-2">Product</label>';
                        echo '<input type="text" name="product" id="product" value="' . $key['product'] . '" class="form-control shadow-sm" required>';
                        echo '</div>';

                        echo '<div class="from-group mb-3">';
                        echo '<label for="stock" class="fw-bold mb-2">Stock</label>';
                        echo '<input class="form-control shadow-sm" value="' . $key['stock'] . '" type="text" name="stockQty" id="stock" required>';
                        echo '</div>';

                        echo '<div class="from-group mb-3">';
                        echo '<label for="price" class="fw-bold mb-2">Price</label>';
                        echo '<input type="text" name="price" id="price" value="' . $key['price'] . '" class="form-control shadow-sm" required>';
                        echo '</div>';

                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
                        echo '<button type="submit" name="submitEdit" class="btn btn-primary">Save Changes</button>
                    </div>';
                    }
                    echo '</form>';
                }
            }
            break;
        case 'updateStock':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $brand = $_POST['brand'];
                $product = $_POST['product'];
                $stockQty = $_POST['stockQty'];
                $price = $_POST['price'];

                if ($brand && $product && $stockQty !== false && $price !== false) {

                    $success = $stock->updateStock($id, $brand, $product, $stockQty, $price);


                    $response = array();

                    if ($success) {
                        $response['success'] = true;
                        $response['message'] = "Stock updated successfully";
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Failed to update stock. Please try again later.";
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = "Invalid input. Please check your data and try again.";
                }

                echo json_encode($response);
            }
            break;
        case 'stockList':
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $id = $_GET["id"];
                $list = $stock->getItem($id);
                foreach ($list as &$item) {
                    $item['name'] = $item['brand'] . ' - ' . $item['product'];
                }
                echo json_encode($list, JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'addNewStock':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $list = $_POST['list'];
                $newStock = $_POST['newStock'];
                $add = $stock->addNewStock($list, $newStock);

                $response = array();
                if ($add) {
                    $response['success'] = true;
                    $response['message'] = "Added new stock successfully";
                } else {
                    $response['success'] = false;
                    $response['message'] = "Failed to add new stock. Please try again later.";
                }

                echo json_encode($response);
            }
    }
}
