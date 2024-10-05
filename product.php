<?php
include('connection.php');
// Check if we are editing by looking for an ID in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing product details to edit
    $editQuery = "SELECT * FROM sub_category WHERE id = '$id'";
    $editResult = mysqli_query($conn, $editQuery);

    if($editResult) {
        $row = mysqli_fetch_assoc($editResult);
        $category_id = $row['category_id'];
        $sub_category = $row['sub_category'];


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
    }else{

    }
}
?>

<!-- Header-->
<header class="banner" id="main-header">
    <div class="text-center">
        <h1 class="head-message">
                        <?php
                        $categoryQuery = "SELECT * FROM category WHERE id='$category_id'";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        while ($catRow = mysqli_fetch_array($categoryResult)) {
                            echo $catRow['category'];
                        }
                        ?>
        </h1>
        <p class="subhead-message"><?php echo $sub_category?></p>
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
            $products = $conn->query("SELECT * FROM `product` WHERE sub_category_id='$id' ORDER BY rand() LIMIT 8");
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