<script src="components/modals/ajax.js"></script>
<div class="modal fade" id="change" tabindex="-1" aria-labelledby="changeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeLabel"><i class="fa-solid fa-pen text-success me-2"></i> Edit
                    Credentials</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="update" class="d-flex flex-column bg-transparent">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                    <div class="form-group mb-3">
                        <label for="username" class='fw-bold mb-2'>Username</label>
                        <input type="text" value="<?php echo $_SESSION['username']; ?>" name="username" id="username"
                            class="form-control shadow-sm" required>
                    </div>

                    <label for="password" class='fw-bold mb-2'>Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            value="<?php echo $_SESSION['password']; ?>" aria-label="Recipient's username"
                            aria-describedby="see-pass">

                        <button class="btn btn-outline-secondary" type="button" id="see-pass"><i
                                class="fa-solid fa-eye"></i></button>

                        <button class="btn btn-outline-secondary" hidden type="button" id="hide-pass"><i
                                class="fa-solid fa-eye-slash"></i></button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-branch" tabindex="-1" aria-labelledby="changeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changeLabel"><i class="fa-solid fa-plus text-primary me-2"></i> Add
                    Branch</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="addBranchForm">
                    <div class="form-group mb-3">
                        <label for="name" class="fw-bold mb-2">Branch Name</label>
                        <input type="text" name="name" id="name" class="form-control shadow-sm" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addBranch">Save</button>
            </div>
        </div>
    </div>
</div>