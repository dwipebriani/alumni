<?php 	
global $koneksi;

$namaserver = "localhost";
$username = "root";
$password = "";
$namadb= "db_alumni";

$koneksi = mysqli_connect($namaserver,$username,$password,$namadb);
if (!$koneksi) {
	die("koneksi gagal". mysqli_connect_error());
}
 ?>