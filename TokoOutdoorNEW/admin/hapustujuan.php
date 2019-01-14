<?php
    $koneksi->query("DELETE FROM tb_tujuan WHERE id_tujuan='$_GET[id]'");
    echo "<script>alert('alamat tujuan terhapus');</script>";
    echo "<script>location='index.php?halaman=tujuan';</script>";
?>