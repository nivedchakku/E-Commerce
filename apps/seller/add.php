<?php
session_start();
include('../../apps/connect/db.php');
$seller_id=$_SESSION['SELLER_ID'];	

	 $name=$_POST["p_name"];
	 $c_id=$_POST["cat_id"];
	 $price=$_POST["price"];
     $discount=$_POST['discount'];
	 $color=$_POST["color"];
	 $qty=$_POST["qty"];
	 $desc=$_POST["short_description"];
	 $s_desc=$_POST["description"];
     $return=$_POST["return"];
     $custom=$_POST["custom"];
	 $status=1;	
     $date = date('m/d/Y h:i:s', time());
	 if(isset($_POST['add_product']))
	{
     $image = addslashes(file_get_contents($_FILES['f_photo']['tmp_name']));
	 $image_name = addslashes($_FILES['f_photo']['name']);
	 $image_size = getimagesize($_FILES['f_photo']['tmp_name']);
	 move_uploaded_file($_FILES["f_photo"]["tmp_name"], "uploads/" . $_FILES["f_photo"]["name"]);
	 $photo1 = $_FILES["f_photo"]["name"];
     
     $image = addslashes(file_get_contents($_FILES['photo1']['tmp_name']));
	 $image_name = addslashes($_FILES['photo1']['name']);
	 $image_size = getimagesize($_FILES['photo1']['tmp_name']);
	 move_uploaded_file($_FILES["photo1"]["tmp_name"], "uploads/" . $_FILES["photo1"]["name"]);
	 $photo2 = $_FILES["photo1"]["name"];

     $image = addslashes(file_get_contents($_FILES['photo2']['tmp_name']));
	 $image_name = addslashes($_FILES['photo2']['name']);
	 $image_size = getimagesize($_FILES['photo2']['tmp_name']);
	 move_uploaded_file($_FILES["photo2"]["tmp_name"], "uploads/" . $_FILES["photo2"]["name"]);
	 $photo3 = $_FILES["photo2"]["name"];

     $image = addslashes(file_get_contents($_FILES['photo3']['tmp_name']));
	 $image_name = addslashes($_FILES['photo3']['name']);
	 $image_size = getimagesize($_FILES['photo3']['tmp_name']);
	 move_uploaded_file($_FILES["photo3"]["tmp_name"], "uploads/" . $_FILES["photo3"]["name"]);
	 $photo4 = $_FILES["photo3"]["name"];

	 $image = addslashes(file_get_contents($_FILES['photo4']['tmp_name']));
	 $image_name = addslashes($_FILES['photo4']['name']);
	 $image_size = getimagesize($_FILES['photo4']['tmp_name']);
	 move_uploaded_file($_FILES["photo4"]["tmp_name"], "uploads/" . $_FILES["photo4"]["name"]);
	 $photo5 = $_FILES["photo4"]["name"];

$sql = "insert into product(c_id,s_id,name,price,discount,color,quantity,description,s_description,return_policy,customizable,status,date) VALUES ('$c_id','$seller_id','$name','$price','$discount','$color','$qty','$desc','$s_desc','$return','$custom','$status','$date')";
$q1 = $db->prepare($sql);
$q1->execute();
$result = $db->prepare("SELECT id FROM product  where id=(SELECT LAST_INSERT_ID());");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++)
    {
        $p_id=$row['id'];
    }
    $sql = "insert into p_image(image,p_id) VALUES ('$photo1','$p_id'),('$photo2','$p_id'),('$photo3','$p_id'),('$photo4','$p_id'),('$photo5','$p_id')";
    $q1 = $db->prepare($sql);
    $q1->execute();
header("location:product.php");
}
if(isset($_POST['update']))
{
	$p_id=$_POST["p_id"];
	$sql = "update product set c_id='$c_id',name='$name',price='$price',discount='$discount',color='$color',quantity='$qty',description='$desc',s_description='$s_desc',return_policy='$return',customizable='$custom' where id='$p_id';";
$q1 = $db->prepare($sql);
$q1->execute();
header("location:product.php");
}
?>