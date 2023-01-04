<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="login w-50 h-100%">
            <form action="controller/loginvalidasi.php" method="POST">
                <h1>Login</h1>
                <hr>
                <?php
                if (isset($_GET['error'])) {
                ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="">Email</label>
                <input type="text" placeholder="Masukan Email" name="txt_email">
                <label for="">Password</label>
                <input type="password" placeholder="Masukan Password" name="txt_password">
                <button type="submit" class="button-login" name="btn_login" id="btn-login">Login</button>
                <br>
            </form>
        </div>
        <div class="right w-50 h-100% ">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
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
                        <img src="images/login_img1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/login_img2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/login_img3.jpg" class="d-block w-100" alt="...">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="js/sweetalert2.min.js"></script>

</body>

</html>