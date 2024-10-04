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
    <link rel="stylesheet" href="css/login.css"/>

    <!-- Frontend form validation -->
    <script>
        function validateLoginForm() {
            var username = document.forms["login-form"]["username"].value;
            var password = document.forms["login-form"]["password"].value;

            if (username === "") {
                alert("Username field cannot be empty.");
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
include '../connection.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email and password fields are empty
    if (empty($username)) {
        echo "<script>alert('Username field cannot be empty.')</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password field cannot be empty.')</script>";
    } else {
        // SQL Query to find the user by email
        $username_search = "SELECT * FROM admin WHERE username = '$username'";
        $query = mysqli_query($conn, $username_search);
        $username_count = mysqli_num_rows($query);

        if ($username_count > 0) {
            $user_data = mysqli_fetch_assoc($query);
            $db_pass = $user_data['password'];

            // Verify password using password_verify()
            if (password_verify($password, $db_pass)) {
                $_SESSION['username'] = $user_data['username'];
                header('Location:index.php'); // Redirect to admin page
            } else {
                echo "<script>alert('Incorrect password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Username not found. Please create account first.')</script>";
        }
    }
}
?>

<section class="admin-login">
    <div class="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <form action="" method="POST" onsubmit="return validateLoginForm()">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" name="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
