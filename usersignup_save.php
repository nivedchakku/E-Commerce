<?php
session_start();
include("apps/connect/db.php");
	
if(isset($_POST['customer']))
{
	 $name1=$_POST["f_name"];
	 $name2=$_POST["s_name"];	 	 	 
	 $phone=$_POST["mob"];
	 $address=$_POST["address"];
     $city=$_POST["city"];
     $state=$_POST["state"];
     $pin=$_POST["pin"];
	 $email=$_POST["email"];	 	 	 
	 $password=$_POST["pass"];	 	 	 
	 $date = date('Y/m/d h:i:s', time());	

	
$sql = "insert into customer(f_name,l_name,email,phone,address,state,city,pin,password,status,date) VALUES 
('$name1','$name2','$email','$phone','$address','$state','$city','$pin','$password',1,'$date')";
$q1 = $db->prepare($sql);
$q1->execute();

header("location:login.php");
}

if(isset($_POST['seller']))
{
    $name=$_POST["name"];
    $S_name=$_POST["s_name"];	 	 	 
    $phone=$_POST["mob"];
    $address=$_POST["address"];
    $license=$_POST["license"];
    $email=$_POST["email"];	 	 	 
    $password=$_POST["pass"];	 	 	 
    $date = date('Y/m/d h:i:s', time());	

   
$sql = "insert into seller(name,shop_name,phone,email,password,address,license_no,status,date) VALUES 
('$name','$S_name','$phone','$email','$password','$address','$license',1,'$date')";
$q1 = $db->prepare($sql);
$q1->execute();

header("location:login.php");


}
if(isset($_POST['login']))
{
    $email = $_POST['email'];
	$password = $_POST['password'];
	$qry = $db->prepare("SELECT * FROM customer WHERE email='$email' and password='$password'");
	$qry->execute();
	$count = $qry->rowcount();
	$rows = $qry->fetch();

    $qry1 = $db->prepare("SELECT * FROM seller WHERE email='$email' and password='$password'");
	$qry1->execute();
	$count1 = $qry1->rowcount();
	$rows1 = $qry1->fetch();

	$qry2 = $db->prepare("SELECT * FROM admin WHERE email='$email' and password='$password'");
	$qry2->execute();
	$count2 = $qry2->rowcount();
	$rows2 = $qry2->fetch();
	//Check whether the query was successful or not
	if($count > 0) {
		if($rows['status']==1)
		{
			//Login Successful
			session_regenerate_id();
			$_SESSION['USER_ID'] = $rows['id'];
			session_write_close();
			header("location:index.php"); 
			exit();
			}
		else
			{
					echo "<script>
						alert('Your Account was Blocked For any queries contact admin admin@customcart.com');
						window.location='login.php'
					</script>";
					exit();
			}	
	}
    elseif($count1 > 0)
    {
        if($rows1['status']==1)
		{
		//Login Successful
		session_regenerate_id();
		
		$_SESSION['SELLER_ID'] = $rows1['id'];
		session_write_close();
		echo $rows1['id'];
		header("location:apps/seller/index.php");
		exit();
		}
		else
			{
			
					echo "<script>
						alert('Your seller Account was Blocked For any queries contact admin admin@customcart.com');
						window.location='login.php'
					</script>";
					
					exit();
			}
    }
	elseif($count2 > 0)
    {
		session_regenerate_id();
		
		$_SESSION['ADMIN_ID'] = $rows2['id'];
		session_write_close();
		header("location:apps/admin/index.php");
	}
	else 
	{
		//Login failed
		echo "<script>alert('Check your username and password and try again.'); window.location='login.php'</script>";
		exit();
	}


}



?>