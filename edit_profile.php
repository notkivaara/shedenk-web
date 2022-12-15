<?php
require('database/koneksi.php');

if (isset($_POST['btn_simpanprofile'])) {

    $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_profile]', email='$_POST[temail_profile]', password='$_POST[tpass_profile]'  WHERE id ='$_POST[tid_profile]' ");

    if ($simpan) {
        echo "<script>alert('Berhasil Memperbarui Data, Silahkan Login Ulang!');
                document.location='login.php';
            </script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='login.php';
            </script>";
    }
}