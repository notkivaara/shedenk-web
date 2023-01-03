<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

$tgl_upd = date("y-m-d");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['nama']) && $_POST['nama'] != "" && isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "" && isset($_POST['hobi']) && $_POST['hobi'] != "") {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hobi = $_POST['hobi'];

        $query = "SELECT * FROM akun";
        $cek = mysqli_query($kon, $query);
        $count = mysqli_num_rows($cek);

        if ($count == 1) {
            echo json_encode("gagal");
        } else {
            $simpan = "UPDATE akun SET nama = '$nama', email = '$email', password = '$password', tgl_update='$tgl_upd' WHERE id ='$id' ";
            $cek2 = mysqli_query($kon, $simpan);
            if ($cek2) {
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