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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tamu Hari Ini[<?= date('Y-m-d') ?>]</h6>
            <a href="statistik.php" class="btn btn-success  btn-sm">Statistik Pengunjung </a>
        </div>
        <div class="card-body">

            <a href="tambah_data.php" class="btn btn-primary btn-sm">Tambah Data</a>
            <a href="rekapitulasi.php" class="btn btn-success btn-sm mb-3"><i class="fa 
                fa-table "></i>Rekapitulasi</a>
            <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="btn btn-danger btn-sm mb-3"><i class="fa 
            fa-sign-out-alt"></i>Logout</a>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tgl = date('Y-m-d'); //2024-04-26

                        $tampil = mysqli_query($koneksi, "SELECT * FROM t_tamu where 
                        tanggal like '%$tgl%' ORDER BY id DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_array($tampil)) {

                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <th><?= $data['tanggal'] ?></td>
                                <th><?= $data['nik'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nope'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['desa'] ?></td>
                                <td><?= $data['kecamatan'] ?></td>
                                <td>
                                    <a href="editor.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm">Hapus</a>

                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>





    <?php include "footer.php"; ?>