 <?php  
session_start();
include '../config.php';
if(!isset($_SESSION['login_username'])) header("location:login.php");
include 'template/header.php';
  ?>        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Komentar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <?php   
                  include '../config.php';

                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_komen order by id_komen desc"); ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tentang</th>
                      <th>Isi</th>
                      <th>Status</th>
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
                       <td><?php echo $data['hal'] ?></td>
                       <td><?php echo $data['isi'] ?></td>
                         <td><?php echo $data['status'] ?></td>

                        <td>
                          <a class="btn btn-primary" href="proses-edit/edit_komentar.php?id_komen=<?php echo $data['id_komen'];?>">Tampilkan</a> 
                         <a class="btn btn-danger" href="proses-hapus/hapus_komen.php?id_komen=<?php echo $data['id_komen']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 

                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div></div>
<?php    
                    include 'template/footer.php'; 
                  ?>
