<?php
session_start();

if(!isset($_SESSION["login"])){

	header("Location: login.php");
	exit;
}

require 'functions.php';
//pagination
$dataperhal = 7;
$jumlahdata = count(query("SELECT * FROM mahasiswa"));
//var_dump($jumlahdata);
$jumlahhal = $jumlahdata / $dataperhal;
$halaktif=(isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata=($dataperhal*$halaktif)-$dataperhal;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awaldata , $dataperhal");

if ( isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.load{
			width: 300px;
			position: absolute;
			top: 75px;
			right: 620px;
			z-index: -1;
			display: none;
		}
		.con{
			
    		top:169px;
    		left:304px;
		}
		@media print{
			.logout, .tambah, .form-cari, .aksi{
				display: none;
			}
		}
	</style>

	<title>Halaman Admin</title>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/script1.js"></script>
</head>	
<body>
<a href="logout.php" class="logout">Logout</a>
<h1 class="hal">Daftar Mahasiswa</h1>
<a href ="tambah.php"class="tambah">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post" class="form-cari">
	
	<input type="text" name="keyword" size="70" autofocus
	placeholder="Find . . " autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari!</button>
	<img src="image/tenor.gif" class='load'>
</form>

<br>
<?php if($halaktif>1):?>
	<a href="?halaman=<?= $halaktif-1; ?>">&lt;</a>
<?php endif; ?>
<?php for($i=1;$i<=$jumlahhal;$i++): ?>
	<?php if($i==$halaktif):?>
		<a href="?halaman=<?= $i; ?>"style="font-weight:bold; color:black;"><?= $i; ?> </a>
	<?php else: ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>
<?php if($halaktif<$jumlahhal):?>
	<a href="?halaman=<?= $halaktif+1; ?>">&gt;</a>
<?php endif; ?>
<br><br>

<div id="container" class="con">
<table border ="1" cellpadding="10" cellspacing="0" align="center">

	<tr>
		<th>No.</th>
		<th class="aksi">Aksi</th>
		<th>Gambar</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td class="aksi">
			<a href ="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
			<a href ="hapus.php?id=<?= $row["id"]; ?>" onclick ="
			return confirm('Yakin?');">hapus</a>
		</td>
		<td><img src ="image/<?= $row["gambar"]; ?>" width="75"></td>
		<td><?= $row["NRP"]; ?></td>
		<td><?= $row["Nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>
</div>

</body>
</html>
