<?php
session_start();
include('../../apps/connect/db.php');
include('auth.php');
$seller_id=$_SESSION['SELLER_ID'];
$result = $db->prepare("select * from seller where id='$seller_id'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
    $name = $row['name'];	
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>CUSTOMCART</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/logo/logo.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../../assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="../../assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="../../assets/css/main.css" />
    

</head>

<body>
   

    <!-- Start Header Area -->
    <header class="header navbar-area" style="position: sticky; top: 0;">
        <!-- Start Topbar -->
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                            <img src="../../assets/images/logo/logo.png" alt="Logo">
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                
                                <div class="search-input">
                                    <form method="post" action="search.php">
                                    <input type="text" name="search" placeholder="Search" required>
                                </div>
                                <!-- search button -->
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        

                        
                            <div class="navbar-cart">
                                <div class="user" style="color:#081828;">
                                    <i class="lni lni-user" style="border:1px solid black; border-radius:50%;padding:10px 10px;"></i>
                                    <?php
                                    
                                    echo "Hello,&nbsp; $name</div>
                                    <a href='logout.php' class='col-lg-3 col-md-3' style='align:left;padding:10px 10px;color:#081828;'>Logout</a>";
                                    
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center"> 


                <div class="col-lg-4 col-md-0 col-12">

                        <div class="mega-category-menu">
                            <span class="cat-button" style="color: white;"><i class="lni lni-menu"></i>Order Management</span>
                            <ul class="sub-category">
                                
                                <li><a href="pending.php">Pending</a></li>
                                <li><a href="completed.php">Completed</a></li>
                                <li><a href="cancelled.php">Cancelled</a></li>
                            </ul>
                        </div>


                    </div>


                    <div class="col-lg-6 col-md-6 col-12">
                        
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="product.php">Products</a></li>
                                <li><a href="add_product.php">Add Product</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
</nav>
        
        <!-- Start Header Bottom -->
        
        <!-- End Header Bottom -->
    </header>
    </body></html>