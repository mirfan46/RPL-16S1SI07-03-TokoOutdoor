<?php
include "../../koneksi.php";

//1. Include seperti umumnya terhubung pada koneksi untuk menghubung query yang di eksekusi pada perintah php.

session_start();

$id_barang = $_GET['id_barang']; //2. $id_barang GET berfungsi mengambil id barang yang di pesan pada addtochart untuk masuk ke keranjang
$id_konsumen = $_SESSION['id_konsumen']; //3. melakukan session id_konsumen yang nantinya terhubung pada page beli.php
$enkripsi = md5(time()); //4. enksripsi pemesanan dengan melakukan input enkripsi dengan deklarasi $potong selama 0-5 detik ($potong)
$potong = substr($enkripsi, 0, 5);

$select_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE id_konsumen = $id_konsumen");

//5. select_penjualan sebagai deklarasi untuk menampilkan penjualan sesuai yang di beli oleh konsumen


$data_penjualan = mysqli_fetch_array($select_penjualan); 
if ($data_penjualan['status'] == 'order') {
	$invoice = $data_penjualan['no_invoice'];
} else {
	$invoice = 'INV'.$_SESSION['id_konsumen'].$potong;
}
//6. deklarsi var $data_penjualan sebagai select_penjualan jika data_penjualan status order maka $invoice sebagai $data penjualan menampilkan generete database no_invoice else INV $_memanggil session dari id_konsumen.

$select_barang = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE id_konsumen = $id_konsumen AND id_barang = $id_barang"); //7. berfungsi menampilkan id konsumen dan id barang
$data_barang = mysqli_fetch_array($select_barang); //8. mendekrlarasikan databarang sebagai $select_barang



if ($data_barang['id_barang'] == $id_barang) {
	$kuantitas = $data_barang['kuantitas'] + 1; //9. melakukan penambahan kuantitas apabila barang di beli lebih dari 1x dst.( kuantitas sebagai data_barang maka kuantitas (jumlah barang) add akan +1).
	$id_penjualan = $data_barang['id_penjualan'];
	// 10. mendeklarasikan id_penjualan sebagai databarang
	$query = mysqli_query($conn, "UPDATE tb_penjualan SET no_invoice = '$invoice', kuantitas = $kuantitas WHERE id_penjualan = $id_penjualan");
	// 11. Berfungsi untuk update tb penjualan dengan set no_invoice kuantitas dimana id_penjualan sebagai barang (mengubah no inovice kuantitas dan id_penjualan sesaui perintah update)

} else {
	$kuantitas = 1;
	$query = mysqli_query($conn, "INSERT INTO tb_penjualan(no_invoice,id_konsumen,id_barang,kuantitas,status) VALUES('$invoice', '$id_konsumen', '$id_barang', '$kuantitas', 'order')");
	//12. berfungsi sebagai insert into (memasukan data) pemesanan barang yang di lakukan oleh customer.
}

if ($query) {
	header("location:beli.php");
}
?>