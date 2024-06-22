<?php include "header.php"; ?>

<?php
if (isset($_POST['bsimpan'])) {

    // Sanitize user inputs
    $nik = htmlspecialchars($_POST['nik'], ENT_QUOTES);
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $desa = htmlspecialchars($_POST['desa'], ENT_QUOTES);
    $kecamatan = htmlspecialchars($_POST['kecamatan'], ENT_QUOTES);

    // Use prepared statements to avoid SQL injection
    $stmt = $koneksi->prepare("INSERT INTO t_tamu (nik, nama, nope, alamat, desa, kecamatan) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nik, $nama, $nope, $alamat, $desa, $kecamatan);

    // Execute the statement and check for success
    if ($stmt->execute()) {

        echo "<script>alert('Simpan data sukses, terima kasih..!');
             document.location='?' </script>";
        header("location: admin.php");
    } else {
        echo "<script>alert('Simpan data Gagal!');
        document.location='?'</script>";
    }

    // Close the statement
    $stmt->close();
}
?>

<!--head container-->

<div class="container">
    <!---head--->

    <div class="head text-center">
        <img src="assets/img/logo.png" width="100">
        <h2 class="text-white">SIBUTIK Digital<br>DisDukcapil Kabupaten Manggarai Barat</h2>
    </div>
    <!---end head-->


    <!---awal row-->
    <div class="row mt-2-center">
        <!--col-lg-7-->
        <div class="col-lg-7 mb-3 mx-auto">
            <div class="card shadow bg-gradient-light">
                <!---card-body-->

                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4 mx-auto">Identitas Tamu</h1>
                    </div>

                    <form class="user" method="POST" action="">


                        <div class="form-group">
                            <input type="text" class="form-control
                                    form-control-user" name="nik" placeholder="NIK " required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control
                                    form-control-user" name="nama" placeholder="Nama " required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control
                                    form-control-user" name="nope" placeholder="No HP" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control
                                    form-control-user" name="alamat" placeholder="Alamat " required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control
                                    form-control-user" name="desa" placeholder="Desa" required>
                        </div>
                        <div>
                            <div class="form-group">
                                <select class="
                                form-control-user" name="kecamatan" placeholder="kecamatan">
                                    <option value="Komodo">Komodo</option>
                                    <option value="Boleng">Boleng</option>
                                    <option value="Sano Nggoang">Sano Nggoang</option>
                                    <option value="Mbeliling">Mbeliling</option>
                                    <option value="Lembor">Lembor</option>
                                    <option value="Welak">Welak</option>
                                    <option value="Lembor Selatan">Lembor Selatan</option>
                                    <option value="Kuwus">Kuwus</option>
                                    <option value="Ndoso">Ndoso</option>
                                    <option value="Macang Pacar">Macang Pacar</option>
                                    <option value="Kuwus Barat">Kuwus Barat</option>
                                    <option value="Pacar">Pacar</option>
                                </select>

                            </div>


                            <button type="simpan" name="bsimpan" class="btn-primary btn-user btn-block">Simpan Data</button>

                            <div class="text-center">
                                <a class="small" href="https://dukcapil.manggaraibaratkab.go.id/">Dukcapil Kabupaten Manggarai Barat | by @KettyKornelia</a>
                            </div>

                        </div>
                        <!--end card-body-->
                </div>
            </div>
            <!--end col-lg-7-->

            <!--end col-lg-5-->



        </div>

        <?php include "footer.php"; ?>