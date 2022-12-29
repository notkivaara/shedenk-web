<?php
require('database/koneksi.php');
require('database/produk.php');
$produk = new produk();
$produk->connectMySQL();
$id_gambar=$produk->autoGenerateIdGambar();

if(isset($_POST['simpan_tambahproduk'])) {
    $limit = 10 * 1024 * 1024;
    $ekstensi = array('png','jpg','jpeg','gif');
    $jumlahFile = count($_FILES['foto']['name']);
        for($x=0; $x<$jumlahFile; $x++){
            $namafile = $_FILES['foto']['name'][$x];
            $tmp = $_FILES['foto']['tmp_name'][$x];
            $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
            $ukuran = $_FILES['foto']['size'][$x];
            if($ukuran > $limit){
            header("location:index.php?url=produk&alert=gagal_ukuran");
            }else{
            if(!in_array($tipe_file, $ekstensi)){
            header("location:index.php?url=produk&alert=gagal_ektensi");
            }else{
            move_uploaded_file($tmp, 'upload/'.date('d-m-Y').'-'.$_POST['id_produk'].$namafile);
            $y = date('d-m-Y').'-'.$_POST['id_produk'].$namafile;
            $tambah_detail= mysqli_query($koneksi,"INSERT INTO gambar VALUES('$_POST[id_produk]', '$y')");
        // header("location:index.php?url=produk&alert=simpan");
        }
        }
        }
    // $tambah_detail_gambar = mysqli_query($koneksi, "INSERT INTO detail_gambar VALUES('$_POST[id_gambar]', '$_POST[nama_gambar]')");
    $tambah_produk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$_POST[id_produk]', '$_POST[nama_produk]', NULL, '$_POST[id_kategori]','$_POST[harga]','Tersedia')");
    if ($tambah_detail&&$tambah_produk) {
        echo "<script>alert('Berhasil Menambahkan Data');
                document.location='index.php?url=produk';
            </script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Data');
                document.location='index.php?url=produk';
            </script>";
    }
}