<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
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
    <h1>Riwayat Transaksi</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <button type="button" class="btn btn-primary">Export</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr align="center">
                            <th>No</th>
                            <th>Id Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Nama Pembeli</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        include 'database/koneksi.php';
                        $transaksi = "SELECT * FROM transaksi JOIN detail_transaksi ON transaksi.id=detail_transaksi.id_transaksi GROUP BY transaksi.id";
                        $result = mysqli_query($koneksi, $transaksi);
                        $no = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $tgl = $row['tgl_transaksi'];
                            $total = $row['total_harga'];
                            $iduser = $row['id_akun'];

                            $akun = "SELECT * FROM akun WHERE id = '$iduser'";
                            $result2 = mysqli_query($koneksi, $akun);
                            while ($row = mysqli_fetch_array($result2)) {
                                $namauser = $row['nama'];
                                $color = ($no % 2 == 1) ? "white" : "#eee";

                        ?>
                        <tr align="center" bgcolor=<?php echo $color; ?>>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $tgl; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $namauser ?></td>
                            <td>
                                <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalDetailTransaksi" onclick="dataId('<?php echo $id ?>')"
                                        value="Detail">
                                </a>
                            </td>
                        </tr>
                        <?php
                                $no++;
                            }
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
<!-- Modal Detail Transaksi -->
<div class="modal fade" id="modalDetailTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Transaksi</h1>
            </div>
            <div class="modal-body">
                <div id="data_id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail Transaksi -->

<Script type="text/javascript">
function dataId(a) {
    $.ajax({
        type: 'POST',
        url: 'controller/transaksi.php',
        data: {
            id: a
        },
        success: function(response) {
            $('#data_id').html(response);
        }
    });
}
</Script>

</html>