<?php   
include 'config.php';
$lwn= mysqli_query($koneksi, "SELECT * FROM tbl_lowongan");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>KASAD</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="login-content">
                                <a href="backend/login_user.php">Register / Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Beranda</a></li>
                                    <li><a href="data_alumni.php">Data Alumni</a>
                                    <!-- <li><a href="about-us.html">Tentang Kami</a></li> -->
                                    <li><a href="lowongan.php">Lowongan</a></li>
                                    <!-- <li><a href="contact.html">Kontak</a></li> -->
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+6282210263379"><i class="icon-telephone-2"></i> <span>082210263379</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Lowongan</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area mt-50 section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                       
                    </div>
                </div>
            </div>
            <div class="row">
                 <?php while($lowongan =mysqli_fetch_assoc($lwn)):  ?> 
                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="popular-course-content">
                           <h5><?=$lowongan['nama_perusahaan']; ?></h5>
                            <span> <?=$lowongan['nama_penulis']; ?> | <?=$lowongan['tgl_publis']; ?></span>
                            <div class="course-ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p><?=$lowongan['deskripsi']; ?></p>
                            <a href="detail_lowongan.php?id_lowongan=<?php echo $lowongan['id_lowongan']; ?>" class="btn academy-btn btn-sm">Lihat Selengkapnya</a>
                        </div>
                        <div class="popular-course-thumb bg-img" style="background-image: url(backend/img/<?=$lowongan['foto']; ?>);"></div>
                    </div>
                </div>

               
<?php endwhile; ?>
                
            </div>
        </div>
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
                        <div class="course-icon">
                            <i class="icon-id-card"></i>
                        </div>
                        <div class="course-content">
                            <h4>Business School</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
                        <div class="course-icon">
                            <i class="icon-worldwide"></i>
                        </div>
                        <div class="course-content">
                            <h4>Marketing</h4>
                            <p>Lacinia, lacinia la cus non, fermen tum nisi.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
                        <div class="course-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="course-content">
                            <h4>Photography</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>Mari Kita Pererat dan Kembangkan Komunitas Alumni</h3>
                        <!-- <a href="#" class="btn academy-btn">Lebih Lanjut</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                            </div>
                            <p>Bersatu Kita Kuat dan Jaya.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Usefull Links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Beranda</a></li>
                                    <li><a href="#">Data Alumni</a></li>
                                    <li><a href="#">Lowongan</a></li>
                                    <li><a href="#">Berita Alumni</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Gallery</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="img/bg-img/gallery1.jpg" class="gallery-img" title="Gallery Image 1"><img src="img/bg-img/gallery1.jpg" alt=""></a>
                                <a href="img/bg-img/gallery2.jpg" class="gallery-img" title="Gallery Image 2"><img src="img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Kontak Kami</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>Jl. Raya Bogor Km 31, Depok</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Rizal: 081234567 <br>Annisa : 081234567</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>info@kasad.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>KASAD</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>