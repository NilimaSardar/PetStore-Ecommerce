<?php
// Include the database connection
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete query to remove the sub_category by its ID
    $deleteQuery = "DELETE FROM sub_category WHERE id = '$id'";
    $result = mysqli_query($conn, $deleteQuery);
    
    if ($result) {
        // Redirect back to the sub_category list with a success message
        echo "<script>alert('Sub Category deleted successfully!');</script>";
        echo "<script>window.location.href = 'index.php?page=sub_category';</script>"; // Adjust as necessary
    } else {
        // If delete fails, show an error message
        echo "<script>alert('Failed to delete the sub category. Please try again.');</script>";
        echo "<script>window.location.href = 'index.php?page=sub_category';</script>"; // Adjust as necessary
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'index.php?page=sub_category';</script>"; // Adjust as necessary
}
?>
