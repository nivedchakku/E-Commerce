<?php include("header.php");
include('../../apps/connect/db.php');
?>
<head>
<link rel="stylesheet" href="../seller/css/bootstrap.min.css">
	<link rel="stylesheet" href="../seller/css/font-awesome.min.css">
	<link rel="stylesheet" href="../seller/css/ionicons.min.css">
	<link rel="stylesheet" href="../seller/css/datepicker3.css">
	<link rel="stylesheet" href="../seller/css/all.css">
	<link rel="stylesheet" href="../seller/css/select2.min.css">
	<link rel="stylesheet" href="../seller/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../seller/css/jquery.fancybox.css">
	<link rel="stylesheet" href="../seller/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../seller/css/_all-skins.min.css">
	<link rel="stylesheet" href="../seller/css/on-off-switch.css"/>
	<link rel="stylesheet" href="../seller/css/summernote.css">
	<link rel="stylesheet" href="style.css">
    <style>
	.full_content{
		
		margin-left:200px;
	}


	</style>
</head>
<body>



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
                                <th width="160">Seller Name</th>
								<th width="60">Price</th>
								<th width="60">Offer Price</th>
								<th width="60">Quantity</th>
								<th>customizable?</th>
								<th>Category</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$result = $db->prepare("select p.*,c.name as name1,s.name as seller from product p,category c,seller s where c.id=p.c_id and p.s_id=s.id order by rand()");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++)
								{
									$p=$row['id'];
									$result1 = $db->prepare("select image from p_image where p_id='$p'");
								$result1->execute();
								$img='';
								for($j=0; $row1 = $result1->fetch(); $j++)
								{
									$img='../seller/uploads/';
									$img.=$row1['image'];
									break;
								}
								
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td style="width:82px;"><img src="<?php echo $img; ?>" alt="<?php echo $img ?>" style="width:80px;"></td>
										<td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['seller']; ?></td>
										<td>₹<?php echo $row['price']; ?></td>
										<td>₹<?php echo $row['discount']; ?></td>
										<td><?php echo $row['quantity']; ?></td>
										<td>
											<?php if($row['customizable'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">Yes</span>';} else {echo '<span class="badge badge-success" style="background-color:red;">No</span>';} ?>
										</td>
										
										<td><?php echo $row['name1']; ?></td>
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