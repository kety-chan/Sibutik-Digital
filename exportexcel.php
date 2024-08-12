<?php
include "koneksi.php";
//persiapan untuk excel

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Tamu.xls");
header("Pragma: no-cache");
header("Expires:0");
?>

<table style="margin-left:auto;margin-right:auto" border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Pendaftaran Identitas Kependudukan Digital</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>No.HP</th>
            <th>Alamat</th>
            <th>Desa</th>
            <th>Kecamatan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tgl1 = $_POST['tanggala'];
        $tgl2 = $_POST['tanggalb'];

        $tampil = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal BETWEEN '$tgl1' and '$tgl2'
            ORDER BY id DESC");
        $no = 1;
        while ($data = mysqli_fetch_array($tampil)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nik'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nope'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['desa'] ?></td>
                <td><?= $data['kecamatan'] ?></td>


            </tr>
        <?php } ?>

    </tbody>


</table>