<?php
session_start();
unset($_SESSION['USER_ID']);
session_destroy();
header("location:index.php");

?>