<?php
include('partials/__header.php');
include('components/nav.php');
?>
<header class='my-3 text-decoration-underline'>
    <h2 class='ms-5 mt-3 text-uppercase text-bold'>
        <?php
        echo '&nbsp;' . $_GET['path'] . '&nbsp;';
        ?>
    </h2>
</header>
<?php
switch ($_GET['path']) {
    case 'Dashboard':
        include('includes/home.php');
        break;
    case 'Stock Management':
        include('includes/stocks.php');
        break;
    default:
        include('includes/home.php');
}

include('partials/__footer.php');
