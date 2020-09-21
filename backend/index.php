<?php 
ob_start();
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include "../config.php";
;
include 'template/header.php';
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          
            
          </div>

          <!-- Content Row -->
          <div class="row">

           


    </div>
    <!-- End of Content Wrapper -->
   <div class="text-center " >
              <h2 style="color: purple";><b>SELAMAT DATANG ADMIN</b></h2>
              <img src="img/au6.png" height="350">
            </div>
<?php
 mysqli_close($koneksi);
ob_end_flush();
include 'template/footer.php';
 
 ?>