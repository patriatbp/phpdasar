<?php
require 'functions.php';

$film = query("SELECT * FROM film");

if (isset($_POST["cari"])){
	$film = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="mt-5">
	<!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> -->
        <div class="container">
            	<h1 class="nav-item">Daftar Film</h1>
	
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                	                </div>
            </div>
        </div>
    </nav>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-grey">
	<div class="container">
		<div class="nav-bar">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

	</div>
</div>
</div>
</nav>
	<br>
	<div class="jumbotron jumbotron-fluid ">
	<div class="container">
		<h1><a class="nav-item nav-link" href="tambah.php">Tambah Data Film</a></h1>
	<form action="" method="post" class="nav-item">
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
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</body>
</html>