<?php
require('database/koneksi.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - User</title>
    <style>
    a:link {
        text-decoration: none;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/custom.css">

<body>
    <h1>User</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <button type="submit" name="btn-tambah-user" class="btn btn-primary">+ Tambah Data</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr align="center">
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Hobi</th>
                            <th>Tanggal Register</th>
                            <th>Terakhir Update</th>
                            <th>role</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <!-- Menampilkan Data User -->
                        <?php
                        $query = "SELECT * FROM akun";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $email = $row['email'];
                            $password = $row['password'];
                            $hobi = $row['hobi'];
                            $treg = $row['tgl_register'];
                            $tupd = $row['tgl_update'];
                            $role = $row['id_role'];

                            $color = ($no % 2 == 1) ? "white" : "#eee";
                        ?>
                        <tr align="center" bgcolor=<?php echo $color; ?>>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $password; ?></td>
                            <td><?php echo $hobi; ?></td>
                            <td><?php echo $treg; ?></td>
                            <td><?php echo $tupd; ?></td>
                            <td><?php echo $role; ?></td>
                            <td>
                                <a href="#"><input type="button" class="btn btn-warning btn-sm" value="Edit"></a>
                                <a href="#"><input type="button" class="btn btn-danger btn-sm" value="Hapus"></a>
                            </td>
                        </tr>
                        <?php
                            $no++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>