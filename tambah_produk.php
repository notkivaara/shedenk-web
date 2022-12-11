<?php
require('database/koneksi.php');

if (isset($_POST['submit-tambah-produk'])) {
    // $tambah_gambar = mysqli_query($koneksi, "INSERT INTO gambar VALUES('$_POST[id_gambar]')");
    // $tambah_detail_gambar = mysqli_query($koneksi, "INSERT INTO detail_gambar VALUES('$_POST[id_gambar]', '$_POST[nama_gambar]')");
    $tambah_produk = mysqli_query($koneksi, "INSERT INTO produk (id, nama, tgl_terjual, id_gambar, id_kategori, harga, produk.status)
                                  VALUES ('$_POST[id_produk]',
                                           '$_POST[nama_produk]',
                                           NULL,NULL,'$_POST[id_kategori]','$_POST[harga]','Tersedia')");
    if ($tambah) {
        echo "<script>alert('Berhasil Menambahkan Data');
                document.location='index.php?url=kategori';
            </script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Data');
                document.location='index.php?url=kategori';
            </script>";
    }
}