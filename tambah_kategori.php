<?php
require('database/koneksi.php');

if (isset($_POST['input'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $query = "INSERT INTO kategori VALUES ('$id', '$nama')";
    $result = mysqli_query($koneksi, $query);
    header('Location : master_kategori.php');
}
?>
<html>

<head>
    <title>Tambah Kategori</title>
</head>

<body>
    <form action="tambah_kategori.php" method="POST">
        <p>id : <input type="text" name="id" required></p>
        <p>nama : <input type="text" name="nama" required></p>
        <button type="submit" name="input">Tambah</button>
    </form>
    <p><a href="master_kategori.php">Kembali</a></p>
</body>

</html>