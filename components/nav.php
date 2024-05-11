<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-xl text-primary-emphasis ">
    <div class="container-fluid">
        <div class="nav-item btn-group">
            <button class="btn btn-dark " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.jpg" alt="Logo" width="70" height="70" class="d-inline-block align-text-top rounded-circle">
                </a>
            </button>
            <ul class="dropdown-menu dropdown-menu-start ">
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change">Change Credentials</button></li>
                <li><button class="dropdown-item" id="logout">Logout</button></li>
            </ul>
        </div>

        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-3" id="navbarNavAltMarkup">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Dashboard') : echo 'active fs-5';
                                        endif;  ?>" aria-current="page" href="index.php?path=Dashboard"> <i class="fa-solid fa-house"></i> Dashboard</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Stock Management') : echo 'active fs-5';
                                        endif;  ?>" href="index.php?path=Stock Management"><i class="fa-solid fa-boxes-packing"></i> Stocks Management</a>
                </li>
                <!-- <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Brand and Product Management') : echo 'active fs-5';
                                        endif;  ?>" href="index.php?path=Brand and Product Management"><i class="fa-solid fa-boxes-stacked"></i> Brands & Products</a>
                </li> -->
            </ul>
            <span class="navbar-text">
                VR_IMS Version 1.0
            </span>

        </div>

    </div>

</nav>

<?php
include('components/modals/change.php');
?>