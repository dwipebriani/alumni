 <?php  
session_start();
include '../config.php'; 
// if(!isset($_SESSION['user_id'])) header("location:login_user.php");
$lwn= mysqli_query($koneksi, "SELECT * FROM tbl_lowongan");
  ?>   

<?php 
include '../config.php';
// $profil = mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE id_login");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>alumni</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

    
   <li class="nav-item">
        <a class="nav-link" href="alumni_user.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Alumni</span></a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="lowongan_user.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Lowongan</span></a>
      </li>

 <li class="nav-item">
        <a class="nav-link" href="proses-tambah/tambah_komen.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Komentar</span></a>
      </li>
      



   

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
               
              </div>
            </li>

           

           

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            
            <a class="navbar-brand navbar-nav-right" href="logout_user.php" onclick="return confirm('Apakah anda yakin ingin logout?');" >
          <i class="fas fa-fw fa-lock"></i>
          <span><?php echo $_SESSION['user_username'] ;?></span></a> 
              <!-- Dropdown - User Information -->
             
           
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



  <h3><i class="fas fa-newspaper mr-2"></i>Lowongan</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2" href="lib/tambahlowongan_user.php">[+]Tambah</a>

 <!-- pencarian -->
       <div class="col-md-12">
         
 

<!-- form lwn -->
       <div class="row">
        <?php while($lowongan = mysqli_fetch_assoc($lwn)): ?>
          <div class="col-sm-3 text-center">
            <ul class="list-group"> <br>
              <li class="list-group-item">
                <img src="img/<?= $lowongan['foto']; ?>"  width="150" height="100">
                <h5><?=$lowongan['nama_perusahaan']; ?></h5>
                 
             
              
              </li>
            </ul>
          </div>
<?php endwhile;  ?>

       </div>
    </div>
  </section>

       <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; dwipebriani</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
