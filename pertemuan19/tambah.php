<?php 
if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
if( isset($_POST["submit"])){
	
	// query insert data

	// cek data berhasil ditambahkan
	if( tambah($_POST) > 0) {
		echo "<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Film</title>
</head>
<body>
	<h1>Tambah Data Film</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required>
			</li>
			<li>
				<label for="sutradara">Sutradara : </label>
				<input type="text" name="sutradara" id="sutradara">
			</li>
			<li>
				<label for="genre">Genre : </label>
				<input type="text" name="genre" id="genre">
			</li>
			<li>
				<label for="pemain">pemain : </label>
				<input type="text" name="pemain" id="pemain">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah</button>
			</li>
		</ul>



	</form>

</body>
</html>