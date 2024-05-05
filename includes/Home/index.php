<div class="container-fluid d-lg-flex flex-row">

    <div class="rounded container-lg mx-2 my-3 align-items-center">

        <div class="card">
            <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                <i class="fa-solid fa-bag-shopping text-dark "></i> Purchases
            </div>

            <div class="card-body">
                <div class="table-responsive-lg overflow-y-scroll" style="width:100%; height:510px;">
                    <table class="table table-hover" id="sales">
                        <thead>
                            <tr>
                                <th scope=" col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Black Oxbar</td>
                                <td>Flava</td>
                                <td>2</td>
                                <td>1100</td>
                                <td>
                                    <button type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class='btn btn-secondary btn-sm rounded' id="returnSale"> <i class="fa-solid fa-rotate-left"></i></button>
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
                <div class="h4 card-header py-2 px-4 text-white bg-secondary">
                    </i> <i class="fa-solid fa-plus text-dark"></i> Add Purchase
                </div>
                <div class="card-body">
                    <form method="post" id="addTransaction" class="d-flex flex-column bg-transparent">
                        <div class="d-lg-flex flex-row">
                            <div class="form-group mb-3 flex-fill mx-2">
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

                            <div class="from-group mb-3 mx-2">
                                <label for="qty" class='fw-bold mb-2'>Quantity</label>
                                <input class="form-control shadow-sm" type="number" name="qty" id="qty" required>
                            </div>
                        </div>

                        <div class="d-lg-flex flex-row">
                            <div class="from-group flex-fill mb-3 mx-2">
                                <label for="prc" class='fw-bold mb-2'>Price</label>
                                <input class="form-control shadow-sm" type="number" name="prc" id="prc" disabled>
                            </div>

                            <div class="form-group mb-3 mx-2 flex-fill align-self-end">
                                <button type="submit" class="btn btn-primary float-end">Add Transaction</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="h4 card-header pt-2 px-4 text-white bg-secondary">
                    <i class="fa-solid fa-chart-line text-dark"></i> Daily Income
                </div>
                <div class="card-body">
                    <canvas class="rounded" style="width:100%; height: 200px; background-color:white; " id="DailyChart">
                    </canvas>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="includes/Home/backend/ajax.js"></script>
<?php
include("js/DailyChart.php");
?>