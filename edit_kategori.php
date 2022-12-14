<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editkategori'])) {

    $simpan = mysqli_query($koneksi, "UPDATE kategori SET nama = '$_POST[tnama_editkategori]' WHERE id ='$_POST[tid_editkategori]' ");

    if ($simpan) {
        echo "<script>alert('Kategori berhasil diubah');
                document.location='index.php?url=kategori';
            </script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='index.php?url=kategori';
            </script>";
    }
}