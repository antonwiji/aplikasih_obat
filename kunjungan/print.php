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
$bulan = $_GET['bulan'];
$kunjungan = query("SELECT * FROM tb_kunjungan WHERE bulan = '$bulan' ");
$satu_kunjungan = query("SELECT * FROM tb_kunjungan WHERE bulan = '$bulan' ")[0];
?>
<!DOCTYPE html>
<html>

<head>
    <title>REGISTER KUNJUNGAN PASIEN</title>
</head>
<style type="text/css">
    .detail table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <h3 align="center">REGISTER KUNJUNGAN PASIEN</h3>
    <h3 align="center">Loka Kesehatan tradisional masyarakat (lktm) palembang</h3>
    <table>
        <tr>
            <td>POLI</td>
            <td style="width: 100px;"></td>
            <td><?= $satu_kunjungan['poli'] ?></td>
        </tr>
        <tr>
            <td>BULAN</td>
            <td></td>
            <td><?= $satu_kunjungan['bulan'] ?></td>
        </tr>
    </table>
    <table align="center" width="60%" border="" class="detail" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: lightblue">
                <th style="text-align: center; padding: 10px;">Hari/Tgl</th>
                <th style="text-align: center; padding: 10px;">No.</th>
                <th style="text-align: center; padding: 10px;">No. Reg</th>
                <th style="text-align: center; padding: 10px;">Nama Pasien</th>
                <th style="text-align: center; padding: 10px;">Umur</th>
                <th style="text-align: center; padding: 10px;">Status L/B</th>
                <th style="text-align: center; padding: 10px;">Status LK/PR</th>
                <th style="text-align: center; padding: 10px;">Alamat</th>
                <th style="text-align: center; padding: 10px;">Akp</th>
                <th style="text-align: center; padding: 10px;">Poli</th>
                <th style="text-align: center; padding: 10px;">K.Jamu</th>
                <th style="text-align: center; padding: 10px;">Akupresur</th>
                <th style="text-align: center; padding: 10px;">TDP</th>
                <th style="text-align: center; padding: 10px;">US</th>
                <th style="text-align: center; padding: 10px;">SPA</th>
                <th style="text-align: center; padding: 10px;">COL</th>
                <th style="text-align: center; padding: 10px;">AU</th>
                <th style="text-align: center; padding: 10px;">GDS</th>
                <th style="text-align: center; padding: 10px;">OHT</th>
                <th style="text-align: center; padding: 10px;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kunjungan as $kunjungan) : ?>
                <tr>
                    <td style="text-align: center;"><?= $kunjungan['hari_tanggal'] ?></td>
                    <td style="text-align: center;"><?= $no; ?></td>
                    <td style="text-align: center;"><?= $kunjungan['no_reg'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['nama_pasien'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['umur'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['status_l_b'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['status_lk_pr'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['alamat'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['akp'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['k_jamu'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['poli'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['akupresur'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['tdp'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['us'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['spa'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['col'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['au'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['gds'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['oht'] ?></td>
                    <td style="text-align: center;"><?= $kunjungan['keterangan_kunjungan'] ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("REGISTER KUNJUNGAN PASIEN.pdf", 'I');

?>