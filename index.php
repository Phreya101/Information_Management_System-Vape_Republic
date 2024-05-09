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
            include('includes/Stocks/index.html');
            break;
        default:
            include('includes/Home/index.html');
    }
    ?>
</section>

<?php
include('partials/__footer.html');
?>