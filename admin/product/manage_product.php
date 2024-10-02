<div class="card-info">
	<div class="card-header">
		<h3 class="card-title">Update Product</h3>
	</div>
	<div class="card-body">
		<form action="" id="product-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="col">
				<div class="form-group">
					<label for="category_id" class="control-label">Category</label>
					<select name="category_id" id="category_id" class="custom-select select2" required>
					<option value=""></option>
					<option value="">birds</option>
					<option value="">birds</option>
					<option value="">birds</option>
					</select>
				</div>
				<div class="form-group">
					<label for="sub_category_id" class="control-label">Sub Category</label>
					<select name="sub_category_id" id="sub_category_id" class="custom-select" required>
					<option value="" selected="" disabled="">Select Category First</option>
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
				<div class="form-group">
					<label for="status" class="control-label">Status</label>
					<select name="status" id="status" class="custom-select selevt">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
					</select>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Images</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="img[]" onchange="updateFileName()" required>
						<label class="custom-file-label" for="customFile">Choose file</label>
						<span class="button">Browse</span>
						<span id="file-name" class="file-name">No file chosen</span>

					</div>
				</div>
				<div class="img-item">
					<span><img src="../uploads/cat4.jpg" class="img-thumbnail" alt=""></span>
					<span"><button class="btn text-danger" type="button"><i class="fa fa-trash"></i></button></span>
				</div>
				<div class="card-footer">
					<button class="btn" form="product-form">Save</button>
					<a class="btn" href="?page=product">Cancel</a>
				</div>
			</div>
		</form>
		
	</div>
</div>