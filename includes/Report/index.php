<script src="includes/Report/backend/main.js"></script>
<div class="container-fluid d-flex flex-lg-row my-3">

    <div class=" report card flex-lg-shrink col-lg-3 ms-2">
        <div class="card-header bg-secondary text-center h3 text-uppercase text-white">
            menu
        </div>

        <div class="card-body m-2">
            <form method="post" id="report">

                <label for="date" class="fw-bold mb-1 ms-1">Select Date</label>

                <div class="input-group mb-3">

                    <span class="input-group-text" id="label"><i class="fa-solid fa-calendar-days date"></i></span>

                    <input type="text" name="date" id="date" class="form-control shadow-sm date" aria-label="Username" aria-describedby="label" value="<?php echo $date = date('Y-m-d') ?>" required>


                </div>

                <div class="form-group mb-3">
                    <button type="button" id="view" class="btn btn-primary form-control fw-bold text-center">View Report</button>
                </div>

                <div class="form-group mb-3">
                    <button type="button" id="download" class="btn btn-success form-control fw-bold text-center">Generate PDF</button>
                </div>
            </form>
        </div>

    </div>

    <div id="viewData" class="flex-fill ms-3">
        <iframe src="includes/Report/backend/pdf/default.php" style="width: 100%; height: 600px;"></iframe>
    </div>

</div>