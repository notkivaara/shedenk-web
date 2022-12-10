<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editUser'])) {

    $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editUser]', email='$_POST[temail_editUser]', password='$_POST[tpass_editUser]', kota='$_POST[tkota_editUser]', hobi='$_POST[thobi_editUser]' WHERE id ='$_POST[tid_editUser]' ");

    if ($simpan) {
        echo "<script>alert('Berhasil Memperbarui Data');
                document.location='index.php?url=user';
            </script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='index.php?url=user';
            </script>";
    }
}