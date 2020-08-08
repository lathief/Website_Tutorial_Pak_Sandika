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

<!DOCTYPE HTML>
<html>
<head>
	<title>Halaman Login</title>
	<style type="text/css">
    .login {
        margin: 250px auto;
        width: 400px;
        padding: 10px;
        border: 1px solid #F1C40F;
        background: rgb(16, 141, 117);
    }
    .hallogin{
    	z-index: 2;
    	top:169px;
    	left:634px;

    }
    .bodi{
    }
    .bg {
     width: 100%;
     height: 100%;
     position: fixed;
     float: left;
     left: 0;
     z-index: -1;
 	}
    .opp{
    	font-style: italic;
    }
</style>
</head>
<img src="image/gambarku.jpg" alt="gambar" class="bg" />
<body class="bodi">
<h1 class='hallogin'>Login</h1>

<?php if ( isset($error) ) : ?>
	<p style="color: blue; font-style: italic;">Username / Password salah!</p>
<?php endif; ?>
<div class='login'>
<form action="" method="post">

	<ul>
		<li>
			<label for="username">Username : &nbsp&nbsp;</label>
			<input type="text" name="username" id="username" size="31">
		</li>
		<li>
			<label for="password">Password : &nbsp&nbsp;</label>
			<input type="password" name="password" id="password" size="31">	
		</li>
		
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember Me </label>
		
		<br>
			<button type="submit" name="login">Login</button>
		
	</ul>
	
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="registrasi.php" class="opp">Create Account</a>
</div>

</body>
</html>