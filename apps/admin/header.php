<?php
session_start();
include('../../apps/connect/db.php');
include('auth.php');
$admin_id=$_SESSION['ADMIN_ID'];
$result = $db->prepare("select * from admin where id='$admin_id'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
    $name = $row['name'];	
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <div class="header-middle" style="height:120px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="" href="index.html">
                            <img src="../../assets/images/logo/logo.png" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                
                                <div class="search-input" style="margin:0px 130px;">
                                    <h3>Admin Dashboard</h3>
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
                                    
                                    echo "ADMIN,&nbsp; $name</div>
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


                    <div class="col-lg-6 col-md-6 col-12">
                        
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="sellers.php">Sellers</a></li>
                                <li><a href="customers.php">Customers</a></li>
                                <li><a href="product.php">Product</a></li>
                                <li><a href="message.php">Message</a></li>
                                <li><a class=" edit" data-toggle="modal" data-target="#myModal">Banner Update</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
</nav>
        
        <!-- Start Header Bottom -->
        
        <!-- End Header Bottom -->
    </header>




    <div class="modal" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Upload Banner</h4>
                                            </div>
                                            <div class="main">
                                            <form method="post" action="update_banner.php"  enctype="multipart/form-data">
                            


                                            <div class="form-group">
							                        
							                        <div class="col-sm-4" style="padding-top:4px;">
								                    <input type="file" name="f_photo">
							                 
								                    <div class="upload-btn">
			                                            <input type="file" name="photo1" style="margin-bottom:5px;">
			                                        </div>
												    <div class="upload-btn">
			                                            <input type="file" name="photo2" style="margin-bottom:5px;">
			                                        </div>
												    <div class="upload-btn">
			                                            <input type="file" name="photo3" style="margin-bottom:5px;">
			                                        </div>
												    <div class="upload-btn">
			                                            <input type="file" name="photo4" style="margin-bottom:5px;">
			                                        </div>
							                    </div>
						                    </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-success" value="Update" name="update">
                                            </form>
                                            </div>
                                          </div>

                                        </div>
                                    </div>
    </body></html>