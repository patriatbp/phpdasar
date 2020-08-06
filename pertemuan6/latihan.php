<?php 
$films = [
	["judul"=>"Gundala",
	"sutradara"=>"Joko Anwar",
	"genre"=>["Action","Drama","Crime"],
	"pemain"=>["Abimana Aryastya","Tara Basro","Bront Palarae","Rio Dewanto"],
	"gambar"=>"gundala.jpg"
	],
	["judul"=>"Pengabdi Setan",
	"sutradara"=>"Joko Anwar",
	"genre"=>["Horror"],
	"pemain"=>["Dimas Aditya","Tara Basro","Bront Palarae","Andy Arfian"],
	"gambar"=>"pengabdisetan.jpg"
	],
	["judul"=>"Dua Garis Biru",
	"sutradara"=>"Gina S. Noer",
	"genre"=>["Drama", "Romance"],
	"pemain"=>["Angga Aldi Yunanda","Adhisty Zara","Lulu Tobing","Cut Mini Theo"],
	"gambar"=>"garisbiru.jpg"
	],
	["judul"=>"Danur 3 : Sunyaruri",
	"sutradara"=>"Awi Suryadi",
	"genre"=>["Horror"],
	"pemain"=>["Prilly Latuconsina","Sandrinna Michelle","Rizky Nazar","Syifa Hadju"],
	"gambar"=>"danur3.jpg"
	],
	["judul"=>"Perempuan Tanah Jahanam",
	"sutradara"=>"Joko Anwar",
	"genre"=>["Horror"],
	"pemain"=>["Tara Basro","Marissa Anita","Christine Hakim","Asmara Abigail"],
	"gambar"=>"ptj.jpg"
	],
	["judul"=>"Sebelum Iblis Menjemput",
	"sutradara"=>"Timo Tjahjanto",
	"genre"=>["Horror", "Thriller"],
	"pemain"=>["Chelsea Islan","Pevita Pearce","Samo Rafael","Hadijah Shahab"],
	"gambar"=>"sim.jpg"
	],
	["judul"=>"The Raid 2",
	"sutradara"=>"Gareth Evans",
	"genre"=>["Action","Crime","Drama"],
	"pemain"=>["Iko Uwais","Julie Estelle","Yayan Ruhian","Arifin Putra"],
	"gambar"=>"raid2.jpg"
	],
	["judul"=>"Yowes Ben 2",
	"sutradara"=>"Bayu Skak",
	"genre"=>["Dramae","Comedy","Romance"],
	"pemain"=>["Bayu Skak","Joshua Suherman","Brandon Salim","Anya Geraldine"],
	"gambar"=>"yowesben2.jpg"
	],
	["judul"=>"Cek Toko Sebelah",
	"sutradara"=>"Ernest Prakasa",
	"genre"=>["Comedy","Drama"],
	"pemain"=>["Ernest Prakasa","Dion Wiyoko","Chew Kinwah","Adinia Wirasti"],
	"gambar"=>"cts.jpg"
	],
	["judul"=>"Imperfect",
	"sutradara"=>"Ernest Prakasa",
	"genre"=>["Drama","Romance"],
	"pemain"=>["Jessica Mila","Reza Rahadian","Yasmin Napper","Karina Suwandi"],
	"gambar"=>"imprefect.jpg"
	]
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Film</title>
	<style type="text/css">
	</style>
</head>
<body>
<h1>Daftar Film</h1>
<?php print_r($films);
echo "<br>";
var_dump($films);
 ?>
<!--  <?php foreach($films as $film) : ?> 
	<?php foreach($film["genre"] as $flm["genres"]) : ?>
	<ul>
		<li></li>
		<li><img src="img/<?php echo $film["gambar"]; ?>"></li>
		<li>Judul : <?php echo  $film["judul"]; ?></li>
		<li>Sutradara : <?php echo  $film["sutradara"]; ?></li>
		<li>Genre : <?php echo  $flm["genres"];  ?></li>
		<li>Pemain : <?php echo $film["pemain"]; ?></li>
	</ul>
	<?php endforeach; ?>
<?php endforeach; ?>  -->
<?php foreach($films as $film) : ?>
Judul<?php echo $film["judul"]; ?>
<?php endforeach; ?>


</body>
</html>