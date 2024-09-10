<?php
include '../model/model.php';
$model = new model();
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
    <div class="beauty_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-12">
                  <div class="beauty_box">
                  <form action="../controller/config.php?aksi=tambahkategori" method="post">
                  <div class="nice-form-group col-md-12">
                    <label>Nama Kategori</label>
                    <input type="text" placeholder="Nama Kategori" value="" name="nmkategori"  required/>
                  </div>
                  <div class="nice-form-group col-md-12">
                    <input type="submit" value="Simpan" class="btn btn-success" />
                    <a href="products.php" class="btn btn-danger">Kembali</a>
                  </div>
                  </form>
                  </div>
               </div>

                <div class="col-lg-8 col-sm-12">
                    <div class="beauty_box_1">
                    <form action="../controller/config.php?aksi=updatekategori" method="post">
                        <?php foreach($model->daftarkategori() AS $kategori){ ?>
                        <div class="nice-form-group col-md-6">
                            <label>Daftar Kategori</label>
                            <input type="text" placeholder="Nama Kategori" value="<?php echo $kategori['namakategori'] ?>" name="nmkategori"  required/>
                            <input type="hidden" value="<?php echo $kategori['id_kategori'] ?>" name="id_kategori">
                        </div>
                        <div class="nice-form-group col-md-6">
                            <input type="submit" value="Edit" class="btn btn-primary" />
                            <a href="../controller/config.php?id=<?php echo $kategori['id_kategori'] ?>&aksi=hapuskategori" class="btn btn-danger">hapus</a>
                        </div>
                        <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
         </div>
      </div>
</body>
</html>