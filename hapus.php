<?php

include("koneksi.php");

if (isset($_GET['id'])) {

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_tamu WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?

    if ($query) {
        header('location: admin.php?halaman=data&pesan=3');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
