<?php
session_start();
require '../controllers/config_database.php';
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('L');

ob_start();
if (!isset($_SESSION["login"])) {
    header("location: ../logout.php");
    exit;
}
require '../controllers/config_load_data.php';
$product = query("SELECT * FROM tb_product INNER JOIN tb_users ON tb_product.id_users = tb_users.id_users  ");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Produk</title>
</head>
<style type="text/css">
    .detail table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <h3 align="center">Laporan Produk</h3>
    <h3 align="center">Loka Kesehatan Tradisional Masyarakat (LKTM) Palembang</h3>
    <table align="center" width="60%" border="" class="detail" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: lightblue">
                <th style="text-align: center; padding: 10px;">#</th>
                <th style="text-align: center; padding: 10px; width:150px;">Name</th>
                <th style="text-align: center; padding: 10px; width:150px;">NIK</th>
                <th style="text-align: center; padding: 10px; width:150px;">Nama Product</th>
                <th style="text-align: center; padding: 10px;">Stock</th>
                <th style="text-align: center; padding: 10px;">Harga</th>
                <th style="text-align: center; padding: 10px; width:150px;">Tanggal Expired</th>
                <th style="text-align: center; padding: 10px; width:150px;">Khasiat</th>
                <th style="text-align: center; padding: 10px; width:150px;">Keterangan Product</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($product as $product) : ?>
                <tr>
                    <td style="text-align: center; padding: 10px;"><?= $no; ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['nama'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['nik'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['nama_product'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['stock'] ?></td>
                    <td style="text-align: center; padding: 10px;">Rp<?= number_format($product['harga']) ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['tgl_expired'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['khasiat'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $product['keterangan_product'] ?></td>
                </tr>
            <?php $no++;
            endforeach ?>
        </tbody>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("Laporan Produk.pdf", 'I');

?>