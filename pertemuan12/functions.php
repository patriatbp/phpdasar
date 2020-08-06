<?php 
error_reporting();
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


function ubah($data){
	global $conn;

	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$sutradara = htmlspecialchars($data["sutradara"]);
	$genre = htmlspecialchars($data["genre"]);
	$pemain = htmlspecialchars($data["pemain"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE film SET 
	judul = '$judul',
	sutradara = '$sutradara',
	genre = '$genre',
	pemain = '$pemain',
	gambar = '$gambar'
	WHERE id = $id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	global $conn;
	$query = "SELECT * FROM film WHERE 
	judul LIKE '%$keyword%' OR
	sutradara LIKE '%$keyword%' OR
	genre LIKE '%$keyword%' OR
	pemain LIKE '%$keyword%'
	";
	return query($query);
}

?>