
<div class="container">
  <br><center><h1 class="my-4 ">Silahkan pilih peralatan Outdoor dibawah ini</h1><br></center>


    <!-- untuk Barang -->
    <div class="row">
    <!--1. Fungsi php di bawah berfungsi untuk menampilakan barang sesuai database nama barang, harga, stok, dan apabila pembelian (AddtoChart) dilakukan maka akan di arahkan ke prosesbeli.php pada folder customer. -->
      <?php
      $barang = "SELECT * from tb_barang ORDER BY id_barang desc"; //2. berfungsi menampilkan tb_barang by id_barang dengan desc
      $data = mysqli_query($conn, $barang); //3. mendeklarasikan var $data berisi barang
      ?>
      <?php 
      while ($hasil = mysqli_fetch_assoc($data)){ //4. mendeklarasikan var $hasil dikenali berisikan var $data ($hasil adalah $data)
        ?>
        <div class="mb-4" style="margin-left: 65px;">
          <div class="card h-100">
            <h4 class="card-header"><center><?php echo $hasil['nama_barang']; ?></center></h4> <!--5. Menampilkan nama_barang sebagai $hasil-->
            <div class="card-body">
              <p class="card-text" style="width: 250px; height: 250px;"><img src="img/<?php echo $hasil['gambar'] ?>" style="width: 250px; height: 250px;"></p>

            </div>
            <div class="card-body">
             <p class="lead">Harga : <?php echo "Rp ".number_format($hasil['harga'],2,',','.')?></p> 
             <!--6. memmanggil number_format sebagai tampilan harga-->
             <p class="lead">Stok : <?php echo $hasil['stok']; ?></p><br>
             <?php
             if ($hasil['stok'] == 0) {
              $disable="btn btn-danger disabled";
            }else{
              $disable="btn btn-success ";
            }
            ?>
            <a href="page/customer/proses_beli.php?id_barang=<?=$hasil['id_barang']?>" class="<?php echo $disable;?>"><span class="fa fa-shopping-cart" title="shopping cart"></span> Add to chart</a>
            <!--7. add to Chart berfungsi sebagai submit pada proses_beli.php-->
            <a href="detail.php?id_barang=<?=$hasil['id_barang']?>" class="btn btn-dark">Detail</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- /.row -->
</div>
<!-- /.container -->

<!-- untuk pagination -->
<ul class="pagination justify-content-center">
  <?php 
  $query = mysqli_query($conn, "SELECT * FROM tb_barang"); //8. Berfungsi menampilkan tb_barang
  $jumlah = mysqli_num_rows($query) /2; //9. menampilkan page row generate 2 page
  $page = ceil($jumlah);
  for ($i=1; $i <= $page ; $i++) {  //10. Berfungsi menambah page +1 sesuai barang yang tampil
    ?>
<!--11. Fungsi php di atas berfungsi untuk memperbanyak page apabila PRODUK di tambahkan namun fungsi phpnya masih salah-->

    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo "$i"; ?></a>
    </li>
    <?php
  }
  ?>
</ul>