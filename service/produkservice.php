<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

include '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($kon, "SELECT * FROM produk");
    
    $list = array();
    $list_gambar = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $result2 = mysqli_query($kon, "SELECT * FROM gambar WHERE id_produk ='".$row["id"]."'");
            while ($row2 = mysqli_fetch_assoc($result2)){
                array_push($list_gambar, array(
                    "id_produk" => $row2["id_produk"],
                    "nama" => $row2["nama"],
                ));
            }
            array_push($list, array(
                "id" => $row["id"],
                "nama" => $row["nama"],
                "id_kategori" => $row["id_kategori"],
                "harga" => $row["harga"],
                "deskripsi" => $row["deskripsi"],
                "status" => $row["status"],
                "gambar" => $list_gambar,
            ));
            $list_gambar = array();
        }
    } else {
        $list['message'] = "Data tidak ditemukan";
    }
    echo json_encode($list);
}