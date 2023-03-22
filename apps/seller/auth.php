<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['SELLER_ID']) || (trim($_SESSION['SELLER_ID']) == '')) {
	header("location:../../login.php");
	exit();
}

?>