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

<?php
include("header.php");
include('../../apps/connect/db.php');
$seller_id=$_SESSION['SELLER_ID'];
?>
	<style>
	.full_content{
		margin:0px 200px 0px 200px;
	}
	</style>

<div class="full_content">

<section class="content-header" style="display:flex;">
		<h1>Edit</h1>
		<a href="product.php" class="btn btn-primary btn-lg"  style="float:right;margin:0px 750px;">View All</a>
</section>


<section class="content" style="border:1px;">

	<div class="row">
		<div class="col-md-12">

		<?php
		$product_id=$_GET['id'];
            $result1 = $db->prepare("SELECT p.*,c.id as category_id,c.name as cat FROM category c,product p where p.c_id=c.id and p.id=$product_id; ");
            $result1->execute();
            $row1 = $result1->fetch();
?>
			<form class="form-horizontal" action="add.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="p_id" value="<?php echo $product_id;?>">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="cat_id" class="form-control select2 top-cat" >
									<option value="<?php echo $row1['category_id'];?>"><?php echo $row1['cat'];?></option>
									<?php
                                    $result = $db->prepare("SELECT * FROM category");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++)
                                    {
                                        ?>
										<option value="<?php echo $row1['id'];?>" ><?php echo $row['name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_name" class="form-control" value="<?php echo $row1['name'];?>">
							</div>
						</div>	
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Offer Price <span>*</span><br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control" value="<?php echo $row1['price'];?>">
							</div>
						</div>	

                        <div class="form-group">
							<label for="" class="col-sm-3 control-label">Price <br><span style="font-size:10px;font-weight:normal;">(In %)</span></label>
							<div class="col-sm-4">
								<input type="text" name="discount" class="form-control" value="<?php echo $row1['discount'];?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="qty" class="form-control" value="<?php echo $row1['quantity'];?>">
							</div>
						</div>
						
                        <div class="form-group">
							<label for="" class="col-sm-3 control-label">Color<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="color" class="form-control" value="<?php echo $row1['color'];?>">
							</div>
						</div>
						


						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Customizable?</label>
							<div class="col-sm-8">
								<select name="custom" class="form-control" style="width:auto;">
								<option value="<?php echo $row1['customizable'];?>"><?php if($row1['customizable']==1) echo "Yes";else echo "No";?></option>
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="20" rows="10" value=""><?php echo $row1['description'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description</label>
							<div class="col-sm-8">
								<textarea name="short_description" class="form-control" cols="30" rows="10" id="editor2" value=""><?php echo $row1['s_description'];?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Return Policy</label>
							<div class="col-sm-8">
								<textarea name="return" class="form-control" cols="30" rows="10" id="editor5" value=""><?php echo $row1['return_policy'];?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-success pull-left btn-lg" name="update" value="Update">
								<a href="product.php" class="btn btn-danger pull-right btn-lg" style="padding:6px 20px;">Back</a>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

</div>