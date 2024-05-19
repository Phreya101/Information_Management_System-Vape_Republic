<?php
include('partials/__header.php');
include('components/nav.php');
?>
<section class="section">
    <?php
    switch ($_GET['path']) {
        case 'Dashboard':
            include('includes/Home/index.html');
            break;
        case 'Stock Management':
            include('includes/Stocks/index.php');
            break;
        case 'Report':
            include('includes/Report/index.php');
            break;
        default:
            header('location: index.php?path=Dashboard');
            exit;
    }
    ?>
</section>

<?php
include('partials/__footer.html');
?>