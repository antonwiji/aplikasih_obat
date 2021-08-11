<?php
require 'config_database.php';
function create($data)
{
    global $conn;
    $id_users = htmlspecialchars($data['id_users']);
    $id_product = htmlspecialchars($data['id_product']);
    $jml_pesanan = htmlspecialchars($data['jml_pesanan']);
    $query = "INSERT INTO tb_keranjang
	VALUES
	('','$id_users', '$id_product', '$jml_pesanan')
	";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_keranjang = $data['id_keranjang'];
    $jml_pesanan = htmlspecialchars($data['jml_pesanan']);
    $query = "UPDATE tb_keranjang SET 
	id_keranjang = '$id_keranjang', 
	jml_pesanan = '$jml_pesanan'
	WHERE id_keranjang = $id_keranjang
	";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id_keranjang)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_keranjang WHERE id_keranjang = $id_keranjang");
    return mysqli_affected_rows($conn);
}
