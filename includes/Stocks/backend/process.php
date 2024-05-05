<?php

include("class.php");
include("../../../auth/conn.php");
$stock = new Stock($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case 'addStock':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $brand = $_POST['brand'];
                $product = $_POST['product'];
                $stockQty = $_POST['stockQty'];
                $price = $_POST['price'];

                if ($brand && $product && $stockQty !== false && $price !== false) {

                    $success = $stock->addStock($brand, $product, $stockQty, $price);


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

                $success = $stock->deleteStock($id);


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
    }
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $list = $stock->stockList();
    $count = 1;
    if (!empty($list)) {
        echo '<table class="table table-hover" class="text-center" id="inventory">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope=" col">#</th>';
        echo '<th scope="col">Brand</th>';
        echo '<th scope="col">Product Name</th>';
        echo '<th scope="col" class="text-start">Stock</th>';
        echo '<th scope="col">Price</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($list as $key) {

            echo '<tr>';
            echo '<th scope="row">' . $count++ . '</th>';
            echo '<td>' . $key['brand'] . '</td>';
            echo '<td>' . $key['product'] . '</td>';
            echo '<td class="text-start">' . $key['stock'] . '</td>';
            echo '<td> &#8369;' . $key['price'] . '</td>';
            echo '<td>';

            echo '<button type="button" class="btn btn-success btn-sm rounded" data-bs-toggle="modal" data-bs-target="#editStock"><i class="fa-solid fa-pen"></i></button>';

            echo '<button type="button" class="btn btn-danger btn-sm rounded mx-2 deleteStock" id="deleteStock" data-id="' . $key['id'] . '"> <i class="fa-solid fa-trash"></i></button>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<table class="table table-hover" class="text-center" id="inventory">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope=" col">#</th>';
        echo '<th scope="col">Brand</th>';
        echo '<th scope="col">Product Name</th>';
        echo '<th scope="col">Stock</th>';
        echo '<th scope="col">Price</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '</tbody>';
        echo '</table>';
    }
?>

    <script>
        new DataTable("#inventory", {
            layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false,
                    },
                },
            },
        });

        $(document).ready(function() {
            // Delete Stock
            $(".deleteStock").click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var userId = $(this).data('id');
                        $.ajax({
                            type: 'post',
                            url: 'includes/Stocks/backend/process.php?action=deleteStock',
                            data: {
                                id: userId
                            },
                            success: function(response) {
                                var data = JSON.parse(response);
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: data.message,
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(function() {
                                        window.location = "index.php?path=Stock%20Management";
                                    }, 1500);
                                } else {
                                    Swal.fire({
                                        title: "Failed!",
                                        text: data.message,
                                        icon: "error",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>


<?php
}
?>