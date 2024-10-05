<?php
// include 'connection.php';

// Fetch current system information (logo and cover images)
$logo = '';
$cover = '';

$query = "SELECT field, value FROM system_info WHERE field IN ('logo', 'cover')";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['field'] == 'logo') {
            $logo = $row['value'];
        } elseif ($row['field'] == 'cover') {
            $cover = $row['value'];
        }
    }
}

// Handle form submission and file uploads
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $short_name = mysqli_real_escape_string($conn, $_POST['short_name']);
    
    // Initialize variables to store the file paths
    $logo_file = $logo;
    $cover_file = $cover;

    // Handle System Logo upload with unique name
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $logo_file = '../uploads/' . time() . '_' . basename($_FILES['img']['name']);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $logo_file)) {
            // echo "<script>alert('Logo uploaded successfully.');</script>";
        } else {
            echo "<script>alert('Failed to upload logo.');</script>";
        }
    }

    // Handle Website Cover upload with unique name
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $cover_file = '../uploads/' . time() . '_' . basename($_FILES['cover']['name']);
        if (move_uploaded_file($_FILES['cover']['tmp_name'], $cover_file)) {
            // echo "<script>alert('Cover uploaded successfully.');</script>";
        } else {
            echo "<script>alert('Failed to upload cover.');</script>";
        }
    }

    // Start transaction for safer updates
    mysqli_begin_transaction($conn);
    $allSuccess = true;

    // Array of fields to update
    $system_fields = [
        'name' => $name,
        'short_name' => $short_name
    ];

    // Add logo and cover paths only if the files were uploaded
    if (!empty($logo_file)) {
        $system_fields['logo'] = $logo_file;
    }
    if (!empty($cover_file)) {
        $system_fields['cover'] = $cover_file;
    }

    // Update each field in the system_info table
    foreach ($system_fields as $field => $value) {
        if (!empty($value)) {
            $query = "UPDATE system_info SET value = '$value' WHERE field = '$field'";
            if (!mysqli_query($conn, $query)) {
                echo "<script>alert('Failed to update $field. Please try again.');</script>";
                $allSuccess = false;
                break; // Exit the loop if any query fails
            }
        }
    }

    // If all updates were successful, commit the transaction
    if ($allSuccess) {
        mysqli_commit($conn);
        echo "<script>alert('System information updated successfully!');</script>";
        echo '<script>window.location.href = "./";</script>';
    } else {
        // If any update failed, roll back the transaction
        mysqli_rollback($conn);
        echo "<script>alert('Failed to update system information. Transaction rolled back.');</script>";
    }
}
?>

<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">System Information</h3>
    </div>
    <div class="card-body">
        <form action="" id="system-frm" method="POST" enctype="multipart/form-data">
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
                    <!-- Dynamically set the src attribute based on database values -->
                    <img src="<?php echo $logo ? $logo : '../uploads/logo (2).jpg'; ?>" alt="System Logo" id="cimg" class="logo-img">
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
                    <!-- Dynamically set the src attribute based on database values -->
                    <img src="<?php echo $cover ? $cover : '../uploads/banner.jpg'; ?>" alt="Website Cover" id="cimg2-cover" class="img-thumbnail">
                </div>
                <div class="card-footer">
                    <button class="btn" type="submit" name="submit" form="system-frm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>