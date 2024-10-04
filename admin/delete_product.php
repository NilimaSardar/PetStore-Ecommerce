<?php
// Include the database connection
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete query to remove the product by its ID
    $deleteQuery = "DELETE FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $deleteQuery);
    
    if ($result) {
        // Redirect back to the product list with a success message
        echo "<script>alert('Product deleted successfully!');</script>";
        echo "<script>window.location.href = 'index.php?page=product_list';</script>";
    } else {
        // If delete fails, show an error message
        echo "<script>alert('Failed to delete the product. Please try again.');</script>";
        echo "<script>window.location.href = 'index.php?page=product_list';</script>";
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'index.php?page=product_list';</script>";
}
?>
