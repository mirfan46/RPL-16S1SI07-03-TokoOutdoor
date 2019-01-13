<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/Exception.php';
require '../../vendor/PHPMailer/PHPMailer.php';
require '../../vendor/PHPMailer/SMTP.php';

include "../../koneksi.php";

session_start();
if (!isset($_SESSION['email'])) {
	header("location:../login.php");
} else {
	
	$id_konsumen = $_SESSION['id_konsumen'];
	
	?>
	<!--1. Session pada beli.php berfungsi untuk menampilkan customer yang login dan melakukan pembelian sesuai email dan id konsumen-->


	<!DOCTYPE html>
	<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Toko Outdoor</title>

		<!-- Bootstrap core CSS -->
		<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../../css/modern-business.css" rel="stylesheet">

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger fixed-top">
			<div class="container">
				<a class="navbar-brand" href="../../index.php" style="font-size: 30px;">Toko<b>Outdoor</b>.com</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="../../index.php" style="color: #ffffff;"><span class="fa fa-home"></span> Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../index.php?page=barang" style="color: #ffffff;"><span class="fa fa-product-hunt"></span> barang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../index.php?page=cara" style="color: #ffffff;"><span class="fa fa-question-circle"></span> Cara Pembelian</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../index.php?page=tentang" style="color: #ffffff; margin-right: 300px;"><span class="fa fa-info-circle"></span> Tentang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="beli.php" style="color: #ffffff; margin-right: 10px"><span class="fa fa-shopping-cart" title="shopping cart"></span> Keranjang</a>
						</li> 
						<li class="nav-item">
							<a class="nav-link" href="../../logout.php" style="color: #ffffff;"><span class="fa fa-sign-out"></span> Logout</a>
						</li> 
					</ul>
				</div>
			</div>
		</nav>
		<br><br>
		<div class="container">

			<table class="table table-bordered">
				<tr>
					<th scope="col">Nama Barang</th> 
					<th scope="col">Harga Satuan</th>
					<th scope="col">Kuantitas</th>
					<th scope="col">Harga</th>
					<th scope="col"></th>
				</tr>

				<tbody>
				<!--2. Menggunakan fungsi Join untuk menampilkan barang yang telah di beli sesuai query -->
					<?php 
					$penjualan = mysqli_query($conn, "SELECT tb_penjualan.*,tb_barang.* from tb_penjualan join tb_barang on tb_barang.id_barang=tb_penjualan.id_barang where tb_penjualan.id_konsumen=$id_konsumen");
					//3. query $penjualan : menampilkan tb penjualan, tb_barang dari tb_penjualan join pada tb_barang sebagai tb_barang.id_barang=tb_penjualan.id_barang where tb_penjualan.id_konsumen=$id_konsumen (proses ini akan di tampilkan pada keranjang)
					$xa = mysqli_query($conn, "SELECT tb_penjualan.*,tb_barang.* from tb_penjualan join tb_barang on tb_barang.id_barang=tb_penjualan.id_barang where tb_penjualan.id_konsumen=$id_konsumen");
					//4. $xa : menampilkan tb_penjualan dan table barang yang terjoin sebagai tb_tb_barang.id_barang=tb_penjualan.id_barang where tb_penjualan.id_konsumen=$id_konsumen (proses ini akan di tampilkan pada keranjang)
					$x = mysqli_fetch_array($xa); //5. mendeklarasikan x sebagai xa
					while ($data = mysqli_fetch_array($penjualan)) { 
					//6. $data sebagai $penjualan
						$harga = $data['kuantitas'] * $data['harga']; 
					//7. $harga sebagai $data = kuantitas jika kuantitas bertambah maka $data = 'harga' akan dikalikan kuantitas.

					//8. PHP Mailer berfungsi sebagai pencocokan email untuk melakukan send email namun fungsi ini masih belum bisa berjalan karena masih belum bisa terhubung dengan internet 


						$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
						try {
						    //Server settings
						    // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
						    $mail->isSMTP();                                      // Set mailer to use SMTP
						    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
						    $mail->SMTPAuth = true;                               // Enable SMTP authentication
						    $mail->Username = 'a41de95b598bff';                 // SMTP username
						    $mail->Password = '19c5eb47c19f4d';                           // SMTP password
						    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						    $mail->Port = 2525;                                    // TCP port to connect to

						    //Recipients
						    $mail->setFrom('Tokooutdoor@gmail.com', 'TOKOOUTDOOR');
						    $mail->addAddress('b60682c8b9-adc92d@inbox.mailtrap.io', 'Awal');

						    $bodyy = "
						    <table class='table table-bordered'>
						    <tr>
							    <th>Nama Barang</th>
							    <th>Harga Satuan</th>
							    <th>Kuantitas</th>
							    <th>Harga</th>
						    </tr>
						    <tr>
							    <th>". $data['nama_barang'] ."</th>
							    <td>".'Rp '.number_format($data['harga'],2,',','.')."</td> 
							    <td>".number_format($data['kuantitas'])."</td>
							    <td>". 'Rp '.number_format($harga,2,',','.')."</td>
						    </tr> 
						    </table>";
						    //9. dari fungsi join tersebut barang yang dimasukan ke keranjang akan di tampilkan sesuai table dan kolom yang di buat terdiri dari "NamaBarang, HargaSatuan, Kuantitas, Harga" $data akan menampilkan data pembelian.
						    $mail->isHTML(true);                                  // Set email format to HTML
						    $mail->Subject = 'Ini adalah daftar pesananmu : Tokooutdoor.com';
						    $mail->Body    = $bodyy;
						    $mail->AltBody = 'This is the body';
						   	 if ($mail->send()) {
						    	echo "<script>alert('Message has been sent')</script>";
						    } else {
								echo "<script>alert('Message has not been sent')</script>";
						    }
						} catch (Exception $e) {
							echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
						}
						?>
						<!--10. Fungsi dari php ini untuk menampilkan barang (dengan fungsi echo) yang telah di masukan ke keranjang apabila costumer kembali ke menu utama untuk melakukan belanja lagi.-->
						<tr>
							<th scope="row"><?php echo $data['nama_barang'] ?></th>
							<td><?php echo "Rp ".number_format($data['harga'],2,',','.')?></td>
							<td><?php echo number_format($data['kuantitas']) ?></td>
							<td><?php echo "Rp ".number_format($harga,2,',','.')?></td>
							<td><a href="hapus_penjualan.php?id_penjualan=<?php echo $data['id_penjualan']?>" class="btn btn-danger""><span class="fa fa-trash"></span> Delete</a></td>
							
						</tr>
						<?php
					}
					?>
					<tr>
						<td colspan="5" align="right">
							<button type="reset" class="btn btn-success">
								<a href="checkout.php?no_invoice=<?php echo $x['no_invoice'];  ?>" style="color: #fff;text-decoration: none;">Checkout
								</a>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php } ?>