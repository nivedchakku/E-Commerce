<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
   
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/all.min.css" />

    <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #081828;
  padding: 30px;
}
.container{
  position: relative;
  max-width: 500px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}




.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #7d2ae8;
  
}



.input-box{
  display: block;
  align-items: center;
  height: 50px;
  width: 100%;
  float:right;
  margin: 10px 0;
  position: relative;
  padding:5px;

}
input{
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
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #7d2ae8;
}
.text{
    padding: 30px;
}

 a{
  color: #7d2ae8;
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #081828;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #5b13b9;
}
.forms .form-content label{
  color: #5b13b9;
}





        </style>

<script>
          function validateForm() {
  let x = document.forms["myForm"]["pass"].value;
  let y = document.forms["myForm"]["pass1"].value;
  if (x != y) {
    alert("Password does not match");
    return false;
  }
}
          </script>
   </head>
<body>
  <div class="container">
    
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Seller Register</div>  
          
            <form action="usersignup_save.php" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
              <div class="input-box">
                <label>Owner_Name: </label><br>
                <input type="text" name="name" placeholder="Name" required>
              </div>
              <div class="input-box">
                <label>Shop_Name: </label><br>
                <input type="text" name="s_name" placeholder="Shop Name" required>
              </div><br>
              <div class="input-box">
              <label>E_mail: </label><br>
                <input type="email" name="email" placeholder="Email ID" required>
              </div>
              <div class="input-box">
              <label>Mobile_no: </label><br>
                <input type="text" name="mob" placeholder="Mobile Number" required pattern="[0-9]{10,11}" maxlength="12">
              </div>
              <div class="input-box">
                <label>Address: </label><br>
                <input type="text" name="address" placeholder="Address" required>
              </div><br>
              <div class="input-box">
                <label>License: </label><br>
                <input type="text" name="license" placeholder="License Number" required>
              </div><br>

              <div class="input-box">
              <label>Password: </label><br>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
              <label>Confirm_Password: </label><br>
                <input type="password" name="pass1" placeholder="ReEnter your password" required>
              </div>



        <br><br>
              
              <div class="button input-box">
                <input type="submit" name="seller" value="Sumbit">
              </div>
              <div class="text">
              <a href="index.php" style="float:right;">Back</a></div>
              <div class="text">Existing customet? <a href="login.php">LogIn</a></div>
           
        </form>
      </div>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
