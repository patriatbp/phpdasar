<?php 
// session_start();

// if( !isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit;
// }

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
	<title>tampilan</title>
		<title>Halaman Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="md-5">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Film</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="tambah.php">Tambah Data <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
      				<form class="form-inline my-2 my-lg-0" action="" method="post">
      						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
      						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search</button>
    				</form>
                </div>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
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


</body>
</html>