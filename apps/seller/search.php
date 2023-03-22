<!DOCTYPE html>
<html>
<head>
  <style>

</style>
</head>
<body>
<?php 

include("header.php");
include('../../apps/connect/db.php');
$seller_id=$_SESSION['SELLER_ID'];
?>

</div>

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
	.full_content{
		
		margin-left:200px;
	}


	</style>

<div class="full_content">
<section class="content-header" style="display:flex;">

		<h1>Products</h1>
	
		
</section>

<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">
				<div class="">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th width="160">Product Name</th>
								<th width="60">(C) Price</th>
								<th width="60">Discount</th>
								<th width="60">Quantity</th>
								<th>customizable?</th>
								<th>Category</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$s=$_POST['search'];
							$result = $db->prepare("select p.*,c.name as name1 from product p,category c where c.id=p.c_id and p.s_id='$seller_id' and (p.name like '%$s%' or p.id='$s')");
								$result->execute();
								for($i=1; $row = $result->fetch(); $i++)
								{
									$p=$row['id'];
									$result1 = $db->prepare("select image from p_image where p_id='$p'");
								$result1->execute();
								$img='';
								for($j=0; $row1 = $result1->fetch(); $j++)
								{
									$img='uploads/';
									$img.=$row1['image'];
									break;
								}
								
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td style="width:82px;"><img src="<?php echo $img; ?>" alt="<?php echo $img ?>" style="width:80px;"></td>
										<td><?php echo $row['name']; ?></td>
										<td>₹<?php echo $row['price']; ?></td>
										<td>₹<?php echo $row['discount']; ?></td>
										<td><?php echo $row['quantity']; ?></td>
										<td>
											<?php if($row['customizable'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">Yes</span>';} else {echo '<span class="badge badge-success" style="background-color:red;">No</span>';} ?>
										</td>
										
										<td><?php echo $row['name1']; ?></td>
										<td class="col-lg-2">										
											<a href="product_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
											<a href="product_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs">Delete</a>  
										</td>
									</tr>
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

<script>
$(document).ready(function(){
    $('table tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
	</script>