<?php
include('apps/connect/db.php');
$id=$_POST['id'];
$qty=$_POST['quantity'];
if(isset($_POST['inc']))
{
    $qty++;
$sql = "update cart set quantity='$qty' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();


header("location:cart.php");
}
if(isset($_POST['min']))
{
    $qty--;
$sql = "update cart set quantity='$qty' where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();


header("location:cart.php");
}




?>