<?php
// session_start();
$page_title="Edit Profile";

if(!isset($_SESSION['username'])){
    ?>
        <script>
            // alert('You are logged out');
            window.location = '../login.php';
        </script>
    <?php
}

// include '../../connection.php';

$username = $_SESSION['username'];

// Retrieve the user's current information
$query = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);

// Handle form submission to update the profile
if (isset($_POST['submit'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $newUsername = $_POST["username"];
    $number = $_POST["number"];
    $password = $_POST["password"];

     // Check if the password is empty
     if (empty($password)) {
        // If password field is empty, retain the current password
        $hashedPassword = $userData['password'];
    } else {
        // If password is provided, hash the new password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    // Update the user's information in the database
    $updateQuery = "UPDATE admin SET firstName='$firstname', lastName='$lastname',username='$newUsername',password='$hashedPassword',contact='$number' WHERE username='$username'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Update session variables with new data
        $_SESSION['username'] = $newUsername;

        echo '<script>alert("Profile updated successfully!");</script>';
        echo '<script>window.location.href = "./";</script>';
    } else {
        echo '<script>alert("Profile update failed. Please try again later.");</script>';
    }
}
?>



<div class="card-info">
    <div class="card-header">
        <h3 class="card-title">Your Account</h3>
    </div>
	<div class="card-body">
			<form action="" method="POST" id="manage-user">	
                <div class="col">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $userData['firstName']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $userData['lastName']; ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $userData['username']; ?>" required  autocomplete="off">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number" id="number" class="form-control" value="<?php echo $userData['contact']; ?>" required  autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                        <small><i>Leave this blank if you dont want to change the password.</i></small>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary" form="manage-user">Update</button>
                    </div>
                </div>
			</form>
	</div>	    
</div>