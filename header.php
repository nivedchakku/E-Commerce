<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include('apps/connect/db.php');
if(isset($_SESSION['USER_ID']))
{
$user_id=$_SESSION['USER_ID'];
$result = $db->prepare("select * from customer where id='$user_id'");
$result->execute();
$result1 = $db->prepare("select count(id) as no from cart where c_id='$user_id'");
$result1->execute();
$row1 = $result1->fetch();
$result2 = $db->prepare("select count(id) as no from wishlist where c_id='$user_id'");
$result2->execute();
$row2 = $result2->fetch();
for($i=0; $row = $result->fetch(); $i++)
{
    $name = $row['f_name'];		
}
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    

</head>

<body>
   

    <!-- Start Header Area -->
    <header class="header navbar-area" style="position: sticky; top: 0;">
        <!-- Start Topbar -->
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle" style="height:120px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                            <img src="assets/images/logo/logo.png" alt="Logo">
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                
                                <div class="search-input">
                                    <form method="POST" action="search.php">
                                    <input type="text" placeholder="Search" name="search" required>
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
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    <?php
                                    if(isset($_SESSION['USER_ID']))
                                    echo "Hello,&nbsp; $name</div>
                                    <a href='logout.php' class='col-lg-3 col-md-3' style='align:left;padding:0px 10px;color:#081828;'>Logout</a>";
                                    else
                                    {
                                    ?>
                                    Hello
                                </div>

                                <div class="user">
                                    <a href="login.php" style="padding:0px 10px;"> Sign In </a>
                                </div>

                                <div class="user">
                                    <a href="signup.php" style="padding: 0px 10px;"> Register </a>
                                </div>
                                <?php
                                    }
                                    ?><div class="cart-items">
                                    <a href="cart.php" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items"><?php if(isset($_SESSION['USER_ID'])) echo $row1['no']; else echo 0;?></span>
                                    </a>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="cart-items">
                                <a href="wishlist.php" class="main-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                        <span class="total-items"><?php if(isset($_SESSION['USER_ID'])) echo $row2['no']; else echo 0;?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <div class="topbar" style="padding:5px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-0 col-12">

                        <div class="mega-category-menu">
                            <span class="cat-button" style="color: white;"><i class="lni lni-menu"></i>Categories</span>
                            <ul class="sub-category">

                                <?php
                                $result3 = $db->prepare("select * from category");
                                $result3->execute();
                                while($row3 = $result3->fetch())
                                {
                                ?>
                                <li><a href="category.php?id=<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>


                    </div>
                    
                    <div class="col-lg-4 col-md-5 col-12">
                        
                        <div class="top-middle" style="margin-top:4px;">
                            <ul class="useful-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="orders.php">My order's</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="about_us.php">About Us</a></li>
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