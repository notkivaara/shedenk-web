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

        $res = $kon->query($query);
        $reuslt = [];

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $reuslt['loginStatus'] = true;
            $reuslt['message'] = "Login Berhasil";

            $reuslt["akun"] = $row;
        } else {
            $reuslt['loginStatus'] = false;
            $reuslt['message'] = "invalid Login Detail";
        };

        $json_data = json_encode($reuslt);

        echo $json_data;
    }
} else {
    echo json_encode(
        array(
            'code' => 400,
            'status' => 'REQUEST METHOD GAGAL!!!',
        )
    );
}