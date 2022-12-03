<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/custom.css">
<body>
    <h1>Master Produk</h1>
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-tambah">+ Tambah Data</button>
                <div class="modal fade" id="btn-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="mb-3">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Produk">
                        </div>
                        <!-- <div class="mb-3">
                            <div class="input-prepend input-append">
                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" name="recordinput" data-toggle="dropdown">
                                    Record
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">A</a></li>
                                        <li><a href="#">CNAME</a></li>
                                        <li><a href="#">MX</a></li>
                                        <li><a href="#">PTR</a></li>
                                    </ul>
                            
                                </div>
                            </div>
                        </div> -->
                        <div class="mb-3">
							<label class="form-label">Kategori</label>
							<select class="form-select" name="text-Tingkatan">
								<option>Pilih Kategori</option>
								<option value="Hoodie">Hoodie</option>
						        <option value="Kaos">Kaos</option>
								<option value="Celana">Celana</option>
							</select>
						</div>
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" aria-label="rupiah">
                        </div>
                        <div class="mb-5">
                            <label for="Image" class="form-label">Foto Produk</label>
                            <input class="form-control" type="file" id="formFile" onchange="preview()">
                        </div>
                        <img id="frame" src="" class="img-fluid" width="100" height="100"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Tambah</button>
                    </div>
                    </div>
                </div>
                </div>        
            <!-- <button type="submit" name="btn_tambah" class="btn btn-primary">+ Tambah Data</button> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>BR01</td>
                        <td>Gucci </td>
                        <td>Baju </td>
                        <td>Rp. 250.000</td>
                        <td>
                            <a href="edit_kategori.php?id=" class="btn btn-warning" role="button">Edit</a>
                            <a href="hapus_kategori.php?id=" class="btn btn-danger" role="button">Hapus</a>    
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
    <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
            $(".dropdown-menu li a").click(function(){
                var selText = $(this).text();
                $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
            });
    </script>
</body>
</html>