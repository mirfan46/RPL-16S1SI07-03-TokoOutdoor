<?php
include"koneksi.php";

$email = $_POST['email']; //1. $email berfungsi untuk mendeklarasi form email dan memposting ke database sesuai query
$pass = md5($_POST['pass']); //2. $pass berfungsi untuk mendeklarasi form pass dan memposting ke database sesuai query

//3. Fungsi PHP actlogin : untuk melakukan posting sesuai dengan data yang tersimpan pada table database (konsumen) 
//4. Untuk menghubungkan antara login.php dan actlogin.php menggunakan input "$email" dan di eksekusi dengan POST ke database sesuai ['email']; dan untuk login ini sendiri menggunakan pencocokan email dengan PHPMailer.
//5. if (jika) email dan password dan juga level costumer sesuai makan akan memulai Perintah session start yang menyimpan pada browser yang terdiri dari email username dan id konsumen, dan di arahkan menuju halaman utama yaitu index.php
//6. fungsi dari $_SESSION Sendiri untuk menyimpan data pada browser yang tereksekusi dari server (databasenya).


$query = mysqli_query($conn, "SELECT * from tb_konsumen where email = '$email' and password='$pass' and level='customer'"); 
//7. Select * From tb konsumen : email dan pass serta level costumer di gunakan sebagai query login dan di aktifkan pada session start id_konsumen.

$row = mysqli_fetch_array($query);
	if ($row['email'] == $email AND $row['password'] == $pass AND $row['level'] == 'customer'){
		session_start();
			$_SESSION['email'] = $row['email']; //8. eksekusi Session start email pada browser
			$_SESSION['username'] = $row['username']; //9. eksekusi Session username pada browser 
			$_SESSION['id_konsumen'] = $row['id_konsumen']; //10. eksekusi id konsumen Session start pada browser
			header("location:index.php");
	}else {
			echo"<script type='text/javascript'>alert('Email / Password tidak sesuai');window.location.href='login.php';</script>";
//11. Penjelasan: Session start username yang di masukan pada index.php akan login. 
	}
?>