<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['email']) && $_GET['email'] != "" && isset($_GET['password']) && $_GET['password'] != "") {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $query = "SELECT * FROM akun WHERE email='$email' AND password ='$password' AND id_role = 2";
        $cek = mysqli_query($kon, $query);
        $count = mysqli_num_rows($cek);

        if ($count == 1) {
            echo json_encode("berhasil");
        } else {
            echo json_encode("gagal");
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