<?php
require('database/koneksi.php');

if (isset($_POST['simpan_tambahadmin'])) {

    $tambah = mysqli_query($koneksi, "INSERT INTO akun (id, nama, email, password, id_role)
                                  VALUES ('$_POST[tid_tambahadmin]',
                                           '$_POST[tnama_tambahadmin]',
                                           '$_POST[temail_tambahadmin]',
                                           '$_POST[tpass_tambahadmin]',
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
}