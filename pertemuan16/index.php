<?php 
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$film = query("SELECT * FROM film");

//tombol cari ditekan
if( isset($_POST["cari"])) {
	$film = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style type="text/css"></style>
</head>
<body>



	<h1>Daftar Film</h1>
<a href="logout.php">Logout</a> <br>
	<a href="tambah.php">Tambah Data Film</a>
	<br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari</button>

	</form>
	<br>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Poster</th>
			<th>Judul</th>
			<th>Sutradara</th>
			<th>Genre</th>
			<th>Pemain</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach($film as $row) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="ubah.php?id=<?php echo $row["id"]; ?>">Edit</a> |
				<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">Delete</a>
			</td>
			<td><img src="img/<?php echo $row["gambar"]; ?>" width="100"></td>
			<td><?= $row["judul"]; ?></td>
			<td><?= $row["sutradara"]; ?></td>
			<td><?= $row["genre"]; ?></td>
			<td><?= $row["pemain"]; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>

</body>
</html>