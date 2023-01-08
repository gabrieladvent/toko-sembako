<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - MATA DEWA</title>

    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="assets\css\keuangan1.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>

    <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
  <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>


</head>
<body>
<header>
    <div class="sidebar" id="mySidebar" style="display:none">
        <ion-icon name="menu-outline" id="btnclose" onclick="w3_close()">&times;</ion-icon>
        <div class="top">
            <img src="assets\foto\logoResol.png" alt="" class="hi-top">
        </div>
        <div class="center">
        <ul>
                    <li><a span class="icon" href="javascript:history.back()>
                            <ion-icon name="arrow-undo-outline"></ion-icon></span>
                    <li><a span class="icon" href="inputKaryawan.php">
                            <ion-icon name="duplicate-outline"></ion-icon></span>
                            <span class="title">Input Data Karyawan</span>
                        </a></li></a></li>
                    <li><a span class="icon" href="lihatKaryawanLogin2.php">
                            <ion-icon name="person-outline"></ion-icon></span>
                            <span class="title">Lihat Data Karyawan</span>
                        </a></li></a></li>
                    <li><a span class="icon" href="LaporanPenjualan.php">
                            <ion-icon name="reader-outline"></ion-icon></span>
                            <span class="title">Laporan Penjualan</span>
                        </a></li></a></li>
                    <li><a span class="icon" href="LaporanKeuangan.php">
                            <ion-icon name="server-outline"></ion-icon></span>
                            <span class="title">Laporan Keuangan</span>
                        </a></li></a></li>
                        <li><form action="" method="POST">
                        <button name="keluar" class="tombol-keluar" data-toggle="tooltip" title="Keluar">Keluar <ion-icon name="enter-outline" size="large"></ion-icon></i></button>
                        </form></li>
                </ul>
        </div>
    </div>
</header>
    <!-- Main -->
    <?php 
    if (isset($_POST['keluar'])) {
        ?>
          <script>
            Swal.fire({
              title: 'Apakah anda Yakin?',
              text: "Data Tidak Akan Disimpan!!!",
              icon: 'warning',
              confirmButtonText: 'Ya!',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Batal!'
  
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.replace('logout.php');
              }
              swal("Silahkan Lanjutkan Transaksi Anda!");
            })
          </script>
          <?php
        }
    ?>

    <div id="layar">
        <section id="hero">
            <div id="main">
                <div class="container">
                    <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
                </div>
                <nav class="navbar" style="background-color: #1995ad;">
                    <div class="container-fluid">
                        <a id="header" class="navbar-brand" href=""><b>LAPORAN PENJUALAN</b></a>
                    </div>
                </nav>
                <br><br>
                <form action="" method="POST">
                    <pre id="judulTahun">Tahun     :   <select id="judulCombo" name="tahun">
        <option value="Semua">Semua</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
    </select></pre>
                    <pre id="judulBulan">Bulan      :   <select id="judulCombo" name="bulan">
    <option value="Semua">Semua</option>
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
</select></pre>
                    <pre id="judulTanggal">Tanggal  :   <select id="judulCombo" name="tanggal">
