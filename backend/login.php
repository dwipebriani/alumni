<?php
ob_start();
session_start();
include "../config.php";
if(isset($_SESSION['login_username'])) header("location: index.php");
   

// proses login
if (isset($_POST['kirim'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE username = '$username' AND password = '$password'");
  if(mysqli_num_rows($sql)>0) { 
    $row_akun = mysqli_fetch_array($sql); 

    $_SESSION['login_id'] = $row_akun['id_login'];
    $_SESSION['login_username'] = $row_akun['username'];
    $_SESSION['login_password'] = $row_akun['password'];
    $_SESSION['login_nama_login'] = $row_akun['nama_login']; 
    
      
  
if ($_SESSION['login_level'] == "1") {
   header("location: index.php"); 
}else { 
   header("location:index.php");
}

  } else {
    header("location: login.php?login-gagal");
  }
  
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg">
<style>
  .bg{
    background-color: green;
  }
</style>
  <div class="container">

    <!-- Outer Row --><br><br><br>
        
              <div class="col-lg-6 mx-auto mt-5">
                <div class="p-5">
                  <div class="text-center" style="color: white ">
                    <h1 class="h4 mb-4">Selamat Datang Admin</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                   
                    <input type="submit" value="kirim" name="kirim" class="btn btn-primary btn-user btn-block">
                    
                       
                   
                    
                  </form>
                
                  
                </div>
              </div>
            </div>
        
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php   

mysqli_close($koneksi);
ob_end_flush();
 ?>