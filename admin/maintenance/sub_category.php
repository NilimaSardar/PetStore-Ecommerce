


<?php
// include '../../connection.php'; // Include your database connection file

// Fetch data from sub_category and category tables using JOIN
$query = "SELECT sc.id, sc.sub_category, c.category 
          FROM sub_category sc 
          JOIN category c ON sc.category_id = c.id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>



<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <h3 class="card-title">List of Sub Categories</h3>
            <div class="card-tools">
                <a href="index.php?page=manage_sub_category" class="btn"><i class="fa-solid fa-plus"></i> Create New</a>
            </div>
        </div>
        <div class="searching">
            <p class="card-title">Search: </p>
            <input type="search" name="search">
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="20%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; // To keep track of row numbers
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['sub_category']; ?></td>
                                <td>
                                    <button type="button" class="btn dropdown-icon dropdown-toggle" id="dropdownButton" data-toggle="dropdown">
                                        Action <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                        <a class="dropdown-item" href="index.php?page=manage_sub_category&id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <hr>
                                        <a class="dropdown-item delete_data" href="delete_sub_category.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Are you sure you want to delete this sub category?');"><i class="fa-solid fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
