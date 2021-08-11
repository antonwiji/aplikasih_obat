<?php
require 'config_database.php';

function pembayaran($data)
{
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];
    $bukti_pembayaranLama = htmlspecialchars($data["bukti_pembayaranLama"]);
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $bukti_pembayaran = $bukti_pembayaranLama;
    } else {
        $bukti_pembayaran = upload_bukti_pembayaran();
    }

    $query = "UPDATE tb_pembayaran SET
    id_pembayaran = '$id_pembayaran', 
    bukti_pembayaran = '$bukti_pembayaran' 
    WHERE id_pembayaran = $id_pembayaran
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function upload_bukti_pembayaran()
{
    $no_pelangganFile = $_FILES['bukti_pembayaran']['name'];
    $ukuranFile = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    if ($error === 4) {
        echo "<script>
		alert('Silahkan Upload Bukti Pembayaran Terlebih Dahulu');
		</script>
		";
        return false;
    }

    $ekstensiGambarValid = ['png', 'jpg', 'doc', 'docx', 'pdf'];
    $ekstensiGambar = explode('.', $no_pelangganFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
		alert('Silahkan Upload Bukti Pembayaran dengan format jpg atau png doc atau docx atau pdf');
		</script>
		";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>
		alert('Silahkan Upload Bukti Pembayaran dengan size max 2MB');
		</script>
		";
        return false;
    }

    $no_pelangganFileBaru = uniqid();
    $no_pelangganFileBaru .= '.';
    $no_pelangganFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../upload/bukti_pembayaran/' . $no_pelangganFileBaru);
    return $no_pelangganFileBaru;
}

function konfirmasi($data)
{
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];
    $status_pembayaran = htmlspecialchars($data["status_pembayaran"]);

    $query = "UPDATE tb_pembayaran SET
    id_pembayaran = '$id_pembayaran', 
    status_pembayaran = '$status_pembayaran' 
    WHERE id_pembayaran = $id_pembayaran
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
