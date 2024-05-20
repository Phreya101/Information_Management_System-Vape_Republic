<?php
include('../../../../auth/conn.php');
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $date_format = date('F j, Y', strtotime($date));
} else {
    header('Location: ../../../../index.php?path=Report&download=error');
}


require_once('../TCPDF-main/tcpdf.php');
// Header content
class PDF extends TCPDF
{
    // Page header
    public function Header()
    {
    }
}
function addHeader($pdf)
{

    $pageWidth = $pdf->getPageWidth();


    $imageFile = K_PATH_IMAGES . 'logo.jpg';
    $imageWidth = 30;
    $imageX = ($pageWidth - $imageWidth) / 2;
    $pdf->Image($imageFile, $imageX, 10, $imageWidth);


    $pdf->SetY(42);

    $pdf->SetFont('helvetica', 'B', 18);
    $pdf->SetTextColor(255, 165, 0);
    $pdf->Cell(0, 10, 'DAILY INVENTORY', 0, 1, 'C');

    $pdf->Ln(-5);
}


$pdf = new TCPDF('P', 'mm', array(216, 330), true, 'UTF-8', false);

$pdf->SetMargins(15, 15, 15);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setPrintHeader(false);


$pdf->SetCreator('Vape Republic Inventory Management System');
$pdf->SetAuthor('Administrator');
$pdf->SetTitle('DI_' . $date_format);
$pdf->SetSubject('Daily Inventory');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


$pdf->setFontSubsetting(true);


$pdf->SetFont('helvetica', '', 12, '', true);


// Disposables
$pdf->AddPage();


addHeader($pdf);


$pdf->startPageGroup();


$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);

$html = '<style>
    body {
        font-family: "Arial, Helvetica, sans-serif";
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        vertical-align: middle;
    }

    th {
        text-align: center;
        margin: 5px;
    }

    td {
        text-align: center;
    }

    .product-name {
        width: 160px; 
    }

    .stock-in{
        width: 90px;
    }

    .stock-out{
        width: 85px;
    }

    .balance{
        width: 105px;
    }
    .gonzaga{
        width: 80px;
    }
</style>';

$html .= '<body>';
$html .= '<h4  style="text-align: center;">DISPOSABLE</h4>';
$html .= '<p><b>Date: </b>' . $date_format . '</p>
<table border="1" align="center" cellpadding="1">
    <tr>
        <th class="product-name"><b><br>PRODUCT NAME<br></b></th>
        <th class="stock-in"><b><br>MAIN BRANCH<br></b></th>
        <th class="stock-out"><b><br>MACANAYA<br></b></th>
        <th class="balance"><b><br>CAMALANIUGAN<br></b></th>
        <th class="gonzaga"><b><br>GONZAGA<br></b></th>
    </tr>';

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
                            report r ON s.id = r.stock_id AND DATE(r.created_at) = '$date'
                        WHERE `category` = 'Disposable'
                        GROUP BY 
                            s.brand, s.product
                        ORDER BY 
                        s.brand";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $brand = $row["brand"];
    $product = $row['product'];
    $price = $row['price'];
    $main = $row['main'];
    $macanaya = $row['macanaya'];
    $camalaniugan = $row['camalaniugan'];
    $gonzaga = $row['gonzaga'];

    $html .= '<tr>';
    $html .= '<td class="product-name" style="texT-align: left;"> &nbsp;&nbsp;' . $brand . ' - ' . $product . '</td>';
    $html .= '<td class="stock-in">' . $main . '</td>';
    $html .= '<td class="stock-out">' . $macanaya . '</td>';
    $html .= '<td class="balance">' . $camalaniugan . '</td>';
    $html .= '<td class="gonzaga">' . $gonzaga . '</td>';
    $html .= '</tr>';
}


$html .= '</table>';
$html .= '</body>';

$pdf->writeHTML($html, true, false, true, false, '');


// Devices
$pdf->AddPage();
addHeader($pdf);


$pdf->startPageGroup();


$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);



$html = '<style>
    body {
        font-family: "Arial, Helvetica, sans-serif";
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        vertical-align: middle;
    }

    th {
        text-align: center;
        margin: 5px;
    }

    td {
        text-align: center;
    }

    .product-name {
        width: 160px; 
    }

    .stock-in{
        width: 90px;
    }

    .stock-out{
        width: 85px;
    }

    .balance{
        width: 105px;
    }
    .gonzaga{
        width: 80px;
    }
</style>';

$html .= '<body>';
$html .= '<h4  style="text-align: center;">DEVICES</h4>';
$html .= '<p><b>Date: </b>' . $date_format . '</p>
<table border="1" align="center" cellpadding="1">
    <tr>
        <th class="product-name"><b><br>PRODUCT NAME<br></b></th>
        <th class="stock-in"><b><br>MAIN BRANCH<br></b></th>
        <th class="stock-out"><b><br>MACANAYA<br></b></th>
        <th class="balance"><b><br>CAMALANIUGAN<br></b></th>
        <th class="gonzaga"><b><br>GONZAGA<br></b></th>
    </tr>';

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
                            report r ON s.id = r.stock_id AND DATE(r.created_at) = '$date'
                        WHERE `category` = 'Device'
                        GROUP BY 
                            s.brand, s.product
                        ORDER BY 
                        s.brand";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $brand = $row["brand"];
    $product = $row['product'];
    $price = $row['price'];
    $main = $row['main'];
    $macanaya = $row['macanaya'];
    $camalaniugan = $row['camalaniugan'];
    $gonzaga = $row['gonzaga'];

    $html .= '<tr>';
    $html .= '<td class="product-name" style="texT-align: left;"> &nbsp;&nbsp;' . $brand . ' - ' . $product . '</td>';
    $html .= '<td class="stock-in">' . $main . '</td>';
    $html .= '<td class="stock-out">' . $macanaya . '</td>';
    $html .= '<td class="balance">' . $camalaniugan . '</td>';
    $html .= '<td class="gonzaga">' . $gonzaga . '</td>';
    $html .= '</tr>';
}


