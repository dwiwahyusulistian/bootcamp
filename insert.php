<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum?
if( isset($_POST["submit"])){


	// cek apakah data berhasil ditambahkan
	if( insert($_POST) > 0) {
		echo "
			<script>
			alert('Data Berhasil Ditambahkan!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data Gagal Ditambahkan!');
			document.location.href = 'index.php';
			</script>
		";
		echo mysqli_error($_POST);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Daerah</title>
</head>
<body>
	<h1>Tambah Data Daerah</h1>
	<style>
		label {
			display: block;
		}
	</style>

	<form action="" method="post">
		<ul>
			<li>
				<label for="Nama Daerah">Nama Daerah: </label>
				<input type="text" name="Nama Daerah" id="Nama Daerah" required>
			</li>
			<li>
				<label for="Jumlah Penduduk">Jumlah Penduduk: </label>
				<input type="text" name="Jumlah Penduduk" id="Jumlah Penduduk" required>
			</li>
			<li>
				<label for="Total Pendapatan">Total Pendapatan: </label>
				<input type="text" name="Total Pendapatan" id="Total Pendapatan" required>
			</li>
			<li>
				<label for="Rata-Rata Pendapatan">Rata-Rata Pendapatan: </label>
				<input type="text" name="Rata-Rata Pendapatan" id="Rata-Rata Pendapatan" required>
			</li>
			<li>
				<label for="Status">Status: </label>
				<input type="text" name="Status" id="Status" required>
			</li>
			<li>
				<button type="submit" name="submit">Submit</button>
			</li>

		</ul>

	</form>

</body>

</html>