<?php
include("class.php");
include("../../../auth/conn.php");
$stock = new Stock($conn);

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $content = $stock->getLog();
    if (!empty($content)) {
        foreach ($content as $key) {
            switch ($key['action']) {
                case 'added':
                    echo '<div class="d-lg-flex flex-row">';
                    echo '<span class="flex-shrink-2 text-sm text-primary text-uppercase fw-bold">' . $key['action'] . ' :</span>';
                    echo '<span class="col-lg-3 text-sm text-lg-start fst-italic text-start ms-2"> ' . $key['created_at'] . '</span>';
                    echo '<span class="col-lg-3 text-sm ms-0 fst-italic text-lg-center">- - -</span>';
                    echo '<span class="flex-fill text-sm text-end text-capitalize">' . $key['changes'] . '</span>';
                    echo '</div>';
                    echo '<hr class="my-0">';
                    break;
                case 'edited':
                    echo '<div class="d-lg-flex flex-row">';
                    echo '<span class="flex-shrink-2 text-sm text-success text-uppercase fw-bold">' . $key['action'] . ' :</span>';
                    echo '<span class="col-lg-3 text-sm text-lg-start fst-italic text-start ms-2"> ' . $key['created_at'] . '</span>';
                    echo '<span class="col-lg-3 text-sm ms-0 fst-italic text-lg-center">- - -</span>';
                    echo '<span class="flex-fill text-sm text-end text-capitalize"> ' . $key['brand'] . ' - ' . $key['product'] . '</span>';
                    echo '</div>';
                    echo '<hr class="my-0">';
                    break;
                case 'deleted':
                    echo '<div class="d-lg-flex flex-row">';
                    echo '<span class="flex-shrink-2 text-sm text-danger text-uppercase fw-bold">' . $key['action'] . ' :</span>';
                    echo '<span class="col-lg-3 text-sm text-lg-start fst-italic text-start ms-2"> ' . $key['created_at'] . '</span>';
                    echo '<span class="col-lg-3 text-sm ms-0 fst-italic text-lg-center">- - -</span>';
                    echo '<span class="flex-fill text-sm text-end text-capitalize">' . $key['changes'] . '</span>';
                    echo '</div>';
                    echo '<hr class="my-0">';
                    break;
                case 'deducted':
                    echo '<div class="d-lg-flex flex-row">';
                    echo '<span class="flex-shrink-2 text-sm text-secondary text-uppercase fw-bold">' . $key['action'] . ' :</span>';
                    echo '<span class="col-lg-3 text-sm text-lg-start fst-italic text-start ms-2"> ' . $key['created_at'] . '</span>';
                    echo '<span class="col-lg-3 fs-6 ms-0 fst-italic text-lg-center text-danger">-' . $key['changes'] . '</span>';
                    echo '<span class="flex-fill text-sm text-end text-capitalize"> ' . $key['brand'] . ' - ' . $key['product'] . '</span>';
                    echo '</div>';
                    echo '<hr class="my-0">';
                    break;
                case 'replaced':
                    echo '<div class="d-lg-flex flex-row">';
                    echo '<span class="flex-shrink-2 text-sm text-warning text-uppercase fw-bold">' . $key['action'] . ' :</span>';
                    echo '<span class="col-lg-3 text-sm text-lg-start fst-italic text-start ms-2"> ' . $key['created_at'] . '</span>';
                    echo '<span class="col-lg-3 fs-6 ms-0 fst-italic text-lg-center text-danger">-' . $key['changes'] . '</span>';
                    echo '<span class="flex-fill text-sm text-end text-capitalize"> ' . $key['brand'] . ' - ' . $key['product'] . '</span>';
                    echo '</div>';
                    echo '<hr class="my-0">';
                    break;
            }
        }
    }
}
