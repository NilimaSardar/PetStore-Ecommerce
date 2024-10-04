<?php

session_start();
include '../connection.php';

$page_title="Time Spent";

if(!isset($_SESSION['username'])){
    ?>
        <script>
            //alert('You are logged out');
            window.location = 'login.php';
        </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store-admin</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <!-- Css link -->
     <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .wrapper{
            background-color: #343A40;
            height: 100vh;
            width: auto;
            display: grid;
            grid-template-rows: calc(100vh - 90vh) calc(100vh - 20vh) calc(100vh - 90vh);
            grid-template-columns: 250px calc(100% - 250px);

        }
        .main-header{
            padding: 10px;
            border-bottom: 1px solid #ffffffcf;

            ul{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                li{
                    list-style-type: none;
                }
                a{
                    text-decoration: none;
                    color: #CED4DA;
                    font-size: 24px;
                }

                .btn-group{
                    button{
                        width:auto;
                        padding: 12px;
                        margin-right: 20px;
                        border-radius: 10px;
                        font-size: 18px;
                        display: flex;
                        gap: 10px;
                        font-weight: 700;
                        border: none;
                        cursor: pointer;
                        transition: background-color 0.3s ease, box-shadow 0.3s ease;
                    }

                    button:hover {
                        color: #FFFFFF;
                        background-color: rgb(170, 0, 0);
                        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                    }


                     /* Hide the dropdown by default */
                     .dropdown-menu {
                        display: none;
                        position: absolute;
                        background-color: #343A40;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        z-index: 1;
                        min-width: 150px;
                        padding: 10px;
                        border-radius: 5px;
                    }

                    .dropdown-icon {
                        position: relative;
                    }

                    .dropdown-icon .dropdown-menu {
                        top: 100%;
                        left: 0;
                    }

                    .dropdown-menu a {
                        font-size: 16px;
                        display: block;
                        padding: 10px 5px;
                        text-decoration: none;
                        color: #FFFFFF;
                    }

                    .dropdown-menu a:hover {
                        background-color: #f1f1f191;
                    }

                }
            }
        }

        .main-sidebar{
            grid-area: 1/1/4/-3;
            height: 100vh;
            display: flex;
            flex-direction: column;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

            .active{
                background-color: rgb(0, 200, 255);
            }

            .brand-link{
                padding: 10px  30px 10px 30px;
                text-decoration: none;

                .brand-image{
                    width: 35px;
                    height: 35px;
                    border-radius: 50%;
                }

                .brand-text{
                    font-size: 30px;
                    color: #f8fbff;
                }
            }

            ul{
                list-style-type: none;

                li{
                    padding: 10px  30px 10px 30px;
                    font-size: 18px;
                    color: #CED4DA;
                    
                    a{
                        text-decoration: none;
                        font-size: 20px;
                        color: #CED4DA;
                    }
                }

                li.nav-item:hover{
                    background-color: #878e95c1;
                }
                li:active{
                    background-color: rgb(0, 200, 255);
                }
            }
        }
        .main-footer{
            color: #869099;
            display: flex;
            justify-content: center;
            align-items: center;
            border-top: 1px solid #ffffff4f;
        }

        /* table */
        main{
            color: #FFFFFF;

            .card{
                padding: 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                height: 90%;
                margin: 10px;

                .inner-card{
                    width: 100%;
                    height: auto;

                    .card-header{
                        display: flex;
                        justify-content: space-between;
                        padding: 0px 0px 20px 0px;

                        .card-title{
                            font-size: 24px;
                        }
                        .card-tools{
                            a{
                                color: #FFFFFF;
                                text-decoration: none;
                                background-color: rgb(0, 200, 255);
                                padding: 10px;
                                font-weight: bold;
                                font-size: 20px;
                            }
                        }
                        .card-detail{
                            .card-title{
                                font-size: 18px;
                                padding: 0px 0px 12px 20px;
                                letter-spacing: 0.5px;
                            }

                        }
                    }

                    .searching{
                        display: flex;
                        justify-content: flex-end;
                        padding: 10px 0 0 0;

                        .card-title{
                            font-size: 18px;
                        }

                        input{
                            border: 1px solid #ced4dabb;
                            margin-left: 7px;
                            height: 30px;
                            background-color: transparent;
                        }
                    }

                    .card-body{
                        width: 100%;
                        padding: 20px;

                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        table, th, td {
                            border: 2px solid #ced4da76;
                        }

                        th, td {
                            padding: 10px;
                            text-align: left;
                        }

                        .text-right{
                            text-align: right;
                        }

                        tbody {

                            .text-center{
                                text-align: center;
                                
                                .badge{
                                    padding: 3px;
                                    border-radius: 3px;
                                    font-weight: bold;
                                }
                                .badge-light{
                                    background-color: #FFFFFF;
                                    color: #343A40;
                                }
                                .badge-success{
                                    background-color: green;
                                }
                                .badge-danger{
                                    background-color: red;
                                }
                                .badge-primary{
                                    background-color: blue;
                                }
                                .badge-warning{
                                    background-color: orange;
                                    color: #343A40;
                                }
                            }

                            .btn{
                                background-color: transparent;
                                color: #FFFFFF;
                                border: 1px solid #ced4dabb;
                                padding: 5px 8px;
                            }

                            /* Hide the dropdown by default */
                            .dropdown-menu {
                                display: none;
                                position: absolute;
                                background-color: #343A40;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                                z-index: 1;
                                min-width: 150px;
                                padding: 10px;
                                border-radius: 5px;
                            }

                            .dropdown-icon {
                            position: relative;
                            }

                            /* Align the dropdown below the button */
                            .dropdown-icon .dropdown-menu {
                                top: 100%;
                                left: 0;
                            }
                            .dropdown-item i{
                                padding-right: 5px;
                                color: blue;
                            }
                            .dropdown-item.delete_data i{
                                color: red;
                            }

                            .dropdown-menu a {
                            display: block;
                            padding: 8px 16px;
                            text-decoration: none;
                            color: #FFFFFF;
                            }

                            .dropdown-menu a:hover {
                            background-color: #f1f1f191;
                            }

                            hr{
                                color: #ced4dabb;
                            }
                            
                        }
                    }

                    .row{
                        display: flex;
                        justify-content: flex-start;
                        padding: 0 0 0 20px;

                        .col{
                            width: 50%;
                            height: 20vh;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            gap: 20px;
                            font-size: 17px;

                            .badge{
                                    padding: 3px;
                                    border-radius: 3px;
                                    font-weight: bold;
                                }
                                .badge-light{
                                    background-color: #FFFFFF;
                                    color: #343A40;
                                }
                                .badge-success{
                                    background-color: green;
                                }
                                .badge-danger{
                                    background-color: red;
                                }
                                .badge-primary{
                                    background-color: blue;
                                }
                                .badge-warning{
                                    background-color: orange;
                                    color: #343A40;
                                }
                        }

                        .col-2{
                            width: 100%;
                            height: 100%;
                            display: flex;
                            align-items: center;
                            gap: 20px;
                            font-size: 17px;

                            .status-show{
                                margin-top: 30px;
                                display: flex;
                                flex-direction: column;
                                gap: 15px;

                                .btn{
                                    color: #FFFFFF;
                                    border-radius: 3px;
                                    border: none;
                                    text-decoration: none;
                                    background-color: rgb(0, 200, 255);
                                    padding: 8px;
                                    /* font-weight: bold; */
                                    font-size: 14px;
                                    transition: all 0.1s linear;
                                }

                                .btn:hover{
                                    background-color: rgb(0, 164, 209);
                                }
                            }
                        }
                    }
                }
            }

            .modal-footer{
                /* width: 100%; */
                display: flex;
                justify-content: flex-end;
                padding: 0px 30px;

                button{
                    background-color: #869099;
                    padding: 6px 8px;
                    border-radius: 3px;
                    border: none;
                    font-size: 14px;
                    color: #FFFFFF;
                }
            }
        }

        
        /* pop up message */
        /* Overlay for the popup dialog */
        .popup-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        

            /* Card styling */
            .container-fluid.card {
                background-color: #343A40;
                border-radius: 8px;
                padding: 30px 20px 20px 20px;
                width: 500px;
                height: 250px;
                box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            }

            /* Header styling */
            .card-header {
                font-size: 22px;
                font-weight: 600;
                text-align: center;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
                margin-bottom: 20px;
            }

            /* Form group styling */
            .form-group {
                padding-bottom: 15px;
                border-bottom: 1px solid #eee;
            }

            .control-label {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 5px;
                display: block;
            }

            /* Dropdown styling */
            .custom-select {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            /* Button styling */
            .choose-button {
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
            }

            button {
                margin: 0px 5px;
                width: auto;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.1s linear;
            }

            /* Save button */
            .btn-save {
                background-color: rgb(0, 200, 255);
                color: #fff;
            }

            .btn-save:hover {
                background-color: rgb(0, 164, 209);
            }

            /* Cancel button */
            .btn-cancel {
                background-color: #869099;
                color: #fff;
            }

            .btn-cancel:hover {
                background-color: #869099ab;
            }

            /* Style the select element */
            .custom-select {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: transparent;
                color: #FFFFFF;
                appearance: none;
            }

            /* Style the options */
            .custom-select option {
                height: 40px;
                background-color: #343A40;
                color: #FFFFFF;
                font-size: 16px;
            }

            /* Add focus styles */
            .custom-select:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }
        }

            /* Manage & Update Product */
            main{
                color: #FFFFFF;

                .card-info{
                    padding: 0 20px;
                    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                    margin: 30px 50px;
                    height: auto;

                    .card-header{
                        padding: 12px 20px;
                    }

                    .card-body{
                        width: 100%;
                        padding: 0px 20px;

                        form{
                            display: flex;
                            justify-content: space-between;
                            gap: 50px;
                            .col{
                                width: 100%;
                            }
                        }

                        .form-group{
                            width: 100%;
                            height: auto;
                            display: flex;
                            flex-direction: column;
                            padding: 12px 0px;

                            label{
                                padding: 0 0 10px 0;
                                font-size: 18px;
                                font-weight: bold;
                            }

                            input, select, textarea{
                                background-color: transparent;
                                color: #FFFFFF;
                                border-radius: 3px;
                                border: 1px solid #ccc;
                                height: 40px;
                                padding: 10px;

                            }

                            input:focus{
                                outline: none;
                                border-color: #66afe9;
                                box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
                            }
                            textarea {
                                width: 100%;
                                height: 55px;
                                padding: 10px;
                                font-size: 14px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                resize: none;
                                outline: none;
                            }

                            textarea:focus {
                                border-color: #66afe9;
                                box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
                            }
                            /* Style the select element */
                            .custom-select {
                                width: 100%;
                                padding: 10px;
                                font-size: 16px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                background-color: transparent;
                                color: #FFFFFF;
                                appearance: none; /* Remove default arrow */
                            }

                            /* Style the options */
                            .custom-select option {
                                height: 40px;
                                background-color: #343A40;
                                color: #FFFFFF;
                                font-size: 20px;
                            }

                            /* Add focus styles */
                            .custom-select:focus {
                                outline: none;
                                border-color: #007bff;
                                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                            }

                            /* Custom file input */
                            .custom-file {
                                position: relative;
                                display: inline-block;
                                width: 100%;
                                overflow: hidden;
                            }

                            .custom-file-input {
                                font-size: 16px;
                                position: absolute;
                                top: 0;
                                left: 0;
                                opacity: 0;
                                cursor: pointer;
                            }

                            .button{
                                position: absolute;
                                top: 0;
                                right: 0;
                                line-height: 40px;
                                border-left: 1px solid #ced4da;
                                padding: 0 10px;

                            }

                            .custom-file-label {
                                display: block;
                                height: 40px;
                                line-height: 40px;
                                background-color: transparent;
                                padding: 0 0 10px 10px;
                                border: 1px solid #ced4da; 
                                border-radius: 3px;
                                text-align: start;
                                transition: background-color 0.3s;
                            }

                            .custom-file-label:hover {
                                background-color: #5a6268;
                            }

                        }

                        .form-group-img{
                            width: 100%;
                            height: auto;
                            padding:0px;

                            img#cimg{
                                height: 10vh;
                                width: 10vh;
                                object-fit: cover;
                                border-radius: 100% 100%;
                            }
                            img#cimg2-cover{
                                height: 15vh;
                                width: 70%;
                                object-fit: cover;
                                /* border-radius: 100% 100%; */
                            }
                        }

                        .img-item{
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            gap: 15px;

                            img{
                                width: 150px;
                                height: 100px;
                                object-fit: cover;
                            }

                            button{
                                background-color: transparent;
                                color: red;
                                border: 1px solid #ccc;
                                padding: 7px 10px;
                                border-radius: 3px;
                                transition: all 0.1s linear;
                            }
                            button:hover{
                                color: #FFFFFF;
                                background-color: red;
                            }
                        }

                        .card-footer{
                            padding: 20px 0px;
                            .btn{
                                background-color: rgb(0, 200, 255);
                                border: 1px solid #ccc;
                                color: #FFFFFF;
                                border-radius: 3px;
                                font-size: 18px;
                                padding: 10px 12px;
                                margin: 5px;
                                transition: all 0.1s linear;
                            }
                            a.btn{
                                text-decoration: none;
                                background-color: transparent;
                                transition: all 0.1s linear;
                            }
                            .btn:hover{
                                background-color: rgb(0, 150, 200);
                                border-color: rgb(0, 180, 230); 
                            }
                            a.btn:hover{
                                background-color: #ccc;
                                color: #343A40;
                                border: none;
                            }

                        }
                    }
                }
            }
                            
     </style>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">Hello - Admin</a>
            </li>
        
            <li class="nav-item">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-icon" id="dropdownButton-admin">
                        <span><i class="fa-solid fa-right-from-bracket"></i> </span>
                        <a href="logout.php"><span>Logout</span></a>
                        <!-- <span><i class="fa-solid fa-caret-down"></i></span> -->
                    </button>
                    <!-- <div class="dropdown-menu" id="dropdownMenu-admin">
                        <a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> My Account</a><hr>
                        <a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div> -->
                </div>
            </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar">
            <!-- Brand Logo -->
            <a href="#" class="brand-link active">
                <img src="../uploads/logo (2).jpg" alt="Store Logo" class="brand-image">
                <span class="brand-text">Pet Store</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                    <ul class="nav-sidebar">
                        <li class="nav-item">
                            <a href="./" class="nav-link">
                                <i class="fa-solid fa-gauge-high"></i>
                                    Dashboard
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="index.php?page=user_list" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                                   My Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=product_list" class="nav-link">
                                <i class="fa-solid fa-box"></i>
                                    Product List
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="index.php?page=inventory_list" class="nav-link">
                                <i class="fa-solid fa-clipboard-list"></i>
                                    Inventory List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=order_list" class="nav-link">
                                <i class="fa-solid fa-list"></i>
                                    Order List
                            </a>
                        </li>
                        <li>Maintenance</li>
                        <!-- <li class="nav-item">
                            <a href="index.php?page=category" class="nav-link">
                                <i class="fa-solid fa-table-list"></i>
                                    Category List
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="index.php?page=sub_category" class="nav-link">
                                <i class="fa-solid fa-table-list"></i>
                                    Sub Category List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=settings" class="nav-link">
                                <i class="fa-solid fa-gear"></i>
                                    Settings
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <main> 
        <?php
            // Mapping pages to their respective folders
            $pages = [
                'user_list' => 'user/index.php',
                'inventory_list' => 'inventory/index.php',
                'manage_inventory_list' => 'inventory/manage_inventory.php',
                'category' => 'maintenance/category.php',
                'sub_category' => 'maintenance/sub_category.php',
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
                include('dashboard.php');
            }
            ?>
        </main>

        <footer class="main-footer">
            <strong>
                Copyright ©. 
            </strong>
            All rights reserved.
        </footer>
    </div>
   

    <script>

        // Select all dropdown buttons and menus
        const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
        const dropdownMenus = document.querySelectorAll('.dropdown-menu');

        // Add event listeners to each dropdown button
        dropdownButtons.forEach((dropdownButton, index) => {
            const dropdownMenu = dropdownMenus[index]; // Get the corresponding dropdown menu
            
            // Toggle the visibility of the dropdown menu on button click
            dropdownButton.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent click event from propagating to window

                // Toggle the dropdown menu visibility
                if (dropdownMenu.style.display === 'block') {
                    dropdownMenu.style.display = 'none';
                } else {
                    // Hide any other open dropdowns
                    dropdownMenus.forEach(menu => menu.style.display = 'none');
                    dropdownMenu.style.display = 'block';
                }
            });
        });

        // Close the dropdowns if clicked outside
        window.addEventListener('click', function(event) {
            dropdownMenus.forEach(menu => {
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                }
            });
        });


        function updateFileName() {
        const fileInput = document.getElementById('customFile');
        const fileNameLabel = document.querySelector('.custom-file-label');
        const fileNameDisplay = document.getElementById('file-name');
        const imgTag = document.getElementById('cimg');

        // Get the selected file name
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            const fileName = file.name;
            fileNameLabel.textContent = fileName;
            fileNameDisplay.textContent = "chosen file";

            // Create a FileReader to load the image
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update the image src with the selected file
                imgTag.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            fileNameLabel.textContent = "Choose file";
            fileNameDisplay.textContent = "No file chosen";
        }
        }

        function updateFileName2() {
            const fileInput = document.getElementById('customFile-cover');
            const fileNameLabel = document.querySelector('.custom-file-label-cover');
            const fileNameDisplay = document.getElementById('file-name-cover');
            const imgTag = document.getElementById('cimg2-cover');

            // Get the selected file name
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const fileName = file.name;
                fileNameLabel.textContent = fileName;
                fileNameDisplay.textContent = "chosen file";

                // Create a FileReader to load the image
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the image src with the selected file
                    imgTag.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                fileNameLabel.textContent = "Choose file";
                fileNameDisplay.textContent = "No file chosen";
            }
        }

        function showDialog() {
            const popupDialog = document.getElementById('popup-dialog');
            const cancelButton = document.getElementById('cancel-btn');
        
            popupDialog.style.display = 'flex';

            cancelButton.addEventListener('click', function() {
                popupDialog.style.display = 'none'; 
            });

            window.addEventListener('click', function(event) {
                if (event.target === popupDialog) {
                    popupDialog.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>