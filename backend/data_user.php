 <?php  
session_start();
include '../config.php';
if(!isset($_SESSION['login_username'])) header("location:login.php");
include 'template/header.php';
  ?>        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <?php   
                  include '../config.php';

                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_user order by id_user desc"); ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Telepon</th>
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
                      <td><?php echo $data['nama'] ?></td>
                       <td><?php echo $data['username'] ?></td>
                       <td><?php echo $data['email'] ?></td>
                         <td><?php echo $data['tlp'] ?></td>

                        <td>
                         <a class="btn btn-danger" href="proses-hapus/hapus_user.php?id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 

                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div></div>
<?php    
                    include 'template/footer.php'; 
                  ?>
