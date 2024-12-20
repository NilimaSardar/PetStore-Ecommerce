<?php
     // Fetch inventory data (adjust query as necessary)
    $query = "SELECT i.id, p.product_name, i.unit, s.size, i.price, i.quantity 
        FROM inventory i 
        JOIN product p ON i.product_id = p.id
        LEFT JOIN sizes s ON i.id = s.id"; // Adjust based on table relations
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
?>
<div class="card">
    <div class="inner-card">
        <div class="card-header">
            <h3 class="card-title">List of Inventory</h3>
            <div class="card-tools">
                <a href="index.php?page=manage_inventory_list" class="btn"><i class="fa-solid fa-plus"></i>  Create New</a>
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
                        <col width="25%">
                        <col width="10%">
                        <col width="10%">
                        <col width="20%">
                        <col width="20%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; // For row numbering
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['unit']; ?></td>
                                <td><?php echo !empty($row['size']) ? $row['size'] : 'NONE'; ?></td>
                                <td class="text-right"><?php echo number_format($row['price'], 2); ?></td>
                                <td class="text-right"><?php echo $row['quantity']; ?></td>
                                <td>
                                    <button type="button" class="btn dropdown-icon dropdown-toggle" id="dropdownButton" data-toggle="dropdown">
                                        Action <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                        <a class="dropdown-item" href="index.php?page=manage_inventory_list&id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <hr>
                                        <a class="dropdown-item delete_data" href="delete_inventory.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this inventory item?');"><i class="fa-solid fa-trash"></i> Delete</a>
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
