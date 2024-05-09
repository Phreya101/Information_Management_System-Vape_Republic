<div class="modal fade" id="change" tabindex="-1" aria-labelledby="changeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeLabel"><i class="fa-solid fa-pen text-success me-2"></i> Edit Credentials</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" class="d-flex flex-column bg-transparent">
                    <div class="form-group mb-3">
                        <label for="username" class='fw-bold mb-2'>Username</label>
                        <input type="text" name="username" id="username" class="form-control shadow-sm" required>
                    </div>

                    <div class="from-group mb-3">
                        <div class="form-group mb-3">
                            <label for="password" class='fw-bold mb-2'>Brand</label>
                            <input type="password" name="password" id="password" class="form-control shadow-sm" required>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<?php
echo "122424";
?>