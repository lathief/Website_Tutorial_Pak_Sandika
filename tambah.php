<?php
session_start();

if(!isset($_SESSION["login"])){

	header("Location: login.php");
	exit;
}
if (isset($_POST["cancel"])) {
	header("Location: index.php");
}

require 'functions.php';

if ( isset($_POST["submit"])){

	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>

<!DOCTYPE HTML>
<title>Tambah Page</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button:hover {
  opacity: 0.8;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
.con{
  padding: 16px;
  width: 35%;
  position: absolute;
  top: 120px;
  left: 420px;
}
.h1{
	position: absolute;
	top: 70px;
  	left: 480px;
}
.cc{
background-color: red;
 float: left;
  width: 50%;
  background-color: #f44336;
}
.signupbtn{
	  float: left;
  width: 50%;
}
</style>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1 class="h1">Tambah data mahasiswa</h1>
<div class="con">
	<form action="" method="post" enctype="multipart/form-data">
				<label for="nrp">NRP</label>
				<input type="text" name="nrp" id="nrp" 
				required>
			
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" 
				required>
			
				<label for="email">Email</label>
				<input type="text" name="email" id="email"
				required>
			
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan"
				required>
			
				<label for="gambar">Gambar</label>
				<input type="file" name="gambar" id="gambar"
				required>
				<br>
				<button type="submit" class="signupbtn" name="submit">Tambahkan</button>
	</form>
<form action="" method="post">
<button type="submit"  name="cancel" class="cc">Cancel</button>
</form>
</div>
</body>
</html>