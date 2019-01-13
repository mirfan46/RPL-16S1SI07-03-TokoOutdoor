<?php
session_start();
/*if(isset($_SESSION['email'])) {
 header('location:index.php'); }
 */?>

 <html>

 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TOKOOUTDOOR</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <style type="text/css">
  body 
  {
    margin-top: 120px;
    background-color: #F1F1F1
  }
  h3{
    margin-bottom: 20px;
  }

</style>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h3 class="text-center">Form Pendaftaran</h3>
        
        <form action="actdaftar.php" method="post"> 
        <!--action="actdaftar.php berfungsi untuk menghubungkan proses submit pada button 'Daftar'"-->
          <div class="form-group">
          <label for="username">Usernama</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username anda" required>
             <!--Input name="username" berfungsi sebagai penghubung pada actdaftar.php sebagai deklarasi dari $email-->
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Masukan email anda" required>
             <!--Input name="email" berfungsi sebagai penghubung pada actdaftar.php sebagai deklarasi dari $email-->
          </div>
          <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="pass" placeholder="Masukan password anda" required>
           <!--Input name="pass" berfungsi sebagai penghubung pada actdaftar.php sebagai deklarasi dari $pass-->
         </div>
         <button type="submit" class="btn btn-danger" value="
         Daftar">Daftar</button>
         <button value="Batal" type="reset" class="btn btn-secondary">Reset</button>
       </form>
     </div>
     <div class="col-md-4"></div>
   </div>
 </div>
</body>

</html>