<?php
require 'config_database.php';

function konfirmasi($data)
{
    global $conn;
    $id_perintah = $data["id_perintah"];
    $konfirmasi_barang_diterima = htmlspecialchars($data["konfirmasi_barang_diterima"]);
    $konfirmasi_sampai_kantor = htmlspecialchars($data["konfirmasi_sampai_kantor"]);

    $query = "UPDATE tb_perintah SET
    id_perintah = '$id_perintah', 
    konfirmasi_barang_diterima = '$konfirmasi_barang_diterima', 
    konfirmasi_sampai_kantor = '$konfirmasi_sampai_kantor' 
    WHERE id_perintah = $id_perintah
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
