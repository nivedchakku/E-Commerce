<?php 
include("auth.php");
include("header.php");
include('apps/connect/db.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/p_detail.css">


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
    .card:hover{
    
  }
  .card1{
    background: #fff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
    border: 0;
    border-radius: 1rem
  }

    </style>

<body>
<section class="content-header" style="display:flex;justify-content:space-around">
<h4 class="col-lg-3" style="padding:10px;">Cart</h4>
</section><hr>
<div style="display:flex;">
<div style="">
<?php
$c=$_SESSION['USER_ID'];





      $result = $db->prepare("select p.*,c.quantity as qty,c.id as cart from product p,cart c where c.p_id=p.id and c.c_id='$c'");
      $result->execute();
            $count = $result->rowcount();
            if($count>0)
            {
                ?>
                <div class="container d-flex justify-content-center mt-50 mb-50">   
                    <div class="row">
                        <div class="">
            <?php
              
      for($i=0; $row = $result->fetch(); $i++)
      {
        if($row['quantity']==0)
        {
            $cart_id=$row['cart'];
            $sql = "delete from cart where id='$cart_id'";
            $q1 = $db->prepare($sql);
            $q1->execute();
        }
        $p=$row['id'];
		$result2 = $db->prepare("select image from p_image where p_id='$p'");
		$result2->execute();
		$img='';
		for($k=0; $row2 = $result2->fetch(); $k++)
		{
			$img='apps/seller/uploads/';
			$img.=$row2['image'];
			break;
		}
        $cat=$row['c_id'];
		$result1 = $db->prepare("select name from category where id='$cat'");
		$result1->execute();
        $row1 = $result1->fetch();

        $r_result = $db->prepare("select count(rating) as no,sum(rating) as sum from review where p_id='$p'");
        $r_result->execute();
        $r_row=$r_result->fetch();
        if ($r_row['no']!=0){
        $rate=$r_row['sum']/$r_row['no'];
        $rate=number_format($rate, 1, '.', '');}
        else
        $rate=0;

        ?>
            <div class="card card-body" style="margin-bottom:10px;">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0">
                                    
                                        <img src="<?php echo $img;?>" width="150" height="150" alt="">
                                   
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold">
                                        <a href="product_detail.php?id=<?php echo $row['id']; ?>" data-abc="true"><?php echo $row['name'];?></a>
                                    </h6>

                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"><?php echo $row1['name'];?></a></li>
                                    </ul>

                                    <p class="mb-3"><?php echo$row['s_description'];?></p>

                        <div class="product-count">
	        				<form action="cart_update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['cart'];?>"> 
                            <div class="display-flex">
							    <input type="submit" value="-" name="min" class="qtyminus">
							    <input type="text" name="quantity" value="<?php echo $row['qty'];?>" class="qty">
							    <input type="submit" value="+" name="inc" class="qtyplus"><br>
                            </div>
                            </form>
	        			</div>
                                </div>

                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold">₹<?php echo $row['price']*$row['qty'];?></h3>
                                    <div class="text-muted strike">₹<?php echo $row['discount'];?></div>
                                    <div class="col-md-2" style="" >
                                <span class="btn-success" style="padding:2px 5px;font-size:12px; border-radius:5px;">
                                    <?php echo $rate;echo "★"; ?>
                                </span>
								  </div>

                                    

                                    <a href="cart_remove.php?id=<?php echo $row['cart']; ?>" class="round-black-btn mt-4 text-white"><i class="icon-cart-add mr-2"></i> Remove</a>
                                </div>
                            </div>
                        </div>
    


<?php

      }
      echo "           
      </div></div></div>
</div>";

$r = $db->prepare("select count(c.id) as no1,sum(p.price*c.quantity) as amt from product p,cart c where c.p_id=p.id and c.c_id='$c'");
$r->execute();
$r1 = $r->fetch();
?>

    <div class="card1 col-md-3 mt-50 mb-50" style="">
        <h2>Summery</h2><hr><br>
        <div style="display:flex;justify-content:space-between">
        <label style="color:black;font-size:18px;font-weight:500">Items</label>
        <label style="color:black;font-size:18px;font-weight:500"><?php echo $r1['no1'];?></label>
        </div>
        <div style="display:flex;justify-content:space-between">
        <label style="color:black;font-size:18px;font-weight:500">Price</label>
        <label style="color:black;font-size:18px;font-weight:500"><?php echo $r1['amt'];?></label>
        </div>
        <div style="display:flex;justify-content:space-between">
        <label style="color:black;font-size:18px;font-weight:500">Shipping Charge</label>
        <label style="color:black;font-size:18px;font-weight:500">0</label>
        </div>
        <hr>
        <div style="display:flex;justify-content:space-between">
        <label style="color:black;font-size:18px;font-weight:500">Total Amount</label>
        <label style="color:black;font-size:18px;font-weight:500"><?php echo $r1['amt'];?></label>
        </div>
        <div style="display:flex;">
        <?php
        $pay = $db->prepare("select * from customer where id='$c'");
        $pay->execute();
        $r2 = $pay->fetch();
        ?>
        <form method="post" action="payment/pay.php">
            <input type="hidden" name="name" value="<?php echo $r2['f_name'];?>">
            <input type="hidden" name="email" value="<?php echo $r2['email'];?>">
            <input type="hidden" name="contact" value="<?php echo $r2['phone'];?>">
            <input type="hidden" name="amount" value="<?php echo $r1['amt'];?>">
            <input type="submit" value="Check Out" class="round-black-btn">
        </form>
           <!-- <a href="payment.php" class="round-black-btn">Check Out</a> -->
        </div>
    </div>
</div>

<?php

    }
    else{
        ?>
        <div class="empty-state" style="margin-left:400px;">
  <div class="empty-state__content">
    <div class="empty-state__icon">
      <img src="no.png" alt="">
    </div>
    </div>
    <div class="er1">Sorry, Cart is empty!</div>
   
  
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



                                        
                    



    