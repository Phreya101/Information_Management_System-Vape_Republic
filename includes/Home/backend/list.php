<?php
include("class.php");
include("../../../auth/conn.php");
$home = new Home($conn);

switch (isset($_GET["action"])) {
    case "getList":
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $list = $home->getList();
            $count = 1;
            if (!empty($list)) {
                echo '<table class="table table-hover" id="sales">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope=" col">#</th>';
                echo '<th scope="col">Product Name</th>';
                echo '<th scope="col">Brand</th>';
                echo '<th scope="col">Quantity</th>';
                echo '<th scope="col">Price</th>';
                echo '<th scope="col">Action</th>';
                echo '</tr>';
                echo '</thead>';
                echo  '<tbody>';
                foreach ($list as $row) {
                    echo '<tr>';
                    echo '<th scope="row">' . $count++ . '</th>';
                    echo '<td>' . $row['brand'] . '</td>';
                    echo '<td>' . $row['product'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>₱' . $row['total_price'] . '</td>';
                    echo '<td>';
                    echo '<button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-secondary btn-sm rounded refund" id="returnSale" data-id="' . $row['sid'] . '"> <i class="fa-solid fa-rotate-left"></i></button>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<table class="table table-hover" id="sales">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope=" col">#</th>';
                echo '<th scope="col">Product Name</th>';
                echo '<th scope="col">Brand</th>';
                echo '<th scope="col">Quantity</th>';
                echo '<th scope="col">Price</th>';
                echo '<th scope="col">Action</th>';
                echo '</tr>';
                echo '</thead>';
                echo  '<tbody>';
                echo '</tbody>';
                echo '</table>';
            }
        }

?>
        <script>
            new DataTable("#sales", {
                layout: {
                    bottomEnd: {
                        paging: {
                            boundaryNumbers: false,
                        },
                    },
                },
                ordering: false,
            });
        </script>
<?php
        break;
}
