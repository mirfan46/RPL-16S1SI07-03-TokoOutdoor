<h2>Tambah Barang</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-grup">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">    
    </div>
    <div class="form-grup">
        <label>Gambar</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-grup">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga">    
    </div>
    <div class="form-grup">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok">    
    </div>
    <div class="form-grup">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save']))
{
    $nama = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "../img/".$nama);
    $koneksi->query("INSERT INTO tb_barang
    (nama_barang, gambar, harga, stok, deskripsi)
    VALUES('$_POST[nama]','$nama','$_POST[harga]','$_POST[stok]','$_POST[deskripsi]')");

    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
}
?>