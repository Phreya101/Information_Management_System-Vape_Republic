<?php

include("class.php");
include("../../../auth/conn.php");
$report = new Report($conn);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    switch ($_GET["action"]) {
        case "view":
            $date = $_POST['date'];
            $view = $report->view($date);

            echo $view;
    }
}
