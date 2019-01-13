<?php
session_start();
if (!isset($_SESSION['username'])) {
  ?>

  <html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TOKO OUTDOOR</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
      body
      {
        margin-top: 150px;
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
        <!--Penjelasan Form -->
          <h3 class="text-center">Silahkan Login</h3>
          <form action="actlogin.php" method="post">  <!--Form action="actlogin.php" berfungsi sebagai input yang nantinya akan berjalan apabila proses submit (MASUK) di aktfikan-->
           <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Masukan email anda" required>
             <!--Input name="email" berfungsi sebagai penghubung pada actlogin.php sebagai deklarasi dari $email-->
          </div>
          <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="pass" placeholder="Password" required="">
           <!--Input name="pass" berfungsi sebagai penghubung pada actlogin.php sebagai deklarasi dari $pass-->
         </div>
         <button type="submit" class="btn btn-danger"> Masuk</button>
         <!--Submit sebagai button aksi ke actlogin.php-->
         <a href="daftar.php" style="text-decoration: none; margin-left: 10px; color: #867676"> Belum punya akun?</a>
       
       </form>


     </div>
     <div class="col-md-4"></div>
   </div>
 </div>
</body>

</html>

<?php
} else {
  header('location:index.php');
}
?>