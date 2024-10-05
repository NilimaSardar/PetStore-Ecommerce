<!-- edit-account -->
          <section class="show-edit-account">
            <div class="container">
                <div class="row">
                     
                            <div class="form-content">
                                <div class="text-center">
                                    <h4><b>Update Account Details</b></h4>
                                    <a href="index.php?page=my_account" class="btn"><i class="fa-solid fa-circle-arrow-left"></i> Back to Order List</a>
                                </div>
                                <hr>
        
                                <form action="" method="POST" id="update_account">
                                <input type="hidden" name="id" value="">
                                <div class="col">
        
                                    <div class="form-group">
                                        <label for="firstname" class="control-label">Firstname</label>
                                        <input type="text" name="firstname" class="form-control form" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="control-label">Lastname</label>
                                        <input type="text" name="lastname" class="form-control form" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Contact</label>
                                        <input type="text" class="form-control form-control-sm form" name="contact" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Gender</label>
                                        <select name="gender" id="" class="custom-select select" required>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Default Delivery Address</label>
                                        <textarea class="form-control form" rows='3' name="default_delivery_address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="text" name="email" class="form-control form" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">New Password</label>
                                        <input type="password" name="password" class="form-control form" value="" placeholder="(Enter value to change password)">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword" class="control-label">Current Password</label>
                                        <input type="password" name="cpassword" class="form-control form" value="" placeholder="(Enter value to change password)">
                                    </div>
                                    <div class="form-group-submit">
                                        <button type="submit" name="submit" class="btn">Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
        
                </div>
            </div>
        </section>
