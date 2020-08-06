<?php 
require 'functions.php';

// ambil data di url
	$id = $_GET["id"];
	

	$film = query("SELECT * FROM film WHERE id = $id")[0];
	

if( isset($_POST["submit"])){
	


	// cek apakah data berhasil diubah
	if( ubah($_POST) > 0) {
		echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php';
		</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Film</title>
</head>
<body>
	<h1>Ubah Data Film</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $film["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $film["gambar"]; ?>">
		<ul>
			<li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required value="<?php echo $film["judul"]; ?>">
			</li>
			<li>
				<label for="sutradara">Sutradara : </label>
				<input type="text" name="sutradara" id="sutradara" value="<?= $film["sutradara"]; ?>">
			</li>
			<li>
				<label for="genre">Genre : </label>
				<input type="text" name="genre" id="genre" value="<?= $film["genre"]; ?>">
			</li>
			<li>
				<label for="pemain">pemain : </label>
				<input type="text" name="pemain" id="pemain" value="<?php echo $film["pemain"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<img src="img /<?= $film['gambar']; ?>"> <br>
				<input type="file" name="gambar" id="gambar"> 
			</li>
			<li>
				<button type="submit" name="submit">Ubah</button>
			</li>
		</ul>



	</form>

</body>
</html>