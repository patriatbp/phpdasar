<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if( $key=== hash('sha256', $row['username'])) {
		$_SESSION['login'] == true;
	}
}



if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    //cek username
    if(mysqli_num_rows($res)===1){
        // cek pass
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password, $row["password"])){
        	//set session
        	$_SESSION["login"] = true;

        	//cek remember me
        	if( isset($_POST['remember'])){
        		//buat cookie

        		setcookie('id', $row['id'], time()+60);
        		setcookie('key', hash('sha256', $row['username']), time()+60);
        	}

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.form-contact {
			width: 300px;
			margin: 50% auto	;
			background-color:rgba(white,0.25);
		}
		btn {
			color: black;
		}
	</style>
</head>
<body style="background-color:  #44749d;">
 	<div class="container" >
	  <div class="row">
	  	<div class="col-sm-8">
	  		<div class="row">
	  			<div class="col-sm">
	  				
	  			</div>
			  	<div class="col-sm">
			  		<div class="card text-black bg-light mb-3" style="margin-top: 50%;">
				  		<div class="card-header">
				  			<h4>Login</h4>
				  			<?php if( isset($error)) : ?>
				  			<p style="color: red; font-style: italic;">username / password salah</p>
				  		<?php endif; ?>
				  		</div>
				  		<div class="card-body">
					  		<form action="" method="post">
							  <div class="form-group">
							    <label for="username">Username</label>
							    <input type="username" name="username" id="username" class="form-control">
							   </div>
							  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" id="password" name="password">
							  </div>
							  <div class="form-group form-check">
							    <input type="checkbox" name="remember" class="form-check-input" id="remember">
							    <label class="form-check-label" for="remember">Remember Me</label>
							  </div>
							  <button type="submit" name="login" id="login" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
			  	</div>
	  	</div>
	  </div>
	</div>
 </body>

</body>
</html>