<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editkategori'])) {

    $id = $_POST['tid_editkategori'];
    $nama = $_POST['tnama_editkategori'];

    $dup = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama = '$nama'");
    $cek2 = mysqli_num_rows($dup);

    if ($cek2 == 0) {

        $simpan = mysqli_query($koneksi, "UPDATE kategori SET nama = '$nama' WHERE id ='$_POST[tid_editkategori]' ");

        if ($simpan) {
            echo "<script>alert('Kategori berhasil diubah');
                    document.location='index.php?url=kategori';
                </script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data');
                    document.location='index.php?url=kategori';
                </script>";
        }
    } else {
        echo "<script>alert('Nama Kategori Sudah Ada');
                    document.location='index.php?url=kategori';
                </script>";
    }
}