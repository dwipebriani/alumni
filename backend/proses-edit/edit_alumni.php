<?php 
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include '../../config.php';
include '../template-proses/header.php';

$id_alumni = $_GET['id_alumni'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_data_alumni where id_alumni='$id_alumni'
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
                <label>Nama</label>
                <input class="form-control" name="nama" value="<?php echo $data['nama'] ;?>">
              </div>
                
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ;?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" value="<?php echo $data['alamat'] ;?>">
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                <input class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan'] ;?>">
              </div>
              <div class="form-group">
                <label>Telepon</label>
                <input class="form-control" name="tlp" value="<?php echo $data['tlp'] ;?>">
              </div>
              <div class="form-group">
                <label>whatsapp</label>
                <input class="form-control" name="wa" value="<?php echo $data['wa'] ;?>">
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input class="form-control" name="ig" value="<?php echo $data['ig'] ;?>">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input class="form-control" name="fb" value="<?php echo $data['fb'] ;?>">
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
$nama = $_POST['nama'];
$tgl_lahir=($_POST['tgl_lahir']);
$alamat=($_POST['alamat']);
$pekerjaan=($_POST['pekerjaan']);
$tlp=($_POST['tlp']);
$wa=($_POST['wa']);
$ig=($_POST['ig']);

$file_name = $_FILES['file_name']['name'];
 if ($file_name=="") {

$ubah = mysqli_query($koneksi, "UPDATE tbl_data_alumni SET nama='$nama', tgl_lahir='$tgl_lahir',alamat='$alamat',pekerjaan='$pekerjaan',tlp='$tlp',wa='$wa',ig='$ig'  WHERE id_alumni='$id_alumni'");

 }
 else {

$sourc = $_FILES['file_name']['tmp_name'];
$folder = '../img/';
move_uploaded_file($sourc,$folder.$file_name);
  
$ubah = mysqli_query($koneksi, "UPDATE tbl_data_alumni SET nama='$nama', tgl_lahir='$tgl_lahir',alamat='$alamat',pekerjaan='$pekerjaan',tlp='$tlp',wa='$wa',ig='$ig', foto='$file_name'WHERE id_alumni='$id_alumni'");
 }







 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diedit!');
      window.location.href = '../data_alumni.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../data_alumni.php';
    </script> ";

    
   }
   }
 


include '../template-proses/footer.php';
  ?>
