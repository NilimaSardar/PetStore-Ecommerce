<!-- Header-->
<header class="banner" id="main-header">
    <div class="text-center">
        <h1 class="head-message">Your Pets Deserve The Best</h1>
        <p class="subhead-message">Looking for your pet's needs? Shop Now!</p>
    </div>
</header>
<!-- Section-->

<?php
function validate_image($img_path) {
    // Check if the image exists, if not return a placeholder image
    if (!empty($img_path) && file_exists($img_path)) {
        return $img_path;
    } else {
        return 'uploads/cat4.jpg';  // Specify a fallback image path
    }
}
?>

<!-- Section -->
<section class="product">
    <div class="container">
        <div class="row">
            <?php 
            // Query to get active products from the database
            $products = $conn->query("SELECT * FROM `product` ORDER BY rand() LIMIT 8");
            while ($row = $products->fetch_assoc()):
                // Get the path to the product's image folder
                $upload_path = 'admin/uploads/product_'.$row['id'];
                $img = "";  // Initialize image variable

                // Check if the directory exists and get the first image
                if (is_dir($upload_path)) {
                    $fileO = scandir($upload_path);
                    if (isset($fileO[2])) {
                        $img = $upload_path."/".$fileO[2];  // Set image path
                    }
                }

                // Fetch inventory details for the product (size and price)
                $inventory = $conn->query("SELECT * FROM inventory WHERE product_id = ".$row['id']);
                $inv = array();
                while ($ir = $inventory->fetch_assoc()) {
                    $inv[$ir['size']] = number_format($ir['price']);  // Store size and price in array
                }

                // Only display the product if it has inventory
                if (!empty($inv)): 
            ?>
                <div class="col-md-3">
                    <div class="product-item card">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?php echo validate_image($img); ?>" alt="Product Image" />
                        <!-- Product details-->
                        <div class="card-body">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="boder-name"><?php echo $row['product_name']; ?></h5>
                                <!-- Product price-->
                                <?php foreach ($inv as $k => $v): ?>
                                    <span><b><?php echo $k; ?>: </b><?php echo $v; ?></span><br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer">
                            <div class="text-center">
                                <a class="view" href="index.php?page=view_product&id=<?php echo $row['id']; ?>">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                endif; // End of inventory check
            endwhile; 
            ?>
        </div>
    </div>
</section>
