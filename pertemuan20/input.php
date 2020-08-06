<?php

require 'functions.php';
if( isset($_POST["submit"])){
	
	// mengumpulkan data genre
	
	// cek data berhasil ditambahkan
	if( tambah($_POST) > 0) {
		echo "<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}
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
	<div class="container align-center">
		<h4>Tambah Data Film</h4> <br>		
			<form action="" method="post" enctype="multipart/form-data">
			  	<div class="form-group row">
			    	<label for="judul" class="col-sm-1 col-form-label">Judul</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="judul" name="judul">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label for="sutradara" class="col-sm-1 col-form-label">Sutradara</label>
			    	<div class="col-sm-5">
			    		<input type="text" class="form-control" id="sutradara" name="sutradara">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label for="pemain" class="col-sm-1 col-form-label">Pemain</label>
			    	<div class="col-sm-5">
			    		<input type="text-control" class="form-control" id="pemain" name="pemain">
			    	</div>
			  	</div>
			  	<div class="form-group">
			  		<label for="genre">Genre</label>
			  		<div class="form-check">
			    	<input type="checkbox" class="form-check-input" id="Horror" value="Horror" name="genre[]">
			    	<label class="form-check-label" for="Horror">Horror</label>
			    	</div>
			    	<div class="form-check">
			    	<input type="checkbox" class="form-check-input" id="Romance" value="Romance" name="genre[]">
			    	<label class="form-check-label" for="Romance">Romance</label>
			    	</div>
			    	<div class="form-check">
			    	<input type="checkbox" class="form-check-input" id="Action" value="Action" name="genre[]">
			    	<label class="form-check-label" for="Action">Action</label>
			    	</div>
			    	<div class="form-check">
			    	<input type="checkbox" class="form-check-input" id="Drama" value="Drama" name="genre[]">
			    	<label class="form-check-label" for="Drama">Drama</label>
			    	</div>
			  	</div>
			  	<div class="form-group">
				    <label for="gambar">Upload Gambar</label>
				    <input type="file" class="form-control-file" id="gambar" name="gambar">
		  		</div>
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
	</div>
</body>
</html>