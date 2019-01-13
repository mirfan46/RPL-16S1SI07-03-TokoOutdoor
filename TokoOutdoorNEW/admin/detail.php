<h2>Detail Pemesanan</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM tb_penjualan JOIN tb_konsumen 
    ON tb_penjualan.id_konsumen=tb_konsumen.id_konsumen 
    WHERE tb_penjualan.id_penjualan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['no_invoice']; ?></strong><br>
<p>
    Nama    :<?php echo $detail['username']; ?><br>
    Email   :<?php echo $detail['email']; ?><br>
    Status  :<?php echo $detail['status']; ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomer=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM tb_penjualan JOIN tb_barang
            ON tb_penjualan.id_barang=tb_barang.id_barang
            WHERE tb_penjualan.id_penjualan='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['nama_barang']; ?></td>
            <td><?php echo $pecah['harga']; ?></td>
            <td><?php echo $pecah['kuantitas']; ?></td>
            <td>
                <?php echo $pecah['harga']*$pecah['kuantitas']; ?>
            </td>
        </tr>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>