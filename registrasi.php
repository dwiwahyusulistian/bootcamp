<?php
require 'functions.php';

// if ( isset ($_POST["nama di button"])){
if ( isset ($_POST["register"])){

	if (registrasi($_POST) > 0 ) {
		echo "<script>
				alert('Registrasi Berhasil !');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Registrasi </title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	<h1>Registrasi</h1>
		<form action="" method="POST">
			<ul>
				<li>
					<label for="username"> Email : </label>
					<input type="text" name="username" id="username" placeholder="Enter your username"/>
				</li>
				<li>
					<label for="password"> Password : </label>
					<input type="password" name="password" id="password" placeholder="Enter your password"/>
				</li>
				<li>
					<label for="password2"> Password : </label>
					<input type="password" name="password2" id="password2" placeholder="Re-type your password"/>
				</li>
				<li>
					<button type="submit" name="register" > SIGN UP </button>
				</li>
			</ul>
		</form>
</body>
</html>