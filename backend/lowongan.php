 <?php  
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include 'template/header.php';
include '../config.php';
// if(!isset($_SESSION['login_id'])) header("location:login.php");
$lwn= mysqli_query($koneksi, "SELECT * FROM tbl_lowongan order by id_lowongan desc");
  ?>   

  <h3><i class="fas fa-newspaper mr-2"></i>Lowongan</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2" href="lib/tambah_lowongan.php">[+]Tambah</a>

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
                 
               <a  class="btn btn-success" href="lib/edit.php?id_lowongan=<?=$lowongan['id_lowongan'];?>">Edit</a> 
              <a  class="btn btn-danger" href="proses-hapus/hapus_lowongan.php?id_lowongan=<?=$lowongan['id_lowongan'];?>"  onclick="return confirm('yakin dihapus ?');">Hapus</a>
              </li>
            </ul>
          </div>
<?php endwhile;  ?>

       </div>
    </div>
  </section>

  <?php    
                    include 'template/footer.php'; 
                  ?>
