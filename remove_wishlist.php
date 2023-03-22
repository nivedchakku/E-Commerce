<?php
include('apps/connect/db.php');
include("auth.php");
$id=$_GET['id'];
$sql = "delete from wishlist where id='$id'";
$q1 = $db->prepare($sql);
$q1->execute();

echo "<script>
						history.back();
					</script>";
//header("location:wishlist.php");




?>