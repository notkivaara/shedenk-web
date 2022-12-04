<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editproduk'])) {

    $simpan = mysqli_query($koneksi, "UPDATE produk SET nama = '$_POST[tnama_editproduk]', id_kategori='$_POST[tkategori_editproduk]', harga='$_POST[tharga_editproduk]', produk.status='$_POST[tstatus_editproduk]' WHERE id ='$_POST[tid_editproduk]' ");

    if ($simpan) {
        echo "<script>alert('Berhasil Memperbarui Data');
                document.location='index.php?url=produk';
            </script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='index.php?url=produk';
            </script>";
    }
}