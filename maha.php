<?php
require 'functions.php';
$id = $_GET["id"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$mahasiswa["Nama"]?></title>
</head>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}
</style>
<body>
<table border ="1" cellpadding="10" cellspacing="0" align="center">
	<tr>
		<tr>
		<th width="26"></th>
		<th width="107">Biodata</th>
	</tr>
	<tr>
		<td><img src ="image/<?= $mahasiswa["gambar"]; ?>" width="220"></td>
		<td><?= $mahasiswa["NRP"]; ?><br>
		<?= $mahasiswa["Nama"]; ?><br>
		<?= $mahasiswa["email"]; ?><br>
		<?= $mahasiswa["jurusan"]?></td>
</tr>
</table>
</body>
