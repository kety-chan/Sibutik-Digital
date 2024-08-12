<?php include "header.php"; ?>

<div>
    <nav class="navbar navbar-expand-sm bg-dark-tertiary">
        <div class="container">

        </div>

    </nav>
</div>

<!--head container-->

<div class="container">
    <!---head--->

    <div class="head text-center">
        <img src="assets/img/logo.png" width="100">
        <h2 class="text-white">SIBUTIK Digital<br>DisDukcapil Kabupaten Manggarai Barat</h2>
    </div>
    <!---end head-->
    <!---end row-->
</div>
<div class="col-lg-7 mb-3 mx-auto">
    <div class="card shadow ">
        <div class="card-body">

            <div class="text-center">
                <h3 class="h3 text-gray-900 mb-3">Statistik Pengunjung</h3>
            </div>
            <?php
            $sekarang = date('Y-m-d h:i:s');
            $tgl_sekarang = date('Y-m-d');
            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +2 day', strtotime($tgl_sekarang)));
            $bulan = date('m');


            $tgl_sekarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM t_tamu where tanggal like 
            '%$tgl_sekarang%' "));
            $kemarin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM t_tamu where tanggal like '%$kemarin%' "));
            $seminggu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM t_tamu where tanggal BETWEEN '$seminggu'
            and '$sekarang' "));
            $sebulan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM t_tamu where month(tanggal) = '$bulan' "));
            $keseluruhan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM t_tamu  "));



            ?>
            <table class="table table-bordered">
                <tr>
                    <td class="text-dark">Hari Ini</td>
                    <td class="text-dark">: <?= $tgl_sekarang['0'] ?></td>

                </tr>
                <tr>
                    <td class="text-dark">Kemarin</td>
                    <td class="text-dark">: <?= $kemarin['0'] ?></td>
                </tr>
                <tr>
                    <td class="text-dark">Seminggu</td>
                    <td class="text-dark">: <?= $seminggu['0'] ?></td>
                </tr>
                <tr>
                    <td class="text-dark">Bulan Ini</td>
                    <td class="text-dark">: <?= $sebulan['0'] ?></td>
                </tr>
                <tr>
                    <td class="text-dark">Keseluruhan</td>
                    <td class="text-dark">: <?= $keseluruhan['0'] ?></td>
                </tr>

            </table>
            <div class="col-md-2">
                <a href="admin.php" class="btn btn-danger btn-sm form-control"><i class="fa fa-backward"></i> Kembali</a>
            </div>


        </div>
    </div>
</div>