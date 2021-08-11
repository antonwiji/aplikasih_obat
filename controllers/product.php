<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $id_users = htmlspecialchars($data["id_users"]);
    $nama_product = htmlspecialchars($data["nama_product"]);
    $stock = htmlspecialchars($data["stock"]);
    $harga = htmlspecialchars($data['harga']);
    $tgl_expired = htmlspecialchars($data['tgl_expired']);
    $khasiat = htmlspecialchars($data['khasiat']);
    $foto = upload();
    $keterangan_product = htmlspecialchars($data['keterangan_product']);

    $query = "INSERT INTO tb_product
    VALUES 
    ('','$id_users', '$nama_product', '$stock', '$harga', '$tgl_expired', '$khasiat', '$foto', '$keterangan_product')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_product = $data["id_product"];
    $id_users = htmlspecialchars($data["id_users"]);
    $nama_product = htmlspecialchars($data["nama_product"]);
    $stock = htmlspecialchars($data["stock"]);
    $harga = htmlspecialchars($data['harga']);
    $tgl_expired = htmlspecialchars($data['tgl_expired']);
    $khasiat = htmlspecialchars($data['khasiat']);
    $fotoLama = htmlspecialchars($data["fotoLama"]);
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }
    $keterangan_product = htmlspecialchars($data["keterangan_product"]);

    $query = "UPDATE tb_product SET
    id_product = '$id_product',
    id_users = '$id_users',
    nama_product = '$nama_product',
    stock = '$stock',
    harga = '$harga',
    tgl_expired = '$tgl_expired',
    khasiat = '$khasiat',
	foto = '$foto',
    keterangan_product = '$keterangan_product' 
    WHERE id_product = $id_product
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama_produkFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
		alert('Silahkan Upload Gambar Terlebih Dahulu');
		</script>
		";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nama_produkFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
		alert('Silahkan Upload Gambar dengan format jpg atau jpeg atau png');
		</script>
		";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>
		alert('Silahkan Upload Gambar dengan size max 2MB');
		</script>
		";
        return false;
    }

    $nama_produkFileBaru = uniqid();
    $nama_produkFileBaru .= '.';
    $nama_produkFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../upload/product/' . $nama_produkFileBaru);
    return $nama_produkFileBaru;
}

function delete($id_product)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_product WHERE id_product = $id_product");
    return mysqli_affected_rows($conn);
}
