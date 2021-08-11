<?php
require 'config_database.php';

function konfirmasi($data)
{
    global $conn;
    $id_pembelian = $data["id_pembelian"];
    $status_pembelian = htmlspecialchars($data["status_pembelian"]);

    $query = "UPDATE tb_pembelian SET
    id_pembelian = '$id_pembelian', 
    status_pembelian = '$status_pembelian' 
    WHERE id_pembelian = $id_pembelian
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id_pembelian)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_pembelian WHERE id_pembelian = $id_pembelian");
    mysqli_query($conn, "DELETE FROM tb_detail_pembelian WHERE id_pembelian = $id_pembelian");
    return mysqli_affected_rows($conn);
}
