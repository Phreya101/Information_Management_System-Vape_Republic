<div class="container-fluid d-lg-flex flex-row">
    <div class="rounded container-lg mx-2 my-3 align-items-center">
        <div class="card mb-4">
            <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                <i class="fa-solid fa-warehouse text-dark"></i> Brands
                <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addBrand"><i class="fa-solid fa-plus"></i> Add Brands</button>
            </div>

            <div class="card-body">
                <div class="table-responsive-lg overflow-y-scroll" style="width:100%; height:510px;">
                    <table class="table table-hover" id="brands">
                        <thead>
                            <tr>
                                <th scope=" col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Black Oxbar</td>
                                <td>
                                    <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-success btn-sm rounded' data-bs-toggle="modal" data-bs-target="#editBrands"><i class="fa-solid fa-pen"></i></button>

                                    <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-danger btn-sm rounded' id="deleteBrand"> <i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="rounded container-lg mx-2 my-3 align-items-center">
        <div class="card mb-4">
            <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                <i class="fa-solid fa-boxes-stacked text-dark"></i> Products
                <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="fa-solid fa-plus"></i> Add Products</button>
            </div>


            <div class="card-body">
                <div class="table-responsive-lg overflow-y-scroll" style="width:100%; height:510px;">
                    <table class="table table-hover" id="products">
                        <thead>
                            <tr>
                                <th scope=" col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Black Oxbar</td>
                                <td>Flava</td>
                                <td>550</td>
                                <td>
                                    <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-success btn-sm rounded' data-bs-toggle="modal" data-bs-target="#editProduct"><i class="fa-solid fa-pen"></i></button>

                                    <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-danger btn-sm rounded' id="deleteProduct"> <i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include("includes/BrandsProducts/Modals/editBrand.php");
include("includes/BrandsProducts/Modals/addBrand.php");
include("includes/BrandsProducts/Modals/addProduct.php");
include("includes/BrandsProducts/Modals/editProduct.php");
?>