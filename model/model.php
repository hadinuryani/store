<?php

use function PHPSTORM_META\map;

class model{
    var $host = "localhost";
    var $usr = "root";
    var $pass = "";
    var $db = "db_comerce";
    var $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host,$this->usr,$this->pass,$this->db);
    }

    function jumlahuser(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_user"));
    }

    function jumlahbarang(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_barang"));
    }

    function jumlahbeli($id){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian LEFT JOIN tbl_user ON tbl_pembelian.id_user = tbl_user.id_user WHERE tbl_pembelian.id_user='$id'"));
    }

    function jumlahlaporan(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian"));
    }

    function daftarbarang(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function daftarkategori(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_kategori");
        $hasil = [];
        while($kategori=mysqli_fetch_array($query)){
            $hasil[] = $kategori;
        }
        return $hasil;
    }

    function tambahbarang($id_kategori,$gambar,$nmbarang,$harga,$merk,$stok){
        mysqli_query($this->conn,"INSERT INTO tbl_barang (id_barang,id_kategori,gambar,nama_barang,harga,merk,stok) VALUES ('NULL','$id_kategori','$gambar','$nmbarang','$harga','$merk','$stok')");
    }

    function hapusbarang($id){
        mysqli_query($this->conn,"DELETE FROM tbl_barang WHERE id_barang='$id'");
    }

    function editbarang($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang WHERE id_barang='$id'");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function updatebarang($id_barang,$id_kategori,$gambar,$nmbarang,$harga,$merk,$stok){
        mysqli_query($this->conn,"UPDATE tbl_barang SET id_kategori='$id_kategori', gambar='$gambar', nama_barang='$nmbarang', harga='$harga', merk='$merk', stok='$stok' WHERE id_barang='$id_barang'");
    }

    function updatebarang1($id_barang,$id_kategori,$nmbarang,$harga,$merk,$stok){
        mysqli_query($this->conn,"UPDATE tbl_barang SET id_kategori='$id_kategori', nama_barang='$nmbarang', harga='$harga', merk='$merk', stok='$stok' WHERE id_barang='$id_barang'");
    }

    function register($nama,$username,$password,$email,$alamat){
        mysqli_query($this->conn,"INSERT INTO tbl_user (id_user,nama,username,password,level,email,alamat) VALUES ('NULL','$nama','$username','$password','user','$email','$alamat')");
    }

    function login($username,$password){
        $login = mysqli_query($this->conn,"SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
        return mysqli_fetch_assoc($login);
    }

    function daftarbeli($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_barang.id_barang='$id'");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function beli($id_user,$id_barang,$tgl_beli,$jumlah,$total){
        mysqli_query($this->conn,"INSERT INTO tbl_pembelian (id_pembelian,id_user,id_barang,tgl_beli,jumlah,total,statusbeli) VALUES ('NULL','$id_user','$id_barang','$tgl_beli','$jumlah','$total','konfirmasi')");
    }

    function tambahkategori($kategori){
        mysqli_query($this->conn,"INSERT INTO tbl_kategori (id_kategori,namakategori) VALUES ('NULL','$kategori')");
    }

    function updatekategori($id,$kategori){
        mysqli_query($this->conn,"UPDATE tbl_kategori SET namakategori='$kategori' WHERE id_kategori='$id'");
    }

    function hapuskategori($id){
        mysqli_query($this->conn,"DELETE FROM tbl_kategori WHERE id_kategori='$id'");
    }

    function cari($cari){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_barang.nama_barang LIKE '%".$cari."%'");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function kategori1(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori=1");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function kategori2(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori=2");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function kategori3(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori=4");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function kategori4(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori=5");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function kategori5(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_barang LEFT JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori WHERE tbl_kategori.id_kategori=6");
        $hasil = [];
        while($barang=mysqli_fetch_array($query)){
            $hasil[] = $barang;
        }
        return $hasil;
    }

    function daftaruser(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_user");
        $hasil = [];
        while($user=mysqli_fetch_array($query)){
            $hasil[] = $user;
        }
        return $hasil;
    }

    function keranjang($id){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_pembelian LEFT JOIN tbl_user ON tbl_pembelian.id_user = tbl_user.id_user LEFT JOIN tbl_barang ON tbl_pembelian.id_barang = tbl_barang.id_barang WHERE tbl_pembelian.id_user='$id'");
        $hasil = [];
        while($keranjang=mysqli_fetch_array($query)){
            $hasil[] = $keranjang;
        }
        return $hasil;
    }
    
    function laporan(){
        $query = mysqli_query($this->conn,"SELECT * FROM tbl_pembelian LEFT JOIN tbl_user ON tbl_pembelian.id_user = tbl_user.id_user LEFT JOIN tbl_barang ON tbl_pembelian.id_barang = tbl_barang.id_barang");
        $hasil = [];
        while($laporan=mysqli_fetch_array($query)){
            $hasil[] = $laporan;
        }
        return $hasil;
    }

    function setuju($id){
        mysqli_query($this->conn,"UPDATE tbl_pembelian SET statusbeli='disetujui' WHERE id_pembelian='$id'");
    }

    function tolak($id){
        mysqli_query($this->conn,"UPDATE tbl_pembelian SET statusbeli='ditolak' WHERE id_pembelian='$id'");
    }

    function hapuslaporan($id){
        mysqli_query($this->conn,"DELETE FROM tbl_pembelian WHERE id_pembelian='$id'");
    }

    function selesai($id){
        mysqli_query($this->conn,"UPDATE tbl_pembelian SET statusbeli='dibeli' WHERE id_pembelian='$id'");
    }

    function vga(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_barang WHERE id_kategori=1"));
    }

    function cpu(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_barang WHERE id_kategori=2"));
    }

    function ram(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_barang WHERE id_kategori=4"));
    }

    function ssd(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_barang WHERE id_kategori=6"));
    }

    function dibeli(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian WHERE statusbeli='dibeli'"));
    }

    function ditolak(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian WHERE statusbeli='ditolak'"));
    }

    function konfirmasi(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian WHERE statusbeli='konfirmasi'"));
    }

    function disetujui(){
        return mysqli_num_rows(mysqli_query($this->conn,"SELECT * FROM tbl_pembelian WHERE statusbeli='disetujui'"));
    }
}
?>