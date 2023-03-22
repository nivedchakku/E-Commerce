<?php include("header.php");
include('../../apps/connect/db.php');
$s=$_SESSION['SELLER_ID'];

if(isset($_POST['update']))
{

    $name=$_POST["name"];
    $s_name=$_POST["shop_name"];	 	 	 
    $phone=$_POST["contact"];
    $address=$_POST["address"];
    $license=$_POST["license_no"];
    $email=$_POST["email"];	 	 	 	 	 	 

   
$sql = "update seller set name='$name',shop_name='$s_name',email='$email',phone='$phone',address='$address',license_no='$license' where id='$s'";
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
    $result = $db->prepare("select * from seller where id='$s'");
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
                            <td><?php echo $row['name'];?></td>
                        </tr>
                        <tr>
                            <td>Shop Name</td>
                            <td>:</td>
                            <td><?php echo $row['shop_name'];?></td>
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
                            <td>License No </td>
                            <td>:</td>
                            <td><?php echo $row['license_no'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $row['address'];?></td>
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
                                                        <td><label>Name:</label></td>
                                                        
                                                        <td><input type="text" name="name" class="in" value="<?php echo $row['name']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Shop_Name:</label></td>
                                                        
                                                        <td><input type="text" name="shop_name" class="in" value="<?php echo $row['shop_name']?>"></td>
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
                                                        <td><label>License_no:</label></td>
                                                        
                                                        <td><input type="text" name="license_no" class="in" value="<?php echo $row['license_no']?>"></td>
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