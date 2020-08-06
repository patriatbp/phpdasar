<?php 
// cek apakah tidak ada data di $-GET
if( !isset($_GET["judul"]) 
	|| !isset("sutradara")
	|| !isset("genre")
	|| !isset("pemain")
	|| !isset("gambar")) {
	//redirect
	header("Location: latihan1.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Film</title>
</head>
<body>
<ul>
	<li><img src="img/<?= $_GET["gambar"]; ?>"> </li>
	<li><?php echo $_GET["judul"]; ?></li>
	<li><?php echo $_GET["sutradara"]; ?></li>
	<li><?php echo $_GET["genre"]; ?></li>
	<li><?php echo $_GET["pemain"]; ?></li>
</ul>
<a href="latihan1.php">Kembali Daftar Film</a>
</body>
</html>