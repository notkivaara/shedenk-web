<?php
include '../database/koneksi.php';

session_start();

if (isset($_POST['btn_login'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_password'];

    if (!empty(trim($email)) && !empty(trim($pass))) {

        $query = "SELECT * FROM akun WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {

            $id = $row['id'];
            $nama = $row['nama'];
            $emailVal = $row['email'];
            $passVal = $row['password'];
            $role = $row['id_role'];
        }

        if ($num != 0) {
            if ($emailVal == $email && $passVal == $pass) {
                if ($role == 1) {

                    $_SESSION['id'] = $id;
                    $_SESSION['nama'] = $nama;
                    $_SESSION['email'] = $emailVal;
                    $_SESSION['password'] = $passVal;

                    header('Location: ../index.php?url=dashboard');
                } else if ($role == 3) {
                    $_SESSION['id'] = $id;
                    $_SESSION['nama'] = $nama;
                    $_SESSION['email'] = $emailVal;
                    $_SESSION['password'] = $passVal;

                    header('Location: ../index.php?url=dashboard');
                } else {
                    header('Location: ../login.php?error= Kamu Bukan Seorang Admin!');
                    exit();
                }
            } else {
                header('Location: ../login.php?error= Username atau Password Salah!');
                exit();
            }
        } else {
            header('Location: ../login.php?error= User tidak Ditemukan!');
            exit();
        }
    } else {
        header('Location: ../login.php?error= Data Tidak Boleh Kosong!');
        exit();
    }
}