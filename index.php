<?php
include('partials/__header.php');
include('components/nav.php');

switch ($_GET['path']) {
    case 'home':
        include('includes/home.php');
        break;
    default:
        include('includes/home.php');
}

include('partials/__footer.php');
