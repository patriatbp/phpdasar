<?php 
// $mahasiswa = [
// 		["Patria","14.4.00078", "Sistem Informasi", "patria.tigabp2@gmail.com"],
// 	["Fitra","14.4.00074", "Sistem Informasi", "azuryu@gmail.com"],
// 	["Kentang","14.4.00076","Sistem Informasi",
// "kentang@gmail.com"]
	
// ];

// Arry Associative
// key adalah string yg kita buat sendiri
$mahasiswa = [	
	[
	"nama"=>"Patria Tiga Bintang",
	"nrp"=>"14.4.00078",
	"email"=>"patra.tigabp2@gmail.com",
	"jurusan"=>"Sistem Informasi",
	"gambar"=>"img1.jpg"
	],
	[
	"nama"=>"Fitra",
	"nrp"=>"14.4.00076",
	"email"=>"azuryu2@gmail.com",
	"jurusan"=>"Sistem Informasi",
	"gambar"=>"img2.jpg"
	]

];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
	<style type="text/css">
		img{
			width: 100px;
			height: 100px;
		}
	</style>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<?php foreach($mahasiswa as $mhs) : ?>
<ul>
	<li>
		<img src="img/<?php echo $mhs["gambar"]; ?>">
	</li>
	<li>Nama : <?php echo $mhs["nama"]; ?></li>
	<li>NIM : <?php echo $mhs["nrp"]; ?></li>
	<li>Jurusan :<?php echo $mhs["jurusan"]; ?></li>
	<li>Email : <?php echo $mhs["email"]; ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>