<option value="Semua">Semua</option>
         <option value="1">01</option>
         <option value="2">02</option>
         <option value="3">03</option>
         <option value="4">04</option>
         <option value="5">05</option>
         <option value="6">06</option>
         <option value="7">07</option>
         <option value="8">08</option>
         <option value="9">09</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         <option value="14">14</option>
         <option value="15">15</option>
         <option value="16">16</option>
         <option value="17">17</option>
         <option value="18">18</option>
         <option value="19">19</option>
         <option value="20">20</option>
         <option value="21">21</option>
         <option value="22">22</option>
         <option value="23">23</option>
         <option value="24">24</option>
         <option value="25">25</option>
         <option value="26">26</option>
         <option value="27">27</option>
         <option value="28">28</option>
         <option value="29">29</option>
         <option value="30">30</option>
         <option value="31">31</option>
    </select></pre>
                    <input id="tombolCari" class="btn btn-primary" type="submit" name="cari" value="Cari" data-toggle="tooltip" data-placement="top" title="Cari">
                </form>
                <input id="tombolUnduhAll" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" type="submit" value="Unduh File" onclick="unduh()"data-toggle="tooltip" data-placement="top" title="Unduh File">
                <script>
                    function unduh() {
                        swal.fire({
                                title: 'Apakah Anda Yakin Ingin Download?',
                                text: "File Yang Didownload Berbentuk Excel (.xls)",
                                icon: 'info',
                                confirmButtonText: 'Ya!',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                cancelButtonText: 'Batal!'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "cetakExcelPenjualan.php";
                                }
                            });
                    }
                </script>
                <!-- </div> -->
                <br><br><br>
                <div class="tabelScroll Bar">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "toko_mata_dewa";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    if (isset($_POST['cari'])) {
                        $hari = $_POST['tanggal'];
                        $bulan = $_POST['bulan'];
                        $tahun = $_POST['tahun'];

                        if ($hari == 'Semua' && $bulan == 'Semua' && $tahun == 'Semua') {
                            $sqlAll = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                   barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = 
                                   detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang";
                            $queryAll = mysqli_query($conn, $sqlAll);
                            $hasilAll = [];
                            while ($temp = mysqli_fetch_assoc($queryAll)) {
                                $hasilAll[] = $temp;
                                $totalBarang[] = $temp['Stock_Barang'];
                            }
                            $_SESSION['hasil'] = $hasilAll;
                            echo "<table class=table table-striped>";
                            echo "<tr id=headerTabel align='center'>";
                            echo "<td><b>Id Jual<b></td>";
                            echo "<td><b>Tanggal Jual<b></td>";
                            echo "<td><b>Kode Barang<b></td>";
                            echo "<td><b>Nama Barang<b></td>";
                            echo "<td><b>Sisa Stok Barang<b></td>";
                            echo "<td><b>Jumlah Barang Terjual<b></td></tr>";
                            echo "</tr>";
                            $barangJualTotal = 0;
                            foreach ($hasilAll as $data) {
                                echo "<tr id=tabelIsi align='center'>";
                                echo "<td>" . $data['ID_Jual'] . "</td>";
                                echo "<td>" . $data['Tanggal_Jual'] . "</td>";
                                echo "<td>" . $data['Kode_Barang'] . "</td>";
                                echo "<td>" . $data['Nama_Barang'] . "</td>";
                                echo "<td>" . $data['Stock_Barang'] . "</td>";
                                echo "<td>" . $data['Jumlah_Barang'] . "</td>";
                                $barangJualTotal += $data['Jumlah_Barang'];
                                echo "</tr>";
                            }
                            // $totalBarang1 = array_sum($totalBarang);
                            $_SESSION['Total'] =   $barangJualTotal;
                            echo "<tr id = totalPendapatan>";
                            echo "<td colspan = '5' align = 'center'><b>Total Barang Terjual<b></td>";
                            echo "<td align = 'center'><b> $barangJualTotal<b></td>";
                            echo "</tr>";
                            echo "</table>";
                        } else {
                            if ($bulan == 'Semua' && $tahun == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE DAY(Tanggal_Jual) = $hari";
                            } else if ($hari == 'Semua' && $tahun == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE MONTH(Tanggal_Jual) = $bulan";
                            } else if ($hari == 'Semua' && $bulan == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE YEAR(Tanggal_Jual) = $tahun";
                            } else if ($hari == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE MONTH(Tanggal_Jual) = $bulan AND YEAR(Tanggal_Jual) = $tahun";
                            } else if ($bulan == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE YEAR(Tanggal_Jual) = $tahun AND DAY(Tanggal_Jual) = $hari";
                            } else if ($tahun == 'Semua') {
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE MONTH(Tanggal_Jual) = $bulan AND DAY(Tanggal_Jual) = $hari";
                            } else {
                                $date = "$tahun-$bulan-$hari";
                                $sqlPilih = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                                barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang WHERE Tanggal_Jual = '$date'";
                            }
                            $queryPilih = mysqli_query($conn, $sqlPilih);
                            if (mysqli_num_rows($queryPilih) > 0) {
                                $hasilPilih = [];
                                while ($temp = mysqli_fetch_assoc($queryPilih)) {
                                    $hasilPilih[] = $temp;
                                    $totalBarang[] = $temp['Stock_Barang'];
                                }
                                $_SESSION['hasil'] = $hasilPilih;
                                // $_SESSION['pilih'] = "Semua";
                                echo "<table class=table table-striped>";
                                echo "<tr id=headerTabel align='center'>";
                                echo "<td><b>Id Jual<b></td>";
                                echo "<td><b>Tanggal Jual<b></td>";
                                echo "<td><b>Kode Barang<b></td>";
                                echo "<td><b>Nama Barang<b></td>";
                                echo "<td><b>Sisa Stok Barang<b></td>";
                                echo "<td><b>Jumlah Barang Terjual<b></td></tr>";
                                echo "</tr>";
                                $barangJualTotal = 0;
                                foreach ($hasilPilih as $data) {
                                    echo "<tr id=tabelIsi align='center'>";
                                    echo "<td>" . $data['ID_Jual'] . "</td>";
                                    echo "<td>" . $data['Tanggal_Jual'] . "</td>";
                                    echo "<td>" . $data['Kode_Barang'] . "</td>";
                                    echo "<td>" . $data['Nama_Barang'] . "</td>";
                                    echo "<td>" . $data['Stock_Barang'] . "</td>";
                                    echo "<td>" . $data['Jumlah_Barang'] . "</td>";
                                    $barangJualTotal += $data['Jumlah_Barang'];
                                    echo "</tr>";
                                }
                                // $totalBarang1 = array_sum($totalBarang);
                                $_SESSION['Total'] =  $barangJualTotal;
                                echo "<tr id = totalPendapatan>";
                                echo "<td colspan = '5' align = 'center'><b>TOTAL BARANG TERJUAL<b></td>";
                                echo "<td align = 'center'><b>$barangJualTotal<b></td>";
                                echo "</tr>";
                                echo "</table>";
                            } else {
                                echo '<script>
                                swal("Tidak Ditemukan!", "Data yang dicari tidak ditemukan!", "info");
                                 </script>';
                                 echo("<meta http-equiv='refresh' content='1'>");

                            }
                        }
                    } else{
                        $sqlAll = "SELECT transaksi_jual.ID_Jual, transaksi_jual.Tanggal_Jual, detail_transaksi_jual.Kode_Barang, 
                        barang.Nama_Barang, barang.Stock_Barang, detail_transaksi_jual.Jumlah_Barang FROM transaksi_jual INNER JOIN detail_transaksi_jual ON transaksi_jual.ID_Jual = 
                                   detail_transaksi_jual.ID_Jual INNER JOIN barang ON detail_transaksi_jual.Kode_Barang = barang.Kode_Barang";
                            $queryAll = mysqli_query($conn, $sqlAll);
                            $hasilAll = [];
                            while ($temp = mysqli_fetch_assoc($queryAll)) {
                                $hasilAll[] = $temp;
                                $totalBarang[] = $temp['Stock_Barang'];
                            }
                            $_SESSION['hasil'] = $hasilAll;
                            echo "<table class=table table-striped>";
                            echo "<tr id=headerTabel align='center'>";
                            echo "<td><b>Id Jual<b></td>";
                            echo "<td><b>Tanggal Jual<b></td>";
                            echo "<td><b>Kode Barang<b></td>";
                            echo "<td><b>Nama Barang<b></td>";
                            echo "<td><b>Sisa Stok Barang<b></td>";
                            echo "<td><b>Jumlah Barang Terjual<b></td></tr>";
                            echo "</tr>";
                            $barangJualTotal =0;
                            foreach ($hasilAll as $data) {
                                echo "<tr id=tabelIsi align='center'>";
                                echo "<td>" . $data['ID_Jual'] . "</td>";
                                echo "<td>" . $data['Tanggal_Jual'] . "</td>";
                                echo "<td>" . $data['Kode_Barang'] . "</td>";
                                echo "<td>" . $data['Nama_Barang'] . "</td>";
                                echo "<td>" . $data['Stock_Barang'] . "</td>";
                                echo "<td>" . $data['Jumlah_Barang'] . "</td>";
                                $barangJualTotal += $data['Jumlah_Barang'];
                                echo "</tr>";
                            }
                            $_SESSION['Total'] = $barangJualTotal;
                            echo "<tr id = totalPendapatan>";
                            echo "<td colspan = '5' align = 'center'><b>Total Barang Terjual<b></td>";
                            echo "<td align = 'center'><b>$barangJualTotal<b></td>";
                            echo "</tr>";
                            echo "</table>";
                    }


                    ?>
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
            function w3_open() {
                document.getElementById("main").style.marginLeft = "25%";
                document.getElementById("mySidebar").style.width = "25%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("btn").style.display = 'none'
            }

            function w3_close() {
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("btn").style.display = "inline-block";
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- <script src="lihatKaryawan.js"></script> -->
</body>

</html>