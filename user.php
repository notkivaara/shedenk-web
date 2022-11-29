<html>

<head>
    <title>Kategori</title>
</head>

<link rel="stylesheet" href="assets/css/table.css">

<body>
    <h1>User</h1>
    <br>
    <button type="submit" name="btn-tambah-produk" class="btn-tambah">Tambah</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <input type="text" class="search" placeholder="Cari">
                <br>
                <table border="1" align="center">
                    <tr>
                        <th width="50">No</th>
                        <th width="50">Id</th>
                        <th width="300">Nama</th>
                        <th width="250">Email</th>
                        <th width="140">Password</th>
                        <th width="150">Tanggal Register</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>USER1</td>
                        <td>Freda Adi </td>
                        <td>Fredaanakpolije@gmail.com</td>
                        <td>Fredauyee</td>
                        <td>13-05-2022</td>
                        <td>
                            <a href="edit_kategori.php?id="><input type="button" class="btn-edit"></a>
                            <a href="hapus_kategori.php?id="><input type="button" class="btn-delete"
                                    src="images/hapus.png"></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>