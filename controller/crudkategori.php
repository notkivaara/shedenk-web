<?php
include '../database/koneksi.php';

if (isset($_POST['simpan_tambahkategori'])) {

    $tnama = $_POST['tnama_tambahkategori'];


    $tdup = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama = '$tnama'");
    $cek = mysqli_num_rows($tdup);

    if ($cek == 0) {

        $tambah = mysqli_query($koneksi, "INSERT INTO kategori (id, nama)
        VALUES ('$_POST[tid_tambahkategori]',
                 '$tnama')");
        if ($tambah) {
            echo "<script>alert('Kategori Berhasil ditambahkan');
                    document.location='../index.php?url=kategori';
                    </script>";
        } else {
            echo "<script>alert('Gagal Menambahkan Data');
                    document.location='../index.php?url=kategori';
                    </script>";
        }
    } else {
        echo "<script>alert('Nama Kategori Sudah Ada');
                    document.location='../index.php?url=kategori';
                    </script>";
    }
} else if (isset($_POST['simpan_editkategori'])) {

    $enama = $_POST['tnama_editkategori'];

    $edup = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama = '$enama'");
    $cek2 = mysqli_num_rows($edup);

    if ($cek2 == 0) {

        $simpan = mysqli_query($koneksi, "UPDATE kategori SET nama = '$enama' WHERE id ='$_POST[tid_editkategori]' ");

        if ($simpan) {
            echo "<script>alert('Kategori berhasil diubah');
                    document.location='../index.php?url=kategori';
                </script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data');
                    document.location='../index.php?url=kategori';
                </script>";
        }
    } else {
        echo "<script>alert('Nama Kategori Sudah Ada');
                    document.location='../index.php?url=kategori';
                </script>";
    }
} else if (isset($_POST['hapus_kategori'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$_POST[idkategori]' ");

    if ($hapus) {
        echo "<script>alert('Kategori berhasil dihapus');
                document.location='../index.php?url=kategori';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='../index.php?url=kategori';
            </script>";
    }
}