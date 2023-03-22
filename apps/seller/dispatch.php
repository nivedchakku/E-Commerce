<?php
include('../../apps/connect/db.php');
$id=$_GET['id'];

$sql = "update ordered_products set status='2' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();
header("location:pending.php");

?>