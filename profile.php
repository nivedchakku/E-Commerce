<?php 
include("auth.php");
include("header.php");
include('apps/connect/db.php');
$c=$_SESSION['USER_ID'];

if(isset($_POST['update']))
{
    echo "hello";
    $name1=$_POST["f_name"];
    $name2=$_POST["l_name"];	 	 	 
    $phone=$_POST["contact"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $pin=$_POST["pin"];
    $email=$_POST["email"];	 	 	 	 	 	 

   
$sql = "update customer set f_name='$name1',l_name='$name2',email='$email',phone='$phone',address='$address',state='$state',city='$city',pin='$pin' where id='$c'";
$q1 = $db->prepare($sql);
$q1->execute();
}




?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            /* Import Font Dancing Script */
@import url(https://fonts.googleapis.com/css?family=Dancing+Script);

* {
    margin: 0;
}

body {
    
    font-family: Arial;
    overflow: hidden;
    
}

/* NavbarTop */

/* Main */
.main {
    margin-top: 2%;
    margin-left: 20%;
    font-size: 28px;
    padding: 0 10px;
    width: 58%;
}

.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
}

.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    width: 80%;
}

.edit {
    position: absolute;
    color: #e7e7e8;
    right: 14%;
    padding:2px 10px;
}

label{
    font-size:12px;
    font-weight:300;

}

input[type="text"]{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 14px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}


/* End */
            </style>
</head>
<body>
    <?php
    $result = $db->prepare("select * from customer where id='$c'");
    $result->execute();
    $row=$result->fetch();
    ?>
<div class="main">
        <div class="card">
            <div class="card-body">
            <a type="button" class="btn btn-success edit" data-toggle="modal" data-target="#myModal">Edit</a>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $row['f_name']." ".$row['l_name']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <td>Contact </td>
                            <td>:</td>
                            <td><?php echo $row['phone'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $row['address']."<br>".$row['city'].", ".$row['state'].", ".$row['pin'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Customer Details</h4>
                                            </div>
                                            <div class="main">
                                            <form method="post" action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><label>First_Name:</label></td>
                                                        
                                                        <td><input type="text" name="f_name" class="in" value="<?php echo $row['f_name']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Last_Name:</label></td>
                                                        
                                                        <td><input type="text" name="l_name" class="in" value="<?php echo $row['l_name']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Email:</label></td>
                                                        
                                                        <td><input type="text" name="email" class="in" value="<?php echo $row['email'];?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Contact:</label> </td>
                                                        
                                                        <td><input type="text" name="contact" class="in" value="<?php echo $row['phone'];?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Address:</label></td>
                                                        
                                                        <td><input type="text" name="address" class="in" value="<?php echo $row['address'];?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>City:</label></td>
                                                        
                                                        <td><input type="text" name="city" class="in" value="<?php echo $row['city']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>State:</label></td>
                                                        
                                                        <td><input type="text" name="state" value="<?php echo $row['state']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Pincode:</label></td>
                                                        
                                                        <td><input type="text" name="pin" value="<?php echo $row['pin']?>"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-success" value="Update" name="update">
                                            </form>
                                            </div>
                                          </div>

                                        </div>
                                    </div>
                                    
</body>

</html>
