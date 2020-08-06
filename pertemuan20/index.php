<?php
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

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
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> -->


</head>
<body>
<!-- 	<div class="container">
	  <div class="row">
	  	<div class="col-sm-8">
	  		<div class="row">
	  			<div class="col-sm">
	  				
	  			</div>
			  	<div class="col-sm">
			  		<div class="card text-black bg-light mb-3" style="margin-top: 50%;">
				  		<div class="card-header">
				  			<h4>Login</h4>
				  		</div>
				  		<div class="card-body">
					  		<form>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Username</label>
							    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							   </div>
							  <div class="form-group">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1">
							  </div>
							  <div class="form-group form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
							  </div>
							  <button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
			  	</div>
	  	</div>
	  </div>
	</div> -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10%;"	>
		<a class="navbar-brand" href="index.php">Data Film</a>
		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		 <span class="navbar-toggler-icon"></span>
		 </button>
		 	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
		      		<li class="nav-item active">
		        	<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        	<a class="nav-link" href="index.php?page=tambah">Tambah</a>
		      		</li>
		      		</li>
		      		<li class="nav-item">
		        	<a class="nav-link" href="logout.php">Logout</a>
		      		</li>
		      	</ul>
		      	<form class="form-inline my-2 my-lg-0" action="" method="post">
				      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari" id="tombol-cari">Search</button>
				      <img src="img/loader2.gif" class="loader" style="width: 100px; position: absolute; right:230px; z-index: -3; display: none; ">
    			</form>
	</nav>

<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->

<div class="container" style="margin-top: 10%;">
		<div class="row"  id="container">
			<table class="table align-middle text-center" border="1" cellpadding="10" cellspacing="0" >
			<thead class="thead-dark ">
			<tr>
				<th>No.</th>
				<th width="110px">Aksi</th>
				<th>Poster</th>
				<th>Judul</th>
				<th>Sutradara</th>
				<th>Genre</th>
				<th>Pemain</th>
			</tr>
			</thead>
			<?php $i=1; ?>
			<?php foreach($film as $row) : ?>
			<tr>
				<th scope="col"><?php echo $i; ?></th>
				<td>
					<a href="ubah.php?id=<?php echo $row["id"]; ?>"><img src="icons/edit-bt.png" width="30px"></a> |
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');"><img src="icons/dlt-bt.png" width="30px"></a>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="jquery-3.5.1.min.js"></script>
<script src="script.js"></script>
</body>
	<footer class="bg-dark text-white pt-3" style="margin-top: 10%;">
		<div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>Copyright 2018</p>
                </div>
            </div>
        </div>
	</footer>
</html>