<?php
include('apps/connect/db.php');
session_start();
include('auth.php');

$c=$_SESSION['USER_ID'];

if(isset($_POST['add']))
{
    $size=$_POST['size'];
    $color=$_POST['color'];
    $req=$_POST['req'];
    $quantity=$_POST['quantity'];
    $product=$_POST['product'];
    $description=$_POST['req'];
    $result = $db->prepare("select * from cart where c_id='$c' and p_id='$product'");
    $result->execute();
          $count = $result->rowcount();
          if($count>0)
          {
            echo "<script>
						alert('Item Already Added');
						history.back();
					</script>";
					exit();
          }
  else
    {
    if(isset($_FILES['design']))
	{
     $image = addslashes(file_get_contents($_FILES['design']['tmp_name']));
	 $image_name = addslashes($_FILES['design']['name']);
	 $image_size = getimagesize($_FILES['design']['tmp_name']);
	 move_uploaded_file($_FILES["design"]["tmp_name"], "apps/order/" . $_FILES["design"]["name"]);
	 $photo1 = $_FILES["design"]["name"];
    }

    $date = date('Y/m/d h:i:s', time());	

   
  $sql = "insert into cart(c_id,p_id,color,size,quantity,description,custom_image,date) VALUES 
    ('$c','$product','$color','$size', '$quantity','$description','$photo1','$date')";
    $q1 = $db->prepare($sql);
    $q1->execute();
    
    header("location:product_detail.php?id=$product");
  }

}

 
?>