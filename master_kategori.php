<?php
require('database/koneksi.php');
?>
<html>

<head>
    <title>Kategori</title>
</head>

<link rel="stylesheet" href="assets/css/table.css">

<body>
    <h1>MASTER KATEGORI</h1>

    <p><a href="tambah_kategori.php">Tambah</a></p>

    <table border="1" align="center">
        <tr>
            <th width="50">No</th>
            <th width="50">Id</th>
            <th width="450">Nama</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $query = "SELECT * FROM kategori";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $nama = $row['nama'];

            $color = ($no % 2 == 1) ? "white" : "#eee";
        ?>

        <tr bgcolor=<?php echo $color; ?>>
            <td><?php echo $no; ?></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $nama; ?></td>
            <td>
                <a href="edit_kategori.php?id=<?php echo $row['id']; ?>"><input type="button" class="btn-edit"></a>
                <a href="hapus_kategori.php?id=<?php echo $row['id']; ?>"><input type="button" class="btn-delete"
                        src="images/hapus.png"></a>
            </td>
        </tr>
        <?php
            $no++;
        } ?>
    </table>
</body>

</html>