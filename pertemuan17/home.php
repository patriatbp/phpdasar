<?php 

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
<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<table class="table align-middle text-center" border="1" cellpadding="10" cellspacing="0" >
			<thead class="thead-dark ">
			<tr>
				<th>No.</th>
				<th width="110px">Aksi</th>
				<th>Poster</th>
				<th>Judul</th>
				<th>Sutradara</th>
				<th>Genre</th>
				<th>Pemain</th>
			</tr>
			</thead>
			<?php $i=1; ?>
			<?php foreach($film as $row) : ?>
			<tr>
				<th scope="col"><?php echo $i; ?></th>
				<td>
					<a href="ubah.php?id=<?php echo $row["id"]; ?>"><img src="icons/edit-bt.png" width="30px"></a> |
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');"><img src="icons/dlt-bt.png" width="30px"></a>
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
	
		</div>
	</div>
</body>
</html>