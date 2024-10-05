<?php
include('connection.php');

// Check if we are editing by looking for an ID in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing product details to edit
    $editQuery = "SELECT * FROM inventory WHERE id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $product_id = $row['product_id'];
        $size = $row['size'];
        $unit = $row['unit'];
        $quantity = $row['quantity'];
        $price = $row['price'];
    }
}
?>

<section class="product-display">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <img class="card-img" id="display-img" src="uploads/cat4.jpg" alt="..." />
            </div>
            <div class="col-2">
                <h1 class="product-name">
                    <?php
                    $categoryQuery = "SELECT * FROM product WHERE id=$product_id";
                    $categoryResult = mysqli_query($conn, $categoryQuery);

                    if ($catRow = mysqli_fetch_array($categoryResult)) {
                        echo htmlspecialchars($catRow['product_name']); // Display the product name safely
                        $category_id = $catRow['category_id']; // Fetch category ID for related products
                        $subcategory_id = $catRow['sub_category_id']; // Fetch sub-category ID if exists
                    }
                    ?>
                </h1>
                <div class="product-available">
                    Rs. <span id="price"><?php echo isset($price) ? number_format($price) : ''; ?></span>
                    <br>
                    <span><small><b>Available stock:</b> <span id="avail"><?php echo isset($quantity) ? $quantity : ''; ?></span></small></span>
                </div>
                <div class="product-size">
                    <span><b>Size: </b><?php echo isset($size) ? htmlspecialchars($size) : ''; ?></span>
                </div>
                <form action="" id="add-cart">
                    <div class="product-quantity">
                        <input class="quantity" id="inputQuantity" type="number" value="1" name="quantity" />
                        <button class="btn" type="submit">
                            Add to cart
                        </button>
                    </div>
                </form>
                <p class="description">
                    <?php
                    echo htmlspecialchars($catRow['description']); // Display the description safely
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section -->
<section class="product">
    <h2 class="info">Related products</h2>
    <div class="container">
        <div class="row">
            <?php
            // Query to get related products based on category and sub-category
            // $relatedQuery = "SELECT * FROM product WHERE category_id = '$category_id' AND id != '$product_id' ORDER BY rand() LIMIT 8";
            $relatedQuery = "SELECT * FROM product WHERE category_id = '$category_id' ORDER BY rand() LIMIT 8";

            $relatedProducts = $conn->query($relatedQuery);

            while ($row = $relatedProducts->fetch_assoc()):
                // Get the path to the product's image folder
                $upload_path = 'admin/uploads/product_' . $row['id'];
                $img = ""; // Initialize image variable

                // Check if the directory exists and get the first image
                if (is_dir($upload_path)) {
                    $fileO = scandir($upload_path);
                    if (isset($fileO[2])) {
                        $img = $upload_path . "/" . $fileO[2]; // Set image path
                    }
                }

                // Fetch inventory details for the product (size and price)
                $inventory = $conn->query("SELECT * FROM inventory WHERE product_id = " . $row['id']);
                $inv = array();
                while ($ir = $inventory->fetch_assoc()) {
                    $inv[$ir['size']] = number_format($ir['price']); // Store size and price in array
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
                                <h5 class="boder-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
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

<?php
function validate_image($img_path) {
    // Check if the image exists; if not, return a placeholder image
    if (!empty($img_path) && file_exists($img_path)) {
        return $img_path;
    } else {
        return 'uploads/cat4.jpg'; // Specify a fallback image path
    }
}
?>
