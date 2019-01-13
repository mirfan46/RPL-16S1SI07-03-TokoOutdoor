<h2>Data Tujuan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>no</td>
            <td>invoice</td>
            <td>nama penerima</td>
            <td>kode pos</td>
            <td>alamat lengkap</td>
            <td>no telepon</td>
            <td>metode pembayaran</td>
            <td>aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomer=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM tb_tujuan order by id_tujuan desc"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['no_invoice']; ?></td>
            <td><?php echo $pecah['nama_penerima']; ?></td>
            <td><?php echo $pecah['kode_pos']; ?></td>
            <td><?php echo $pecah['alamat']; ?></td>
            <td><?php echo $pecah['no_telp']; ?></td>
            <td><?php echo $pecah['metode_pem']; ?></td>
            <td>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>