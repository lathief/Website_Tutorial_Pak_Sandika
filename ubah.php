<?php


require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if ( isset($_POST["submit"])){

	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
if (isset($_POST["cancel"])) {
	header("Location: index.php");
}
?>

<!DOCTYPE HTML>
<title>Ubah Data</title>
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
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
button:hover {
  opacity: 0.8;
}
.con{
  padding: 16px;
  width: 35%;
  position: absolute;
  top: 80px;
  left: 420px;
}
.h1{
	position: absolute;
	top: 36px;
  	left: 434px;
}
.cc{
	background-color: red;
}
.signupbtn {
  float: left;
  width: 50%;
}
.cancelbtn {
  float: left;
  width: 50%;
  background-color: #f44336;
}


</style>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1 class="h1">Ubah Data Mahasiswa</h1>
	<div class="con">
	<form action="" method="post" enctype="multipart/form-data">
		
			<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
			<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
			
				<label for="NRP">NRP</label>
				<input type="text" name="NRP" id="NRP" required
				value="<?= $mhs["NRP"]; ?>">
			
				<label for="Nama">Nama</label>
				<input type="text" name="Nama" id="Nama" required
				value="<?= $mhs["Nama"]; ?>">
			
				<label for="email">Email</label>
				<input type="text" name="email" id="email" required
				value="<?= $mhs["email"]; ?>">
			
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" required
				value="<?= $mhs["jurusan"]; ?>">
			
				<label for="gambar" class="lbl">Gambar</label>
				<img src="image/<?= $mhs['gambar']; ?>" width="70"> <br>
				<input type="file" name="gambar" id="gambar">
				<br>
				<button type="submit" class="signupbtn"name="submit">Ubah Data!</button>
	</form>
<form action="" method="post">
<button type="submit" class="cancelbtn" name="cancel" class="cc">Cancel</button>
</form>
</div>
</body>
</html>