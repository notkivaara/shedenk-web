<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editadmin'])) {

    $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editadmin]', email = '$_POST[temail_editadmin]', password = '$_POST[tpass_editadmin]' WHERE id ='$_POST[tid_editadmin]' ");

    if ($simpan) {
        echo "<script>alert('Berhasil Memperbarui Data');
                document.location='index.php?url=admin';
            </script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='index.php?url=admin';
            </script>";
    }
}