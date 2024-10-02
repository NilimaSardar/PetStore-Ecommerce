<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">Your Account</h3>
    </div>
	<div class="card-body">
			<form action="" id="manage-user">	
                <div class="col">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="" required  autocomplete="off">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number" id="number" class="form-control" value="" required  autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                        <small><i>Leave this blank if you dont want to change the password.</i></small>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" form="manage-user">Update</button>
                    </div>
                </div>
			</form>
	</div>	    
</div>