<?php
    $koneksi->query("DELETE FROM tb_konsumen WHERE id_konsumen='$_GET[id]'");
    echo "<script>alert('kostumer terhapus');</script>";
    echo "<script>location='index.php?halaman=kostumer';</script>";
?>