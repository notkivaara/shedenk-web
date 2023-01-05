<?php
include '../database/koneksi.php';

$tgl_reg = date("y-m-d");
$tgl_upd = date("y-m-d");

if (isset($_POST['simpan_tambahadmin'])) {


    $temail = $_POST['temail_tambahadmin'];
    $tpas = $_POST['tpass_tambahadmin'];
    $tkonpass = $_POST['tkonpass_tambahadmin'];

    $tdup = mysqli_query($koneksi, "SELECT * FROM akun  WHERE email = '$temail'");
    $tcek = mysqli_num_rows($tdup);

    if ($tpas == $tkonpass) {
        if ($tcek == 0) {

            $tambah = mysqli_query($koneksi, "INSERT INTO akun (id, nama, email, password, hobi, tgl_register, tgl_update, id_role, gambar)
            VALUES ('$_POST[tid_tambahadmin]',
                     '$_POST[tnama_tambahadmin]',
                     '$temail',
                     '$_POST[tpass_tambahadmin]',
                      NULL,
                     '$tgl_reg',
                     '$tgl_upd',
                     1,
                     NULL)");

            if ($tambah) {
                echo "<script>alert('Berhasil Menambahkan Data');
                    document.location='../home.php?url=admin';
                    </script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Data');
                    document.location='../home.php?url=admin';
                    </script>";
            }
        } else {
            echo "<script>alert('Email Sudah Terpakai');
                    document.location='../home.php?url=admin';
                    </script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sama');
                    document.location='../home.php?url=admin';
                    </script>";
    }
} else if (isset($_POST['simpan_editadmin'])) {

    $eemail = $_POST['temail_editadmin'];
    $epass = $_POST['tpass_editadmin'];
    $ekonpass = $_POST['tkonpass_editadmin'];

    if ($epass == $ekonpass) {

        $simpan = mysqli_query($koneksi, "UPDATE akun SET nama = '$_POST[tnama_editadmin]', email = '$eemail', password = '$epass', tgl_update='$tgl_upd',  WHERE id ='$_POST[tid_editadmin]' ");

        if ($simpan) {
            echo "<script>alert('Berhasil Memperbarui Data');
                    document.location='../home.php?url=admin';
                </script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data');
                    document.location='../home.php?url=admin';
                </script>";
        }
    } else {
        echo "<script>alert('Konfirmasi Password Salah');
                document.location='../home.php?url=admin';
            </script>";
    }
} else if (isset($_POST['hapus_admin'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM akun WHERE id = '$_POST[idadmin]' ");

    if ($hapus) {
        echo "<script>alert('Berhasil Menghapus Data');
                document.location='../home.php?url=admin';
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');
                document.location='../home.php?url=admin';
            </script>";
    }
}