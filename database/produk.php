<?php
include 'database.php';
class produk extends database {
    public function autoGenerateId(){
        $sql="select max(id) as max_code from produk";
        $auto = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_array($auto);
        $code = $data['max_code'];
        $urutan = (int)substr($code, 1, 5);
        $urutan++;
        $huruf = "P";
        $id_produk = $huruf . sprintf("%05s", $urutan);
        return $id_produk;
    }
    public function getKategori() {
        $sql = "SELECT * FROM kategori";
        return mysqli_query($this->con, $sql);
    }
    public function showKategori($result_rkategori){
        while($row = mysqli_fetch_array($result_rkategori)){
            echo "<option value='".$row['id']."'>".$row['nama']."</option>ss";
        }
    }
    public function showKategoriById($result_rkategoribyid,$id){
        while($row = mysqli_fetch_array($result_rkategoribyid)){
            if($row['id']==$id){
                echo "<option value='".$row['id']."' selected>".$row['nama']."</option>";
            }else{
            echo "<option value='".$row['id']."'>".$row['nama']."</option>";
            }
        }
    }
    public function getStatusById($id){
        $sql = "SELECT produk.status FROM produk WHERE id = '$id'";
        return mysqli_query($this->con, $sql);
    }
    // public function showProduct($result){
    //     while($row = mysqli_fetch_array($result)){
    //         echo "<option value='".$row['id']."'>".$row['nama']."</option>";
    //     }
    // }
//     public function showProduk($result){
//         $no = 1;
//                     while ($row = mysqli_fetch_array($result_rproduk)) {
//                         $id = $row['id'];
//                         $id_kategori = $row['id_kategori'];
//                         $nama = $row['nama'];
//                         $harga = $row['harga'];
//                         $kategori = $row['nama_kategori'];
//                         $status = $row['status'];
//                         $id_gambar=$row['id_gambar'];
                    
//                         echo "<tr align='center'>
//                         <td>".$no."</td>
//                         <td>".$id."</td>
//                         <td>".$nama."</td>
//                         <td>".$kategori."</td>
//                         <td>Rp.".$harga."</td>";
//                         if($status=="Tersedia"){
//                             echo '<td><button class="btn btn-success btn-sm">Tersedia</button></td>';
//                         }else {
//                             echo '<td><button class="btn btn-danger btn-sm">Terjual</button></td>';
//                         }
                        
//     }
// }
    public function showStatusById($result_rstatusbyid){
        while($row = mysqli_fetch_array($result_rstatusbyid)){
            if($row['status']=="Tersedia"){
                echo "<div>
                    <input type='radio' id='tersedia' name='drone' value='Tersedia' checked>
                    <label for='tersedia'>Tersedia</label>
                </div>
                <div> 
                    <input type='radio' id='terjual' name='drone' value='Terjual'>
                    <label for='terjual'>Terjual</label>
                </div>";
            } else {
                echo "<div>
                    <input type='radio' id='tersedia' name='drone' value='Tersedia'>
                    <label for='tersedia'>Tersedia</label>
                </div>
                <div> 
                    <input type='radio' id='terjual' name='drone' value='Terjual' checked>
                    <label for='terjual'>Terjual</label>
                </div>";
            }
        }
    }
}
?>