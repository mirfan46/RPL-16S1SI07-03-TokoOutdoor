<?php
include"koneksi.php";

$username = $_POST['username']; //1. $username berfungsi untuk mendeklarasi form username dan memposting ke database sesuai query 
$email = $_POST['email']; //2. $email berfungsi untuk mendeklarasi form email dan memposting ke database sesuai query
$password = md5($_POST['pass']); //3. $password berfungsi untuk mendeklarasi form pass dan memposting ke database sesuai

//4. Fungsi PHP actdaftar : untuk melakukan post/posting username, email dan password sesuai pada table daftar.php 
//6. Untuk menghubungkan antara daftar.php dan actdaftar.php menggunakan input "$username" dan untuk menghubungkan ke database menggunakan "['username'];" dan POST berfungsi untuk perintah eksekusinya yang terhubung dengan insert into sesuai perintah SQL untuk di inputkan ke dalam database.
//7. Untuk fungsi if dan else alert berfungsi sebagai peringatan apabila proses berhasil atau gagal (akan kembali ke link sesuai href).

$query = mysqli_query($conn, "INSERT INTO `tb_konsumen` 
	(`id_konsumen`, `username`,`email`,`password`, `level`) VALUES (NULL, '$username','$email','$password','customer')");
//8. INSERT INTO tb konsumen berfungsi menginputkan data yang di telah di submit pada form melalui POST
	
	if($query){
		echo "<script>alert('Daftar berhasil Silahkan Login') 
		window.location.href='login.php'</script>";
//9. Apabila berhasil alert (bell) akan memberikan pesan 
	}else{
		echo "<script>alert('Gagal Daftar') 
		window.location.href='daftar.php'</script>";	
//10. Apabila gagal alert (bell) akan memberikan pesan 
	}
?>