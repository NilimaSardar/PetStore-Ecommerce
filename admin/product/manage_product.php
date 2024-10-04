<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">Update Product</h3>
    </div>
    <div class="card-body">
        <form action="" id="product-form">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="col">
                <div class="form-group">
                    <label for="category_id" class="control-label">Category</label>
                    <select name="category_id" id="category_id" class="custom-select select2" required>
                        <option value="">Select Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category_id" class="control-label">Sub Category</label>
                    <select name="sub_category_id" id="sub_category_id" class="custom-select" required>
                        <option value="">Select Category First</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_name" class="control-label">Product Name</label>
                    <textarea name="product_name" id="" cols="30" rows="2" class="form-control form no-resize"></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" id="" cols="30" rows="2" class="form-control form no-resize"></textarea>
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
                    <span><img src="../uploads/cat4.jpg" id="img" class="img-thumbnail" alt=""></span>
                    <span><button class="btn text-danger"  type="button"><i class="fa fa-trash"></i></button></span>
                </div>
                <div class="card-footer">
                    <button class="btn" form="product-form">Save</button>
                    <a class="btn" href="?page=product">Cancel</a>
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