<?php 
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include '../../config.php';
include '../template-proses/header.php';

$id_komen = $_GET['id_komen'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_komen where id_komen='$id_komen'
             ");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Komentar</div>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="pekerjaan" value="<?php echo $data['nama'] ;?>" readonly>
              </div>
                <div class="form-group">
                <label>Tentang</label>
                <input class="form-control" name="hal" value="<?php echo $data['hal'] ;?>" readonly>
              </div>
              <div class="form-group">
                <label>Isi Komentar</label>
                <input class="form-control" name="isi" value="<?php echo $data['isi'] ;?>" readonly>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <img width="90" height="90" src="../img/<?= $data['foto'];?>" readonly>
                <input type="file" name="file_name">
              </div>
                 <div class="form-group">
               
                <input class="form-control" name="status" value="tampil" readonly>
              </div>
                      
               


                    <div class="form-group">
                        <input type="submit" name="edit" value="Tampilkan" class="btn btn-primary">
                        
                    </div>
            </form>
            </div>
              

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$nama = $_POST['nama'];
$hal=($_POST['hal']);
$isi=($_POST['isi']);
$status=($_POST['status']);
$file_name = $_FILES['file_name']['name'];


$ubah = mysqli_query($koneksi, "UPDATE tbl_komen SET status='$status' WHERE id_komen='$id_komen'");

 


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil ditampilkan!');
      window.location.href = '../komentar.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../komentar.php';
    </script> ";

    
   }
   }
 


include '../template-proses/footer.php';
  ?>
