<?php 	
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include'../../config.php';
$id_user= $_GET['id_user'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_user where id_user = '$id_user'");


if ($hapus) {
	header("location:../data_user.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>