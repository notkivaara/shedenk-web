<?php
    include_once 'database/produk.php';
    include_once 'database/koneksi.php';
    $produk = new produk();
    $produk->connectMySQL();
    $jumlahtransaksi = $produk->getTransaksi();
    $produktersisa = $produk->getProdukTersisa();
    $produkterjual = $produk->getProdukTerjual();
?>
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <a href="#"><i class="fa-solid fa-wallet text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">Rp.<span class="count"><?php echo $produk->showTotalHargaTransaksi();?></span></div>
                                <div class="stat-heading">Pendapatan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <a href="#"><i class="fa-solid fa-cart-arrow-down text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo $produkterjual?></span></div>
                                <div class="stat-heading">Produk Terjual</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <a href="#"><i class="fa-solid fa-receipt text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo $jumlahtransaksi?></span></div>
                                <div class="stat-heading">Transaksi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <a href="#"><i class="fa-solid fa-clipboard-user text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?php echo $produktersisa?></span></div>
                                <div class="stat-heading">Produk Tersisa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Widgets -->
    <!--  Traffic  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Grafik</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div id="traffic-chart" class="traffic-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
</div>