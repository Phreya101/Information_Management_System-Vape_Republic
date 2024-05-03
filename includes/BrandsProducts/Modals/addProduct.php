<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductLabel"><i class="fa-solid fa-plus text-primary me-2"></i> Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group mb-2 flex-lg-fill mx-2">
                        <label for="brand_name" class="fw-bold">Select Brand</label>
                        <select name="brand_name" id="brandName" required>
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

                    <div class="form-group mb-2 mx-2">
                        <label for="Product" class="fw-bold">Product Name</label>
                        <input type="text" name="product" id="product" required class="form-control border border-dark ">
                    </div>

                    <div class="form-group mb-2 mx-2">
                        <label for="price" class="fw-bold">Product Name</label>
                        <input type="text" name="price" id="price" required class="form-control border border-dark ">
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