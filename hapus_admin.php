<?php
require('database/koneksi.php');

if (isset($_POST['hapus_admin'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id = '$_POST[idadmin]' ");

    if ($hapus) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='index.php?url=admin';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='index.php?url=admin';
            </script>";
    }
}