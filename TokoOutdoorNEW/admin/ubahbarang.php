<h2>Ubah Barang</h2>

<?php 
    $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE id_barang='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-grup">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_barang']; ?>">    
    </div>
    <div class="form-grup">
        <img src="../img/<?php echo $pecah['gambar']; ?>" width="200">
    </div>
    <div class="form-grub">
        <label>Ganti gambar</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-grup">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga']; ?>">    
    </div>
    <div class="form-grup">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok']; ?>">    
    </div>
    <div class="form-grup">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10">
            <?php echo $pecah['deskripsi']; ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
    if (isset($_POST['ubah']))
    {
        $namagambar = $_FILES['gambar']['name'];
        $lokasifoto = $_FILES['gambar']['tmp_name'];

        if (!empty($lokasifoto))
        {
            move_uploaded_file($lokasifoto, "../img/$namagambar");

            $koneksi->query("UPDATE tb_barang SET 
            nama_barang='$_POST[nama]',
            gambar='$namagambar',
            harga='$_POST[harga]',
            stok='$_POST[stok]',
            deskripsi='$_POST[deskripsi]'
            WHERE id_barang='$_GET[id]'");
        }
        else
        {
            $koneksi->query("UPDATE tb_barang SET 
            nama_barang='$_POST[nama]',
            harga='$_POST[harga]',
            stok='$_POST[stok]',
            deskripsi='$_POST[deskripsi]'
            WHERE id_barang='$_GET[id]'");
        }
        echo "<script>alert('data barang berhasil diubah');</script>";
        echo "<script>location='index.php?halaman=barang';</script>";
    }
?>