<?php
require('database/koneksi.php');

if (isset($_POST['hapus_user'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id = '$_POST[iduser]' ");

    if ($hapus) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='index.php?url=user';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='index.php?url=user';
            </script>";
    }
}