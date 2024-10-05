<?php
// Check if we are editing by looking for an ID in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing product details to edit
    $editQuery = "SELECT * FROM inventory WHERE id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $product_id = $row['product_id'];
        $size = $row['size'];
        $unit = $row['unit'];
        $quantity = $row['quantity'];
        $price = $row['price'];
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];
    $unit = $_POST['unit'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Validate required fields
    if (empty($product_id) || empty($size) || empty($unit) || empty($quantity) || empty($price)) {
        echo "<script>alert('Please fill out all fields.');</script>";
    } else {
        if (empty($_POST['id'])) {
            // Insert new product entry
            $insertQuery = "INSERT INTO inventory (product_id, size, unit, quantity, price) VALUES ('$product_id', '$size', '$unit', '$quantity', '$price')";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
                echo "<script>alert('Inventory added successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
            } else {
                echo "<script>alert('Failed to add inventory. Please try again.');</script>";
            }
        } else {
            // Update existing product entry
            $id = $_POST['id'];
            $updateQuery = "UPDATE inventory SET product_id = '$product_id', size = '$size', unit = '$unit', quantity = '$quantity', price = '$price' WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateQuery);
            if ($updateResult) {
                echo "<script>alert('Inventory updated successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
            } else {
                echo "<script>alert('Failed to update inventory. Please try again.');</script>";
            }
        }
    }
}
?>

<div class="card-info">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($id) ? "Update " : "Create New " ?> Inventory</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="inventory-form">
            <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
            <div class="col">
                <div class="form-group">
                    <label for="product_id" class="control-label">Product</label>
                    <select name="product_id" id="product_id" class="custom-select select2" required>
                        <option value=""></option>
                        <?php
                        $categoryQuery = "SELECT * FROM product";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($product_id) && $product_id == $catRow['id']) ? 'selected' : '';
                            echo "<option value='{$catRow['id']}' $selected>{$catRow['product_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size" class="control-label">Size</label>
                    <select name="size" id="size" class="custom-select" required>
                        <option value=""></option>
                        <?php
                        $categoryQuery = "SELECT * FROM sizes";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($size) && $size == $catRow['id']) ? 'selected' : '';
                            echo "<option value='{$catRow['id']}' $selected>{$catRow['size']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="unit" class="control-label">Unit</label>
                    <input type="text" class="form-control" required name="unit" value="<?php echo isset($unit) ? $unit : ''; ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="quantity" class="control-label">Beginning Quanatity</label>
                    <input type="number" class="form-control" required name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Price</label>
                    <input type="number" step="any" class="form-control" required name="price" value="<?php echo isset($price) ? $price : ''; ?>">
                </div>
                <div class="card-footer">
                    <button class="btn" type="submit" name="submit" form="inventory-form">Save</button>
                    <a class="btn" href="index.php?page=inventory_list">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>