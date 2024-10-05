<?php
// Check if we are editing by looking for an ID in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing product details to edit
    $editQuery = "SELECT * FROM product WHERE id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $category_id = $row['category_id']; // Get category ID
        $sub_category_id = $row['sub_category_id']; // Get sub-category ID
        $product_name = $row['product_name']; // Get product name
        $description = $row['description']; // Get description
        
        // Check if the image exists for the product
        $imageDir = "uploads/product_$id/";
        $imageFile = ''; // Will hold the image path if found
        if (is_dir($imageDir)) {
            $files = scandir($imageDir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $imageFile = $imageDir . $file;
                    break;
                }
            }
        }
        // If no image is found, set a default blank image
        if (empty($imageFile)) {
            $imageFile = 'path/to/default/blank-image.jpg'; // Specify path to your blank image
        }
    }
}


// Handle form submission
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];

    if (empty($category_id) || empty($sub_category_id) || empty($product_name) || empty($description)) {
        echo "<script>alert('Please fill all the fields.');</script>";
    } else {
        if (empty($_POST['id'])) {
            // Insert new product
            $insertQuery = "INSERT INTO product (category_id, sub_category_id, product_name, description) VALUES ('$category_id', '$sub_category_id', '$product_name', '$description')";
            $insertResult = mysqli_query($conn, $insertQuery);
            if ($insertResult) {
                $product_id = mysqli_insert_id($conn); // Get the new product ID

                // Handle image upload
                if (!empty($_FILES['img']['name'][0])) {
                    $uploadDir = "uploads/product_$product_id/";
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); // Create folder for product
                    }

                    foreach ($_FILES['img']['tmp_name'] as $key => $tmp_name) {
                        $fileName = $_FILES['img']['name'][$key];
                        $fileTmp = $_FILES['img']['tmp_name'][$key];
                        $filePath = $uploadDir . $fileName;

                        // Move uploaded file to folder
                        move_uploaded_file($fileTmp, $filePath);
                    }
                }

                echo "<script>alert('Product added successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=product_list';</script>";
            } else {
                echo "<script>alert('Failed to add product. Please try again.');</script>";
            }
        } else {
            // Update existing product
            $id = $_POST['id'];
            $updateQuery = "UPDATE product SET category_id = '$category_id', sub_category_id = '$sub_category_id', product_name = '$product_name', description = '$description' WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                $uploadDir = "uploads/product_$id/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Create folder if not exists
                }

                // Handle image upload
                if (!empty($_FILES['img']['name'][0])) {
                    foreach ($_FILES['img']['tmp_name'] as $key => $tmp_name) {
                        $fileName = $_FILES['img']['name'][$key];
                        $fileTmp = $_FILES['img']['tmp_name'][$key];
                        $filePath = $uploadDir . $fileName;

                        // Move uploaded file to folder
                        move_uploaded_file($fileTmp, $filePath);
                    }
                }

                echo "<script>alert('Product updated successfully!');</script>";
                echo "<script>window.location.href = 'index.php?page=product_list';</script>";
            } else {
                echo "<script>alert('Failed to update product. Please try again.');</script>";
            }
        }
    }
}

?>


<div class="card-info">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($id) ? "Update " : "Create New " ?> Product</h3>
    </div>
    <div class="card-body">
        <form action="" id="product-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="col">
                <div class="form-group">
                    <label for="category_id" class="control-label">Category</label>
                    <select name="category_id" id="category_id" class="custom-select select2" required>
                        <option value="">Select Category</option>
						<?php
                        $categoryQuery = "SELECT * FROM category";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($category_id) && $category_id == $catRow['id']) ? 'selected' : '';
                            //echo "<option value='{$catRow['id']}' $selected>{$catRow['category']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category_id" class="control-label">Sub Category</label>
                    <select name="sub_category_id" id="sub_category_id" class="custom-select" required>
                        <option value="">Select Category First</option>
						<?php
                        $subCategoryQuery = "SELECT * FROM sub_category";
                        $subCategoryResult = mysqli_query($conn, $subCategoryQuery);

                        while ($subCatRow = mysqli_fetch_array($subCategoryResult)) {
                            $selected = (isset($sub_category_id) && $sub_category_id == $subCatRow['id']) ? 'selected' : '';
                            //echo "<option value='{$subCatRow['id']}' $selected>{$subCatRow['sub_category']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_name" class="control-label">Product Name</label>
                    <textarea name="product_name" id="" cols="30" rows="2" class="form-control form no-resize"><?php echo isset($product_name) ? $product_name : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" id="" cols="30" rows="2" class="form-control form no-resize"><?php echo isset($description) ? $description : ''; ?></textarea>
                </div>
            </div>
            <div class="col">
                <!-- <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="custom-select selevt">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="" class="control-label">Images</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="img[]" onchange="updateFileName3()" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <span class="button">Browse</span>
                        <span id="file-name" class="file-name">No file chosen</span>
                    </div>
                </div>
                <div class="img-item">
                    <span><img src="<?php echo isset($imageFile) ? $imageFile : 'path/to/default/blank-image.jpg'; ?>" id="img" class="img-thumbnail" alt="Product Image"></span>
                    <span><button class="btn text-danger"  type="button"><i class="fa fa-trash"></i></button></span>
                </div>

                <div class="card-footer">
                    <button class="btn" type="submit" name="submit" form="product-form">Save</button>
                    <a class="btn" href="index.php?page=product_list">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Function to load categories and subcategories dynamically
        function loadData(type, id = '') {
            $.ajax({
                url: "product/get_subCategory.php",
                type: "POST",
                data: { type: type, id: id },
                success: function(data) {
                    if (type == "stateData") {
                        // Populate the subcategory dropdown
                        $("#sub_category_id").html(data);
                    } else {
                        // Populate the category dropdown
                        $("#category_id").append(data);
                    }
                }
            });
        }

        // Load categories when page loads
        loadData("category");

        // Handle category change
        $("#category_id").on("change", function() {
            var categoryId = $(this).val();
            if (categoryId != "") {
                loadData("stateData", categoryId);
            } else {
                $("#sub_category_id").html("<option value=''>Select Category First</option>");
            }
        });
    });


	function updateFileName3() {
        const fileInput = document.getElementById('customFile');
        const fileNameLabel = document.querySelector('.custom-file-label');
        const fileNameDisplay = document.getElementById('file-name');
        const imgTag = document.getElementById('img');

        // Get the selected file name
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const fileName = file.name;
            fileNameLabel.textContent = fileName;
            fileNameDisplay.textContent = "chosen file";

            // Create a FileReader to load the image
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update the image src with the selected file
                imgTag.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            fileNameLabel.textContent = "Choose file";
            fileNameDisplay.textContent = "No file chosen";
        }
    }
</script>