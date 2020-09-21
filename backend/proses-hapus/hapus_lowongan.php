<?php 	
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include'../../config.php';
$id_lowongan= $_GET['id_lowongan'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_lowongan where id_lowongan = '$id_lowongan'");


if ($hapus) {
	header("location:../lowongan.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>