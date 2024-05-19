<script src="components/main.js"></script>
<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-xl text-primary-emphasis ">
    <div class="container-fluid">
        <div class="nav-item btn-group">
            <button class="btn btn-dark " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.jpg" alt="Logo" width="70" height="70"
                        class="d-inline-block align-text-top rounded-circle">
                </a>
            </button>
            <ul class="dropdown-menu dropdown-menu-start ">
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change">Change
                        Credentials</button></li>
                <li><button class="dropdown-item" id="logout">Logout</button></li>
            </ul>
        </div>

        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-3" id="navbarNavAltMarkup">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Dashboard') : echo 'active fs-5';
                                        endif;  ?>" aria-current="page" href="index.php?path=Dashboard"> <i
                            class="fa-solid fa-house"></i> Dashboard</a>
                </li>

                <div class="btn-group dropend d-flex flex-lg-column nav-item ms-2">
                    <a class="nav-link dropdown-toggle  <?php
                                                        if ($_GET['path'] == 'Stock Management') :
                                                            echo 'active fs-5';
                                                        endif;  ?>" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-boxes-packing"></i>
                        Stocks Management
                    </a>

                    <?php
                    if (isset($_GET['branch'])) :
                    ?>
                    <span class="text-sm text-center text-white text-capitalize fw-lighter font-monospace">
                        <?php echo $_GET['branch']; ?>
                    </span>
                    <?php
                    endif;
                    ?>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php
                        $sql = $conn->query('SELECT * FROM `branch`');
                        while ($row = $sql->fetch_assoc()) :
                            $name = $row['branch_name'];
                            $id = $row['id'];
                        ?>

                        <li class="d-flex flex-lg-row">
                            <a class="dropdown-item text-capitalize"
                                href="index.php?path=Stock Management&branchID=<?php echo $id ?>&branch=<?php echo $name ?>">
                                <?php echo $name ?>
                            </a>
                            <button type="button" class="editBranch btn bg-transparent btn-outline-none btn-sm"
                                data-branch="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#edit-branch">
                                <i class="fa-solid fa-pen text-success"></i>
                            </button>
                        </li>

                        <?php
                        endwhile;
                        ?>

                        <li>
                            <button class="dropdown-item bg-primary" data-bs-toggle="modal"
                                data-bs-target="#add-branch">
                                <i class="fa-solid fa-plus me-2"></i>Add new branch
                            </button>
                        </li>

                    </ul>
                </div>

                <li class="nav-item ms-2">
                    <a class="nav-link <?php if ($_GET['path'] == 'Report') : echo 'active fs-5';
                                        endif;  ?>" href="index.php?path=Report"><i class="fa-solid fa-scroll"></i>
                        Report</a>
                </li>

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

<div class="modal fade" id="edit-branch" tabindex="-1" aria-labelledby="changeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeLabel"><i class="fa-solid fa-pen text-success me-2"></i> Edit
                    Branch</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="editBranchForm">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="removeBranch">Remove</button>
                <button type="button" class="btn btn-primary" id="editBranch">Save Changes</button>
            </div>
        </div>
    </div>
</div>