<?php 
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include "../../config.php";
include '../template-proses/header.php';
 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Sudah Bekerja</div>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label>Pekerjaan</label>
                <input class="form-control"  name="pekerjaan" required="">
              </div> 
                <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" required="">
              </div>
              
                
              <div class="form-group">
                <label>jabatan</label>
                <input class="form-control" name="jabatan" required="">
              </div>  
               
                <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" required="">
              </div>

                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../sudah_bekerja.php" class="btn btn-info">Kembali</a>
                    </div>
            </form>
            </div></div>
        </div>

 <?php 

 if(isset($_POST['simpan'])){
$pekerjaan=($_POST['pekerjaan']);
$nama = $_POST['nama'];
$jabatan=($_POST['jabatan']);
$file_name = $_FILES['foto']['name'];
$sourc = $_FILES['foto']['tmp_name'];
$folder = '../img/';
move_uploaded_file($sourc,$folder.$file_name);


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_sudah_kerja VALUES('','$pekerjaan','$nama','$jabatan','$file_name')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../sudah_bekerja.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../sudah_bekerja.php';
    </script> 

    ";
   }
 }



include '../template-proses/footer.php';
  ?>