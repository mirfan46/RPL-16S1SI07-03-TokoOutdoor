<h2>Data Barang</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>gambar</th>
            <th>harga</th>
            <th>stok</th>
            <th>deskripsi</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomer=1 ?>
        <?php $ambil=$koneksi->query("SELECT * FROM tb_barang"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['nama_barang']; ?></td>
            <td>
                <img src="../img/<?php echo $pecah['gambar']; ?>" width="100">
            </td>
            <td><?php echo $pecah['harga']; ?></td>
            <td><?php echo $pecah['stok']; ?></td>
            <td><?php echo $pecah['deskripsi']; ?></td>
            <td>
                <a href="index.php?halaman=hapusbarang&id=<?php echo $pecah['id_barang']; ?>" class="btn btn-danger">hapus</a>
                <a href="index.php?halaman=ubahbarang&id=<?php echo $pecah['id_barang']; ?>" class="btn btn-warning">ubah</a>
            </td>
        </tr>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahbarang" class="btn btn-primary">Tambah Barang</a>