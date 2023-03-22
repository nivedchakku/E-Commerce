<?php 
include("auth.php");
include("header.php");
include('apps/connect/db.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



<style type="text/css">
body {
    margin: 0;
    font-family: Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: .8125rem;
    font-weight: 400;
    line-height: 1.5385;
    color: #333;
    text-align: left;
    background-color: #f5f5f5;
}

.mt-50{
    margin-top: 50px;
}
.mb-50{
    margin-bottom: 50px;
}


.bg-teal-400 { 
    background-color: #26a69a;
}

a{
    text-decoration: none !important;
}


.fa {
        color: red;
}
.strike{
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
    color: darkgray;
  }


  .empty-state {
  width: 750px;
  margin: 100px auto;
  background: #ffffff;
  box-shadow: 1px 2px 10px #e1e3ec;
  border-radius: 4px;
  }

  .empty-state__icon {
      width: 200px;
      height: 200px;
      display: flex;
      align-items: center;
      border-radius: 200px;
      justify-content: center;
      background-color: #f7fafc;
      box-shadow: 0px 2px 1px #e1e3ec;
      padding:5px;
  }
  .empty-state__content{
    padding: 50px 220px;
  }
  .er{
    color:black;
    font-weight: 500;
    padding:0px  150px;
  }
  .er1{
    color:black;
    font-weight: 500;
    padding:0px  240px;
  }


    </style>

<body>
<section class="content-header" style="display:flex;justify-content:space-around">
<h3 class="col-lg-3" style="padding:10px;">Order history</h1>
</section><hr>

<div style="overflow:auto;">
<?php
$c=$_SESSION['USER_ID'];   

      $result = $db->prepare("select p.*,o.c_id from ordered_products p,orders o where o.id=p.order_id and o.c_id='$c' ORDER BY DATE DESC");
      $result->execute();
            $count = $result->rowcount();
            if($count>0)
            {
                ?>
                <div class="container d-flex justify-content-center mt-50 mb-50">   
                    <div class="row">
                        <div class="col-md-10">
            <?php
              
      for($i=0; $row = $result->fetch(); $i++)
      {
        $p=$row['p_id'];
		$result2 = $db->prepare("select image from p_image where p_id='$p'");
		$result2->execute();
		$img='';
		for($k=0; $row2 = $result2->fetch(); $k++)
		{
			$img='apps/seller/uploads/';
			$img.=$row2['image'];
			break;
		}
        $p=$row['p_id'];
		$result1 = $db->prepare("select * from product where id='$p'");
		$result1->execute();
        $row1 = $result1->fetch();




        ?>
            <div class="card card-body" style="padding:30px;">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0">
                                    
                                        <img src="<?php echo $img;?>" width="150" height="150" alt="">
                                   
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold" style="padding:0px 200px 0px 0px;">
                                        <a href="product_detail.php?id=<?php echo $row['id']; ?>" data-abc="true" ><?php echo $row1['name'];?></a>
                                    </h6>

                                    <?php
                                    if($row['status']==1)
                                    {
                                        ?>

                                    <p class="mb-3"><?php echo "Ordered"?></p>

                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="color:green;font-weight:500;">Not Shipped yet</li>
                                    </ul>
                                
                                        <?php
                                    }
                                    ?>
                                    
                                    <?php
                                    if($row['status']==2)
                                    {
                                        ?>

                                    <p class="mb-3"><?php echo "Ordered"?></p>

                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="color:green;font-weight:500;">Shipped </li>
                                    </ul>
                                
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if($row['status']==3)
                                    {
                                        ?>

                                    <p class="mb-3"><?php echo "Order Compelted"?></p>

                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="color:green;font-weight:500;">Delivered </li>
                                    </ul>
                                
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if($row['status']==0)
                                    {
                                        ?>

                                    <p class="mb-3"><?php echo "Order Compelted"?></p>

                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="color:red;font-weight:500;">Order Cancelled </li>
                                    </ul>
                                    
                                
                                        <?php
                                    }
                                    ?>
                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item" style="color:red;font-weight:500;"><a href="bill_invoice.php?id=<?php echo $row['id']; ?>" class="" style="color:black;font-size:12px;font-weight:150;font-style: italic;"><i class="icon-cart-add mr-2"></i> View Bill Details</a></li>
                                    </ul>
                                </div>
                                    

                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold">₹<?php echo $row['price']*$row['quantity'];?></h3>
                                    
                                    
								<div class="col-md-2" >
                                <span style="padding:2px 5px;font-size:12px; border-radius:5px;">
                                    <?php echo "qty:".$row['quantity']; ?>
                                </span>
								  </div>
							

                                    
                                    <?php
                                    if($row['status']==1 || $row['status']==2) {
                                   ?> <a href="cancel_order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger mt-4 text-white"><i class="icon-cart-add mr-2"></i> Cancel Order</a>
                               <?php 
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
    


<?php

      }
      echo "            </div>
      </div>
</div>";
    }
    else{
        ?>
        <div class="empty-state">
  <div class="empty-state__content">
    <div class="empty-state__icon">
      <img src="no.png" alt="">
    </div>
    </div>
    <div class="er1">Sorry, no results found!</div>
    <div class="er  ">
    No Orders Yet
    </div>
  
</div>
<?php
    }

?>
</div>
</div>
<hr>
<?php
include("footer.php");
?>
</body>



                                        
                    



    