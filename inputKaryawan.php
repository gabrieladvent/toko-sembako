<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Karyawan - MATA DEWA</title>

    <!-- Favicons -->
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets\css\inputKaryawan.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
  <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>
</head>
</script>

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
    <section id="hero">
        <div id="main">
            <div class="container">
                <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
            </div>
            <nav class="navbar" style="background-color: #1995ad;">
                    <div class="container-fluid">
                        <a id="header" class="navbar-brand" href=""><b>INPUT KARYAWAN</b></a>
                    </div>
                </nav>

            <?php
            //  Connect to DataBase
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "toko_mata_dewa";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM karyawans";
            $result = mysqli_query($conn, $sql);

            $query = mysqli_query($conn, "SELECT max(Kode_Karyawan) as kodeTerbesar FROM karyawans");
            $data = mysqli_fetch_array($query);
            $kodeKaryawan = $data['kodeTerbesar'];

            $urutan = (int) substr($kodeKaryawan, 3, 3);

            $urutan++;
            $huruf = "K";
            $kodeKar = $huruf . sprintf("%04s", $urutan);

            $conn->close();
            ?>


            <!-- FORM INPUT -->
            <div class="Uicontainer">
                <form action="setInputKaryawan.php" method="POST" style="margin-left: 10%; margin-right: 5%;">
                    <div class="formgroup">
                        <label for="inputdefault">Kode Karyawan</label>
                        <div style="display:inline;"><input class="form-control input-lg" id="kodeKaryawan" type="text" name="kodeKaryawan" readonly value="<?php echo $kodeKar ?>"></div>
                    </div>
                    <div class="formgroup">
                        <label for="inputlg">Nama Karyawan</label>
                        <input class="form-control input-lg" id="namaKaryawan" type="text" name="namaKaryawan" required>
                    </div>
                    <div class="formgroup">
                        <label for="inputsm">No Telepon Karyawan</label>
                        <input class="form-control input-lg" id="noTelp" type="text" name="noTelp" required>
                    </div>
                    <button type="button" class="btnBatal" name="batal" onclick="BatalAlert()" >Batal</button>
                    <button type="submit" class="btnSimpan" name="simpan" id="btnsimpan">Simpan</button>
                </form>
            </div>

            <div class="tableKaryawan">

                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">No
                            </th>
                            <th class="th-sm">Kode_karywan
                            </th>
                            <th class="th-sm">Nama_Karyawan
                            </th>
                            <th class="th-sm">Nomor Telepon
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
                                <td><?php echo $row["Kode_Karyawan"]; ?></td>
                                <td><?php echo $row["Nama_Karyawan"]; ?></td>
                                <td><?php echo $row["No_Telp_Karyawan"]; ?></td>
                            </tr>
                        <?php }
                        
                        ?>

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

        function BatalAlert() {
            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Jika membatalkan maka inputan tidak akan disimpan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('namaKaryawan').value = " ";
                        document.getElementById('noTelp').value = " ";
                    }
                });
        }
    </script>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>