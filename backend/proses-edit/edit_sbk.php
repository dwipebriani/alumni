<?php 
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include '../../config.php';
include '../template-proses/header.php';

$id = $_GET['id'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_sudah_kerja where id='$id'
             ");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Alumni</div>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label>Pekerjaan</label>
                <input class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan'] ;?>">
              </div>
                <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" value="<?php echo $data['nama'] ;?>">
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <input class="form-control" name="jabatan" value="<?php echo $data['jabatan'] ;?>">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <img width="90" height="90" src="../img/<?= $data['foto'];?>" >
                <input type="file" name="file_name">
              </div>

                      
               


                    <div class="form-group">
                        <input type="submit" name="edit" value="edit" class="btn btn-primary">
                        
                    </div>
            </form>
            </div>
              

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$pekerjaan=($_POST['pekerjaan']);
$nama = $_POST['nama'];
$jabatan=($_POST['jabatan']);
$file_name = $_FILES['file_name']['name'];
 if ($file_name=="") {

$ubah = mysqli_query($koneksi, "UPDATE tbl_sudah_kerja SET pekerjaan='$pekerjaan',nama='$nama',jabatan='$jabatan' WHERE id='$id'");

 }
 else {

$sourc = $_FILES['file_name']['tmp_name'];
$folder = '../img/';
move_uploaded_file($sourc,$folder.$file_name);
  
$ubah = mysqli_query($koneksi, "UPDATE tbl_sudah_kerja SET  pekerjaan='$pekerjaan',nama='$nama',jabatan='$jabatan', foto='$file_name'WHERE id='$id'");
 }







 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diedit!');
      window.location.href = '../sudah_bekerja.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../sudah_bekerja.php';
    </script> ";

    
   }
   }
 


include '../template-proses/footer.php';
  ?>
