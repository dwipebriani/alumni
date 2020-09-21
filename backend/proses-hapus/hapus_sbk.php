<?php 	
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include'../../config.php';
$id= $_GET['id'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_sudah_kerja where id = '$id'");


if ($hapus) {
	header("location:../sudah_bekerja.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>