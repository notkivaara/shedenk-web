<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">

  <title>Tambah Produk</title>
  <!-- <title>Edit Produk</title> -->
</head>

<body>
  <div class="container">
    <h2 class="alert text-center mt-3">Tambah Produk</h2>
    <!-- <h2 class="alert text-center mt-3">Edit Produk</h2> -->
    <form>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="" class="form-control" placeholder="Masukkan Nama Barang">
      </div><br>

      <div class="form-group">
        <label>Kategori</label>
        <select class="form-control">
          <option>Hoodie</option>
          <option>Crewneck</option>
          <option>Kemeja</option>
          <option>Kaos</option>
          <option>Celana</option>
        </select>
      </div><br>

      <div class="form-group">
        <label>Harga Barang</label>
        <input type="text" name="" class="uang" placeholder="Rp">
      </div><br>

      <div class="form-grup">
        <label>Deskripsi</label>
        <textarea class="form-control" placeholder="Masukkan Deskripsi Produk" row="5"></textarea>
      </div><br>

      <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" class="form-control-file" name="">
        <small>Upload file dengan ukuran maksimal 5 mb</small>
      </div><br>

      <button type="submit" class="btn btn-primary">TAMBAHKAN</button>
      <!-- <button type="submit" class="btn btn-primary">SIMPAN</button> -->
      <button type="submit" class="btn btn-danger">RESET</button>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    -->
</body>

</html>