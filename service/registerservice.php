<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

include '../database/koneksi.php';


$tgl_reg = date("y-m-d");
$tgl_upd = date("y-m-d");


$auto = mysqli_query($koneksi, "select max(id) as max_code from akun WHERE id_role = 2");
$data = mysqli_fetch_array($auto);
$code = $data['max_code'];
$urutan = (int)substr($code, 1, 3);
$urutan++;
$huruf = "U";
$id_user = $huruf . sprintf("%03s", $urutan);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama']) && $_POST['nama'] != "" && isset($_POST['email']) && $_POST['email'] != "") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hobi = $_POST['hobi'];
        // $gambar = $_POST['gambar'];

        $query = "SELECT * FROM akun WHERE email = '$email' ";
        $cek = mysqli_query($kon, $query);
        $count = mysqli_num_rows($cek);

        if ($count == 1) {
            echo json_encode("Email Sudah Terdaftar");
        }
        // else if ($gambar == "") {
        //     $insert1 = mysqli_query($koneksi, "INSERT INTO akun (id, nama, email, password, tgl_register, tgl_update, id_role, gambar)
        //     VALUES ('$id_user',
        //              '$nama',
        //              '$email',
        //              '$password',
        //              '$tgl_reg',
        //              '$tgl_upd',
        //              2,
        //              NULL)");
        //     $cek2 = mysqli_query($kon, $insert);
        //     if ($cek2) {
        //         echo json_encode("berhasil");
        //     }
        // } 
        else {
            $insert2 = "INSERT INTO akun (id, nama, email, password, tgl_register, tgl_update, id_role)
            VALUES ('$id_user',
                     '$nama',
                     '$email',
                     '$password',
                     '$tgl_reg',
                     '$tgl_upd',
                     2)";
            $cek3 = mysqli_query($kon, $insert2);
            if ($cek3) {
                echo json_encode("berhasil");
            }
        }
    }
} else {
    echo json_encode(
        array(
            'code' => 400,
            'status' => 'REQUEST METHOD GAGAL!!!',
        )
    );
}