<?php
require('database/koneksi.php');

if (isset($_POST['simpan_editproduk'])) {

    $simpan = mysqli_query($koneksi, "UPDATE produk SET nama = '$_POST[tnama_editproduk]', id_kategori='$_POST[tkategori_editproduk]', harga='$_POST[tharga_editproduk]',deskripsi='$_POST[tdeskripsi_editproduk]', produk.status='$_POST[tstatus_editproduk]' WHERE id ='$_POST[tid_editproduk]' ");

    if ($simpan) {
        echo "<script>alert('Berhasil Memperbarui Data');
                document.location='home.php?url=produk';
            </script>";

        // echo "<script>const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        // const alert = (message, type) => {
        //   const wrapper = document.createElement('div')
        //   wrapper.innerHTML = [
        //     '<div class='alert alert-${type} alert-dismissible' role='alert'>',
        //     '   <div>${message}</div>',
        //     '   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>',
        //     '</div>'
        //   ].join('')
        
        //   alertPlaceholder.append(wrapper)
        // }
        // </script>";
        // "<script> const alertTrigger = document.getElementById('liveAlertBtn')
        // if (alertTrigger) {
        //   alertTrigger.addEventListener('click', () => {
        //     alert('Nice, you triggered this alert message!', 'success')
        //   })
        // }</script>";
    //     <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    //   <i class="bi-check-circle-fill"></i>
    //   <strong class="mx-2">Berhasil!</strong> Produk Berhasil Disimpan.
    //   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    // </div>
    } else {
        echo "<script>alert('Gagal Memperbarui Data');
                document.location='home.php?url=produk';
            </script>";
    }
}