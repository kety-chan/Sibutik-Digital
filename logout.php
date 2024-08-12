<?php include "header.php"; ?>
<!-- Scroll to Top Button-->
<?php
session_start();
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";
$_SESSION['password'];
$_SESSION['nama'];
session_destroy();
echo "<script>
alert('Anda Telah Keluar Dari Sistem')
document.location= 'index.php';

</script>";
