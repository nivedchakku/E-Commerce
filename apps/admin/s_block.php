<?php
include('../../apps/connect/db.php');
$id=$_GET['id'];

$sql = "update seller set status='0' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();
header("location:sellers.php");

?>