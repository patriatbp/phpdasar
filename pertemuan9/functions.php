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



?>