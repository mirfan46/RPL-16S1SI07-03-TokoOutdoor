<h2>Data Pemesanan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>no</td>
            <td>invoice</td>
            <td>user</td>
            <td>produk</td>
            <td>kuantitas</td>
            <td>status</td>
            <td>tanggal</td>
            <td>aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomer=1; ?>
        <?php $ambil=$koneksi->query("SELECT tb_penjualan.id_penjualan, tb_penjualan.no_invoice, tb_konsumen.username, tb_barang.nama_barang,tb_penjualan.kuantitas,tb_penjualan.status,tb_penjualan.tanggal FROM tb_penjualan join tb_konsumen on tb_konsumen.id_konsumen=tb_penjualan.id_konsumen join tb_barang on tb_barang.id_barang=tb_penjualan.id_barang"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['no_invoice']; ?></td>
            <td><?php echo $pecah['username']; ?></td>
            <td><?php echo $pecah['nama_barang']; ?></td>
            <td><?php echo $pecah['kuantitas']; ?></td>
            <td><?php echo $pecah['status']; ?></td>
            <td><?php echo $pecah['tanggal']; ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_penjualan']; ?>" class="btn btn-info">detail</a>
            </td>
        </tr>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>