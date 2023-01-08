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
$kodeBarang = $_COOKIE['var1'];
$sql = "DELETE FROM `barang` WHERE Kode_Barang = '$kodeBarang'";
$result = $conn->query($sql);

if ($result) { ?>
<?php
    header("location:lihatBarangLogin2.php");
}
