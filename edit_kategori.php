<?php
require('database/koneksi.php');

if (isset($_POST['update'])) {
    $idKat = $_POST['id'];
    $namaKat = $_POST['nama'];

    $query = "UPDATE kategori SET nama = '$namaKat' WHERE id = '$idKat'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: kategori.php');
}

$id = $_GET['id'];
$query = "SELECT * FROM kategori WHERE id = '$id'";
$result = mysqli_query($koneksi, $query) or die(mysqli_connect_error());

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $nama = $row['nama'];
}
?>

<html>

<head>
    <title>Edit Kategori</title>
</head>

<body>
    <form action="edit_kategori.php" method="POST">
        <p><input type="hidden" name="id" value="<?php echo $id; ?>"></p>
        <p>nama : <input type="text" name="nama" value="<?php echo $nama; ?>"></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="kategori.php">Kembali</a></p>
</body>

</html>