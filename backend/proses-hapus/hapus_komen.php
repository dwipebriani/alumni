<?php 	
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include'../../config.php';
$id_komen= $_GET['id_komen'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_komen where id_komen = '$id_komen'");


if ($hapus) {
	header("location:../komentar.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>