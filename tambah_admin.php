<?php
require('database/koneksi.php');

$tgl_reg = date("y-m-d");
$tgl_upd = date("y-m-d");

if (isset($_POST['simpan_tambahadmin'])) {


    $email = $_POST['temail_tambahadmin'];
    $pas = $_POST['tpass_tambahadmin'];
    $konpass = $_POST['tkonpass_tambahadmin'];

    $dup = mysqli_query($koneksi, "SELECT * FROM akun  WHERE email = '$email'");
    $cek = mysqli_num_rows($dup);

    if ($pas == $konpass) {
        if ($cek == 0) {

            $tambah = mysqli_query($koneksi, "INSERT INTO akun (id, nama, email, password, tgl_register, tgl_update, id_role)
            VALUES ('$_POST[tid_tambahadmin]',
                     '$_POST[tnama_tambahadmin]',
                     '$email',
                     '$_POST[tpass_tambahadmin]',
                     '$tgl_reg',
                     '$tgl_upd',
                     1)");

            if ($tambah) {
                echo "<script>alert('Berhasil Menambahkan Data');
                    document.location='index.php?url=admin';
                    </script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Data');
                    document.location='index.php?url=admin';
                    </script>";
            }
        } else {
            echo "<script>alert('Email Sudah Terpakai');
                    document.location='index.php?url=admin';
                    </script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sama');
                    document.location='index.php?url=admin';
                    </script>";
    }
}