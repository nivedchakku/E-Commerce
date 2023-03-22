<!DOCTYPE html>
<html>
<head>
  <style>

</style>
</head>
<body>
<?php include("header.php");
include('../../apps/connect/db.php');
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
		margin:0px 200px 0px 200px;
	}
	</style>

<div class="full_content">

<section class="content-header" style="display:flex;">
		<h1>Add_Product</h1>

		<a href="product.php" class="btn btn-primary btn-sm" style="float:right;margin:0px 750px;">View All</a>
</section>


<section class="content" style="border:1px;">

	<div class="row">
		<div class="col-md-12">

			

			<form class="form-horizontal" action="add.php" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="cat_id" class="form-control select2 top-cat">
									<option value="">Select Top Level Category</option>
									<?php
                                    $result = $db->prepare("SELECT * FROM category");
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++)
                                    {
                                        ?>
										<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_name" class="form-control">
							</div>
						</div>	
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Offer Price <span>*</span><br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control">
							</div>
						</div>	

                        <div class="form-group">
							<label for="" class="col-sm-3 control-label">price <br><span style="font-size:10px;font-weight:normal;"></span></label>
							<div class="col-sm-4">
								<input type="text" name="discount" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="qty" class="form-control">
							</div>
						</div>
						
                        <div class="form-group">
							<label for="" class="col-sm-3 control-label">Color<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="color" class="form-control">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="f_photo">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Other Photos<span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
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
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Customizable?</label>
							<div class="col-sm-8">
								<select name="custom" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="20" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description</label>
							<div class="col-sm-8">
								<textarea name="short_description" class="form-control" cols="30" rows="10" id="editor2"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Return Policy</label>
							<div class="col-sm-8">
								<textarea name="return" class="form-control" cols="30" rows="10" id="editor5"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-success pull-left btn_lg" name="add_product" value="ADD">
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

</div>
