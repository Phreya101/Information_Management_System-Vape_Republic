<section>
    <div class="container-fluid d-lg-flex flex-row">

        <div class="rounded container-lg mx-2 my-3 align-items-center">
            <div class="card text-center">
                <div class="card-header">
                    <span class="h3">
                        <i class="fa-solid fa-boxes-packing text-primary me-3"></i> Inventory List
                    </span>
                </div>

                <div class="card-body">
                    <div class="table-responsive-lg overflow-y-scroll" style="width:100%; height:510px;">
                        <table class="table table-hover" class=" text-center" id="inventory">
                            <thead>
                                <tr>
                                    <th scope=" col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Stock</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Black Oxbar</td>
                                    <td>Flava</td>
                                    <td>2</td>
                                    <td>
                                        <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-success btn-sm rounded' data-bs-toggle="modal" data-bs-target="#editStock"><i class="fa-solid fa-pen"></i></button>

                                        <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-danger btn-sm rounded' id="deleteStock"> <i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="rounded container-lg mx-2 my-3 align-items-center">
            <div class="d-flex flex-column">
                <div class="card mb-4">
                    <div class="h3 card-header text-center">
                        <i class="fa-solid fa-plus me-3 text-primary"></i> Add Stock
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="d-lg-flex flex-row">
                                <div class="form-group mb-2 flex-lg-fill mx-2">
                                    <label for="product_name" class="fw-bold">Select Product</label>
                                    <select name="product_name" id="productName" required>
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
                            </div>

                            <div class="d-lg-flex flex-row mx-2">
                                <div class="form-group mb-2 w-50">
                                    <label for="stock" class="fw-bold">Stock</label>
                                    <input type="text" name="stock" id="stock" class="form-control" required>
                                </div>

                                <div class="form-group mb-2 flex-fill align-self-end">
                                    <button type="submit" class="btn btn-primary float-end">Add Stock</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4" style="width:100%; height:314px;">
                    <div class="h3 card-header text-center">
                        <i class="fa-solid fa-file-pen text-primary"></i> Stock log
                    </div>
                    <div class="card-body  overflow-y-scroll">
                        <div class="d-lg-flex flex-row">
                            <span class="text-sm">ACTION:</span>
                            <span class="text-sm mx-2 fst-italic">2024-04-29</span>
                            <span class="text-sm ms-2 me-4 fst-italic">11:30:26</span>
                            <span class="text-sm ms-0 fst-italic flex-fill me-0 text-lg-center">--------------</span>
                            <span class="text-sm me-2 flex-fill text-lg-end">Brand-Product Name</span>
                        </div>
                        <hr class="my-0">
                        <div class="d-lg-flex flex-row">
                            <span class="text-sm">ACTION:</span>
                            <span class="text-sm mx-2 fst-italic">2024-04-29</span>
                            <span class="text-sm ms-2 me-4 fst-italic">11:30:26</span>
                            <span class="text-sm ms-0 fst-italic flex-fill me-0 text-lg-center">--------------</span>
                            <span class="text-sm me-2 flex-fill text-lg-end">Brand-Product Name</span>
                        </div>
                        <hr class="my-0">
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger btn-sm float-end" id="clearLog">Clear Log</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>