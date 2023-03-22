<?php
include('apps/connect/db.php');
include("auth.php");
if(!isset($_SESSION))
session_start();
$c=$_SESSION['USER_ID'];
$p=$_GET['id'];
$result = $db->prepare("select * from wishlist where c_id='$c' and p_id='$p'");
    $result->execute();
          $count = $result->rowcount();
          if($count>0)
          {
            echo "<script>
						alert('Item Already Added');
						history.back();
					</script>";
					exit();
          }
          else
          {
            $sql = "insert into wishlist(c_id,p_id) VALUES 
            ('$c','$p')";
            $q1 = $db->prepare($sql);
            $q1->execute();
           // header("location:product_detail.php?id=$p");
           echo "<script>
						
						history.back();
					</script>";
					exit();
          }
 
?>