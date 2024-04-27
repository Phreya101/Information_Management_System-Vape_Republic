<nav class="navbar navbar-dark bg-dark navbar-expand-xl text-primary-emphasis ">
    <div class="container-fluid">
        <div class="nav-item btn-group">
            <button class="btn btn-dark " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a class="navbar-brand" href="#">
                    <img src="https://img.freepik.com/free-vector/letter-s-box-logo-design-template_474888-3345.jpg?w=740&t=st=1714162382~exp=1714162982~hmac=91b68d11f78f294af18459ac053613330ad4b0ad0da097995d880fa4ca22a5bf" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                </a>
            </button>
            <ul class="dropdown-menu dropdown-menu-start ">
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>

        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-3" id="navbarNavAltMarkup">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Dashboard') : echo 'active';
                                        endif;  ?>" aria-current="page" href="index.php?path=Dashboard"> <i class="fa-solid fa-house"></i> Dashboard</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Stock Management') : echo 'active';
                                        endif;  ?>" href="index.php?path=Stock Management"><i class="fa-solid fa-boxes-packing"></i> Stocks</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Purchase Management') : echo 'active';
                                        endif;  ?>" href="index.php?path=Purchase Management"><i class="fa-solid fa-cart-shopping"></i> Purchases</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Product Management') : echo 'active';
                                        endif;  ?>" href="index.php?path=Product Management"><i class="fa-solid fa-boxes-stacked"></i> Products</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Brand Management') : echo 'active';
                                        endif;  ?>" href="index.php?path=Brand Management"><i class="fa-solid fa-warehouse"></i> Brand Management</a>
                </li>
            </ul>
            <span class="navbar-text">
                VP_IMS Version 1.0
            </span>

        </div>

    </div>

</nav>