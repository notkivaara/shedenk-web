<?php
require('database/koneksi.php');

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$id'") or die(mysqli_connect_error());
header("location: kategori.php");