<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $poli = htmlspecialchars($data["poli"]);
    $bulan = htmlspecialchars($data["bulan"]);
    $hari_tanggal = htmlspecialchars($data["hari_tanggal"]);
    $no_reg = htmlspecialchars($data['no_reg']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $umur = htmlspecialchars($data['umur']);
    $status_l_b = htmlspecialchars($data['status_l_b']);
    $status_lk_pr = htmlspecialchars($data['status_lk_pr']);
    $alamat = htmlspecialchars($data['alamat']);
    $akp = htmlspecialchars($data["akp"]);
    $k_jamu = htmlspecialchars($data["k_jamu"]);
    $akupresur = htmlspecialchars($data["akupresur"]);
    $tdp = htmlspecialchars($data['tdp']);
    $us = htmlspecialchars($data['us']);
    $spa = htmlspecialchars($data['spa']);
    $col = htmlspecialchars($data['col']);
    $au = htmlspecialchars($data['au']);
    $gds = htmlspecialchars($data["gds"]);
    $oht = htmlspecialchars($data["oht"]);
    $keterangan_kunjungan = htmlspecialchars($data["keterangan_kunjungan"]);

    $query = "INSERT INTO tb_kunjungan
    VALUES 
    ('','$poli', '$bulan', '$hari_tanggal', '$no_reg', '$nama_pasien', '$umur', '$status_l_b', '$status_lk_pr', '$alamat', '$akp','$k_jamu', '$akupresur', '$tdp', '$us', '$spa', '$col', '$au', '$gds','$oht', '$keterangan_kunjungan')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_kunjungan = $data["id_kunjungan"];
    $poli = htmlspecialchars($data["poli"]);
    $bulan = htmlspecialchars($data["bulan"]);
    $hari_tanggal = htmlspecialchars($data["hari_tanggal"]);
    $no_reg = htmlspecialchars($data['no_reg']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $umur = htmlspecialchars($data['umur']);
    $status_l_b = htmlspecialchars($data['status_l_b']);
    $status_lk_pr = htmlspecialchars($data['status_lk_pr']);
    $akp = htmlspecialchars($data["akp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $k_jamu = htmlspecialchars($data["k_jamu"]);
    $akupresur = htmlspecialchars($data["akupresur"]);
    $tdp = htmlspecialchars($data['tdp']);
    $us = htmlspecialchars($data['us']);
    $spa = htmlspecialchars($data['spa']);
    $col = htmlspecialchars($data['col']);
    $au = htmlspecialchars($data['au']);
    $gds = htmlspecialchars($data["gds"]);
    $oht = htmlspecialchars($data["oht"]);
    $keterangan_kunjungan = htmlspecialchars($data["keterangan_kunjungan"]);

    $query = "UPDATE tb_kunjungan SET
    id_kunjungan = '$id_kunjungan',
    poli = '$poli',
    bulan = '$bulan',
    hari_tanggal = '$hari_tanggal',
    no_reg = '$no_reg',
    nama_pasien = '$nama_pasien',
    umur = '$umur',
    status_l_b = '$status_l_b', 
    status_lk_pr = '$status_lk_pr', 
    alamat = '$alamat', 
    akp = '$akp', 
    k_jamu = '$k_jamu',
    akupresur = '$akupresur', 
    tdp = '$tdp',
    us = '$us',
    spa = '$spa',
    col = '$col', 
    au = '$au', 
    gds = '$gds',
    oht = '$oht',
    keterangan_kunjungan = '$keterangan_kunjungan'
    WHERE id_kunjungan = $id_kunjungan
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id_kunjungan)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_kunjungan WHERE id_kunjungan = $id_kunjungan");
    return mysqli_affected_rows($conn);
}
