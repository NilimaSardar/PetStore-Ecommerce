<?php
// Check if we are editing by looking for an ID in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing sub-category details to edit
    $editQuery = "SELECT * FROM sub_category WHERE id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $parent_id = $row['category_id']; // Get parent category id
        $sub_category = $row['sub_category']; // Get sub-category name
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $parent_id = $_POST['parent_id'];
    $sub_category = $_POST['sub_category'];

    if (empty($parent_id) || empty($sub_category)) {
        echo "<script>alert('Please select a parent category and provide a sub-category name.');</script>";
    } else {
        if (empty($_POST['id'])) {
            // Insert new sub-category
            $insertQuery = "INSERT INTO sub_category (category_id, sub_category) VALUES ('$parent_id', '$sub_category')";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
                echo "<script>alert('Sub Category added successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=sub_category';</script>";
            } else {
                echo "<script>alert('Failed to add sub category. Please try again.');</script>";
            }
        } else {
            // Update existing sub-category
            $id = $_POST['id'];
            $updateQuery = "UPDATE sub_category SET category_id = '$parent_id', sub_category = '$sub_category' WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateQuery);
            if ($updateResult) {
                echo "<script>alert('Sub Category updated successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=sub_category';</script>";
            } else {
                echo "<script>alert('Failed to update sub category. Please try again.');</script>";
            }
        }
    }
}
?>

<div class="card-info">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($id) ? "Update " : "Create New " ?> Sub Category</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="category-form">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

            <div class="col">
                <div class="form-group">
                    <label for="parent_id" class="control-label">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="custom-select">
                        <option value="">Select Category</option>
                        <?php
                        $categoryQuery = "SELECT * FROM category";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($parent_id) && $parent_id == $catRow['id']) ? 'selected' : '';
                            echo "<option value='{$catRow['id']}' $selected>{$catRow['category']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sub_category" class="control-label">Sub Category Name</label>
                    <textarea name="sub_category" cols="30" rows="2" class="form-control"><?php echo isset($sub_category) ? $sub_category : ''; ?></textarea>
                </div>

                <div class="card-footer">
                    <button class="btn" type="submit" name="submit" form="category-form">Save</button>
                    <a class="btn" href="index.php?page=sub_category">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
