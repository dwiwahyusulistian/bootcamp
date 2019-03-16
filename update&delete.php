<?php
require 'functions.php';

$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM data WHERE id=$id")[0];


// cek apakah tombol submit sudah ditekan atau belum?
if( isset($_POST["submit"])){


	// cek apakah data berhasil diupdate ?
	if( update($_POST) > 0) {
		echo "
			<script>
			alert('Update Data Berhasil!');
			document.location.href = 'index.php'; 
			</script>
		";
	} else {
		echo "
			<script>
			alert('Update Data Gagal!');
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
	<title>Update Data Daerah</title>
</head>
<body>
	<h1>Update Data Daerah</h1>
	<style>
		label {
			display: block;
		}
	</style>

	

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["ID"]; ?>">
		<ul>
			<li>
				<label for="Nama Daerah">Nama Daerah: </label>
				<input type="text" name="Nama Daerah" id="Nama Daerah" required
				value="<?= $mhs["Nama Daerah"]; ?>">
			</li>
			<li>
				<label for="Jumlah Penduduk">Jumlah Penduduk: </label>
				<input type="text" name="Jumlah Penduduk" id="Jumlah Penduduk" required
				value="<?= $mhs["Jumlah Penduduk"]; ?>">
			</li>
			<li>
				<label for="Total Pendapatan">Total Pendapatan: </label>
				<input type="text" name="Total Pendapatan" id="Total Pendapatan" required
				value="<?= $mhs["Total Pendapatan"]; ?>">
			</li>
			<li>
				<label for="Rata-Rata Pendapatan">Rata-Rata Pendapatan: </label>
				<input type="text" name="Rata-Rata Pendapatan" id="Rata-Rata Pendapatan" required
				value="<?= $mhs["Rata-Rata Pendapatan"]; ?>">
			</li>
			<li>
				<label for="Status">Status: </label>
				<input type="text" name="Status" id="Status" required
				value="<?= $mhs["Status"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Submit</button>
				<button onclick="return confirm('Apakah Anda yakin data ini akan dihapus?');">Delete</button>

			</li>

		</ul>
	</table>
	</form>

</body>

</html>