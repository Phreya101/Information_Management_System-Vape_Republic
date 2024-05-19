<?php
if (isset($_GET['branchID'])) {
    $branchID = $_GET['branchID'];
}
?>
<script src="includes/Stocks/backend/ajax.js"></script>
<div class="container-fluid d-lg-flex flex-row">

    <div class="rounded container-lg mx-2 my-3 align-items-center">
        <div class="card">
            <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                <i class="fa-solid fa-boxes-packing text-dark"></i> Inventory List
            </div>

            <div class="card-body">
                <div class="table-responsive-lg overflow-y-scroll" id="stockTable" style="width:100%; height:510px;">

                </div>
            </div>
        </div>

    </div>

    <div class="rounded container-lg mx-2 my-3 align-items-center">
        <div class="d-flex flex-column">
            <div class="card mb-4">
                <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                    <i class="fa-solid fa-plus text-dark"></i> Add Product
                </div>
                <div class="card-body">
                    <form id="addStock" method="post">
                        <input type="hidden" name="branch" id="branch" value="<?php echo $branchID ?>">
                        <div class="d-lg-flex flex-row">
                            <div class="form-group flex-fill mb-2w-100 mx-2">
                                <label for="brand" class="fw-bold">Brand Name</label>
                                <input type="text" name="brand" id="sBrand" class="form-control shadow-sm" required>
                            </div>

                            <div class="form-group mb-2 flex-fill  mx-2">
                                <label for="product" class="fw-bold">Product Name</label>
                                <input type="text" name="product" id="sProduct" class="form-control shadow-sm" required>
                            </div>
                        </div>

                        <div class="d-lg-flex flex-row mx-2">
                            <div class="form-group mb-2">
                                <label for="stockQty" class="fw-bold">Stock</label>
                                <input type="number" name="stockQty" id="sStock" class="form-control shadow-sm"
                                    required>
                            </div>

                            <div class="form-group mb-2 ms-auto">
                                <label for="price" class="fw-bold">Price</label>
                                <input type="number" name="price" id="sPrice" class="form-control shadow-sm" required>
                            </div>

                            <div class="form-group mb-2 align-self-end ms-auto">
                                <button type="submit" class="btn btn-primary float-end">Add Stock</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <!-- <div class=" h4 card-header py-2 px-4 text-white bg-secondary">
                <i class="fa-solid fa-file-pen text-dark"></i> Stock log
            </div>
            <div class="card-body  overflow-y-scroll" id="log">

            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger btn-sm float-end" id="clearLog">Clear Log</button>
            </div> -->

                <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                    <i class="fa-solid fa-plus text-dark"></i> Add Stock
                </div>
                <div class="card-body">

                    <form id="add-stock" method="post">
                        <div class="form-group mb-3 flex-fill mx-2">
                            <label for="list" class='fw-bold mb-2'>Select Product</label>
                            <select class="border-dark" name="list" id="stock-list" class="border-dark" required>
                            </select>
                        </div>

                        <div class="d-flex flex-lg-row">
                            <div class="form-group mb-3 col-lg-3 mx-2">
                                <label for="" class='fw-bold mb-2'>Current Stock</label>
                                <input type="text" class="form-control shadow-sm" disabled id="currentStock">
                            </div>

                            <div class="h2 align-self-center mx-5 text-secondary">+</div>

                            <div class="form-group mb-3 col-lg-3 mx-2">
                                <label for="newStock" class='fw-bold mb-2'>New Stock</label>
                                <input type="number" name="newStock" required class="form-control shadow-sm">
                            </div>

                            <div class="form-group mb-3 align-self-end ms-auto">
                                <button type="submit" id="addNewStock"
                                    class="from-control float-end btn btn-primary">Add New Stock</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php
include("includes/Stocks/Modals/editStock.html");
?>