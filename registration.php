<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>

    <!-- JavaScript form validation -->
    <script>
        function validateForm() {
            var email = document.forms["registration"]["email"].value;
            var password = document.forms["registration"]["password"].value;
            var contact = document.forms["registration"]["contact"].value;
            var emailPattern = /^\S+@\S+\.\S+$/;
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
            var contactPattern = /^9[87]\d{8}$/; // Pattern for contact: Starts with 9, followed by 8 or 7, and then 8 digits
            
            // Contact validation (must start with 98 or 97 and have exactly 10 digits)
            if (!contactPattern.test(contact)) {
                alert("Contact number must start with 98 or 97 and contain exactly 10 digits.");
                return false;
            }
            // Email validation
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email.");
                return false;
            }
            
            // Password validation
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one digit, and one special character.");
                return false;
            }
            
            return true; // If validation passes, submit the form
        }
    </script>
</head>
<body>
<?php
include 'connection.php';

$fname = $lname = $contact = $gender = $delivery_address = $email = $password = '';
$errorMessages = array();

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $delivery_address = mysqli_real_escape_string($conn, $_POST['delivery_address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // // Email validation regex
    // $email_regex = '/^\S+@\S+\.\S+$/';
    
    // // Password requirements
    // $password_min_length = 8;
    // $password_complexity = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])/';

    // // Contact validation regex: starts with 9, then 8 or 7, and 8 more digits
    // $contact_regex = '/^9[87]\d{8}$/';

    // // Validate contact number
    // if (!preg_match($contact_regex, $contact)) {
    //     $errorMessages[] = "Contact must start with 98 or 97 and contain exactly 10 digits.";
    // }

    // // Validate email format
    // if (!preg_match($email_regex, $email)) {
    //     $errorMessages[] = "Invalid email format.";
    // }
    
    // // Validate password complexity
    // if (strlen($password) < $password_min_length || !preg_match($password_complexity, $password)) {
    //     $errorMessages[] = "Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one digit, and one special character.";
    // }

    // If no errors, proceed to insert the data
    if (empty($errorMessages)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert query
        $insertquery = "INSERT INTO users(firstname, lastname, gender, contact, email, password, delivery_address)
        VALUES('$fname', '$lname', '$gender', '$contact', '$email', '$hashed_password', '$delivery_address')";

        $iquery = mysqli_query($conn, $insertquery);

        if ($iquery) {
            echo "<script>
                alert('Registered successfully');
                window.location = 'index.php'; // Redirect after showing the alert
            </script>";
        } else {
            die("Not inserted: " . mysqli_error($conn));
        }
    } else {
        // Show all error messages in an alert
        $errorMessageString = implode("\\n", $errorMessages); // Create a string with all errors
        echo "<script>
            alert('$errorMessageString');
        </script>";
    }
}
?>

<div class="wrapper">
    <section class="show-reg">
        <div class="container">
            <div class="row"> 
                <div class="form-content">
                    <h3 class="text-center">Create New Account</h3>
                    <hr>

                    <form action="" id="registration" method="POST" name="registration" onsubmit="return validateForm()">
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="control-label">Firstname</label>
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Lastname</label>
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Contact</label>
                                <input type="text" class="form-control" name="contact" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <select name="gender" id="" class="custom-select select" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="control-label">Default Delivery Address</label>
                                <input type="text" class="form-control" name="delivery_address" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group-submit">
                                <a href="login.php" id="login-show">Already have an Account</a>
                                <button type="submit" class="btn" name="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
