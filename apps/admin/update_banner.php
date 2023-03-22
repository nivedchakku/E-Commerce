
<?php

include('../../apps/connect/db.php');

$image = addslashes(file_get_contents($_FILES['f_photo']['tmp_name']));
	 $image_name = addslashes($_FILES['f_photo']['name']);
	 $image_size = getimagesize($_FILES['f_photo']['tmp_name']);
	 move_uploaded_file($_FILES["f_photo"]["tmp_name"], "banner/" . $_FILES["f_photo"]["name"]);
	 $photo1 = $_FILES["f_photo"]["name"];
     
     $image = addslashes(file_get_contents($_FILES['photo1']['tmp_name']));
	 $image_name = addslashes($_FILES['photo1']['name']);
	 $image_size = getimagesize($_FILES['photo1']['tmp_name']);
	 move_uploaded_file($_FILES["photo1"]["tmp_name"], "banner/" . $_FILES["photo1"]["name"]);
	 $photo2 = $_FILES["photo1"]["name"];

     $image = addslashes(file_get_contents($_FILES['photo2']['tmp_name']));
	 $image_name = addslashes($_FILES['photo2']['name']);
	 $image_size = getimagesize($_FILES['photo2']['tmp_name']);
	 move_uploaded_file($_FILES["photo2"]["tmp_name"], "banner/" . $_FILES["photo2"]["name"]);
	 $photo3 = $_FILES["photo2"]["name"];

     $image = addslashes(file_get_contents($_FILES['photo3']['tmp_name']));
	 $image_name = addslashes($_FILES['photo3']['name']);
	 $image_size = getimagesize($_FILES['photo3']['tmp_name']);
	 move_uploaded_file($_FILES["photo3"]["tmp_name"], "banner/" . $_FILES["photo3"]["name"]);
	 $photo4 = $_FILES["photo3"]["name"];

	 $image = addslashes(file_get_contents($_FILES['photo4']['tmp_name']));
	 $image_name = addslashes($_FILES['photo4']['name']);
	 $image_size = getimagesize($_FILES['photo4']['tmp_name']);
	 move_uploaded_file($_FILES["photo4"]["tmp_name"], "banner/" . $_FILES["photo4"]["name"]);
	 $photo5 = $_FILES["photo4"]["name"];

     $sql = "insert into banner(image_name) VALUES ('$photo1'),('$photo2'),('$photo3'),('$photo4'),('$photo5')";
     $q1 = $db->prepare($sql);
     $q1->execute();
     header("location:index.php");
     ?>