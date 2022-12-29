<?php
require('database/koneksi.php');

if(isset($_POST['hapus_produk'])) {
    $jumlah_gambar = mysqli_query($koneksi, "SELECT COUNT(id_produk) FROM gambar WHERE id_produk = '$_POST[idproduk]';");
    $hapus_gambar = mysqli_query($koneksi, "DELETE FROM gambar WHERE id_produk = '$_POST[idproduk]';");
    $hapus_produk = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$_POST[idproduk]';");
    
    // unlink('upload/13-12-2022-foto1.jpeg');
    if ($hapus_gambar&&$hapus_produk) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='index.php?url=produk';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='index.php?url=produk';
            </script>";
    }
}