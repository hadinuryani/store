<?php
session_start();
include '../model/model.php';
$model = new model();
if(isset($_SESSION['level']) == ""){
    echo '<script>alert("Anda Belum Login"); window.location="../view/login_register.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../assets/css/form.css">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  <form action="../controller/config.php?aksi=beli" method="post">
    <?php
    foreach($model->daftarbeli($_GET['id']) AS $barang){
    ?>
    <div class="beauty_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-12">
                  <div class="beauty_box">
                     <div><img src="<?php echo $barang['gambar'] ?>" class="image_3"></div>
                     <div class="nice-form-group col-md-12">
                        <label>Kategori</label>
                        <select>
                            <option><?php echo $barang['namakategori'] ?></option>
                        </select>
                    </div>
                  </div>
               </div>
               <div class="col-lg-8 col-sm-12">
                  <div class="beauty_box_1">
                  <div class="nice-form-group col-md-12">
                    <label>Nama Barang</label>
                    <input type="text" placeholder="Nama Barang" value="<?php echo $barang['merk'] ?> <?php echo $barang['nama_barang'] ?>" name="nmbarang" readonly required />
                    <input type="hidden" value="<?php echo $barang['id_barang'] ?>" name="id_barang">
                    <input type="hidden" value="<?php echo $_SESSION['id_user'] ?>" name="id_user">
                    <input type="hidden" value="<?php echo $barang['stok'] ?>" name="stok">
                  </div>

                  <div class="nice-form-group col-md-12">
                    <label>Tanggal Beli</label>
                    <input type="date" name="tgl_beli" required />
                    </div>

                  <div class="nice-form-group col-md-12">
                    <label>Harga</label>
                    <input type="number" placeholder="RP" name="harga" value="<?php echo $barang['harga'] ?>" readonly required />
                  </div>
                    
                  <div class="nice-form-group col-md-12">
                    <label>Jumlah Beli</label>
                    <input type="number" placeholder="Stok Barang" name="jumlah" value="<?php echo $barang['stok'] ?>" required />
                  </div>

                  <div class="nice-form-group col-md-12">
                    <input type="submit" value="Beli" class="btn btn-success" />
                    <a href="products.php" class="btn btn-danger">Kembali</a>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php } ?>
  </form>
</body>
</html>