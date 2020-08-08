<?php 
require'../functions.php';
$keyword=$_GET["keyword"];

$query = "SELECT * FROM mahasiswa
				WHERE
			Nama LIKE '%$keyword%' OR
			NRP LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%'
			";

$mahasiswa=query($query);

?>
<br><br>
<style>
	.log1{
			background-color: #f44336;
 		}
 	.kop{
			background-color: rgb(132,150,255);
		}
</style>
<table border ="1" cellpadding="10" cellspacing="0" align="center">
	<tr class="kop">
		<th width="26">No.</th>
		<th width="96" class="aksi">Aksi</th>
		<th width="110">Gambar</th>
		<th width="69">NRP</th>
		<th width="176">Nama</th>
		<th width="110">Email</th>
		<th width="110">Jurusan</th>
	</tr>
	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td><?= $row["id"]?></td>
		<!-- <td class="aksi">
			<a href ="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> ||
			<a href ="hapus.php?id=<?= $row["id"]; ?>" onclick ="
			return confirm('Yakin?');">Hapus</a>
		</td> -->
		<form method="post">
		<td class="aksi"><button type="submit" name="hapus"><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a></button>
		<button type="submit" name="ubah" class="log1"><a href ="hapus.php?id=<?= $row["id"]; ?>" onclick ="
			return confirm('Delete This?');">Hapus</a></button></td></form>
		<td><img src ="image/<?= $row["gambar"]; ?>" width="110"></td>
		<td><?= $row["NRP"]; ?></td>
		<td><a href ="maha.php?id=<?= $row["id"]; ?>"><?=$row["Nama"]?></a></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>