<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Berita</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/asekolahku/backend/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/asekolahku/backend/lib/summernote.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_berita/bootstrap.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="http://localhostasekolahku/backend/fontawesome-free/css/all.min.css">

	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>

<?php 
// koneksi ke DBMS
include '../../config.php'; 
$id_sejarah = $_GET["id_sejarah"];


$query =mysqli_query($koneksi, "SELECT * FROM tbl_sejarah where id_sejarah='$id_sejarah'
             ");
$data = mysqli_fetch_assoc($query);




?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
      <a class="navbar-brand" href="http://localhost/asekolahku/backend/berita_sekolah.php"> <b>Sekolahku</b></a>    
    </nav>
  <div class="container">
  <!-- ini berita -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit Berita</h1>
      <div class="row">
         <div class="col-sm-9">

          
           

      <br>

       <label for="isi" style="color: black;">Isi</label><br>
       <textarea id="editor" rows="10" name="isi_sejarah" class="form-control" ><?php echo"$data[isi_sejarah]"; ?></textarea><br>

      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
      </div>

      
  </div>
  </div>
</form>
</div>



<?php 
if (isset($_POST['edit'])) {
$isi_sejarah = $_POST['isi_sejarah'];
$ubah = mysqli_query($koneksi, "UPDATE tbl_sejarah SET isi_sejarah='$isi_sejarah' WHERE id_sejarah='$id_sejarah'");

 

 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diedit!');
      window.location.href = '../sejarah.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../sejarah.php';
    </script> ";

    
   }
  }
  ?>


<script>
    $(document).ready(function(){
      $('#editor').summernote({
        height:200,
        
      });
    });

  </script>


