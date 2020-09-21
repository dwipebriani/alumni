 <?php  
session_start();
if(!isset($_SESSION['login_username'])) header("location:login.php");
include 'template/header.php';
include '../config.php';

  ?>        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Sudah Bekerja</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <?php   
                  include '../config.php';

                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_sudah_kerja order by id desc"); ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  

                   <div class="text-left">
                  <a href="proses-tambah/tambah_sbk.php" class="btn btn-primary">[+]Tambah</a>
                </div><br>

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pekerjaan</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php   
                    $no=1; 
                    while ($data = mysqli_fetch_array($tampil)) {

                      ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['pekerjaan'] ?></td>
                      <td><?php echo $data['nama'] ?></td>
                       <td><?php echo $data['jabatan'] ?></td>
                         <td><img src="img/<?php echo $data['foto']; ?>" width="90"></td>

                        <td><a class="btn btn-primary" href="proses-edit/edit_sbk.php?id=<?php echo $data['id'];?>"><i class="fa fa-w fa-edit"></i></a> 

                         <a class="btn btn-danger" href="proses-hapus/hapus_sbk.php?id=<?php echo $data['id']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 

                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div></div>
<?php    
                    include 'template/footer.php'; 
                  ?>
