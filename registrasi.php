<?php
	require 'functions.php';

	if ( isset($_POST["register"])) {
		if ( registrasi($_POST) > 0) {
		echo " <script>
				alert('User baru berhasil ditambahkan!');
			</script> ";
		header("Location: index.php");
	} else {
		echo mysqli_error($conn);
	}
	
}
if (isset($_POST["cancel"])) {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<title>Sign Up Gan!</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  width: 50%;
  position: absolute;
  top: 40px;
  left: 340px;
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
  background-color: #474e5d;
  padding-top: 50px;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 



/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<div class="container">
  <form class="modal-content" method="post">
   
     <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>

      <label for="password2"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="password2" id="password2" required>
      <button type="submit" class="signupbtn" name="register">Sign Up</button>
  </form>

  
<form method="post" action="">
    <button type="submit" class="cancelbtn" name="cancel">Cancel</button>
</form>
</div>

</body>
</html>
