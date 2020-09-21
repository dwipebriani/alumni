<?php 	
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include'../../config.php';
$id_alumni= $_GET['id_alumni'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_data_alumni where id_alumni = '$id_alumni'");


if ($hapus) {
	header("location:../data_alumni.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>