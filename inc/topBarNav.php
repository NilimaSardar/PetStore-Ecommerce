<nav class="navbar">
        <div class="container">
            <button class="navbar-toggler" type="button">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="intro">
              <a class="navbar-brand" href="./">
                <img src="uploads/logo (2).jpg" width="30" height="30">
                Pet Store
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
                <li class="nav-item item dropdown-icon" id="dropdownButton"><a class="nav-link" href="#">Pets <i class="fa-solid fa-caret-down"></i></a>
                        
                  <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a class="dropdown-item" href="#">Cat</a></li>
                    <li><a class="dropdown-item" href="#">Dog</a></li>
                  </ul>
                </li>
      
                <li class="nav-item"><a class="nav-link" href="./?p=about">About</a></li>
              </ul>
            </div>

            <div class="user-cart">
            <?php if(isset($_SESSION['firstname'])): ?> 
                <!-- User is logged in -->
                <div class="cart" style="display:flex;">
                    <a href="./?p=cart">
                        Cart
                        <span class="cart-count" id="cart-count">
                            2
                        </span>
                    </a>
                    
                    <a href="./?p=my_account" class="text-dark"><b>Hi, <?php echo $_SESSION['firstname']; ?>!</b></a>
                    <a href="logout.php" class="text-dark"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            <?php else: ?>
                <!-- User is not logged in -->
                <button class="btn" id="login-btn" type="button"><a href="login.php">Login</a></button>
            <?php endif; ?>
            </div>   
        </div>
    </nav>