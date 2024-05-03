<?php
include('partials/__header.php');
include('components/nav.php');
?>
<section class="section">
    <?php
    switch ($_GET['path']) {
        case 'Dashboard':
            include('includes/Home/index.php');
            break;
        case 'Stock Management':
            include('includes/Stocks/index.php');
            break;
        case 'Brand and Product Management':
            include('includes/BrandsProducts/index.php');
            break;
        default:
            include('includes/Home/index.php');
    }
    ?>
</section>

<?php
include('partials/__footer.php');
?>