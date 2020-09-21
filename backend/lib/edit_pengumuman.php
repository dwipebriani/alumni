<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit pengumuman</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/asekolahku/backend/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/asekolahku/backend/lib/summernote.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_pengumuman/bootstrap.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="http://localhost/asekolahku/backend/fontawesome-free/css/all.min.css">

	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>

<?php 
// koneksi ke DBMS
include '../../config.php'; 
$id_pengumuman = $_GET["id_pengumuman"];

// query data service berdasarkan id_pengumuman
$pengumuman = query("SELECT * FROM tbl_pengumuman WHERE id_pengumuman = '$id_pengumuman'")[0];

// ambil data dari tabel pengumuman
$result2 = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");



function query($query) {
include '../../config.php'; 
  $result2 = mysqli_query($koneksi, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result2) ) {
    $rows[] = $row;
  }
  return $rows;
}

function ubah($data){
  global $koneksi;

  $id_pengumuman = $data["id_pengumuman"];
  $judul = htmlspecialchars($data["judul"]);
  $nama_penulis = htmlspecialchars($data["nama_penulis"]);
  $tanggal = htmlspecialchars($data["tanggal"]);
  $isi = $data["isi"];
  $catatan = $data["catatan"];
  $fotolama = htmlspecialchars($data["fotolama"]);

  // cek apakah user pilih gambar baru atau tid_pengumumanak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
  } else {
    $foto = upload();
  }

  $query = "UPDATE tbl_pengumuman SET
            judul ='$judul',
             nama_penulis ='$nama_penulis',
             
             isi = '$isi', tanggal = '$tanggal', 
            foto ='$foto', catatan='$catatan'
             WHERE id_pengumuman =  $id_pengumuman";

mysqli_query ($koneksi, $query);

return mysqli_affected_rows($koneksi);


}

function upload() {

  $namaFile = $_FILES['foto'] ['name'];
  $ukuranFile =$_FILES ['foto'] ['size'];
  $error = $_FILES ['foto'] ['error'];
  $tmpName = $_FILES ['foto'] ['tmp_name'];

  // cek apakah tidak ada foto yanag di upload
  if($error === 4){
    echo "<script>
    alert('pilih foto yang di pilih');
    </script>";
    return false;

  }

   // cek apakah yang diupload adalah foto
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
        alert('yang anda upload bukan gambar!');
    </script>";
    return false;
    }
  
 // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  $folder = "../img/";
  

 move_uploaded_file($tmpName, $folder.$namaFileBaru);


  return $namaFileBaru;

}

if(isset($_POST['submit'])){
    
    if( ubah($_POST) > 0){
      echo "
        <script>
        alert('data berhasil di edit')
        document.location.href = '../pengumuman.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../pengumuman.php';
        </script>";
    }
  }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
      <a style="color: white" class="navbar-brand" href="../pengumuman.php"> <b>Kembali</b></a>    
    </nav>
  <div class="container">
  <!-- ini pengumuman -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit pengumuman</h1>
      <div class="row">
         <div class="col-sm-9">

           <input type="hidden" name="id_pengumuman" value="<?= $pengumuman["id_pengumuman"]; ?>">
           <input type="hidden" name="fotolama" value="<?= $pengumuman["foto"]; ?>">

      <label for="judul" style="color: black;">Judul</label>
      <input type="teks" name="judul" required value="<?= $pengumuman["judul"]; ?>" class =" form form-control">

      <br>

       <label for="isi" style="color: black;">Isi</label><br>
       <textarea id="editor" rows="10" name="isi" class="form-control" ><?php echo"$pengumuman[isi]"; ?></textarea><br>
       <div class="form-group">
                
                <input class="form-control" name="catatan" value="<?= $pengumuman["catatan"]; ?>"  required="">
              </div>

      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
      </div>

      <div class="col-sm-3">

      <label for="nama_penulis" style="color: black;">Nama penulis</label>
      <input type="" name="nama_penulis" required value="<?= $pengumuman["nama_penulis"]; ?>" class =" form form-control">
      <br>
       <label for="nama_penulis" style="color: black;">Tanggal</label>
      <input type="date" name="tanggal" required value="<?= $pengumuman["tanggal"]; ?>" class =" form form-control">
      <br>

   
      <label for="gambar">Gambar</label>
      <img src="../img/<?= $pengumuman['foto']; ?>" width="200">
      <br><br>
      <input type="file" name="foto" id="foto">
      <br>
      
     </div>
  </div>
  </div>
</form>
</div>

<script>
    $(document).ready(function(){
      $('#editor').summernote({
        height:200,
        
      });
    });

  </script>


