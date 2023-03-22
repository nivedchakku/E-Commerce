<head>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: arial;
}

.fixed-positioning {
  position: fixed;
  bottom: 0;
  right: 0;
  z-index: 1;
}

.chat-box {
  width: 350px;
/*   border-radius: 3px; */
  box-shadow: -10px 10px 50px -10px rgba(0,0,0,0.4);
  background: #fff;
  overflow: hidden;
}

.chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px;
  color: #fff;
  background: #081828;
}

.chat-header button {
  color:#fff;
  background: transparent;
  padding: 3px;
  border: 1px solid #fff;
  border-radius: 3px;
  cursor:pointer;
}

.chat-content {
  padding: 0 15px;
  max-height: 0;
  overflow: hidden;
  transition: 1s ease-in-out;
}

.chat-content.active {
  padding: 15px 15px;
}

.chat-title {
  margin-bottom: 15px;
  text-align: center;
}

.chat-form {
  padding: 15px;
}

.chat-box input,
.chat-box textarea,
.chat-box label,
.chat-box button[type=submit] {
  display: block;
  width: 100%
}

.chat-box input,
.chat-box textarea {
  padding: 10px 15px;
  border-radius: 3px;
  border: 1px solid #b7b5b5;
  margin-bottom: 15px;
}

.chat-box textarea {
  min-height: 50px;
}

.chat-box label {
  color: #928f8f;
  font-size: 13px;
  margin-bottom: 2px;
}

.chat-box label span {
  color: #f00;
}

.chat-box input[type=submit] {
  -webkit-appearance: none;
  border-radius: 2px;
  background-clip: padding-box;
  background-color: #081828 ;
  box-shadow: 0 2px 0 rgba(0,0,0,.1), inset 0 -3px 0 rgba(129,163,48,.3);
  font-size: 14px;
  color: #fff;
  padding: 9px 6px 11px;
  width: 100%;
  border: 0;
  cursor: pointer;
}

        </style>
</head>

<body>
  <?php
  include('../connect/db.php');
  $c=$_SESSION['SELLER_ID'];
  if(isset($_POST['send']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $sql = "insert into message(user,name,email,subject,message,status) VALUES 
    ('1','$name','$email','$subject','$message','0')";
    $q1 = $db->prepare($sql);
    $q1->execute();
    echo "<script>alert('Message send to Admin. Admin will Contact.');</script>";

  }
  ?>
<div class="chat-box fixed-positioning">
  <div class="chat-header">
    <span>Leave a message</span>
    <button>Show</button>
  </div>
  <div class="chat-content">
    <p class="chat-title">Contact our Admin</p>
    <form action="#" method="post" class="chat-form">
      <div>
        <label for="name">Your Name <span>*</span></label>
        <input type="text" name="name" id="name" required>
      </div>
      <div>
        <label for="email">E-mail <span>*</span></label>
        <input type="email" name="email" id="email" required>
      </div>
      <div>
        <label for="subject">Subject <span>*</span></label>
        <input type="text" name="subject" id="subject" required>
      </div>
      <div>
        <label for="message">Message <span>*</span></label>
        <textarea name="message" id="message"></textarea>
      </div>
      <input name="send" type="submit" value="Leave a message">
    </form>
  </div>
</div>  
</body>
<script>
    let chatBox = document.querySelector(".chat-box");
let toggleButton = document.querySelector(".chat-header button")
let chatContent = document.querySelector(".chat-content");

toggleButton.addEventListener('click', () => {
  if (chatContent.style.maxHeight){
    chatContent.style.maxHeight = null;
    chatContent.classList.remove('active');
    toggleButton.innerText = "Show"
  } else {
    chatContent.style.maxHeight = (chatContent.scrollHeight + 30) + "px";
    chatContent.classList.add('active');
    toggleButton.innerText = "Hide"
  } 
})

// Outside click
window.addEventListener('click', function(e){   
  if (!chatBox.contains(e.target)){
    chatContent.style.maxHeight = null;
    chatContent.classList.remove('active');
    toggleButton.innerText = "Show"
  }
});

(() => {
  chatContent.style.maxHeight = (chatContent.scrollHeight + 30) + "px";
  chatContent.classList.add('active');
  toggleButton.innerText = "Hide"
})()
    </script>
