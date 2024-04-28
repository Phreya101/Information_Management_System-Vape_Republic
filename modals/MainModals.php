<!-- Add Transaction -->
<div class="modal fade" id="addTransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-plus me-3 text-primary"></i> Add Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" class="d-flex flex-column bg-transparent">
                    <div class="form-group mb-3">
                        <label for="items" class='fw-bold mb-2'>Select Product</label>
                        <select class="border-dark" name="items" id="items" class="border-dark" required>
                            <option value=""></option>
                            <option value="1">Awesome-Phreya(500)</option>
                            <option value="2">Beast</option>
                            <option value="3">Compatible</option>
                            <option value="4">Thomas Edison</option>
                            <option value="5">Nikola</option>
                            <option value="6">Selectize</option>
                            <option value="7">Javascript</option>
                        </select>
                    </div>

                    <div class="from-group mb-3">
                        <label for="qty" class='fw-bold mb-2'>Quantity</label>
                        <input class="form-control border-dark" type="number" name="qty" id="qty" required>
                    </div>

                    <div class="from-group mb-3">
                        <label for="prc" class='fw-bold mb-2'>Price</label>
                        <input class="form-control border-dark" type="number" name="prc" id="prc" disabled>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#items").selectize({
        normalize: true
    });
</script>

<!-- Edit Stock -->
<div class="modal fade" id="editStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-pen text-success me-2"></i> Edit Stock</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" class="d-flex flex-column bg-transparent">
                    <div class="form-group mb-3">
                        <label for="product" class='fw-bold mb-2'>Product</label>
                        <input type="text" name="product" id="product" class="form-control border-dark" disabled>
                    </div>

                    <div class="from-group mb-3">
                        <div class="form-group mb-3">
                            <label for="brand" class='fw-bold mb-2'>Brand</label>
                            <input type="text" name="Brand" id="brand" class="form-control border-dark" disabled>
                        </div>
                    </div>

                    <div class="from-group mb-3">
                        <label for="stock" class='fw-bold mb-2'>Stock</label>
                        <input class="form-control border-dark" type="text" name="stock" id="stock" required>
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