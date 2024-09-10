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
      <title>Produk</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="../assets/css/form.css">
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
      <link rel="stylesheet" href="../assets/https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-dark bg-dark">
               <a class="logo" href="index.html"><h1 style="color: white;">HD Tech</h1></a>
               <div class="search_section">
                  <ul>
                     <?php if(isset($_SESSION['level']) == ""){ ?><li><a href="login_register.php">Log In</a></li> <?php }else{ ?><li><a href="../controller/config.php?aksi=logout">Logout</a></li> <?php } ?>
                     <?php if(isset($_SESSION['level']) == "user"){ if($_SESSION['level'] == "user"){ ?><li><a href="keranjang.php"><img src="../assets/images/shopping-bag.png"></a></li><?php } } ?>
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
      </div>
      <!--header section end -->
      <!-- product section start -->
      <div class="row">
         <div class="col-md-12">
            <div class="container">
               <br>
               <center><h1>Daftar Produk</h1></center>
               <form action="products.php" method="get">
               <?php if(isset($_SESSION['level']) == "admin"){ if($_SESSION['level'] == "admin"){ ?> <a href="tambah_barang.php" class="btn btn-success">Tambah Produk</a> <a href="daftar_kategori.php" class="btn btn-primary">Daftar Kategori</a> <br><br><?php } } ?>
               <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="btn col-md-4" placeholder="Seacrh" style="background-color: rgb(200, 208, 209); color: black;" > <input type="submit" value="Cari" class="btn btn-success"> <input type="submit" value="Semua" class="btn btn-warning">
               </form><br>
               <form action="products.php" method="get">
                <input type="submit" value="VGA" name="vga" class="btn btn-warning"> <input type="submit" value="CPU" name="cpu" class="btn btn-warning"> <input type="submit" value="RAM" name="ram" class="btn btn-warning"> <input type="submit" value="Mobo" name="mobo" class="btn btn-warning"> <input type="submit" value="SSD" name="ssd" class="btn btn-warning">
               </form>
               <div class="row  row-cols-1 row-cols-md-5 g-4">
                  <?php
                  if(isset($_GET['cari'])){
                     $cari = $_GET['cari'];
                     $listbarang = $model->cari($cari);
                  }elseif(isset($_GET['vga'])){
                     $listbarang = $model->kategori1();
                  }
                  elseif(isset($_GET['cpu'])){
                     $listbarang = $model->kategori2();
                  }
                  elseif(isset($_GET['ram'])){
                     $listbarang = $model->kategori3();
                  }
                  elseif(isset($_GET['mobo'])){
                     $listbarang = $model->kategori4();
                  }
                  elseif(isset($_GET['ssd'])){
                     $listbarang = $model->kategori5();
                  }else{
                     $listbarang = $model->daftarbarang();
                  }
                  if(!empty($listbarang)){
                     $no = 1;
                     foreach($listbarang AS $barang){ ?>
                     <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                        <div class="col" style="height: 100%;">
                        <div class="card" style="width: 15rem;">
                        <img class="card-img-top" src="<?php echo $barang['gambar'] ?>" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title"><?php echo $barang['merk'] ?> <?php echo $barang['nama_barang'] ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item">Rp <?php echo $barang['harga'] ?></li>
                           <li class="list-group-item"><?php echo $barang['namakategori'] ?></li>
                        </ul>
                        <div class="card-body">
                           <?php if(isset($_SESSION['level']) == "admin"){
                              if($_SESSION['level'] == "admin"){ ?>
                           <a href="edit_barang.php?id=<?php echo $barang['id_barang'] ?>" class="btn btn-primary">Edit</a>
                           <a href="../controller/config.php?id=<?php echo $barang['id_barang'] ?>&aksi=hapusbarang" class="btn btn-danger">Hapus</a>
                           <?php } } if(isset($_SESSION['level']) == "user"){
                              if($_SESSION['level'] == "user"){
                                 if($barang['stok'] > 0){ ?>
                           <a href="beli.php?id=<?php echo $barang['id_barang'] ?>" class="btn btn-success">Beli</a>
                           <?php }else{
                              echo '<span class="badge btn-warning">Stok Habis</span>';
                           } } } ?>
                           <?php if(isset($_SESSION['level']) == ""){ ?>
                              <a href="beli.php?id=<?php echo $barang['id_barang'] ?>" class="btn btn-success">Beli</a>
                           <?php } ?>
                        </div>
                        </div>
                        </div>
                     </div>
                  <?php }
                  } ?>
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

