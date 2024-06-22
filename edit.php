<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST['id'];

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $nope = $_POST['nope'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];

    // buat query update
    $sql = "UPDATE t_tamu SET nik='$nik', nama='$nama', nope='$nope', alamat='$alamat', desa='$desa', kecamatan='$kecamatan' WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman edit.php
        header('Location: admin.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
