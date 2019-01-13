<?php
include "../../koneksi.php";
// 1. Fungsi dari hapus_pemesanan.php untuk mengeksekusi penghapusan barang yang berada pada keranjang, 
// 2. deklarasai id_penjualan1 = GET(mengambil id Penjualan.) di deklarasi kembali $id_penjualan = id_penjualan (menggunakan deklarasi ganda) dengan perintah "DELETE FROM `tb_penjualan` WHERE id_penjualan =$id_penjualan1";
// 3.  maka akan terdeklarasi hapus id_penjualan1 (produk id_penjualan yang terdaftar pada keranjang)

$id_penjualan1=$_GET['id_penjualan']; 
$id_penjualan=$_GET['id_penjualan'];

$query="DELETE FROM `tb_penjualan` WHERE id_penjualan =$id_penjualan1";
if(mysqli_query($conn, $query)){
	header("Location:beli.php");
}else{
	echo "gagal hapus data";
}
echo"<h1>$query</h1>
?>

