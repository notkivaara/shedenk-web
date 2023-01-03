<?php
include_once 'database/produk.php';
include_once 'database/koneksi.php';
$produk = new produk();
$produk->connectMySQL();
$result_rkategori = $produk->getKategori();
?>
<!-- ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <!-- <div id="liveAlertPlaceholder"></div> -->
    <?php
                if (isset($_GET['error'])) {
                ?>
    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="bi-check-circle-fill"></i>
        <?php echo $_GET['error']?>
        <button type="button" class="btn-close mt-0" data-bs-dismiss="alert"></button>
    </div>
    <?php } ?>
    <h1>Master Produk</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <!-- btn_tambah atau modalTambahProduk di ID-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambahProduk">+
                        Tambah Data</button>
                    <!-- BUTTON BAWAH CONTOH -->
                    <div class="modal fade" id="modalTambahProduk" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="tambah_produk.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Id Produk</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $produk->autoGenerateIdProduk();?>" name="id_produk"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama_produk"
                                                placeholder="Masukkan Nama Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select class="form-select" name="id_kategori">
                                                <option>Pilih Kategori</option>
                                                <?php
                                                $produk->showKategori($result_rkategori);
                                            ?>
                                            </select>
                                        </div>
                                        <label for="harga" class="form-label">Harga</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control" name="harga" aria-label="rupiah">
                                        </div>
                                        <div class="mb-3">
                                            <input type="file" id="foto" name="foto[]" onchange="preview_image();"
                                                multiple />
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="preview" class="form-label">Preview</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="image_preview"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            name="simpan_tambahproduk">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END BUTTON BAWAH CONTOH -->
                    <!-- <button type="submit" name="btn_tambah" class="btn btn-primary">+ Tambah Data</button> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <table class="table">
                        <tr align="center">
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <!-- Menampilkan Data -->
                        <?php
                    $query = "SELECT produk.*, kategori.id as id_kategori, kategori.nama as nama_kategori FROM produk JOIN kategori ON produk.id_kategori = kategori.id";
                    $result_rproduk = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_array($result_rproduk)) {
                        $id = $row['id'];
                        $id_kategori = $row['id_kategori'];
                        $nama = $row['nama'];
                        $harga = $row['harga'];
                        $kategori = $row['nama_kategori'];
                        $status = $row['status'];
                    ?>
                        <tr align="center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $kategori?></td>
                            <td><?php echo "Rp. ".$harga; ?></td>
                            <?php if($status=="Tersedia"){
                            echo '<td><button class="btn btn-success btn-sm">Tersedia</button></td>';
                        }else {
                            echo '<td><button class="btn btn-danger btn-sm">Terjual</button></td>';
                        }?>
                            <td>
                                <a href="#"><input type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalGambarProduk<?= $no ?>" value="View"></a>
                            </td>
                            <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEditProduk<?= $no ?>" value="Edit"></a>
                            <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusProduk<?= $no ?>" value="Hapus"></a>
                        </td>
                            <!-- Modal View -->

                            <div class="modal fade" id="modalGambarProduk<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="col-6">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Gambar Produk
                                                </h1>
                                            </div>
                                            <div class="position-relative">
                                                <div class="col-6 position-relative top-0 end-0">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <?php
                                                    $result_rgambarbyid=$produk->getGambar($id);
                                                    $produk->showGambar($result_rgambarbyid);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Modal View -->
                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEditProduk<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Produk</h1>
                                        </div>
                                        <form action="edit_produk.php" method="POST">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Id</label>
                                                    <input type="text" class="form-control" value="<?= $id ?>"
                                                        name="tid_editproduk" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="tnama_editproduk"
                                                        value="<?= $nama ?>" placeholder="Masukan Nama Produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select class="form-select" name="tkategori_editproduk">
                                                        <?php
                                                        $result_rkategoribyid=$produk->getKategori();
                                                        $produk->showKategoriById($result_rkategoribyid,$id_kategori);
                                                    ?>
                                                    </select>
                                                </div>
                                                <label for="harga" class="form-label">Harga</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" name="tharga_editproduk"
                                                        aria-label="rupiah" value="<?= $harga?>">
                                                </div>
                                                <fieldset name="tstatus_editproduk">
                                                    <label for="status" class="form-label">Status</label>
                                                    <?php
                                                    $result_rstatusbyid=$produk->getStatusById($id);
                                                    $produk->showStatusById($result_rstatusbyid);
                                                ?>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" name="simpan_editproduk"
                                                    id="liveAlertBtn">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit End -->
                            <!-- Modal Gambar Hapus -->
                            <!-- <div class="modal fade hapusgambar" id="modalHapusGambar<?= $no ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Gambar</h1>
                                        </div>
                                        <form action="hapus_gambar.php" method="POST">
                                            <input type="hidden" name="idproduk" value="<?= $id ?>">
                                            <input type="hidden" name="idgambar" value="<?= $id_gambar ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Apakah Anda Ingin Menghapus <?= $nama ?>?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="hapus_gambar">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!-- END Modal Gambar Hapus -->
                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapusProduk<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Produk</h1>
                                        </div>
                                        <form action="hapus_produk.php" method="POST">
                                            <input type="hidden" name="idproduk" value="<?= $id ?>">
                                            <input type="hidden" name="idgambar" value="<?= $id_gambar ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Apakah Anda Ingin Menghapus <?= $nama ?>?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="hapus_produk">Hapus</button>
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
            </div>
        </div>
    </div>
    <script>
    function preview_image() {
        var total_file = document.getElementById("foto").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview').append("<div class='col-4 mt-3'><img src='" + URL.createObjectURL(event.target.files[
                i]) + "'></div>");
        }
    }
    //     function preview_image() 
    // {
    //  var total_file=document.getElementById("upload_file").files.length;
    //  for(var i=0;i<total_file;i++)
    //  {
    //   $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
    //  }
    // }
    </script>
</body>

</html>

