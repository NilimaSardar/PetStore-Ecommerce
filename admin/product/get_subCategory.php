<?php
include('../../connection.php');

if (isset($_POST['type']) && $_POST['type'] == "stateData" && isset($_POST['id'])) {
    // Fetch subcategories based on the selected category
    $categoryId = mysqli_real_escape_string($conn, $_POST['id']); // Sanitize the input
    $sql = "SELECT * FROM sub_category WHERE category_id = {$categoryId}";
} else {
    // Fetch all categories
    $sql = "SELECT * FROM category";
}

$query = mysqli_query($conn, $sql) or die("Query unsuccessful.");

$str = "";
while ($row = mysqli_fetch_assoc($query)) {
    if ($_POST['type'] == "stateData") {
        $str .= "<option value='{$row['id']}'>{$row['sub_category']}</option>";
    } else {
        $str .= "<option value='{$row['id']}'>{$row['category']}</option>";
    }
}

echo $str;
?>
