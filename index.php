<?php
require('database/koneksi.php');

if (isset($_POST['btn_login'])) {
    $user = $_POST['txt_email'];
    $pass = $_POST['txt_password'];

    if (!empty(trim($user)) && !empty(trim($pass))) {

        $query = "SELECT * FROM akun WHERE email = '$user'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {

            $userVal = $row['email'];
            $passVal = $row['password'];
            $role = $row['id_role'];
        }

        if ($num != 0) {
            if ($userVal == $user && $passVal == $pass) {
                if ($role == 1) {
                    header('Location: home.php');
                }
            } else {
                header('Location: index.php?error= Username atau Password Salah!');
                exit();
            }
        } else {
            header('Location: index.php?error= Admin tidak Ditemukan!');
            exit();
        }
    } else {
        header('Location: index.php?error= Data Tidak Boleh Kosong!');
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Style-->
    <link rel="stylesheet" href="css/login.css">

    <title>Login Page</title>
</head>

<body>
    <form action="index.php" method="POST">
        <section class="login d-flex">
            <div class="login-left w-50 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-6">
                        <div class="header">
                            <h1>Welcome Back!</h1>
                            <h2>Silahkan Login Terlebih Dahulu.</h2>
                            <?php
                            if (isset($_GET['error'])) {
                            ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="login-form">
                            <label for="username" class="label-username">Email</label><br>
                            <input type="text" name="txt_email" class="field-username" id="username"
                                placeholder="Masukan Username">
                            <br>
                            <label for="password" class="label-password">Password</label><br>
                            <input type="password" name="txt_password" class="field-password" id="password"
                                placeholder="Masukan Password">
                            <br>
                            <button type="submit" id="btn_login" name="btn_login" class="button-login">LOGIN</button>
                            <br>
                            <h1>Lupa Password? Hubungi Developer</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-right w-50 h-100 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/login_img1.jpg" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/login_img2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/login_img3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </section>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>