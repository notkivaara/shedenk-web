<?php
include '../database/koneksi.php';

$tgl_upd = date("y-m-d");

if (isset($_POST['simpan_editUser'])) {

    $epass = $_POST['tpass_editUser'];
    $ekonpass = $_POST['tkonpass_editUser'];
    $eemail = $_POST['temail_editUser'];

    if ($epass == $ekonpass) {
        $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editUser]', email='$eemail', password='$epass', hobi='$_POST[thobi_editUser]', tgl_update='$tgl_upd' WHERE id ='$_POST[tid_editUser]' ");
        if ($simpan) {
            echo "<script>alert('Berhasil Memperbarui Data');
                    document.location='../index.php?url=user';
                </script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data');
                    document.location='../index.php?url=user';
                </script>";
        }
    } else {
        echo "<script>alert('Konfirmasi Password Salah');
                    document.location='../index.php?url=user';
                </script>";
    }
} else if (isset($_POST['hapus_user'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id = '$_POST[iduser]' ");

    if ($hapus) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='../index.php?url=user';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='../index.php?url=user';
            </script>";
    }
}