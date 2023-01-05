<?php

if ($_SESSION['id_role'] != 3) {
    echo "<script>alert('Kamu Bukan Super Admin');
            document.location='home.php?url=dashboard';
        </script>";
}
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
    <h1>Data User</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr align="center">
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hobi</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <!-- Menampilkan Data User -->
                        <?php
                        include 'database/koneksi.php';

                        $query = "SELECT * FROM akun WHERE id_role = 2";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $email = $row['email'];
                            $hobi = $row['hobi'];

                            $color = ($no % 2 == 1) ? "white" : "#eee";
                        ?>
                        <tr align="center" bgcolor=<?php echo $color; ?>>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $hobi; ?></td>
                            <td>
                                <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalHapusUser<?= $no ?>" value="Hapus"></a>
                            </td>


                            <!-- Modal Hapus Kategori-->
                            <div class="modal fade" id="modalHapusUser<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus User
                                            </h1>
                                        </div>
                                        <form action="controller/cruduser.php" method="POST">
                                            <input type="hidden" name="iduser" value="<?= $id ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Apakah Anda Ingin Menghapus <?= $nama ?>?
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="hapus_user">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Hapus Kategori -->
                        </tr>
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
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>