<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">System Information</h3>
    </div>
    <div class="card-body">
        <form action="" id="system-frm">
            <div class="col">
                <div class="form-group">
                    <label for="name" class="control-label">System Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="">
                </div>
                <div class="form-group">
                    <label for="short_name" class="control-label">System Short Name</label>
                    <input type="text" class="form-control" name="short_name" id="short_name" value="">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">About Us</label>
                    <textarea name="about_us" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Privacy Policy</label>
                    <textarea name="privacy_policy" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="" class="control-label">System Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="updateFileName()" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <span class="button">Browse</span>
                        <span id="file-name" class="file-name">No file chosen</span>
                    </div>
                </div>
                <div class="form-group-img">
                    <img src="../uploads/logo (2).jpg" alt="" id="cimg" class="logo-img">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Website Cover</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile-cover" name="cover" onchange="updateFileName2()">
                        <label class="custom-file-label custom-file-label-cover" for="customFile-cover">Choose file</label>
                        <span class="button">Browse</span>
                        <span id="file-name-cover" class="file-name">No file chosen</span>
                    </div>
                </div>
                <div class="form-group-img">
                    <img src="../uploads/banner.jpg" alt="" id="cimg2-cover" class="img-thumbnail">
                </div>
                <div class="card-footer">
                    <button class="btn" form="system-frm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>