<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">Update Inventory</h3>
    </div>
    <div class="card-body">
        <form action="" id="inventory-form">
            <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
            <div class="col">
                <div class="form-group">
                    <label for="product_id" class="control-label">Product</label>
                    <select name="product_id" id="product_id" class="custom-select select2" required>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size" class="control-label">Size</label>
                    <select name="size" id="size" class="custom-select" required>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="unit" class="control-label">Unit</label>
                    <input type="text" class="form-control" required name="unit" value="">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="quantity" class="control-label">Beginning Quanatity</label>
                    <input type="number" class="form-control" required name="quantity" value="">
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Price</label>
                    <input type="number" step="any" class="form-control" required name="price" value="">
                </div>
                <div class="card-footer">
                    <button class="btn" form="inventory-form">Save</button>
                    <a class="btn" href="?page=inventory">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>