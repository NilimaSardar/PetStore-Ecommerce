<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <!-- <link rel="stylesheet" href="css/style.css"/> -->

    <style>
      
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .wrapper{
            /* height: 100vh; */
            width: auto;
        }
      .navbar{
        background-color: #F8F9FA;
        height: 8vh;

        .navbar-toggler{
          display: none;
        }

        .container{
          /* padding: 10px 30px 10px 30px; */
          display: flex;
          flex-direction: row;
          justify-content: space-evenly;
          align-items: center;


          .intro{
             display: flex;
             flex-direction: row;

             .navbar-brand{
              font-size: 22px;
              text-decoration: none;
              color: #000000E6;
              margin: 0 16px 10px 0;

              img{
                  width: 35px;
                  height: 35px;
                  border-radius: 50%;
              }
             }
            
             .input-group{
              position: relative;
              margin-top: 10px;

              input{
                width: 190px;
                font-size: 18px;
                padding: 5px;
              }
              button{
                font-size: 20px;
                position: absolute;
                top: 0;
                right: 0;

                i{
                  padding: 5px;
                  font-size: 20px;
                }
              }
             }
          }
        }

        ul{
          list-style-type: none;
          li{
            display: inline-block;
            position: relative;
            a{
              display: block;
              padding: 20px 25px;
              text-decoration: none;
              color: #0000008C;
              text-align: center;
              font-size: 20px;
            }
            ul.dropdown-menu{
              width: 100%;
              position: absolute;
              z-index: 999;
              display: none;

              li{
              display: block;
            }
            } 
          }
        }
        ul li a:hover{
          color: #000000E6;
          font-weight: 400;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 85%;
            left: 0;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 999;
            padding:0px;
            min-width: 125px;
        }

        .dropdown-menu li {
            list-style-type: none;
        }

        .dropdown-item {
            padding: 8px 5px;
            text-decoration: none;
            display: block;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #0000008C;
            color: white;
        }

        /* Animation for dropdown */
        .dropdown-menu.show {
            display: block;
            animation: slideDown 0.3s ease-in-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .user-cart{
          button.btn{
            padding: 7px 10px 7px 10px;
            font-size: 18px;
            letter-spacing: 1.5px;
            border-radius: 5px;
            border: 1px solid #000000E6;
            display: flex;
          }

          .cart{
            display: none;
            gap: 10px;
            a{
              text-decoration: none;
              font-size: 20px;
              color: #212529;
              margin: 0px 10px;

              span{
                background-color: #212529;
                padding: 2.5px 6px;
                border-radius: 50%;
                color: #F8F9FA;
                font-size: 16px;
                font-weight: 800;
              }
            }
          }
        }

      }

      header{
        height: calc(100vh - 57vh);
        background-image: radial-gradient(circle, rgba(0, 0, 0, 0.48503151260504207) 22%, rgba(0, 0, 0, 0.39539565826330536) 49%, rgba(0, 212, 255, 0) 100%),url('uploads/banner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 0px 8px 17px 1px rgb(59, 48, 48);
        display: grid;
        place-items: center;

        .text-center{
          display: grid;
          place-items: center;
          color: #FFFFFF;

          .head-message{
            font-size: 54px;
          }
          .subhead-message{
            font-size: 22px;
            color: #FFFFFF80;
          }
        }
      }

      .product{
        height: auto;
        padding: 48px 0px;

        .container{
          color: #212529;
          font-size: 16px;
          margin: 48px 64.4px 0px;
          padding: 0px 48px;

          .row{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px,1fr));
            gap: 20px; 

            .product-item{
              width: 260px;
              margin: 0px 0px 48px;
              box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
              
              .card-img{
                width: 100%;
                height: 200px;
                object-fit: cover;
              }
              .card-body{
                width: 100%;
                height: 125px;

                .text-center{
                  width: 100%;
                  display: grid;
                  place-items: center;
                  padding: 24px 0px;
                  
                  .boder-name{
                    font-size: 25px;
                    font-weight: bolder;
                    margin: 0 0 8px 0;
                  }
                  span{
                    font-size: 20px;
                  }
                }
              }

              .card-footer{
                display: grid;
                place-items: center;
                padding: 0 24px 24px;

                .text-center{
                  padding: 15px 20px;
                  background-color:  rgb(0, 200, 255);
                  
                  a{
                    
                    text-decoration: none;
                    color: #FFFFFF;
                  }
                }
              }
            }
          }
        }
      }

      .main-footer{
            height: 18vh;
            display: grid;
            place-items: center;
            border-top: 1px solid #ffffff4f;
            background-color: #212529;
            color: #FFFFFF;
            font-size: 20px;
      }

      /* Login css */
      .show-login{
          height: 100vh;
          width: 100%;
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          z-index: 1000;
          place-items: center;
          background-color: rgba(0, 0, 0, 0.5);

          .container{
              display: grid;
              place-items: center;
              background-color: #FFFFFF;
              color: #212529;
              border: blueviolet;
              padding: 10px 30px;
              width: 450px;
              height: 350px;

              .row{
                  width: 100%;
                  height: 100%;

                  .float-right{
                      text-align: right;
                      margin: 0;

                      button{
                          background-color: transparent;
                          border: none;
                          color: inherit;
                          padding: 0;
                          color: #a2a6a9;
                          font-size: 30px;
                          cursor: pointer;
                      }
                  }
                  .form-content{
                      .text-center{
                          margin: 0;
                          text-align: center;
                          font-size: 30px;
                          letter-spacing: 1px;
                      }

                      .form-group{
                          display: flex;
                          flex-direction: column;
                          width: 100%;
                          height: 80px;

                          label{
                              font-size: 18px;
                              font-weight: bold;
                          }
                          input{
                              height: 35px;
                              margin: 10px 0;
                              border: 1px solid #ced4da;
                          }
                      }
                      .form-group-submit{
                          display: flex;
                          justify-content: space-between;

                          #create_account{
                              font-size: 20px;
                          }
                          .btn{
                              color: #FFFFFF;
                              font-size: 18px;
                              padding: 8px 10px;
                              letter-spacing: 1px;
                              background-color: #0d6efd;
                              border: #0d6efd;
                          }
                      }
                  }
              }
          }
      }

      /* Register css */
      .show-reg{
          height: 100vh;
          width: 100%;
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          z-index: 1000;
          place-items: center;
          background-color: rgba(0, 0, 0, 0.5);

          .container{
              display: grid;
              place-items: center;
              background-color: #FFFFFF;
              color: #212529;
              border: blueviolet;
              padding: 10px 30px;
              width: 700px;
              height: 450px;

              .row{
                  width: 100%;
                  height: 100%;

                  .float-right{
                      text-align: right;
                      margin: 0;

                      button{
                          background-color: transparent;
                          border: none;
                          color: inherit;
                          padding: 0;
                          color: #a2a6a9;
                          font-size: 30px;
                          cursor: pointer;
                      }
                  }
                  .form-content{
                      .text-center{
                          margin: 0 0 10px 0;
                          text-align: center;
                          font-size: 30px;
                          letter-spacing: 1px;
                      }
                      form{
                          display: flex;
                          justify-content: space-between;
                          gap: 30px;
                          margin-top: 30px;

                          .col{
                              width: 50%;
                          }
                      }

                      .form-group{
                          display: flex;
                          flex-direction: column;
                          width: 100%;
                          height: 80px;

                          label{
                              font-size: 18px;
                              font-weight: bold;
                          }
                          select,input{
                              height: 35px;
                              margin: 10px 0;
                              border: 1px solid #ced4da;
                          }
                      }
                      .form-group-submit{
                          display: flex;
                          justify-content: space-between;

                          #login-show{
                              font-size: 18px;
                          }
                          .btn{
                              color: #FFFFFF;
                              font-size: 18px;
                              padding: 8px 10px;
                              letter-spacing: 1px;
                              background-color: #0d6efd;
                              border: #0d6efd;
                          }
                      }
                  }
              }
          }
      }


        /* my account section */
    .show-account{
        width: 100%;
        display: grid;
        place-items: center;
        padding: 18px 0px;

        .container{
            /* background-color: aquamarine; */
            width: 80%;
            height: auto;

            .card-body{
                border: 2px solid #2125298a;
                border-radius: 4px;
                /* border-color: #212529d5; */
                padding: 12px;

                .content{
                    display: flex;
                    justify-content: space-between;
                    font-size: 22px;
                    padding: 15px 0px;
                    
                    .btn{
                        background-color: #212529;
                        color: #FFFFFF;
                        text-decoration: none;
                        padding: 10px;
                        font-size: 18px;
                    }
                }

                hr{
                    color: #212529;
                }

                .table{
                    width: 100%;
                    
                    thead {
                        position: relative;
                    }

                    thead::after {
                        content: "";
                        position: absolute;
                        bottom: -1px;
                        left: 0;
                        width: 100%;
                        height: 1px;
                        background-color: #212529;
                    }

                    tbody tr{
                        position: relative;
                    }

                    tbody tr::after {
                        content: "";
                        position: absolute;
                        bottom: -1px;
                        left: 0;
                        width: 100%;
                        height: 1px;
                        background-color: #2125298a;
                    }

                    th,td{
                        padding: 7px;
                        text-align: start;
                    }
                }
            }
        }
    }



    /* view_product page */
    .product-display{
        height: auto;
        padding: 48px 0px;

        .container{
          color: #212529;
          font-size: 16px;
          margin: 48px 64.4px 0px;
          padding: 0px 48px;

            .row{
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;

                .col-1{
                    width: 50%;
                    height: 500px;
                    padding: 0px 30px;

                    .card-img{
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                
                
                }
                .col-2{
                    width: 50%;
                    height: 500px;
                    padding: 0px 30px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    
                    .product-name{
                        font-size: 54px;
                        font-weight: bolder;
                    }

                    .product-available{
                        padding: 20px 0;
                        font-size: 25px;
                    }

                    .product-size{
                        padding: 20px 0;

                        span{
                            padding: 5px 0;
                            font-size: 20px;
                            font-weight: 500;
                            letter-spacing: 1px;
                        }
                    }

                    form{
                        .product-quantity{
                            .quantity{
                                text-align: center;
                                height: 40px;
                                max-width: 35px;
                                margin: 5px 10px 10px 0px;
                                border-radius: 10px;
                            }
                            .btn{
                                text-align: center;
                                height: 40px;
                                margin: 5px 10px 10px 0px;
                                padding: 0px 10px;
                                border-radius: 8px;
                                font-size: 18px;
                            }
                        }
                    }

                    .product-description{
                        letter-spacing: 0.1px;
                        font-size: 16px;
                        text-align: justify;
                    }
                
                }

              
            }
        }
    }


            /* Edit-account css */
            .show-edit-account{
                height: auto;
                width: 100%;
                display: grid;
                place-items: center;
                background-color: #FFFFFF;
    
                .container{
                    display: grid;
                    place-items: center;
                    background-color: #FFFFFF;
                    color: #212529;
                    padding: 50px 30px;
                    width: 70%;
                    height: auto;
    
                    .row{
                        width: 80%;
                        height: 100%;
                        border: 2px solid #2125298a;
                        padding: 20px 40px;
    
                        .float-right{
                            text-align: right;
                            margin: 0;
    
                            button{
                                background-color: transparent;
                                border: none;
                                color: inherit;
                                padding: 0;
                                color: #a2a6a9;
                                font-size: 30px;
                                cursor: pointer;
                            }
                        }
                        .form-content{
                            .text-center{
                                margin: 0px  0px 15px 0px ;
                                display: flex;
                                justify-content: space-between;
                                text-align: center;
                                font-size: 26px;
                                letter-spacing: 1px;
    
                                .btn{
                                    background-color: #212529;
                                    color: #FFFFFF;
                                    text-decoration: none;
                                    padding: 10px;
                                    font-size: 18px;
                                }
                            }
                            form{
                                display: flex;
                                justify-content: flex-start;
                                gap: 30px;
                                margin-top: 30px;
    
                                .col{
                                    width: 100%;
                                }
                            }
    
                            .form-group{
                                display: flex;
                                flex-direction: column;
                                width: 100%;
                                height: 80px;
    
                                label{
                                    font-size: 18px;
                                    font-weight: bold;
                                }
                                select,input{
                                    height: 35px;
                                    margin: 10px 0;
                                    border: 1px solid #ced4da;
                                }
                            }
                            .form-group-submit{
                                display: flex;
                                justify-content: flex-end;
    
                                
                                .btn{
                                    color: #FFFFFF;
                                    font-size: 18px;
                                    padding: 8px 10px;
                                    letter-spacing: 1px;
                                    background-color: #0d6efd;
                                    border: #0d6efd;
                                }
                            }
                        }
                    }
                }
            }




             /* Checkout css */
         .show-checkout{
            height: auto;
            width: 100%;
            display: grid;
            place-items: center;
            background-color: #FFFFFF;

            .container{
                display: grid;
                place-items: center;
                background-color: #FFFFFF;
                color: #212529;
                padding: 50px 30px;
                width: 90%;
                height: 540px;

                .row{
                    width: 80%;
                    height: 100%;
                    border: 2px solid #2125298a;
                    border-radius: 10px;
                    /* padding: 20px 40px; */

                    .form-content{
                        .text-center{
                            margin: 25px  0px 20px 0px ;
                            display: flex;
                            justify-content: center;
                            text-align: center;
                            font-size: 26px;
                            letter-spacing: 1px;
                        }
                        form{
                            display: flex;
                            justify-content: center;
                            gap: 30px;
                            margin-top: 30px;

                            .col{
                                width: 50%;
                            }
                        }

                        .form-group{
                            display: flex;
                            flex-direction: column;
                            width: 100%;
                            height: 150px;

                            textarea {
                                width: 100%;
                                height: 100px;
                                padding: 10px;
                                font-family: Arial, sans-serif;
                                font-size: 14px;
                                border: 1px solid #b6b4b4;
                                border-radius: 5px;
                                resize: none; /* Prevents resizing */
                                outline: none; /* Removes focus outline */
                            }

                            label{
                                font-size: 20px;
                                padding-bottom: 10px;
                                font-weight: bold;
                            }
                        }

                        .col-1{
                            font-size: 22px;
                            margin-bottom: 10px;
                            b{
                                font-size: 26px;
                            }
                        }

                        .col-2{
                            padding-top: 15px;

                            .text-muted{
                                color: #b4b0b0;
                                font-size: 30px;
                            }
                            .form-group-submit{
                                    display: flex;
                                    justify-content: start;

                                    
                                    .btn{
                                        color: #FFFFFF;
                                        font-size: 18px;
                                        margin: 10px 0px;
                                        padding: 8px 10px;
                                        letter-spacing: 1px;
                                        background-color: #0d6efd;
                                        border: #0d6efd;
                                    }
                                }
                        }
                        
                    }
                }
            }
        }



            /* cart css */
    .show-cart{
        width: 100%;
        height: auto;
        /* background-color: bisque; */
        padding: 48px 0px;
        
        .container{
            margin: 0px 37px;
            padding: 0px 70px;

            .row{
                text-align: right;
                .btn{
                    font-size: 14px;
                    padding: 10px;
                    color: #212529;
                    border-color: #212529d5;
                    background-color: #FFFFFF;
                }
            }

            .card-body{
                border: 2px solid rgba(0, 0, 0, 0.125);
                padding: 16px;
                margin: 10px 0px;

                h3{
                    font-size: 28px;
                    margin: 0px 0px 8px;
                }

                .cart-item{
                    width: 100%;
                    height: 150px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    /* background-color: aquamarine; */
                    border-bottom: 2px solid rgba(0, 0, 0, 0.125);
                    margin: 0px 0px 8px;
                    padding: 8px;

                    .align-items-center{
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        height: 100%;
                        width: 50%;

                        .btn{
                            color: red;
                            border: 1px solid red;
                            padding: 8px;
                            border-radius: 5px;
                        }

                        .image{
                            height: 100%;
                            width: 40%;
                            .cart-prod-img{
                                width: 100%;
                                height: 100%;
                                object-fit: contain;
                                border: 1px solid rgba(0, 0, 0, 0.125);
                                
                            }
                        }
                        
                        .product-detail{
                            height: 100%;

                            .description{
                                font-size: 20px;
                                padding: 2px;
                            }
                        }

                        .input-group{
                            width: 100px;
                            display: flex;
                            padding-top: 10px ;

                            input{
                                text-align: center;
                                width: 100%;
                            }
                            .btn-inc{
                                color: #212529;
                                border: 1px solid #212529;
                                padding: 8px;
                                border-radius: 4px;
                            }

                        }
                    }

                    .total-amount{
                        font-size: 24px;
                    }
                }

                .border-bottom{
                    display: flex;
                    justify-content: end;
                    align-items: center;
                    color: #212529;
                    font-size: 28px;
                    height: 70px;
                    gap: 400px;
                }
            }

            .checkout{
                width: 100%;
                height: 70px;
                display: flex;
                justify-content: flex-end;
                align-items: center;

                .btn{
                    text-decoration: none;
                    background-color: #212529;
                    color: #FFFFFF;
                    padding: 10px;
                    letter-spacing: 1px;
                }
            }
        }
    }
    </style>
</head>
<body>
  <div class="wrapper">
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
      
                <li class="nav-item"><a class="nav-link" href="index.php?page=about">About</a></li>
              </ul>
            </div>

            <div class="user-cart">
                <button class="btn" id="login-btn" type="button">Login</button>

                <div class="cart">
                  <a href="index.php?page=cart_list">
                      Cart
                    <span class="cart-count" id="cart-count">
                      2
                    </span>
                  </a>
                        
                  <a href="index.php?page=my_account" class="text-dark"><b> Hi, nilima!</b></a>
                  <a href="logout.php" class="text-dark"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            </div>   
        </div>
    </nav>
    <?php
            // Mapping pages to their respective folders
            $pages = [
                'cart_list' => 'cart.html',
                'edit_account' => 'edit_account.html',
                'checkout' => 'checkout.html',
                'my_account' => 'my_account.html',
                'about' => 'about.html',
                'manage_category' => 'maintenance/manage_category.php',
                'manage_sub_category' => 'maintenance/manage_sub_category.php',
                'order_list' => 'orders/index.php',
                'view_order_list' => 'orders/view_order.php',
                'update_status' => 'orders/index.php',
                'product_list' => 'product/index.php',
                'manage_product_list' => 'product/manage_product.php',
                'settings' => 'system_info/index.php'
            ];

            // Check if the 'page' parameter is set and exists in the $pages array
            if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
                include($pages[$_GET['page']]);
            } else {
                // Default page if no 'page' parameter or invalid 'page'
                include('home.php');
            }
            ?>
   
  <section class="show-login">
  <?php include('login.html'); ?>
  </section>
  <section class="show-reg">
  <?php include('registration.php'); ?>
  </section>

    <footer class="main-footer">
      <p>
        <strong>
          Copyright ©. 
        </strong>
      All rights reserved.
    </p>
    </footer>

  </div>
  <script>

        // Handle the dropdown toggle when clicking the "Pets" link
        document.getElementById('dropdownButton').addEventListener('click', function (event) {
            event.preventDefault();
            const dropdownMenu = document.getElementById('dropdownMenu');
            
            // Toggle the visibility of the dropdown
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function (e) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownButton = document.getElementById('dropdownButton');
            
            if (!dropdownButton.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

  // Show login 
  document.getElementById('login-btn').addEventListener('click', function() {
    document.querySelector('.show-login').style.display = 'grid';
  });

  // Close login 
  document.querySelector('.close-login').addEventListener('click', function() {
    document.querySelector('.show-login').style.display = 'none';
  });

  // Show register
  document.getElementById('create_account').addEventListener('click', function() {
    document.querySelector('.show-login').style.display = 'none'; 
    document.querySelector('.show-reg').style.display = 'grid';
  });

  // Close register
  document.querySelector('.close-reg').addEventListener('click', function() {
    document.querySelector('.show-reg').style.display = 'none';
  });

  // Show login again
  document.getElementById('login-show').addEventListener('click', function() {
    document.querySelector('.show-reg').style.display = 'none';
    document.querySelector('.show-login').style.display = 'grid';
  });

</script>

</body>
</html>