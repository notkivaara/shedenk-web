<?php
require('database/koneksi.php');

$tgl_update = date("y-m-d");

if (isset($_POST['simpan_editadmin'])) {

    $email = $_POST['temail_editadmin'];
    $pass = $_POST['tpass_editadmin'];
    $konpass = $_POST['tkonpass_editadmin'];


    $dup = mysqli_query($koneksi, "SELECT * FROM akun WHERE email = '$email' ");
    $cekEmail = mysqli_num_rows($dup);

    if ($pass == $konpass) {

        if ($cekEmail == 0) {
            $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editadmin]', email = '$email', password = '$pass', tgl_update='$tgl_update' WHERE id ='$_POST[tid_editadmin]' ");

            if ($simpan) {
                echo "<script>alert('Berhasil Memperbarui Data');
                    document.location='index.php?url=admin';
                </script>";
            } else {
                echo "<script>alert('Gagal Memperbarui Data');
                    document.location='index.php?url=admin';
                </script>";
            }
        } else {
            echo "<script>alert('Email Sudah Terpakai');
                        document.location='index.php?url=admin';
                    </script>";
        }
    } else {
        echo "<script>alert('Konfirmasi Password Salah');
                document.location='index.php?url=admin';
            </script>";
    }
}