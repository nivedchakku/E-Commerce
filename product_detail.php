<html>
    <?php include("header.php");
include('apps/connect/db.php');

?>
    <head>
        <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
        <link rel="stylesheet" href="assets/css/p_detail.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style>
			
		</style>
		<script>
			$(document).ready(function() {
		    var slider = $("#slider");
		    var thumb = $("#thumb");
		    var slidesPerPage = 4; //globaly define number of elements per page
		    var syncedSecondary = true;
		    slider.owlCarousel({
		        items: 1,
		        slideSpeed: 2000,
		        nav: false,
		        autoplay: false, 
		        dots: false,
		        loop: true,
		        responsiveRefreshRate: 200
		    }).on('changed.owl.carousel', syncPosition);
		    thumb
		        .on('initialized.owl.carousel', function() {
		            thumb.find(".owl-item").eq(0).addClass("current");
		        })
		        .owlCarousel({
		            items: slidesPerPage,
		            dots: false,
		            nav: true,
		            item: 4,
		            smartSpeed: 200,
		            slideSpeed: 500,
		            slideBy: slidesPerPage, 
		        	navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
		            responsiveRefreshRate: 100
		        }).on('changed.owl.carousel', syncPosition2);
		    function syncPosition(el) {
		        var count = el.item.count - 1;
		        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
		        if (current < 0) {
		            current = count;
		        }
		        if (current > count) {
		            current = 0;
		        }
		        thumb
		            .find(".owl-item")
		            .removeClass("current")
		            .eq(current)
		            .addClass("current");
		        var onscreen = thumb.find('.owl-item.active').length - 1;
		        var start = thumb.find('.owl-item.active').first().index();
		        var end = thumb.find('.owl-item.active').last().index();
		        if (current > end) {
		            thumb.data('owl.carousel').to(current, 100, true);
		        }
		        if (current < start) {
		            thumb.data('owl.carousel').to(current - onscreen, 100, true);
		        }
		    }
		    function syncPosition2(el) {
		        if (syncedSecondary) {
		            var number = el.item.index;
		            slider.data('owl.carousel').to(number, 100, true);
		        }
		    }
		    thumb.on("click", ".owl-item", function(e) {
		        e.preventDefault();
		        var number = $(this).index();
		        slider.data('owl.carousel').to(number, 300, true);
		    });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })            
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
		});
		</script>

    </head>

    <body>
        <?php
		if(isset($_SESSION['USER_ID']))
      	$c=$_SESSION['USER_ID'];
      	else
      	$c="";
        $product=$_GET['id'];
        $result = $db->prepare("select p.*,c.name as cat from product p,category c where p.c_id=c.id and p.id='$product'");
        $result->execute();
        $row = $result->fetch();
        $p=$row['id'];
		$result2 = $db->prepare("select image from p_image where p_id='$p'");
		$result2->execute();
        ?>
        
		

        <div class="pd-wrap">
		<div class="container">
	        
	        <div class="row">
	        	<div class="col-md-6">
	        		<div id="slider" class="owl-carousel product-slider">
                    <?php
		for($k=0; $row2 = $result2->fetch(); $k++)
		{
			$img='apps/seller/uploads/';
			$img.=$row2['image'];
			?>
						<div class="item">
						  	<img src="<?php echo $img;?>" />
						</div>
                        <?php
                        }
        $result2 = $db->prepare("select image from p_image where p_id='$p'");
		$result2->execute();
       
                        ?>
						
					</div>
					<div id="thumb" class="owl-carousel product-thumb">
                    <?php
		for($k=0; $row2 = $result2->fetch(); $k++)
		{
			$img='apps/seller/uploads/';
			$img.=$row2['image'];
			?>
						<div class="item">
						  	<img src="<?php echo $img;?>" />
						</div>
                        <?php
                        }
                        ?>
						
					</div>
                <?php

                $r_result = $db->prepare("select count(rating) as no,sum(rating) as sum from review where p_id='$p'");
                $r_result->execute();
                $r_row=$r_result->fetch();
                if ($r_row['no']!=0){
                $rate=$r_row['sum']/$r_row['no'];
				$rate=number_format($rate, 1, '.', '');}
                else
                $rate=0;
                ?>



	        	</div>
	        	<div class="col-md-6">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name"><?php echo $row['name'];?></div>
		        			<div class="reviews-counter" style="display:flex;">
								<div class="col-md-2" >
                                <span class="btn-success" style="padding:2px 5px;font-size:12px; border-radius:5px;">
                                    <?php echo $rate;echo "★"; ?>
                                </span>
								  </div>
								<span><?php echo $r_row['no'];?> Reviews</span>
								
								


									<?php
									$p=$row['id'];
									$result5 = $db->prepare("select * from wishlist where c_id='$c' and p_id='$product'");
									$result5->execute();
									if($result5->rowcount()>0)
									{
									$w1=$result5->fetch();
									?>
									<a href="remove_wishlist.php?id=<?php echo $w1['id']; ?>" data-abc="true"><i class='fa fa-heart' style='color: red;margin-left:80%;'></i></a>
									<?php } else{ ?>
									<a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-abc="true"><i class='fa fa-heart' style='color: black;margin-left:80%'></i></a>

									<?php } ?>



							</div>

							<div class="" style="display:flex;">
		        			<div class="product-price-discount"><span>₹<?php echo $row['price'];?></span><span class="line-through">₹<?php echo $row['discount'];?></span></div>
		        		</div>
						</div>
	        			<p><?php echo $row['description']."<br>"; echo $row['s_description'];?></p>
	        			<div class="row">
	        				<div class="col-md-6">
                            <form action="add_cart.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $product;?>" name="product">
	        					<!--<label for="size">Size</label>
								<select id="size" name="size" class="form-control">
									<option>S</option>
									<option>M</option>
									<option>L</option>
									<option>XL</option>
								</select>
	        				</div>
	        				<div class="col-md-6">  
	        					<label for="color">Color</label>
								<select id="color" name="color" class="form-control">
									<option>Blue</option>
									<option>Green</option>
									<option>Red</option>
								</select><br>
	        				</div>--> 	
	        			</div>
                        <?php
                        if($row['customizable']==1)
                        {
                        ?>
                        <div class="row">
                        <div class="col-md-6">
	        					<label for="size">Uplod Your Design</label>
								<input type="file" name="design" class="form-control" required>
								
	        				</div>
	        				<div class="col-md-6">
	        					<label for="color">Requirments</label>
								<textarea id="color" name="req" class="form-control" col="10"row="5" required></textarea>
	        				</div>
	        			</div>
                        </div>
                        <?php
                        }
                        ?>
	        			<div class="product-count">
	        				<label for="size">Quantity</label>
	        				
                            <div class="display-flex">
							    <div class="qtyminus">-</div>
							    <input type="text" name="quantity" value="1" class="qty">
							    <div class="qtyplus">+</div><br>
                            </div>
							<?php
							if($row['quantity']<1)
							echo "<div class='round-black-btn'>Out of Stock</div>";
							else
                            echo "<input type='submit' value='Add to Cart' name='add' class='round-black-btn'>"
							?>
                            </form>
	        			</div>
	        		</div>
	        	</div>
	        </div>
			<br><br><br><br>
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Ratings & Reviews</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                     
<?php
	$result = $db->prepare("select r.rating as rate,r.review as review,r.date as date,c.f_name as name from review r,customer c where c.id=r.c_id and p_id='$product'");
	$result->execute();
    for($k=0; $row = $result->fetch(); $k++)
	{

        
?>



<div style="width:100%;position:relative;">
    <div style="display:flex;" class="col-md-3">
        <span class="btn-success" style="padding:0px 8px;font-size:12px; border-radius:5px;">
            <?php echo $row['rate'];echo "★"; ?>

    </div>
    <div style="padding:5px;color:black; " class="">
        <span style="padding:10px;font-size:12px;">
            <?php echo $row['review']; ?>
        </span>
    </div>
    
    <div style="display:flex;justyfy-content:between;" class="col-md-4">
        <span class="" style="padding:2px;font-size:13px; border-radius:5px;color:gray;">
            <?php echo $row['name'];?>
        </span>
    
            <span style="font-size:11px;padding:4px 15px;color:gray;   ">
            <?php echo $row['date'];; ?>
            </span>
    </div>

</div>
<hr>
<?php }?>
                    </div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				  		<div class="review-heading">REVIEWS</div>
				  		<p class="mb-20">Post your Review.</p>
				  		<form class="review-form" method="post" action="add_review.php">
                          <input type="hidden" value="<?php echo $product;?>" name="product">
		        			<div class="form-group" style="width:300px;">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
                                <div class="">
                                <select id="size" name="rate" class="form-control">
									<option value="5">★★★★★</option>
									<option value="4">★★★★</option>
                                    <option value="3">★★★</option>
                                    <option value="2">★★</option>
                                    <option value="1">★</option>
								</select>
                                </div>
                                  
								</div>
							</div>
		        			<div class="form-group">
			        			<label>Your Review</label>
			        			<textarea name="review" class="form-control" rows="10"></textarea>
			        		</div>
			        		
					        <input type="submit" value="Submit Review" class="round-black-btn">
			        	</form>
				  	</div>
				</div>
			</div>
			
			</div>
	</div>

    </body>
</html>

