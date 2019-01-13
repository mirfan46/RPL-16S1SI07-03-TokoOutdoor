<h2>Data Kostumer</h2>

<table class = "table table-bordered">
    <thead>
        <tr>
            <td>no</td>
            <td>nama</td>
            <td>email</td>
            <td>level</td>
            <td>aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomer=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM tb_konsumen"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomer; ?></td>
            <td><?php echo $pecah['username']; ?></td>
            <td><?php echo $pecah['email']; ?></td>
            <td><?php echo $pecah['level']; ?></td>
            <td>
                <a href="" class="btn btn-danger">hapus</a>
            </td>
        </tr>
        <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>