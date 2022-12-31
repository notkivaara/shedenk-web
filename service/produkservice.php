<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

include '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($kon, "SELECT * FROM produk");
    $result2 = mysqli_query($kon, "SELECT produk.id, gambar.* FROM produk JOIN gambar ON produk.id = gambar.id_produk");
    $list = array();
    $list_gambar = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row2 =mysqli_fetch_assoc($result2)){
            array_push($list_gambar, array(
                "id_produk" => $row2["id_produk"],
                "gambar" => $row2["nama"],
            ));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list, array(
                "id" => $row["id"],
                "nama" => $row["nama"],
                "id_kategori" => $row["id_kategori"],
                "harga" => $row["harga"],
                "status" => $row["status"],
                "gambar" => $list_gambar,
            ));
        }
    } else {
        $list['message'] = "Data tidak ditemukan";
    }
    echo json_encode($list);
}