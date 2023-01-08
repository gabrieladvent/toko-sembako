<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_mata_dewa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}
$kodeKaryawan = $_COOKIE['var2'];
$sql = "DELETE FROM `karyawans` WHERE Kode_Karyawan = '$kodeKaryawan'";
$result = $conn->query($sql);

if ($result) { ?>
<?php
    header("location:lihatKaryawanLogin2.php");
}
