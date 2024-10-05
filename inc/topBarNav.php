<nav class="navbar">
        <div class="container">
            <button class="navbar-toggler" type="button">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="intro">
              <a class="navbar-brand" href="./">
                          <?php
                              $logoQuery = "SELECT * FROM system_info WHERE field='logo'";
                              $logoResult = mysqli_query($conn, $logoQuery);
      
                              while ($row = mysqli_fetch_array($logoResult)) {
                              ?><img src="admin/<?php echo $row['value']?>" width="30" height="30">
                              <?php
      
                              }


                              $logoQuery = "SELECT * FROM system_info WHERE field='short_name'";
                              $logoResult = mysqli_query($conn, $logoQuery);
      
                              while ($row = mysqli_fetch_array($logoResult)) {
                              ?><?php echo $row['value']?>
                              <?php
      
                              }
                              ?>
              </a>

                <form id="search-form">
                  <div class="input-group">
                    <input class="form-search" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                </form>
            </div>

            

            <div class="menu">
              <ul class="nav-menu">
                <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                
                <li class="nav-item item dropdown-icon" id="dropdownButton"><a class="nav-link" href="">Pets <i class="fa-solid fa-caret-down"></i></a>
                        
                  <ul class="dropdown-menu" id="dropdownMenu">
                    <?php
                        $subCategoryQuery = "SELECT * FROM sub_category WHERE category_id='1'";
                        $subCategoryResult = mysqli_query($conn, $subCategoryQuery);

                        while ($rows = mysqli_fetch_array($subCategoryResult)) {
                            ?><li><a class="dropdown-item" href="index.php?page=product&id=<?php echo $rows['id'];?>"><?php echo $rows['sub_category']?></a></li><?php

                        }
                        ?>
                  </ul>
                </li>
                <li class="nav-item item dropdown-icon" id="dropdownButton"><a class="nav-link" href="">Accessories <i class="fa-solid fa-caret-down"></i></a>
                        
                        <ul class="dropdown-menu" id="dropdownMenu">
                          <?php
                              $subCategoryQuery1 = "SELECT * FROM sub_category WHERE category_id='2'";
                              $subCategoryResult1 = mysqli_query($conn, $subCategoryQuery1);
      
                              while ($rows = mysqli_fetch_array($subCategoryResult1)) {
                                  ?><li><a class="dropdown-item" href="index.php?page=product&id=<?php echo $rows['id'];?>"><?php echo $rows['sub_category']?></a></li><?php
      
                              }
                              ?>
                        </ul>
                  </li>
                  <li class="nav-item item dropdown-icon" id="dropdownButton"><a class="nav-link" href="">Food <i class="fa-solid fa-caret-down"></i></a>
                        
                        <ul class="dropdown-menu" id="dropdownMenu">
                          <?php
                              $subCategoryQuery2 = "SELECT * FROM sub_category WHERE category_id='3'";
                              $subCategoryResult2 = mysqli_query($conn, $subCategoryQuery2);
      
                              while ($rows = mysqli_fetch_array($subCategoryResult2)) {
                                  ?><li><a class="dropdown-item" href="index.php?page=product&id=<?php echo $rows['id'];?>"><?php echo $rows['sub_category']?></a></li><?php
      
                              }
                              ?>
                        </ul>
                  </li>
      
                <li class="nav-item"><a class="nav-link" href="index.php?page=about">About</a></li>
              </ul>
            </div>

            <div class="user-cart">
            <?php if(isset($_SESSION['firstname'])): ?> 
                <!-- User is logged in -->
                <div class="cart" style="display:flex;">
                    <a href="index.php?page=cart_list">
                        Cart
                        <span class="cart-count" id="cart-count">
                            2
                        </span>
                    </a>
                    
                    <a href="index.php?page=my_account" class="text-dark"><b>Hi, <?php echo $_SESSION['firstname']; ?>!</b></a>
                    <a href="logout.php" class="text-dark"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            <?php else: ?>
                <!-- User is not logged in -->
                <button class="btn" id="login-btn" type="button"><a href="login.php">Login</a></button>
            <?php endif; ?>
            </div>   
        </div>
    </nav>

    <script>
    // // Select all dropdown buttons
    // const dropdownButtons = document.querySelectorAll('.dropdown-icon');

    // dropdownButtons.forEach(function (dropdownButton) {
    //     dropdownButton.addEventListener('click', function (event) {
    //         const dropdownMenu = this.querySelector('.dropdown-menu');
    //         const caretIcon = this.querySelector('i');  // Get the caret icon

    //         // Toggle the dropdown only if the user clicks on the caret icon
    //         if (event.target === caretIcon) {
    //             event.preventDefault();  // Only prevent default when clicking the caret
    //             dropdownMenu.classList.toggle('show');
    //         }
    //     });
    // });

    // Handle clicking on dropdown items
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            // Let the default behavior happen (following the link)
            const href = this.getAttribute('href');
            if (href) {
                window.location.href = href;  // Redirect to the target page
            }
        });
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function (e) {
        dropdownButtons.forEach(function (dropdownButton) {
            const dropdownMenu = dropdownButton.querySelector('.dropdown-menu');
            const caretIcon = dropdownButton.querySelector('i');
            if (!dropdownButton.contains(e.target) && e.target !== caretIcon) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

