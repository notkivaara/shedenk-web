<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'dashboard':
            include 'dashboard.php';
            break;
        case 'produk':
            include 'master_produk.php';
            break;
        case 'kategori':
            include 'master_kategori.php';
            break;
        case 'user':
            include 'user.php';
            break;
        case 'transaksi':
            include 'riwayat_transaksi.php.';
            break;
    }
}