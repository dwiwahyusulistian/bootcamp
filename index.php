<?php  
require 'functions.php';
$maha = query("SELECT * FROM data");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Daerah</h1>

	<a href="insert.php">Tambah Data Daerah</a>
	<br></br>

	<table width="" border="2" cellpadding="9" cellspacing="0">

		<tr bgcolor="99ff00">
			<th>No.</th>
			<th>ID</th>
			<th>Nama Daerah</th>
			<th>Jumlah Penduduk</th>
			<th>Total Pendapatan</th>
			<th>Rata-Rata Pendapatan</th>
			<th>Status</th>
		</tr>
		<!--untuk nomor urut  -->
		<?php $i = 1; ?>

		<?php foreach ($maha as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["ID"]; ?></td>
			<td>
				<a href="update&delete.php?id=<?= $row["ID"]; ?>">
					<?= $row["Nama Daerah"]; ?>
				</a>
			</td>
			<td><?= $row["Jumlah Penduduk"]; ?></td>
			<td><?= $row["Total Pendapatan"]; ?></td>
			<td><?= $row["Rata-Rata Pendapatan"]; ?></td>
			<td><?= $row["Status"]; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
</body>
</html>