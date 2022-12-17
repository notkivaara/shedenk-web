<?php
require('database/koneksi.php');

$tgl_update = date("y-m-d");

if (isset($_POST['simpan_editUser'])) {

    // $id = 
    $pass = $_POST['tpass_editUser'];
    $konpass = $_POST['tkonpass_editUser'];
    $email = $_POST['temail_editUser'];

    // $data = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email'")

    $dup = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email'");
    $cek = mysqli_num_rows($dup);
    if ($cek == 0) {
        if ($pass == $konpass) {
            $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editUser]', email='$email', password='$pass', hobi='$_POST[thobi_editUser]', tgl_update='$tgl_update' WHERE id ='$_POST[tid_editUser]' ");
            if ($simpan) {
                echo "<script>alert('Berhasil Memperbarui Data');
                    document.location='index.php?url=user';
                </script>";
            } else {
                echo "<script>alert('Gagal Memperbarui Data');
                    document.location='index.php?url=user';
                </script>";
            }
        } else {
            echo "<script>alert('Konfirmasi Password Salah');
                    document.location='index.php?url=user';
                </script>";
        }
    } else {
        echo "<script>alert('Email Sudah Terpakai');
                    document.location='index.php?url=user';
                </script>";
    }
}