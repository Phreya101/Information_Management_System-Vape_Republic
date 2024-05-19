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
                echo '<table class="table table-hover text-capitalize" id="sales">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope=" col" class="text-center">#</th>';
                echo '<th scope="col" class="text-center">Branch</th>';
                echo '<th scope="col" class="text-center">Product Name</th>';
                echo '<th scope="col" class="text-center">Brand</th>';
                echo '<th scope="col" class="text-center">Price</th>';
                echo '</tr>';
                echo '</thead>';
                echo  '<tbody>';
                foreach ($list as $row) {
                    echo '<tr>';
                    echo '<th scope="row" class="text-center">' . $count++ . '</th>';
                    echo '<td class="text-center">' . $row['branch_name'] . '</td>';
                    echo '<td class="text-center">' . $row['brand'] . '</td>';
                    echo '<td class="text-center">' . $row['product'] . '</td>';
                    echo '<td class="text-center">₱' . $row['total_price'] . '</td>';

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
