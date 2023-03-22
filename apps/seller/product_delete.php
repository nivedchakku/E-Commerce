<?php
include('../../apps/connect/db.php');
$p_id=$_GET["id"];
	$sql = $db->prepare("delete from product where id='$p_id'");
    $sql->execute();
    $sql2 = $db->prepare("delete from P_image where p_id='$p_id'");
    $sql2->execute();
    $sql3 = $db->prepare("delete from cart where p_id='$p_id'");
    $sql3->execute();
    $sql4 = $db->prepare("delete from wishlist where p_id='$p_id'");
    $sql4->execute();
header("location:product.php");
?>