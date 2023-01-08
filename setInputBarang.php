<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="assets\css\setInputKaryawan.css?v=<?php echo time(); ?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets\css\inputBarang.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets\js\inputBarang.js?v=<?php echo time(); ?>"> </script>
</head>

<div class="popup" id="popup">
    <img src="404-tick.png">
    <h2>Terima Kasih</h2>
    <p>Data Karyawan Berhasil Ditambahkan!!</p>
    <button type="button" onclick="closePopup()">OK</button>
</div>

<?php
//  Connect to DataBase
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_mata_dewa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (isset($_POST['simpan']) and $_SERVER['REQUEST_METHOD'] == "POST") {
    $kode = $_POST['kodeBarang'];
    $nama = $_POST['namaBarang'];
    $harga = $_POST['hargaBarang'];

    $stock = $_POST['stockBarang'];
    $sql = "INSERT INTO `barang`(`Kode_Barang`, `Nama_Barang`, `Harga_Barang`, `Stock_Barang`) VALUES ('$kode','$nama'," . hilangkanRupiah($harga) . ",$stock)";
    $result = mysqli_query($conn, $sql);
}

function hilangkanRupiah($rp)
{
    $hasil = preg_replace('/[Rp. ]/', '', $rp);
    return $hasil;
}
?>

<section id="hero">
    <div id="main">
        <div class="container">
            <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
        </div>
        <h1 class="h1">INPUT DATA BARANG</h1>

        <?php
        //  Connect to DataBase
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toko_mata_dewa";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM barang";
        $result = mysqli_query($conn, $sql);

        $query = mysqli_query($conn, "SELECT max(Kode_Barang) as kodeTerbesar FROM barang");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];

        $urutan = (int) substr($kodeBarang, 3, 3);

        $urutan++;
        $huruf = "B";
        $kodeBarang = $huruf . sprintf("%04s", $urutan);

        $conn->close();
        ?>


        <!-- FORM INPUT -->
        <div class="Uicontainer">
            <form action="setInputBarang.php" method="POST" style="margin-left: 10%; margin-right: 5%;">
                <div class="formgroup">
                    <label for="inputdefault">Kode Barang</label>
                    <div style="display:inline;"><input class="form-control input-lg" id="kodeBarang" type="text" name="kodeBarang" readonly value="<?php echo $kodeBarang ?>"></div>
                    <!-- <div style="display:inline;"><input class="form-control input-lg" id="kodeKaryawan" type="text" name="kodeKaryawan" style="width: 50%;margin-left:7%;"></div> -->
                </div>
                <div class="formgroup">
                    <label for="inputlg">Nama Barang</label>
                    <!-- <input class="form-control input-lg" id="namaKaryawan" type="text" name="namaKaryawan" style="width: 50%; margin-left:7%;"> -->
                    <input class="form-control input-lg" id="namaBarang" type="text" name="namaBarang">

                </div>
                <div class="formgroup">
                    <label for="inputsm">Harga Satuan</label>
                    <!-- <input class="form-control input-lg" id="noTelp" type="text" name="noTelp" style="width: 50%; margin-left:3%; margin-bottom :20px"> -->
                    <input class="form-control input-lg" id="harga" type="text" name="hargaBarang" onkeyup="ketikRupiah()">
                </div>
                <div class="formgroup">
                    <label for="inputsm">Stock Barang</label>
                    <!-- <input class="form-control input-lg" id="noTelp" type="text" name="noTelp" style="width: 50%; margin-left:3%; margin-bottom :20px"> -->
                    <input class="form-control input-lg" id="stock" type="text" name="stockBarang">
                </div>
                <button type="button" class="btn_btn-primary" name="batal" onclick=" BatalAlert()" style="margin-right:380px ;background-color: #ff0000; ">Batal</button>
                <button type="submit" class="btn_btn-primary" name="simpan" onclick="JSalert()">Simpan</button>
            </form>

        </div>

        <div class="tableKaryawan">

            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">No
                        </th>
                        <th class="th-sm">Kode_Barang
                        </th>
                        <th class="th-sm">Nama_Barang
                        </th>
                        <th class="th-sm">Harga_Satuan
                        </th>
                        <th class="th-sm">Stock_Barang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php echo "$i";
                                $i++ ?>
                            </td>
                            <td><?php echo $row["Kode_Barang"]; ?></td>
                            <td><?php echo $row["Nama_Barang"]; ?></td>
                            <td><?php echo rupiah($row["Harga_Barang"]); ?></td>
                            <td><?php echo $row["Stock_Barang"]; ?></td>
                        </tr>
                    <?php }
                    function rupiah($angka)
                    {
                        $hasil_rupiah = "Rp " . number_format($angka, 0, '', '.');
                        return $hasil_rupiah;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright Kelompok 2 | Rekayasa Perangkat Lunak
        </div>
    </div>
</footer>


<script>
     swal("Sukses", "Berhasil Menambahkan Data!", "success")
       .then((value) => {
         window.location.replace('inputBarang.php');
       });
   </script>
</body>

</html>