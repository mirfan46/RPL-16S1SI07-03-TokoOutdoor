<?php
    $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE id_barang='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
    $gambarbarang = $pecah['gambar'];
    if (file_exists("../img/$gambarbarang"))
    {
        unlink("../img/$gambarbarang");
    }

    $koneksi->query("DELETE FROM tb_barang WHERE id_barang='$_GET[id]'");
    echo "<script>alert('produk terhapus');</script>";
    echo "<script>location='index.php?halaman=barang';</script>";
?>