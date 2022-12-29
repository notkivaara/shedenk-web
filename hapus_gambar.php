<?php
require('database/koneksi.php');
$nama = $_GET['nama'];
if(isset($_POST['hapus_gambar'])) {
    $hapus_gambar = mysqli_query($koneksi, "DELETE FROM gambar WHERE nama = '$nama';");    
    // unlink('upload/13-12-2022-foto1.jpeg');
    if ($hapus_gambar) {
        echo "<script>alert('Berhasil Menghapus Gambar');
        $(document).ready(function() {
            $('.modal.fade.hapusgambar').each(function(){
              if(window.location.href.indexOf($(this).attr('id')) != -1){
                $(this).modal('show');
              }
            });
          });;
            </script>";
    } else {
        echo "<script>alert('Gagal Menghapus Gambar');
                document.location='index.php?url=produk';
            </script>";
    }
}