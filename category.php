<?php include("header.php");
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

<div style="overflow:auto;">
<?php

$cat=$_GET['id'];

      $result = $db->prepare("select p.* from product p,category c where p.c_id=c.id and c.id='$cat' order by rand()");  
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
        $c=$row['c_id'];
		$result1 = $db->prepare("select name from category where id='$c'");
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
                                        <li class="list-inline-item"><a href="product_detail.php?id=<?php echo $row['id']; ?>" class="text-muted" data-abc="true"><?php echo $row1['name'];?></a></li>
                                    </ul>

                                    <p class="mb-3"><?php echo$row['s_description'];?></p>

                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item"><?php if($row['customizable']==1)echo "CUSTOMIZABLE";?></li>
                                        
                                    

                                    </ul>
                                </div>

                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold">₹<?php echo $row['price'];?></h3>
                                    <div class="text-muted strike">₹<?php echo $row['discount'];?></div>
                                    <div class="reviews-counter" style="display:flex;">
								<div class="col-md-2" >
                                <span class="btn-success" style="padding:2px 5px;font-size:12px; border-radius:5px;">
                                    <?php echo $rate;echo "★"; ?>
                                </span>
								  </div>
								<div style="padding:0px 0px 0px 0px;"><?php echo $r_row['no'];?> Reviews</div>
							</div>

                                    

                                    <a href="product_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</a>
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
    Please check the spelling or try searching for something else
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



                                        
                    



    