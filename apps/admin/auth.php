<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['ADMIN_ID']) || (trim($_SESSION['ADMIN_ID']) == '')) {
	header("location:../../login.php");
	exit();
}

?>