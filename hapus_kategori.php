<?php
require('database/koneksi.php');

if (isset($_POST['hapus_kategori'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$_POST[idkategori]' ");

    if ($hapus) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='index.php?url=kategori';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='index.php?url=kategori';
            </script>";
    }
}