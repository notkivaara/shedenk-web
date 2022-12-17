<?php
require('database/koneksi.php');

if (isset($_POST['simpan_tambahkategori'])) {

    $nama = $_POST['tnama_tambahkategori'];


    $dup = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama = '$nama'");
    $cek = mysqli_num_rows($dup);

    if ($cek == 0) {

        $tambah = mysqli_query($koneksi, "INSERT INTO kategori (id, nama)
        VALUES ('$_POST[tid_tambahkategori]',
                 '$nama')");
        if ($tambah) {
            echo "<script>alert('Kategori Berhasil ditambahkan');
                    document.location='index.php?url=kategori';
                    </script>";
        } else {
            echo "<script>alert('Gagal Menambahkan Data');
                    document.location='index.php?url=kategori';
                    </script>";
        }
    } else {
        echo "<script>alert('Nama Kategori Sudah Ada');
                    document.location='index.php?url=kategori';
                    </script>";
    }
}