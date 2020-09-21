<?php 
include "../config.php";
if(isset($_POST['kirim'])){
 $nama= $_POST['nama'];
$username= $_POST['username'];
$email= $_POST['email'];
$password= md5($_POST['password']);
$tlp= $_POST['tlp'];
$cek =mysqli_query($koneksi,"select * from tbl_user where username ='$_POST[username]'");

if (mysqli_num_rows($cek)>0) {
  
echo "<script>alert('Username sudah digunakan, Silahkan Isi ulang form'); window.location.href = 'register.php';</script>";
}
else {


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_user VALUES('','$nama','$username','$email','$password','$tlp')");
}

 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('Data Anda sudah direkam, Silahkan login');
      window.location.href = 'login_user.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = 'login_user.php';
    </script> 

    ";
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
                    <h1 class="h4 mb-4">Registrasi Akun</h1>
                  </div>
                  <form class="user" method="post">
                     <div class="form-group">
                      <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                      <input type="text" name="tlp" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Telepon">
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