<?php 
$mahasiswa = [
		["Patria","14.4.00078", "Sistem Informasi", "patria.tigabp2@gmail.com"],
	["Fitra","14.4.00074", "Sistem Informasi", "azuryu@gmail.com"],
	
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<?php var_dump($film); ?>
<?php foreach($mahasiswa as $mhs) : ?>
<ul>
	<li>Nama : <?php echo $mhs[0]; ?></li>
	<li>NIM : <?php echo $mhs[1]; ?></li>
	<li>Jurusan :<?php echo $mhs[2]; ?></li>
	<li>Email : <?php echo $mhs[3]; ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>