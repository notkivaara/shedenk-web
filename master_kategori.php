<?php
require('database/koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/table.css">
</head>

<body>
    <h1>Master Kategori</h1>
    <br>
    <button type="submit" name="btn-tambah-kategori" class="btn-tambah">Tambah</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <input type="text" class="search" placeholder="Cari">
                <br>
                <table class="table" border="1" align="center">
                    <tr>
                        <th width="50">No</th>
                        <th width="50">Id</th>
                        <th width="850">Nama</th>
                        <th colspan="2">Aksi</th>
                    </tr>

                    <!-- Menampilkan Data -->
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
                            <a href="#"><input type="button" class="btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#modalEditKategori<?= $no ?>"></a>
                            <a href="#"><input type="button" class="btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusKategori<?= $no ?>"></a>
                        </td>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEditKategori<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kategori</h1>
                                    </div>
                                    <form action="edit_kategori.php" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Id Kategori</label>
                                                <input type="text" class="form-control" value="<?= $id ?>"
                                                    name="tid_editkategori" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control" name="tnama_editkategori"
                                                    value="<?= $nama ?>" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="simpan_editkategori">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit End -->

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapusKategori<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kategori</h1>
                                    </div>
                                    <form action="hapus_kategori.php" method="POST">
                                        <input type="hidden" name="idkategori" value="<?= $id ?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menghapus <?= $nama ?>?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="hapus_kategori">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus End -->
                    </tr>
                    <?php
                        $no++;
                    } ?>
                </table>
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                        </div>

                        <!-- Auto Generate Id -->
                        <?php
                        $auto = mysqli_query($koneksi, "select max(id) as max_code from kategori");
                        $data = mysqli_fetch_array($auto);
                        $code = $data['max_code'];
                        $urutan = (int)substr($code, 1, 3);
                        $urutan++;
                        $huruf = "K";
                        $id_kat = $huruf . sprintf("%03s", $urutan);
                        ?>

                        <form action="tambah_kategori.php" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Id Kategori</label>
                                    <input type="text" class="form-control" value="<?php echo $id_kat ?>"
                                        name="tid_tambahkategori" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" name="tnama_tambahkategori"
                                        placeholder="Masukan Nama" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary"
                                    name="simpan_tambahkategori">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah End -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>