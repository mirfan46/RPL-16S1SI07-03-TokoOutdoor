<h2>Detail Pemesanan</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM tb_penjualan JOIN tb_konsumen JOIN tb_tujuan 
    ON tb_penjualan.id_konsumen=tb_konsumen.id_konsumen AND tb_penjualan.no_invoice=tb_tujuan.no_invoice
    WHERE tb_penjualan.id_penjualan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No Invoice : <?php echo $detail['no_invoice'] ?></strong> <br>
        Tanggal : <?php echo $detail['tanggal'] ?> <br>
        Status order : <?php echo $detail['status'] ?><br>
        Metode pembayaran : <?php echo $detail['metode_pem'] ?>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['username'] ?></strong><br>
        email : <?php echo $detail['email'] ?><br>
        no telp/hp : <?php echo $detail['no_tlp'] ?>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail['nama_penerima'] ?></strong><br>
        no telp/hp penerima : <?php echo $detail['no_telp'] ?><br>
        alamat : <?php echo $detail['alamat'] ?><br>
        kode pos : <?php echo $detail['kode_pos'] ?>
    </div>
</div>

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
        <?php $totalbelanja=0; ?>
        <?php $nomer=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM tb_penjualan JOIN tb_barang
            ON tb_penjualan.id_barang=tb_barang.id_barang
            WHERE tb_penjualan.id_penjualan='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ 
            
            $subharga= $pecah['harga']*$pecah['kuantitas'];
        ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['nama_barang']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['kuantitas']; ?></td>
            <td>
                Rp. <?php echo number_format($subharga); ?>
            </td>
        </tr>
        <?php $totalbelanja+=$subharga; ?>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
    <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. <?php echo number_format($totalbelanja) ?></th>
            </tr>
    </tfoot>
</table>