<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit lowongann</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="backend/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="backend/lib/summernote.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_lowongann/bootstrap.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="backend/fontawesome-free/css/all.min.css">

	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>

<?php 
// koneksi ke DBMS
include '../../config.php'; 
$id_lowongan = $_GET["id_lowongan"];

// query data service berdasarkan id_lowongan
$lowongann = query("SELECT * FROM tbl_lowongan WHERE id_lowongan='$id_lowongan'")[0];

// ambil data dari tabel lowongann
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

  $nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
  $nama_penulis = htmlspecialchars($data["nama_penulis"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $tgl_publis = htmlspecialchars($data["tgl_publis"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $isi = $data["isi"];
  $tlp = htmlspecialchars($data["tlp"]);
  $email = htmlspecialchars($data["email"]);
  $fotolama = htmlspecialchars($data["fotolama"]);

  // cek apakah user pilih gambar baru atau tid_lowonganak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
  } else {
    $foto = upload();
  }

  $query = "UPDATE tbl_lowongan SET
            nama_perusahaan ='$nama_perusahaan',
             nama_penulis ='$nama_penulis',
             alamat ='$alamat',tgl_publis = '$tgl_publis',deskripsi = '$deskripsi',
             isi = '$isi',tlp = '$tlp',email = '$email',
            foto ='$foto'
             WHERE id_lowongan='$id_lowongan'";

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
        document.location.href = '../lowongan.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../lowongan.php';
        </script>";
    }
  }

?>

<nav class="navbar navbar-expand-lg navbar bg-primary fixed-top">
      <a class="navbar-brand" style="color: white" href="../lowongan.php"> <b>Kembali</b></a>    
    </nav>
  <div class="container">
  <!-- ini lowongann -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      
      <div class="row">
         <div class="col-sm-9">


           <input type="hidden" name="fotolama" value="<?= $lowongann["foto"]; ?>">

      <label for="judul" style="color: black;">Nama Perusahaan</label>
      <input type="teks" name="nama_perusahaan" required value="<?= $lowongann["nama_perusahaan"]; ?>" class =" form form-control">
      <br>
       <label for="judul" style="color: black;">Alamat</label>
      <input type="teks" name="alamat" required value="<?= $lowongann["alamat"]; ?>" class =" form form-control">
      <br>
       <label for="judul" style="color: black;">Deskripsi</label>
      <input type="teks" name="deskripsi" required value="<?= $lowongann["deskripsi"]; ?>" class =" form form-control">
      <br>

       <label for="isi" style="color: black;">Isi</label><br>
       <textarea id="editor" rows="10" name="isi" class="form-control" ><?php echo"$lowongann[isi]"; ?></textarea><br>

      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
      </div>

      <div class="col-sm-3">

      <label for="nama_penulis" style="color: black;">Nama penulis</label>
      <input type="" name="nama_penulis" required value="<?= $lowongann["nama_penulis"]; ?>" class =" form form-control">
      <br>
      <label for="nama_penulis" style="color: black;">Email</label>
      <input type="" name="email" required value="<?= $lowongann["email"]; ?>" class =" form form-control">
      <br>
      <label for="nama_penulis" style="color: black;">Telepon</label>
      <input type="" name="tlp" required value="<?= $lowongann["tlp"]; ?>" class =" form form-control">
      <br>
       <label for="nama_penulis" style="color: black;">Tanggal</label>
      <input type="date" name="tgl_publis" required value="<?= $lowongann["tgl_publis"]; ?>" class =" form form-control">
      <br>

   
      <label for="gambar">Gambar</label>
      <img src="../img/<?= $lowongann['foto']; ?>" width="200">
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


