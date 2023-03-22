
<?php
include('apps/connect/db.php');
session_start();
$c=$_SESSION['USER_ID'];

    $rate=$_POST['rate'];
    $review=$_POST['review'];
    $product=$_POST['product'];

    $date = date('Y/m/d h:i:s', time());	

   
$sql = "insert into review(c_id,p_id,rating,review,date) VALUES 
    ('$c','$product','$rate','$review','$date')";
    $q1 = $db->prepare($sql);
    $q1->execute();
    
    header("location:product_detail.php?id=$product");
 
?>