<?php
// koneksi ke database (DBMS)
// mysqli_connect("namahost","username mysqlnya","password","namadatabase");
$conn = mysqli_connect("localhost","root","","bootcamp");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function insert($data){
	global $conn;
	// ambil data dari setiap elemen dalam form
	$nama = htmlspecialchars($data["Nama_Daerah"]);
	$jumlah = htmlspecialchars($data["Jumlah_Penduduk"]);
	$total = htmlspecialchars($data["Total_Pendapatan"]);
	$rata = htmlspecialchars($data["Rata-Rata_Pendapatan"]);
	$status = htmlspecialchars($data["Status"]);

	// query insert data
	$query = "INSERT INTO data
				VALUES
				('', '$nama', '$jumlah', '$total', '$rata', '$status')
				";

	$result = mysqli_query($conn, $query);
	// var_dump($result);

	return mysqli_affected_rows($conn);
}

function delete($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM data WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function update($data){
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["Nama_Daerah"]);
	$jumlah = htmlspecialchars($data["Jumlah_Penduduk"]);
	$total = htmlspecialchars($data["Total_Pendapatan"]);
	$rata = htmlspecialchars($data["Rata-Rata_Pendapatan"]);
	$status = htmlspecialchars($data["Status"]);

	// query insert data
	$query = "UPDATE data SET
			Nama_Daerah = '$nama',
			Jumlah_Penduduk = '$jumlah',
			Total_Pendapatan = '$total',
			Rata-Rata_Pendapatan = '$rata',
			Status = '$status'
			WHERE id = $id
			";

	$result = mysqli_query($conn,$query);
	// var_dump($result);

	 return mysqli_affected_rows($conn);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '".$username."'");
    if( mysqli_fetch_assoc($result) ) {
        echo"<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
        alert('Password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password 
    // ada 2 algoritma untuk enkripsi password, yaitu PASSWORD_DEFAULT dan MD5.
    // tidak disarankan menggunakan MD5 karena tidak aman. dapat terbaca oleh google.
    // disarankan menggunakan PASSWORD_DEFAULT karena PASSWORD_DEFAULT = algoritma yg dipilih scara dafault oleh php, algoritma akan terus berubah ketika ada cara pengamanan baru
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan userbaru ke database
    $result = "INSERT INTO user VALUES('','$username','$password')";
    mysqli_query($conn, $result);
    return mysqli_affected_rows($conn);
}


?>