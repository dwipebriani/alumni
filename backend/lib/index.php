
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>sekolahku</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       
       
      </a>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

          <a class="navbar-brand navbar-nav-right" href="../berita_sekolah.php"  >
          
          <span style="color: blue">Kembali</span></a> 

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



    <link rel="stylesheet" type="text/css" href="http://localhost/asekolahprojek/backend/lib/summernote.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_berita/bootstrap.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="http://localhost/asekolahprojek/backend/fontawesome-free/css/all.min.css">

	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>
<?php 
 include '../../config.php';

// ambil data kategori
$result = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");

function query($query) {
 include '../../config.php';
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data) {
include '../../config.php';

  $judul = htmlspecialchars($data["judul"]);
  $nama_penulis = htmlspecialchars($data["nama_penulis"]);
  $kategori = htmlspecialchars($data["kategori"]);
  $tanggal = htmlspecialchars($data["tanggal"]);
  $isi = $data["isi"];
 
  //  upload foto
  $foto = upload();
  if( !$foto ) {
    return false; 
  }

  $query = "INSERT INTO tbl_berita_sekolah
          VALUES ('','$kategori', '$nama_penulis','$tanggal','$judul','$foto','$isi')";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
 
}

function upload(){

  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name']; 

  //  cek apakah tidak ada foto yang di upload
  if( $error === 4 ) {
    echo "<script>
        alert('pilih foto terlebih dahulu!');
    </script>";
    return false;
  }
  // cek apakah yang diupload adalah foto
  $ekstensifotoValid = ['jpg', 'jpeg', 'png'];
  $ekstensifoto = explode('.', $namaFile);
  $ekstensifoto = strtolower(end($ekstensifoto));
  if( !in_array($ekstensifoto, $ekstensifotoValid)){
    echo "<script>
        alert('yang anda upload bukan foto!');
    </script>";
    return false;
  }

 

  // lolos pengecekan, foto siap diupload
  // generate nama foto baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensifoto;
  $folder = "../img/";
  
move_uploaded_file($tmpName, $folder.$namaFileBaru);

  return $namaFileBaru;

}

if( isset($_POST["submit"]) ){

  // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
 		 <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../berita_sekolah.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../berita_sekolah.php';
    </script> 

    ";
   }
 }




?>


	<div class="container">
	<!-- ini berita -->
<form action="" method="post" enctype="multipart/form-data">
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-9">
        <label>Judul</label>
          <input type="text" name="judul" class="form-control" required>
            <br>
          
          <label>Isi Berita</label>
            <textarea type="text" name="isi" class="form-control" id="editor"></textarea>
              <br><br>
             <button class="btn btn-info form-control mt-3" type="submit" name="submit">Kirim</button>
         </div>

        <div class="col-sm-3">
           <label>Penulis</label>
            <input type="" class="form-control" name="nama_penulis" required>
          <br>

       
           <label>Tanggal</label>
            <input  class="form-control" name="tanggal" type="date" required>
          <br>

          <label>Kategori</label><br>
            <select name="kategori">
              <?php while($berita = mysqli_fetch_assoc($result)):  ?>
               <option class="form form-control" value="<?= $berita['id_kategori'] ?>"><?= $berita['kategori']?></option>
             <?php endwhile; ?>
            </select>
            <br><br>

          <label>foto</label>
            <img src="../img/<?= $berita['foto']; ?>">
              <input type="file" name="foto">
            </div>
       
      </from>
    </div>

  </div>

	</div>
	<script>
		$(document).ready(function(){
			$('#editor').summernote({
				height:200,
				
			});
		});

	</script>

</html>