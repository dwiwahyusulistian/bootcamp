<?php
require 'functions.php';

$id = $_GET["id"];

if( delete($id) > 0) {
	echo "
			<script>
			alert('Data Berhasil Dihapuskan!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data Gagal Dihapuskan!');
			document.location.href = 'index.php';
			</script>
		";
		echo mysqli_error($_POST);
	}
?>