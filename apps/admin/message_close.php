<?php
include('../../apps/connect/db.php');
$id=$_GET['id'];

$sql = "update message set status='1' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();
header("location:message.php");

?>