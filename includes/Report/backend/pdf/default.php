<?php
include('../../../../auth/conn.php');
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$date_format = date('F j, Y', strtotime($date));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<style>
    .daily {
        color: orange;
    }
</style>

<body>

    <img src="../../../../img/logo.jpg" alt="Logo" width="150" height="150" class=" rounded-circle mt-2 mx-auto d-block mt-5">
    <p class="mt-2 text-center">
        <span class="text-center text-uppercase fw-bold mb-5 h1 daily">Daily Inventory</span>
    </p>

    <p class="ms-3 mb-3"><span class="fw-bold">Date:</span> <?php echo $date_format;  ?></p>

    <div class="container-fluid px-3">
        <table class="table table-sm border table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">PRODUCT NAME</th>
                    <th scope="col" class="text-center">Main Branch</th>
                    <th scope="col" class="text-center">Macanaya</th>
                    <th scope="col" class="text-center">Camalaniugan</th>
                    <th scope="col" class="text-center">Gonzaga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT s.brand, s.product, s.price,
                                COALESCE(MAX(CASE WHEN b.id = 1 THEN (r.stock - r.quantity) END), MAX(CASE WHEN b.id = 1 THEN s.stock END), 0) AS main, 
                                 COALESCE(MAX(CASE WHEN b.id = 2 THEN (r.stock - r.quantity) END), MAX(CASE WHEN b.id = 2 THEN s.stock END), 0) AS macanaya, 
                                COALESCE(MAX(CASE WHEN b.id = 5 THEN (r.stock - r.quantity) END), MAX(CASE WHEN b.id = 5 THEN s.stock END), 0) AS camalaniugan, 
                                COALESCE(MAX(CASE WHEN b.id = 6 THEN (r.stock - r.quantity) END), MAX(CASE WHEN b.id = 6 THEN s.stock END), 0) AS gonzaga
                        FROM 
                            stock s
                        LEFT JOIN 
                            branch b ON s.branchID = b.id
                        LEFT JOIN 
                            report r ON s.id = r.stock_id AND DATE(r.created_at) = CURDATE()
                        GROUP BY 
                            s.brand, s.product
                        ORDER BY 
                        s.brand;";
                $result = $conn->query($sql);
                $hasStockOutData = false;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $row['brand'] . ' - ' . $row['product'] . ' (₱' . $row['price'] . ')' ?>
                        </td>

                        <td class="text-center">
                            <?php
                            echo $row['main'];
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                            echo $row['macanaya']
                            ?>
                        </td>
                        <td class="text-center">
                            <?php echo $row['camalaniugan']; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $row['gonzaga']; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>


            </tbody>
        </table>
    </div>


</body>

</html>