<?php
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>

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
		        	<a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
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
				      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search</button>
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

<div class="container">	
	<div class="row">
	<div class="col" style="margin-top: 9%;	">		

<?php 
if(!isset($_GET['page'])) {
	include "home.php";
} else {
	$page = $_GET['page'];
	switch ($page) {
		case 'tambah':
			include "input.php";
			break;
		case 'edit' :
		include "ubah.php";
		break;
	}
}
 ?>
 </div>
 </div>
</div>
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