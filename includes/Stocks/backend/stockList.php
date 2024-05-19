<?php
include("class.php");
include("../../../auth/conn.php");
$stock = new Stock($conn);

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $_GET['id'];
    $list = $stock->stockList($id);
    $count = 1;
    if (!empty($list)) {
        echo '<table class="table table-hove text-capitalize" class="text-center" id="inventory">';
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
            echo '<td class="d-flex flex-lg-row">';

            echo '<button type="button" class="btn btn-success btn-sm rounded editStock" data-id="' . $key['id'] . '"><i class="fa-solid fa-pen"></i></button>';

            echo '<button type="button" class="btn btn-danger btn-sm rounded mx-2 deleteStock" id="deleteStock" data-id="' . $key['id'] . '" data-name="' . $key['brand'] . '-' . $key['product'] . '"> <i class="fa-solid fa-trash"></i></button>';
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
    </script>

<?php
}
?>