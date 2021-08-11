<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data['kecamatan']);
    $kabupaten = htmlspecialchars($data['kabupaten']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $username = htmlspecialchars($data['username']);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);
    $username = htmlspecialchars($data['username']);
    $result_username = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result_username)) {
        $_SESSION["pesan"] = "Username Telah Terdaftar. Silahkan Gunakan Username yang Lain";
        return false;
    }
    if ($password !== $konfirmasi_password) {
        $_SESSION["pesan"] = "Konfirmasi Password Anda Salah.";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $level = htmlspecialchars($data["level"]);

    $query = "INSERT INTO tb_users
    VALUES 
    ('', '$nama', '$nik', '$no_hp', '$alamat', '$kecamatan', '$kabupaten', '$provinsi', '$username', '$password', '$level')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_users = $data["id_users"];
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kecamatan = htmlspecialchars($data['kecamatan']);
    $kabupaten = htmlspecialchars($data['kabupaten']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $username = htmlspecialchars($data["username"]);
    $level = htmlspecialchars($data["level"]);

    $query = "UPDATE tb_users SET
    id_users = '$id_users',
    nama = '$nama',
    nik = '$nik',
    no_hp = '$no_hp',
    alamat = '$alamat',
    kecamatan = '$kecamatan',
    kabupaten = '$kabupaten',
    provinsi = '$provinsi',
    username = '$username', 
    level = '$level' 
    WHERE id_users = $id_users
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_password($data)
{
    global $conn;
    $id_users = $data["id_users"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);
    if ($password !== $konfirmasi_password) {
        $_SESSION["pesan"] = "Konfirmasi Password Anda Salah.";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE tb_users SET
    id_users = '$id_users',
    password = '$password'
    WHERE id_users = $id_users
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function delete($id_users)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_users WHERE id_users = $id_users");
    return mysqli_affected_rows($conn);
}
