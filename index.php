<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "Login Dulu";
    header('Location: login.php');
}

$sesId = $_SESSION['id'];
$sesNama = $_SESSION['nama'];
$sesEmail = $_SESSION['email'];
$sesPass = $_SESSION['password'];

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shedenk Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-fontawesome.css/all.css">
    <link rel="apple-touch-icon" href="images/logo.shedenk.png">
    <link rel="shortcut icon" href="images/logo.shedenk.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff !important;
    }

    .traffic-chart {
        min-height: 335px;
    }

    #flotPie1 {
        height: 150px;
    }

    #flotPie1 td {
        padding: 3px;
    }

    #flotPie1 table {
        top: 20px !important;
        right: -10px !important;
    }

    .chart-container {
        display: table;
        min-width: 270px;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #flotLine5 {
        height: 105px;
    }

    #flotBarChart {
        height: 150px;
    }

    #cellPaiChart {
        height: 160px;
    }
    </style>
    <link rel="stylesheet" href="index.html" />
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/c147fe44e9.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="?url=dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        <hr>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Master</a>
                        <hr>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="?url=produk">Produk</a>
                                <h1></h1>
                            </li>
                            <li><i class="fa fa-bars"></i><a href="?url=kategori">Kategori</a></li>
                            <hr>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Akun</a>
                        <hr>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="?url=user">User</a>
                                <h1></h1>
                            </li>
                            <li><i class="fa fa-bars"></i><a href="?url=admin">Admin</a></li>
                            <hr>
                        </ul>
                    </li>
                    <li>
                        <a href="?url=transaksi" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-th"></i>Riwayat Transaksi</a>
                        <hr>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <img class="w-25 h-25" src="images/logo.shedenk.png" alt="Logo">
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                                <img class="user-avatar rounded-circle" src="images/zein.png" alt="User Avatar">
                            </a>
                            <div class="user-menu dropdown-menu">
                                <li><a href="#" class="profile" data-bs-toggle="modal"
                                        data-bs-target="#modalprofile">Profile</a>
                                    <h1></h1>
                                </li>
                                <li><i class="logout"></i><a href="logout.php">Logout</a></li>
                            </div>
                        </div>

                    </div>
                </div>
        </header>
        <!-- /#header -->

        <!-- Content -->
        <div class="content">
            <h1 class="h3 mb-4"><?php include 'navigasi.php' ?></h1>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
    <!-- Modal Profile -->
    <div class="modal fade" id="modalprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controller/crudprofile.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" class="form-control" value="<?php echo $sesId ?>" name="tid_profile"
                            readonly>
                        <div class="mb-3">
                            <label class="form-label">Nama User</label>
                            <input type="text" class="form-control" value="<?php echo $sesNama ?>" name="tnama_profile"
                                placeholder="Masukan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo $sesEmail ?>"
                                name=" temail_profile" placeholder="Masukan Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" value="<?php echo $sesPass ?>" name=" tpass_profile"
                                placeholder="Masukan Password" required>
                        </div>
                        <!-- <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="form-label">Password Baru</label>
                                <input type="text" class="form-control" value="" name=" tpassbaru_profile"
                                    placeholder="Masukan Password" required>
                            </div>
                            <div class="col-auto ">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="text" class="form-control" name=" tkonpass_profile"
                                    placeholder="Masukan Password" required>
                            </div>
                        </div> -->
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="btn_simpanprofile">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal Profile -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <!--Local Stuff-->
        <script>
        jQuery(document).ready(function($) {
            "use strict";
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    series: [   
                        [0, 18000, 35000, 25000, 22000, 35000, 25000, 22000, 15000, 10000,25000, 22000],
                        [0, 33000, 15000, 20000, 15000, 3000,8000, 18000, 35000, 25000, 22000, 15000]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: true
                    }
                });

                chart.on('draw', function(data) {
                    if (data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect
                                    .height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
        });
        </script>
</body>

</html>