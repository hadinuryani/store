<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../assets/css/login_register.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../assets/images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="../assets/images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="../controller/config.php?aksi=login" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-feather"></i>
                <input type="text" placeholder="Masukan Username Anda" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Masukan Password Anda" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
              <div class="text sign-up-text">Tidak Punya Akun? <label for="flip">Register</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Register</div>
        <form action="../controller/config.php?aksi=register" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Masukkan Nama Anda" name="nama" required>
              </div>
              <div class="input-box">
                <i class="fas fa-feather"></i>
                <input type="text" placeholder="Masukan Username Anda" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Masukan Email Anda" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-home"></i>
                <input type="text" placeholder="Masukan Alamat Anda" name="alamat" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Masukan Password Anda" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Register">
              </div>
              <div class="text sign-up-text">Sudah Punya Akun? <label for="flip">Login</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
