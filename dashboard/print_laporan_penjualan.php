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
$penjualan = query("SELECT * FROM tb_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users WHERE status_pembelian = 'Dikonfirmasi' ");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
</head>
<style type="text/css">
    .detail table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <h3 align="center">LAPORAN PENJUALAN</h3>
    <h3 align="center">Loka Kesehatan Tradisional Masyarakat (LKTM) Palembang</h3>
    <table align="center" width="60%" border="" class="detail" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: lightblue">
                <th style="text-align: center; padding: 10px;">#</th>
                <th style="text-align: center; padding: 10px; width:200px;">Name</th>
                <th style="text-align: center; padding: 10px;">NIK</th>
                <th style="text-align: center; padding: 10px;">No. Hp/WA</th>
                <th style="text-align: center; padding: 10px;">Alamat</th>
                <th style="text-align: center; padding: 10px;">Kecamatan</th>
                <th style="text-align: center; padding: 10px;">Kabupaten/Kota</th>
                <th style="text-align: center; padding: 10px;">Provinsi</th>
                <th style="text-align: center; padding: 10px; width:200px;">Total Harga</th>
                <th style="text-align: center; padding: 10px; width:200px;">Status pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($penjualan as $penjualan) : ?>
                <tr>
                    <td style="text-align: center; padding: 10px;"><?= $no; ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['nama'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['nik'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['no_hp'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['alamat'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['kecamatan'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['kabupaten'] ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['provinsi'] ?></td>
                    <td style="text-align: center; padding: 10px;">Rp<?= number_format($penjualan['total_harga']) ?></td>
                    <td style="text-align: center; padding: 10px;"><?= $penjualan['status_pembelian'] ?></td>
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
$mpdf->Output("Laporan Penjualan.pdf", 'I');

?>