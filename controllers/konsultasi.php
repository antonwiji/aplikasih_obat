<?php
require 'config_database.php';

function create($data)
{
    global $conn;
    date_default_timezone_set("Asia/Jakarta");
    $id_pengirim = htmlspecialchars($data["id_pengirim"]);
    $id_penerima = htmlspecialchars($data["id_penerima"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $waktu_kirim = date('d M Y  H:i');
    $query = "INSERT INTO tb_konsultasi
	VALUES 
	('','$id_pengirim', '$id_penerima', '$pesan', '$waktu_kirim')
	";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
