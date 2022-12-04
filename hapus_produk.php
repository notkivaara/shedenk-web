<?php
require('database/koneksi.php');

if (isset($_POST['hapus_produk'])) {
    $hapus_detail_gambar = mysqli_query($koneksi, "DELETE FROM detail_gambar WHERE id_gambar = '$_POST[idgambar]';");
    $hapus_produk = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$_POST[idproduk]';");
    $hapus_gambar = mysqli_query($koneksi, "DELETE FROM gambar WHERE id = '$_POST[idgambar]';");
    if ($hapus_gambar&&$hapus_produk&&$hapus_detail_gambar) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='index.php?url=produk';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='index.php?url=produk';
            </script>";
    }
}