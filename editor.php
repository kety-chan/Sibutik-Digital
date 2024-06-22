<?php include "header.php"; ?>
<?php

include("koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: admin.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM t_tamu WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$tamu = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Edit Tamu | Sistem Informasi Buku Tamu Identitas Kependudukan Digital </title>

    <link rel="icon" href="assets/img/logo.png" type="image/x-icon ">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="head text-center mb-3">
        <div class="head text-center">
            <img src="assets/img/logo.png" width="100">
            <h3 class="text-white">SIBUTIK Digital<br>DisDukcapil Kabupaten Manggarai Barat</h3>
        </div>


    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">

            <div class="card-header bg-light text-dark text-light">

                Form Edit Data Tamu

            </div>

            <form action="edit.php" method="POST">

                <fieldset>

                    <input type="hidden" name="id" value="<?php echo $tamu['id'] ?>" />

                    <p>
                        <label for="nama" class="text-white">NIK: </label>
                        <input type="text" name="nik" placeholder="nik" value="<?php echo $tamu['nik'] ?>" />
                    </p>
                    <p>
                        <label for="nama" class="text-white">Nama: </label>
                        <input type="text" name="nama" placeholder="nama" value="<?php echo $tamu['nama'] ?>" />
                    </p>
                    <p>
                        <label for="nama" class="text-white">Nope: </label>
                        <input type="text" name="nope" placeholder="nope" value="<?php echo $tamu['nope'] ?>" />
                    </p>
                    <p>
                        <label for="nama" class="text-white">Alamat: </label>
                        <input type="text" name="alamat" placeholder="alamat" value="<?php echo $tamu['alamat'] ?>" />
                    <p>
                        <label for="nama" class="text-white">Desa: </label>
                        <input type="text" name="desa" placeholder="desa" value="<?php echo $tamu['desa'] ?>" />
                    </p>
                    </p>
                    <p>
                        <label for="kecamatan" class="text-white">Kecamatan: </label>
                        <?php $kecamatan = $tamu['kecamatan']; ?>
                        <select name="kecamatan">
                            <option <?php echo ($kecamatan == 'komodo') ? "selected" : "" ?>>Komodo</option>
                            <option <?php echo ($kecamatan == 'Sano Nggoang') ? "selected" : "" ?>>Sano Nggoang</option>
                            <option <?php echo ($kecamatan == 'Mbeliling') ? "selected" : "" ?>>Mbeliling</option>
                            <option <?php echo ($kecamatan == 'Lembor') ? "selected" : "" ?>>Lembor</option>
                            <option <?php echo ($kecamatan == 'Lembor') ? "selected" : "" ?>>Lembor</option>
                            <option <?php echo ($kecamatan == 'Kuwus') ? "selected" : "" ?>>Kuwus</option>
                            <option <?php echo ($kecamatan == 'Ndoso') ? "selected" : "" ?>>Ndoso</option>
                            <option <?php echo ($kecamatan == 'Macang Pacar') ? "selected" : "" ?>>Macang Pacar</option>
                            <option <?php echo ($kecamatan == 'Kuwus Barat') ? "selected" : "" ?>>Kuwus Barat</option>
                            <option <?php echo ($kecamatan == 'Pacar') ? "selected" : "" ?>>Pacar</option>
                            <option <?php echo ($kecamatan == 'Boleng') ? "selected" : "" ?>>Boleng</option>



                        </select>
                    </p>

                    <p>
                        <input type="submit" value="Simpan" name="simpan" />
                    </p>

                </fieldset>
                <div class="card-footer bg-light">

                </div>

            </form>






</body>


</html>
<?php include "footer.php"; ?>