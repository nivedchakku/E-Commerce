<?php
include('apps/connect/db.php');
$id=$_GET['id'];

$sql = "delete from cart where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();

header("location:cart.php");




?>