<?php include "header.php" ?>

<!--awal row-->
<div class="row">
    <!--awal col-md-10-->
    <div class="col-md-10 mx-auto">
        <!--awal card-->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-center">Rekapitulasi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" class="text-center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1']) ? $_POST['tanggal1'] : date('Y-m-d') ?>" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input class="form-control" type="date" name="tanggal2" value="<?= isset($_POST['tanggal2']) ? $_POST['tanggal2'] : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <button class="btn btn-primary form-control" name="btampilkan"><i class="fa fa-search"></i>Tampilkan</button>

                        </div>
                        <div class="col-md-2">
                            <a href="admin.php" class="btn btn-danger form-control"><i class="fa fa-backward"></i>Kembali</a>

                        </div>

                    </div>

            </div>
            </form>
            <?php
            if (isset($_POST['btampilkan'])) :

            ?>

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
                            $tgl1 = $_POST['tanggal1'];
                            $tgl2 = $_POST['tanggal2'];

                            $tampil = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal BETWEEN '$tgl1' and '$tgl2'
                            ORDER BY id DESC");
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
                                        <a href="editor.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="hapus.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>

                                    </td>


                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>

                    <center>
                        <form method="POST" action="exportexcel.php">
                            <div class="col-md-4">
                                <input type="hidden" name="tanggala" value="<?= $_POST['tanggal1'] ?>">

                                <input type="hidden" name="tanggalb" value="<?= $_POST['tanggal2'] ?>">

                                <button class="btn btn-success form-control" name="bexport"><i class="fa fa-download"></i> Export Excel</button>

                            </div>

                        </form>
                    </center>
                </div>
            <?php endif; ?>
            <!--akhir card-->
        </div>
        <!--akhir col-md-12-->
    </div>
</div>
<!--akhir row-->
<?php include "footer.php" ?>