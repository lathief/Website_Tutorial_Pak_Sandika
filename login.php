<?php
require 'functions.php';
session_start();

if(isset($_COOKIE['id']) && isset($_COOKIE["key"])){
  $id=$_COOKIE['id'];
  $key=$_COOKIE['key'];
  $result=mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  if($key===hash('sha256',$row['Username'])){
    $_SESSION['login'] = true;
}
if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}
}
if (isset($_POST['regis'])) {
  header("Location: registrasi.php");
  exit;
}


if ( isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if ( mysqli_num_rows($result) === 1 ) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;
      // cek remember me
      if(isset($_POST['remember'])){
        setcookie('id',$row['id'], time()+60);
        setcookie('key',hash('sha256',$row['Username']),time()+60);
      }
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html>
<title>Login Page</title>
<style>
  hr {
  border: 1px solid rgb(180,180,180);
  margin-bottom: 25px;
}
body {font-family: Arial, Helvetica, sans-serif;}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  width: 30%;
  position: absolute;
  top: 80px;
  left: 459px;

}
.acc{
  width: 8%;
  position: absolute;
  top: 454px;
  left: 478px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
  .awal{
    position: center;
  }
.cancelbtn {
  background-color: #f44336;
  padding: 16px 160px;
  position: absolute;
  top: 410px;
  left: 16px;
}
</style>
</head>
<body>
<?php if ( isset($error) ) : ?>
  <script>
        alert('Username / Password Salah!');
        document.location.href = 'login.php';
      </script>
<?php endif; ?> 
<div class="container">
<form action="" method="post">

  <h1>LOGIN</h1>
   <p>Please fill in this form.</p>
    <hr>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
      <label>
        <input type="checkbox" checked="checked" name="remember"
        id="remember"> Remember me
      </label>
      <button type="submit" name="login">Login</button>

<hr>
</form>
<form action="" method="post">
  <br>
  <button type="submit" name="regis" class="cancelbtn">Create Account</button>
</form>
</div>
</body>
</html>
