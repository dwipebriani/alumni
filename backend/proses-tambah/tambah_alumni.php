<?php 
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include "../../config.php";
include '../template-proses/header.php';
 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Alumni</div>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" required="">
              </div>
              
              <div class="form-group">
                <label>tgl_lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" required="">
              </div>   
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" required="">
              </div>  
              <div class="form-group">
                <label>Pekerjaan</label>
                <input class="form-control" name="pekerjaan" required="">
              </div>    
              <div class="form-group">
                <label>Telepon</label>
                <input class="form-control" name="tlp" required="">
              </div>  
              <div class="form-group">
                <label>Whatsapp</label>
                <input class="form-control" name="wa" required="">
              </div> 
              <div class="form-group">
                <label>Instagram</label>
                <input class="form-control" name="ig" required="">
              </div> 
              <div class="form-group">
                <label>Facebook</label>
                <input class="form-control" name="fb" required="">
              </div>         
                <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" required="">
              </div>

                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../data_alumni.php" class="btn btn-info">Kembali</a>
                    </div>
            </form>
            </div></div>
        </div>

 <?php 

 if(isset($_POST['simpan'])){
$nama = $_POST['nama'];
$tgl_lahir=($_POST['tgl_lahir']);
$alamat=($_POST['alamat']);
$pekerjaan=($_POST['pekerjaan']);
$tlp=($_POST['tlp']);
$wa=($_POST['wa']);
$ig=($_POST['ig']);
$file_name = $_FILES['foto']['name'];
$sourc = $_FILES['foto']['tmp_name'];
$folder = '../img/';
move_uploaded_file($sourc,$folder.$file_name);


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_data_alumni VALUES('','$nama','$tgl_lahir','$alamat','$pekerjaan','$tlp','$wa','$ig','$fb','$file_name')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../data_alumni.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../data_alumni.php';
    </script> 

    ";
   }
 }



include '../template-proses/footer.php';
  ?>