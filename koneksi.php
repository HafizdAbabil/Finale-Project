<?php
error_reporting(0);
session_start();
//$connect = new mysqli("localhost","root","","polybus");
//if (!$connect) {
//        echo "Error ".$connect->error;
//}
$server = "localhost";
$user = "root";
$password = "";
$database = "polybus";
set_time_limit(1800);
mysql_connect($server,$user,$password) or die ("Koneksi gagal");
mysql_select_db($database) or die ("Database tidak ditemukan");

$koneksi = mysqli_connect("localhost","root","","polybus");
function query($query){
		global $koneksi;

		$ambil 	= mysqli_query($koneksi, $query);
		$rows 	= [];

		while ($row = mysqli_fetch_assoc($ambil)) {
			$rows[] = $row;
		}

		return $rows;
	}
// Fungsi Login
	function simpan($data){
		global $koneksi;

		$Username 		= htmlspecialchars($data["Username"]);
		$Password 		= htmlspecialchars($data["Password"]);
		$Jabatan		= htmlspecialchars($data["Jabatan"]);
		$query = "INSERT INTO tb_login VALUES('','$Username','$Password','$Jabatan')";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}


?>

