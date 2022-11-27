<html>

<head>
    <title>Kategori</title>
</head>

<link rel="stylesheet" href="assets/css/table.css">

<body>
    <h1>MASTER PRODUK</h1>

    <table border="1" align="center">
        <tr>
            <th width="50">No</th>
            <th width="50">Id</th>
            <th width="250">Nama</th>
            <th width="250">Kategori</th>
            <th width="120">Harga</th>
            <th width="100">Tanggal Input</th>
            <th colspan="2">Aksi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>barang1</td>
            <td>Gucci </td>
            <td>Baju </td>
            <td>Rp. 250.000</td>
            <td>13-05-2022</td>
            <td>
                <a href="edit_kategori.php?id="><input type="button" class="btn-edit"></a>
                <a href="hapus_kategori.php?id="><input type="button" class="btn-delete" src="images/hapus.png"></a>
            </td>
        </tr>
    </table>
</body>

</html>