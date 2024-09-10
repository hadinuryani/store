<?php
session_start();
include '../model/model.php';
$model = new model();
$aksi = $_GET['aksi'];

if($aksi == "tambahbarang"){
    $nmgambar = $_FILES['gambar']['name'];
    $type = $_FILES['gambar']['type'];
    $size = $_FILES['gambar']['size'];
    $cahce = $_FILES['gambar']['tmp_name'];
    $max_size = 2 * 1024 * 1024;
    $acc = array("image/png","image/jpg","image/jpeg");

    if(in_array($type,$acc)){
        if($size <= $max_size){
            $lokasi = '../assets/images/' . $nmgambar;
            move_uploaded_file($cahce,$lokasi);
            $model->tambahbarang($_POST['kategori'],$lokasi,$_POST['nmbarang'],$_POST['harga'],$_POST['merk'],$_POST['stok']);
            echo '<script>alert("Menambahkan Produk Berhasil"); window.location="../view/products.php";</script>';
        }else{
            echo '<script>alert("Max Ukuran Gambar Hanya 2 MB"); window.history.back();</script>';
        }
    }else{
        echo '<script>alert("File Harus Berupa Gambar (.png, .jpg, .jpeg)"); window.history.back();</script>';
    }
}elseif($aksi == "updatebarang"){
    $nmgambar = $_FILES['gambar']['name'];
    $type = $_FILES['gambar']['type'];
    $size = $_FILES['gambar']['size'];
    $cahce = $_FILES['gambar']['tmp_name'];
    $max_size = 2 * 1024 * 1024;
    $acc = array("image/png","image/jpg","image/jpeg");

    if(in_array($type,$acc)){
        if($size <= $max_size){
            $lokasi = '../assets/images/' . $nmgambar;
            move_uploaded_file($cahce,$lokasi);
            $model->updatebarang($_POST['id_barang'],$_POST['kategori'],$lokasi,$_POST['nmbarang'],$_POST['harga'],$_POST['merk'],$_POST['stok']);
            echo '<script>alert("Mengubah data Produk Berhasil"); window.location="../view/products.php";</script>';
        }else{
            echo '<script>alert("Max Ukuran Gambar hanya 2 MB"); window.location="../view/product.php";</script>';
        }
    }elseif(empty($nmgambar)){
        $model->updatebarang1($_POST['id_barang'],$_POST['kategori'],$_POST['nmbarang'],$_POST['harga'],$_POST['merk'],$_POST['stok']);
        echo '<script>alert("Mengubah data Produk Berhasil"); window.location="../view/products.php";</script>';
    }else{
        echo '<script>alert("File Harus Berupa Gambar (.png, .jpg, .jpeg)"); window.history.back();</script>';
    }
}elseif($aksi == "hapusbarang"){
    $model->hapusbarang($_GET['id']);
    echo '<script>alert("Hapus Produk Berhasil"); window.location="../view/products.php";</script>';
}elseif($aksi == "register"){
    $model->register($_POST['nama'],$_POST['username'],md5($_POST['password']),$_POST['email'],$_POST['alamat']);
    echo '<script>alert("Register Berhasil"); window.location="../view/login_register.php";</script>';
}elseif($aksi == "login"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $login = $model->login($username,$password);
    if($login){
        $_SESSION['id_user'] = $login['id_user'];
        $_SESSION['nama'] = $login['nama'];
        $_SESSION['username'] = $login['username'];
        $_SESSION['level'] = $login['level'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['alamat'] = $login['alamat'];
        echo '<script>alert("Login Berhasil Selamat Datang User"); window.location="../view/index.php";</script>';
    }else{
        echo '<script>alert("Login Gagal Username atau Password Anda Salah"); window.history.back();</script>';
    }
}elseif($aksi == "logout"){
    session_destroy();
    echo '<script>alert("Anda Telah Logout"); window.location="../view/index.php";</script>';
}elseif($aksi == "beli"){
    $jumlah = $_POST['jumlah'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $total = $jumlah * $harga;

    if($jumlah <= $stok){
        $model->beli($_POST['id_user'],$_POST['id_barang'],$_POST['tgl_beli'],$_POST['jumlah'],$total);
        echo '<script>alert("Pembelian Berhasil"); window.location="../view/keranjang.php";</script>';
    }else{
        echo '<script>alert("Maaf Jumlah Barang tidak tersedia"); window.history.back();</script>';
    }
}elseif($aksi == "tambahkategori"){
    $model->tambahkategori($_POST['nmkategori']);
    echo '<script>alert("Tambah Kategori Berhasil"); window.location="../view/daftar_kategori.php";</script>';
}elseif($aksi == "updatekategori"){
    $model->updatekategori($_POST['id_kategori'],$_POST['nmkategori']);
    echo '<script>alert("Ubah Kategori Berhasil"); window.location="../view/daftar_kategori.php";</script>';
}elseif($aksi == "hapuskategori"){
    $model->hapuskategori($_GET['id']);
    echo '<script>alert("Hapus Kategori Berhasil"); window.location="../view/daftar_kategori.php";</script>';
}elseif($aksi == "setuju"){
    $model->setuju($_GET['id']);
    echo '<script>alert("Anda Telah Menyetujui Pesanan"); window.location="../view/laporan.php";</script>';
}elseif($aksi == "tolak"){
    $model->tolak($_GET['id']);
    echo '<script>alert("Anda Telah Menolak Pesanan"); window.location="../view/laporan.php";</script>';
}elseif($aksi == "hapuslaporan"){
    $model->hapuslaporan($_GET['id']);
    echo '<script>alert("Anda Telah Menghapus Pembelian ini"); window.location="../view/laporan.php";</script>';
}elseif($aksi == "selesai"){
    $model->selesai($_GET['id']);
    echo '<script>alert("Pesanan Telah Selesai"); window.location="../view/keranjang.php";</script>';
}
?>