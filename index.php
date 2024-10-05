<?php
session_start();
$page_title = "Login";

include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <script src="JQuery.js"></script>

    <link rel="stylesheet" href="css/style.css"/>


</head>
<body>
  <div class="wrapper">
<?php require_once('inc/topBarNav.php') ?>
    <?php
            // Mapping pages to their respective folders
            $pages = [
                'cart_list' => 'cart.php',
                'edit_account' => 'edit_account.php',
                'checkout' => 'checkout.php',
                'my_account' => 'my_account.php',
                'about' => 'about.html',
                'product' => 'product.php',
                'view_product' => 'view_product.php',
                
            ];

            // Check if the 'page' parameter is set and exists in the $pages array
            if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
                include($pages[$_GET['page']]);
            } else {
                // Default page if no 'page' parameter or invalid 'page'
                include('home.php');
            }
            ?>

  <?php require_once('inc/footer.php') ?>


  </div>
  <script>
    // Select all dropdown buttons
    const dropdownButtons = document.querySelectorAll('.dropdown-icon');

    dropdownButtons.forEach(function (dropdownButton) {
        dropdownButton.addEventListener('click', function (event) {
            event.preventDefault();
            const dropdownMenu = this.querySelector('.dropdown-menu');
            
            // Toggle the visibility of the dropdown
            dropdownMenu.classList.toggle('show');
        });
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function (e) {
        dropdownButtons.forEach(function (dropdownButton) {
            const dropdownMenu = dropdownButton.querySelector('.dropdown-menu');
            if (!dropdownButton.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>


</body>
</html>