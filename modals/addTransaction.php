<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-plus"></i> Add Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" class="d-flex flex-column bg-transparent">
                    <div class="form-group">
                        <label for="items">Select Item</label>
                        <select name="items" id="items" required>
                            <option value=""></option>
                            <option value="1">Awesome</option>
                            <option value="2">Beast</option>
                            <option value="3">Compatible</option>
                            <option value="4">Thomas Edison</option>
                            <option value="5">Nikola</option>
                            <option value="6">Selectize</option>
                            <option value="7">Javascript</option>
                        </select>
                    </div>

                    <div class="from-group">
                        <label for="qty">Quantity</label>
                        <input class="form-control" type="number" name="qty" id="qty" required>
                    </div>

                    <div class="from-group">
                        <label for="prc">Price</label>
                        <input class="form-control" type="number" name="prc" id="prc" disabled>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>