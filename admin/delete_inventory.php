<?php
// Include your database connection
include '../connection.php';

// Check if the 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Validate if the ID is a valid integer
    if (is_numeric($id)) {
        // Prepare the DELETE query
        $deleteQuery = "DELETE FROM inventory WHERE id = $id";

        // Execute the query
        if (mysqli_query($conn, $deleteQuery)) {
            // If successful, redirect to the inventory list with a success message
            echo "<script>alert('Inventory item deleted successfully!');</script>";
            echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
        } else {
            // If the query fails, display an error message
            echo "<script>alert('Failed to delete inventory item. Please try again.');</script>";
            echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
        }
    } else {
        // If the ID is invalid, show an error message
        echo "<script>alert('Invalid inventory item ID.');</script>";
        echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
    }
} else {
    // If 'id' is not found in the URL, show an error and redirect
    echo "<script>alert('No inventory item ID provided.');</script>";
    echo "<script>window.location.href = 'index.php?page=inventory_list';</script>";
}
