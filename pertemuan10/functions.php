<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datafilm");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

	$judul = htmlspecialchars($data["judul"]);
	$sutradara = htmlspecialchars($data["sutradara"]);
	$genre = htmlspecialchars($data["genre"]);
	$pemain = htmlspecialchars($data["pemain"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "INSERT INTO film VALUES ('', '$judul', '$sutradara', '$genre', '$pemain', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM film WHERE id = $id");
	return mysqli_affected_rows($conn);
}
?>