$html .= '</table>';
$html .= '</body>';

$pdf->writeHTML($html, true, false, true, false, '');

// Juice
$pdf->AddPage();
addHeader($pdf);


$pdf->startPageGroup();


$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);



$html = '<style>
    body {
        font-family: "Arial, Helvetica, sans-serif";
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        vertical-align: middle;
    }

    th {
        text-align: center;
        margin: 5px;
    }

    td {
        text-align: center;
    }

    .product-name {
        width: 160px; 
    }

    .stock-in{
        width: 90px;
    }

    .stock-out{
        width: 85px;
    }

    .balance{
        width: 105px;
    }
    .gonzaga{
        width: 80px;
    }
</style>';

$html .= '<body>';
$html .= '<h4  style="text-align: center;">JUICE</h4>';
$html .= '<p><b>Date: </b>' . $date_format . '</p>
<table border="1" align="center" cellpadding="1">
    <tr>
        <th class="product-name"><b><br>PRODUCT NAME<br></b></th>
        <th class="stock-in"><b><br>MAIN BRANCH<br></b></th>
        <th class="stock-out"><b><br>MACANAYA<br></b></th>
        <th class="balance"><b><br>CAMALANIUGAN<br></b></th>
        <th class="gonzaga"><b><br>GONZAGA<br></b></th>
    </tr>';

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
                            report r ON s.id = r.stock_id AND DATE(r.created_at) = '$date'
                        WHERE `category` = 'Accessories'
                        GROUP BY 
                            s.brand, s.product
                        ORDER BY 
                        s.brand";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $brand = $row["brand"];
    $product = $row['product'];
    $price = $row['price'];
    $main = $row['main'];
    $macanaya = $row['macanaya'];
    $camalaniugan = $row['camalaniugan'];
    $gonzaga = $row['gonzaga'];

    $html .= '<tr>';
    $html .= '<td class="product-name" style="texT-align: left;"> &nbsp;&nbsp;' . $brand . ' - ' . $product . '</td>';
    $html .= '<td class="stock-in">' . $main . '</td>';
    $html .= '<td class="stock-out">' . $macanaya . '</td>';
    $html .= '<td class="balance">' . $camalaniugan . '</td>';
    $html .= '<td class="gonzaga">' . $gonzaga . '</td>';
    $html .= '</tr>';
}


$html .= '</table>';
$html .= '</body>';

$pdf->writeHTML($html, true, false, true, false, '');

// Accessories
$pdf->AddPage();
addHeader($pdf);


$pdf->startPageGroup();


$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);



$html = '<style>
    body {
        font-family: "Arial, Helvetica, sans-serif";
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        vertical-align: middle;
    }

    th {
        text-align: center;
        margin: 5px;
    }

    td {
        text-align: center;
    }

    .product-name {
        width: 160px; 
    }

    .stock-in{
        width: 90px;
    }

    .stock-out{
        width: 85px;
    }

    .balance{
        width: 105px;
    }
    .gonzaga{
        width: 80px;
    }
</style>';

$html .= '<body>';
$html .= '<h4  style="text-align: center;">ACCESSORIES</h4>';
$html .= '<p><b>Date: </b>' . $date_format . '</p>
<table border="1" align="center" cellpadding="1">
    <tr>
        <th class="product-name"><b><br>PRODUCT NAME<br></b></th>
        <th class="stock-in"><b><br>MAIN BRANCH<br></b></th>
        <th class="stock-out"><b><br>MACANAYA<br></b></th>
        <th class="balance"><b><br>CAMALANIUGAN<br></b></th>
        <th class="gonzaga"><b><br>GONZAGA<br></b></th>
    </tr>';

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
                            report r ON s.id = r.stock_id AND DATE(r.created_at) = '$date'
                        WHERE `category` = 'Juice'
                        GROUP BY 
                            s.brand, s.product
                        ORDER BY 
                        s.brand";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $brand = $row["brand"];
    $product = $row['product'];
    $price = $row['price'];
    $main = $row['main'];
    $macanaya = $row['macanaya'];
    $camalaniugan = $row['camalaniugan'];
    $gonzaga = $row['gonzaga'];

    $html .= '<tr>';
    $html .= '<td class="product-name" style="texT-align: left;"> &nbsp;&nbsp;' . $brand . ' - ' . $product . '</td>';
    $html .= '<td class="stock-in">' . $main . '</td>';
    $html .= '<td class="stock-out">' . $macanaya . '</td>';
    $html .= '<td class="balance">' . $camalaniugan . '</td>';
    $html .= '<td class="gonzaga">' . $gonzaga . '</td>';
    $html .= '</tr>';
}


$html .= '</table>';
$html .= '</body>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('DI_' . $date_format, 'I');
