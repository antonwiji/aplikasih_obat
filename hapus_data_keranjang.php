<?php
session_start();
require 'controllers/keranjang.php';
$id_keranjang = $_GET["id_keranjang"];
if (delete($id_keranjang) > 0) {
    echo "<script>
        alert('Data Pesanan Produk Dipilih Berhasil Dihapus')
        document.location.href='cart.php';
        </script>
        ";
} else {
    echo "<script>
        alert('Data Pesanan Produk Dipilih Gagal Dihapus')
        document.location.href='cart.php';
        </script>
        ";
}
