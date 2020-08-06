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
	
	//upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO film VALUES ('', '$judul', '$sutradara', '$genre', '$pemain', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload(){

	$namaFILE = $_FILES['gambar']['name'];
	$ukuranFILE = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']["tmp_name"];

	// cek gambar adda atau tidak
	if ($error === 4) {
		echo "<script>
		alert('pilih gambar terlebih dahulu');
		</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$validasiGambar = ['jpg','jpeg','png'];
	$ekstensiGambar = explode( '.', $namaFILE);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $validasiGambar)){
			echo "<script>
		alert('yang anda upload bukan gambar');
		</script>";
		return false;
	}

	//cek jika ukurannya teralu besar
	if ( $ukuranFILE > 1200000) {
			echo "<script>
		alert('ukuran gambar terlalu besar');
		</script>";
		return false;
	}

	//lolos pengecekan, gambar siap upload
	// generate nama gambar baru
	$namaFilebaru = uniqid();
	$namaFilebaru .= '.';
	$namaFilebaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

	return $namaFilebaru;


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
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

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


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
		alert('password beda');
		</script>";
		return false;
	}

	//cek username sudah ada atau tidak
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)){
		echo "<script>
		alert('username sudah terdaftar');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}

?>