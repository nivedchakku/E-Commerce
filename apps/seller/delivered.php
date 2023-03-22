<?php
include('../../apps/connect/db.php');
$id=$_GET['id'];
$date = date('Y/m/d h:i:s', time());

$sql = "update ordered_products set status='3',delivery_date='$date' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();
header("location:pending.php");

?>