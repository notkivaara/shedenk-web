<?php
require('database/koneksi.php');


if (isset($_POST['simpan_tambahkategori'])) {

    $tambah = mysqli_query($koneksi, "INSERT INTO kategori (id, nama)
                                  VALUES ('$_POST[tid_tambahkategori]',
                                           '$_POST[tnama_tambahkategori]')");
    if ($tambah) {
        echo "<script>alert('Kategori Berhasil ditambahkan');
                document.location='index.php?url=kategori';
            </script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Data');
                document.location='index.php?url=kategori';
            </script>";
    }
}