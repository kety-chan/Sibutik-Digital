
<?php

//aktifkan session
session_start();

//deklarasi 
include "koneksi.php";
$password = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $password);

$login = mysqli_query($koneksi, "SELECT * FROM login where username = '$username' and password = '$password'");
$data = mysqli_fetch_array($login);

//uji jika user dan pass sesuai
if ($data) {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];


    //arahkan ke hal admin
    header('location:admin.php');
} else {
    echo "<script>
    alert('Terima kasih, Login Anda Berhasil')
    document.location= 'admin.php';
    
    </script>";
}
