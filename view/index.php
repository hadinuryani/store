<?php
session_start();
include '../model/model.php';
$model = new model();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Komptech</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../assets/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="../assets/js/Chart.bundle.js"></script>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-dark bg-dark">
               <a class="logo" href="index.html"><h1 style="color: white;">HD Tech</h1></a>
               <div class="search_section">
                  <ul>
                     <?php if(isset($_SESSION['level']) == ""){ ?><li><a href="login_register.php">Log In</a></li> <?php }else{?> <li><a href="../controller/config.php?aksi=logout">Logout</a></li> <?php } ?>
                     <?php if(isset($_SESSION['level']) == "user"){ if($_SESSION['level'] == "user"){ ?><li><a href="keranjang.php"><img src="../assets/images/shopping-bag.png"></a></li><?php } }?>
                  </ul>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample01">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="clients.php">Anggota</a>
                     </li>
                     <?php if(isset($_SESSION['level']) == "admin"){ if($_SESSION['level'] == "admin"){ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="laporan.php">Laporan</a>
                     </li>
                     <?php } } ?>
                     <?php if(isset($_SESSION['level']) == "user"){ if($_SESSION['level'] == "user"){ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="keranjang.php">Keranjang</a>
                     </li>
                     <?php } } ?>
                     <?php if(isset($_SESSION['level']) == ""){ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="login_register.php">Login</a>
                     </li>
                     <?php }else{ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="../controller/config.php?aksi=logout">Logout</a>
                     </li>
                     <?php } ?>
                  </ul>
               </div>
            </nav>
         </div>
         <!--banner section start -->
         <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">50%</span> Discount Online Shop</h4>
                                 <p class="banner_text">Toko HD Tech Sedang Mengadakan Discount Besar-besaran nih, Ayo Buruan Belanja sebelum discount habis </p>
                                 <div class="book_bt"><a href="products.php">Belanja Sekarang</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="../assets/images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                        <div class="button_main"><button class="all_text">All</button><input type="text" class="Enter_text" placeholder="Apa yang Anda Cari" name=""><button class="search_text">Search</button></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">70%</span> Discount Online Shop</h4>
                                 <p class="banner_text">Diskon Lebih Besar Khusus Untuk Pengguna Baru, ayo buruan belanja, kouta terbatas </p>
                                 <div class="book_bt"><a href="products.php">Belanja Sekarang</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="../assets/images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                        <div class="button_main"><button class="all_text">All</button><input type="text" class="Enter_text" placeholder="Enter keywords" name=""><button class="search_text">Search</button></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital"><span class="font_size_90">02</span> September - 02 Oktober</h4>
                                 <p class="banner_text">Hanya setiap pada tanggal 02 September Sampai 02 Oktober, Ayo Buruan Belanja Sekarang</p>
                                 <div class="book_bt"><a href="products.php">Belanja Sekarang</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="../assets/images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                        <div class="button_main"><button class="all_text">All</button><input type="text" class="Enter_text" placeholder="Enter keywords" name=""><button class="search_text">Search</button></div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class=""><img src="../assets/images/left-icon.png"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class=""><img src="../assets/images/right-icon.png"></i>
               </a>
            </div>
         </div>
         <!--banner section end -->
      </div>
      <!--header section end -->
      <!--category section start -->
      <div class="container">
         <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                     <?php echo $model->jumlahuser() ?>
                    Anggota</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="clients.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                     <?php echo $model->jumlahbarang() ?>
                    Produk</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="products.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                     <?php if(isset($_SESSION['level']) == "user"){
                        if($_SESSION['level'] == "user"){ ?>
                     <?php echo $model->jumlahbeli($_SESSION['id_user']) ?>
                     <?php } } ?>
                    Check Out</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="keranjang.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                    <?php if(isset($_SESSION['level']) == "admin"){
                        if($_SESSION['level'] == "admin"){ ?>
                     <?php echo $model->jumlahlaporan() ?>
                     <?php } } ?>
                    Laporan</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="laporan.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
      </div>
      </div>
      <!-- category section end -->
      <!-- beauty product section start -->
      <div class="beauty_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-12">
                  <div class="beauty_box">
                     <h1 class="bed_text">Data Pembelian</h1>
                     <canvas id="myChartpie"></canvas>
  <script>
 var ctp = document.getElementById("myChartpie").getContext('2d');
 var myChartpie = new Chart(ctp, {
 type: 'pie',
 data: {
 labels: ["diterima", "ditolak", "konfirmasi", "diproses"],
 datasets: [{
 label: '',
 data: [
 <?php 
 echo $model->dibeli();
 ?>, 
 <?php 
 echo $model->ditolak();
 ?>, 
 <?php 
 echo $model->konfirmasi()
 ?>, 
 <?php 
 echo $model->disetujui();
 ?>
 ],
 backgroundColor: [
 'rgba(255, 99, 132, 0.2)',
 'rgba(54, 162, 235, 0.2)',
 'rgba(255, 206, 86, 0.2)',
 'rgba(75, 192, 192, 0.2)'
 ],
 borderColor: [
 'rgba(255,99,132,1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 206, 86, 1)',
 'rgba(75, 192, 192, 1)'
 ],
 borderWidth: 1
 }]
 },
 options: {
 scales: {
 yAxes: [{
 ticks: {
 beginAtZero:true
 }
 }]
 }
 }
 });
 </script>
                  </div>
               </div>
               <div class="col-lg-8 col-sm-12">
                  <div class="beauty_box_1">
                     <h1 class="bed_text_1">Daftar Kategori Produk</h1>
                     <canvas id="myChartgfx"></canvas>
  <script>
 var ctx = document.getElementById("myChartgfx").getContext('2d');
 var myChartgfx = new Chart(ctx, {
 type: 'bar',
 data: {
 labels: ["VGA", "CPU", "RAM", "SSD"],
 datasets: [{
 label: '',
 data: [
 <?php 
 echo $model->vga();
 ?>, 
 <?php 
 echo $model->cpu();
 ?>, 
 <?php 
 echo $model->ram()
 ?>, 
 <?php 
 echo $model->ssd();
 ?>
 ],
 backgroundColor: [
 'rgba(255, 99, 132, 0.2)',
 'rgba(54, 162, 235, 0.2)',
 'rgba(255, 206, 86, 0.2)',
 'rgba(75, 192, 192, 0.2)'
 ],
 borderColor: [
 'rgba(255,99,132,1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 206, 86, 1)',
 'rgba(75, 192, 192, 1)'
 ],
 borderWidth: 1
 }]
 },
 options: {
 scales: {
 yAxes: [{
 ticks: {
 beginAtZero:true
 }
 }]
 }
 }
 });
 </script>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- product section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-sm-12">
                  <h4 class="information_text">HD Tech</h4>
                  <p class="dummy_text">HD Tech adalah aplikasi berbasis web tentang toko online dan menjual berbagai perlengkapan audio, dan web ini hanyalah sebuah projek percobaan yang dikerjakan oleh satu orang(full Stack)</p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="information_main">
                     <h4 class="information_text">Pembuat</h4>
                     <p class="many_text">Ahmad Hadi</p>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="information_main">
                     <h4 class="information_text">Contact Us</h4>
                     <p class="call_text"><a href="#">+62 81259277769</a></p>
                     <p class="call_text"><a href="#">+62 123456789</a></p>
                     <p class="call_text"><a href="#">hadii@gmail.com</a></p>
                     <div class="social_icon">
                        <ul>
                           <li><a href="https://www.facebook.com/profile.php?id=100029479186064"><img src="../assets/images/fb-icon.png"></a></li>
                           <li><a href="https://www.linkedin.com/in/ahmad-hadi-n-359974308/"><img src="../assets/images/linkedin-icon.png"></a></li>
                           <li><a href="https://www.instagram.com/hdnr.yn/"><img src="../assets/images/instagram-icon.png"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright_section">
               <h1 class="copyright_text">
               Copyright 2024 By Ahmad Hadi
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- Javascript files-->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/popper.min.js"></script>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/jquery-3.0.0.min.js"></script>
      <script src="../assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../assets/js/custom.js"></script>
      <!-- javascript --> 
      <script src="../assets/js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
      <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
   </body>
</html>

