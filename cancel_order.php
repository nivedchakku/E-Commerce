<?php
include('apps/connect/db.php');
$id=$_GET['id'];

$r2 = $db->prepare("SELECT p_id,quantity FROM  ordered_products where id='$id'");
$r2->execute();
$row2=$r2->fetch();
$qty=$row2['quantity'];
$p=$row2['p_id'];

$sql = "update ordered_products set status='0' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();

$sql = "UPDATE product SET quantity=quantity+$qty WHERE id='$p'";
$q4 = $db->prepare($sql);
$q4->execute();

header("location:orders.php");

?> 