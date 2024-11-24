<?php
include('connection.php');
// Check if we are editing by looking for an ID in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing product details to edit
    $editQuery = "SELECT * FROM inventory WHERE product_id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $product_id = $row['product_id'];
        $size = $row['size'];
        $unit = $row['unit'];
        $quantity = $row['quantity'];
        $price = $row['price'];


        // Check if the image exists for the product
        $imageDir = "admin/uploads/product_$id/";
        $imageFile = ''; // Will hold the image path if found
        if (is_dir($imageDir)) {
            $files = scandir($imageDir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $imageFile = $imageDir . $file;
                    break;
                }
            }
        }
        // If no image is found, set a default blank image
        if (empty($imageFile)) {
            $imageFile = 'path/to/default/blank-image.jpg'; // Specify path to your blank image
        }
    }
}
?>

<section class="product-display">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <img class="card-img" id="display-img" <img src="<?php echo isset($imageFile) ? $imageFile : 'path/to/default/blank-image.jpg'; ?>" alt="..." />
                </div>
                <div class="col-2">
                    <h1 class="product-name">
                    <?php
                        $categoryQuery = "SELECT * FROM product WHERE id='$product_id'";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($product_id) && $product_id == $catRow['id']) ? 'selected' : '';
                            echo "<option value='{$catRow['id']}' $selected>{$catRow['product_name']}</option>";
                        }
                        ?></h1>
                    <div class="product-available">
                        Rs. <span id="price"><?php echo isset($price) ? $price : ''; ?></span>
                        <br>
                        <span><small><b>Available stock:</b> <span id="avail"><?php echo isset($quantity) ? $quantity : ''; ?></span></small></span>
                    </div>
                    <div class="product-size">
                        <span><b>Size: </b><?php echo isset($size) ? $size : ''; ?></span>
                    </div>
                    <form action="" method="POST" id="add-cart">
                        <div class="product-quantity">
                            <input class="quantity" id="inputQuantity" type="number" value="1" name="quantity" disabled/>
                            <button class="btn" type="submit" name="submit">
                                Add to cart
                            </button>
                        </div>
                    </form>
                    <p class="description">

                    <?php
                        $categoryQuery = "SELECT * FROM product WHERE id='$product_id'";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            $selected = (isset($product_id) && $product_id == $catRow['id']) ? 'selected' : '';
                            echo $catRow['description'];
                        }
                        ?>
                    </p>                    
                </div>
            </div>
        </div>
</section>
    <!-- Related items section-->
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
    <h2 class="info">Related products</h2>

        <div class="row">
            <?php 
            // Query to get active products from the database
            $products = $conn->query("SELECT * FROM product ORDER BY rand() LIMIT 8");
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
                        <img class="card-img" src="<?php echo validate_image($img); ?>" alt="Product Image" />
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



<script>
    document.getElementById('addToCartBtn').addEventListener('click', function() {
        const productId = "<?php echo $product_id; ?>";
        const productName = "<?php echo $row['product_name']; ?>";
        const size = "<?php echo $size; ?>";
        const price = "<?php echo $price; ?>";
        const quantity = document.getElementById('inputQuantity').value;
        const img = "<?php echo $imageFile; ?>";

        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('product_name', productName);
        formData.append('size', size);
        formData.append('price', price);
        formData.append('quantity', quantity);
        formData.append('img', img);

        fetch('cart.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            alert('Product added to cart!');
            // You can update the cart display here if needed
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
