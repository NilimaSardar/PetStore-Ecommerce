<?php
session_start();
$page_title = "Login";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <script src="JQuery.js"></script>
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Frontend form validation -->
    <script>
        function validateLoginForm() {
            var email = document.forms["login-form"]["email"].value;
            var password = document.forms["login-form"]["password"].value;

            // Regular expression for basic email validation
            var emailPattern = /^\S+@\S+\.\S+$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password === "") {
                alert("Password field cannot be empty.");
                return false;
            }

            return true; // If validation passes, submit the form
        }
    </script>

</head>
<body>

<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email and password fields are empty
    if (empty($email)) {
        echo "<script>alert('Email field cannot be empty.')</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password field cannot be empty.')</script>";
    } else {
        // SQL Query to find the user by email
        $username_search = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($conn, $username_search);
        $username_count = mysqli_num_rows($query);

        if ($username_count > 0) {
            $user_data = mysqli_fetch_assoc($query);
            $db_pass = $user_data['password'];

            // Verify password using password_verify()
            if (password_verify($password, $db_pass)) {
                $_SESSION['firstname'] = $user_data['firstname'];
                header('Location:index.php'); // Redirect to admin page
            } else {
                echo "<script>alert('Incorrect password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Email not found. Please create account first.')</script>";
        }
    }
}
?>

<div class="wrapper">
  <section class="show-login">
    <div class="container">   
        <div class="row">
            <div class="form-content">
                <h3 class="text-center">Login</h3>
                <hr>
                <form action="" id="login-form" method="POST" onsubmit="return validateLoginForm()">
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" class="form-control form" name="email">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Password</label>
                        <input type="password" class="form-control form" name="password">
                    </div>
                    <div class="form-group-submit">
                        <a href="registration.php" id="create_account">Create Account</a>
                        <button type="submit" class="btn" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </section>
</div>

</body>
</html>
