<?php
header('Content-Type: application/json; charset=utf8');

require_once('koneksiservice.php');

include '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($kon, "SELECT * FROM kategori");
    $list_kategori = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_kategori, array(
                "id" => $row["id"],
                "nama" => $row["nama"],
            ));
        }
    } else {
        $list_kategori['message'] = "Data Kategori tidak ditemukan";
    }
    echo json_encode($list_kategori);
}