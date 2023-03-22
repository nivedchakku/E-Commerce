<?php 

include("header.php");
include('../../apps/connect/db.php');
$seller_id=$_SESSION['SELLER_ID'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css"/>
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">
  <style>

</style>
</head>
<body>
    
<div class="full_content" style="padding:0px 200px">
<section class="content-header" style="display:flex;justify-content:space-between">

		<h1 class="col-lg-3">Cancelled Orders</h1>
	
		<a href="add_product.php" class="btn btn-primary btn-sm" style="float:right;margin:0px 750px;">Add Product</a>
</section>

<section class="content">
	<div class="row">
		<div class="">
			<div class="box box-info">
				<div class="">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th width="160">Product Name</th>
                                <th width="160">Customer Details</th>
								<th width="60">Quantity</th>
                                <th>Custom Design</th>
								<th>Description</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							$result = $db->prepare("select p.name as p_name,p.id as p_id,p.customizable as customizable,pay.status as p_status,o.c_id as c_id,op.* from product p,payment pay,orders o,ordered_products op where op.order_id=o.id and o.id=pay.order_id and op.p_id=p.id and p.s_id='$seller_id' and op.status=0");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++)
								{
									$p=$row['p_id'];
									
								
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td style="width:82px;"><?php echo $p ?></td>
										<td class="col-lg-2"><?php echo $row['p_name']; ?></td>
										<td><a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">Details</a></td>
										<td><?php echo $row['quantity']; ?></td>
										<?php
                                        if($row['customizable']==0)
										{
											echo "<td> NO </td>";
										}
										else {
										?>
                                        <td style="width:82px;"><img src="<?php echo "../order/".$row['custom_image']; ?>"  style="width:80px;"></td>
										<?php } ?>
										<td><?php echo $row['description']; ?></td>
										<td class="col-lg-2">										
											 <div style="color:green;">Refunded</div>
										</td>   
									</tr>
                                    <?php
                                    $c=$row['c_id'];
                                    $result2 = $db->prepare("select * from customer where id='$c'");
                                    $result2->execute();
                                    $row1=$result2->fetch();

                                    ?>
                                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Customer Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div style="display:flex; justify-content:space-between; padding:0px 100px 0px 30px;">
                                                <div>Name:</div>
                                                <div><?php echo $row1['f_name']." ".$row1['l_name'];?></div>
                                                </div>
                                                <div style="display:flex; justify-content:space-between; padding:0px 100px 0px 30px;">
                                                <div>Contact:</div>
                                                <div><?php echo $row1['phone'];?></div>
                                                </div>
                                                <div style="display:flex; justify-content:space-between; padding:0px 100px 0px 30px;">
                                                <div>Delivery Address:</div>
                                                <div><?php echo $row1['address'];?><br>
                                                <?php echo $row1['city'].", ".$row1['state'];?>
                                                <br><?php echo $row1['pin'];?></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>

                                        </div>
                                    </div>




									<?php

								}
							
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</body>
</html>