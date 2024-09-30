<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <!-- Style link -->
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
          background-color: aquamarine;
        }
        ul li:hover ul.dropdown-menu{
            display: block;
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
                <li class="nav-item item"><a class="nav-link" href="#">Pets <i class="fa-solid fa-caret-down"></i></a>
                        
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cat</a></li>
                    <li><a class="dropdown-item" href="#">Dog</a></li>
                  </ul>
                </li>
      
                <li class="nav-item"><a class="nav-link" href="./?p=about">About</a></li>
              </ul>
            </div>

            <div class="user-cart">
                <button class="btn" id="login-btn" type="button">Login</button>

                <div class="cart">
                  <a href="./?p=cart">
                      Cart
                    <span class="cart-count" id="cart-count">
                      2
                    </span>
                  </a>
                        
                  <a href="./?p=my_account" class="text-dark"><b> Hi, nilima!</b></a>
                  <a href="logout.php" class="text-dark"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            </div>   
        </div>
    </nav>

     <!-- Header-->
    <header class="banner" id="main-header">
        <div class="text-center">
            <h1 class="head-message">Your Pets Deserve The Best</h1>
            <p class="subhead-message">Looking for your pet's needs? Shop Now!</p>
        </div>
    </header>
    <!-- Section-->
    <section class="product">
      <div class="container">
          <div class="row">

                  <div class="product-item">
                      <!-- Product image-->
                      <img class="card-img" src="uploads/cat4.jpg" alt="..." />
                      <!-- Product details-->
                      <div class="card-body">
                          <div class="text-center">
                              <!-- Product name-->
                              <h5 class="boder-name">Baby Cat</h5>
                              <!-- Product price-->
                              <span><b>M: </b>300</span>
                          </div>
                      </div>
                      <!-- Product actions-->
                      <div class="card-footer">
                          <div class="text-center">
                              <a class="view"   href="#">View</a>
                          </div>
                      </div>
                  </div>
          </div>
      </div>
    </section>
   
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