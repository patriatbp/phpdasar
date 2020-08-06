<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datafilm");

// ambil data dari tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM film");

// ambil data (fetch) dari objek result
// mysqli_fetch_row() / menampilkan array numerik
// mysqli_fetch_assoc() / menampilkan array associative
// mysqli_fetch_array() / menampilkan keduanya
// mysqli_fetch_object()

// while ($film = mysqli_fetch_array($result)){
// 	var_dump($film);
// }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style type="text/css"></style>
</head>
<body>

	<h1>Daftar Film</h1>

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
		<?php while($row = mysqli_fetch_array($result)) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="">Edit</a> |
				<a href="">Delete</a>
			</td>
			<td><img src="img/<?php echo $row["gambar"]; ?>" width="100"></td>
			<td><?= $row["judul"]; ?></td>
			<td><?= $row["sutradara"]; ?></td>
			<td><?= $row["genre"]; ?></td>
			<td><?= $row["pemain"]; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endwhile; ?>
	</table>

</body>
</html>