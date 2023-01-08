<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang - MATA DEWA</title>

    <!-- Favicons -->
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets\css\inputBarang.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets\js\inputBarang.js?v=<?php echo time(); ?>"> </script>

    <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
  <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>

</head>

<body>
<header>
    <div class="sidebar" id="mySidebar" style="display:none">
      <ion-icon name="menu-outline" id="btnclose" onclick="w3_close() "></ion-icon>
      <div class="top">
        <img src="assets\foto\logoResol.png" alt="" class="hi-top">
      </div>
      <div class="center">
      <ul>
                    <li><a span class="icon" href="javascript:history.back()">
                            <ion-icon name="arrow-undo-outline"></ion-icon></span>
                    <li><a span class="icon" href="newTransaksi.php">
                        <ion-icon name="cash-outline"></ion-icon></span>
                        <span class="title">Transaksi</span>
                        </a></li></a></li>
                    <li><a span class="icon" href="inputBarang.php">
                            <ion-icon name="duplicate-outline"></ion-icon></span>
                            <span class="title">Input Barang</span>
                        </a></li></a></li>
                    <li><a span class="icon" href="lihatBarangLogin2.php">
                    <ion-icon name="albums-outline"></ion-icon></span>
                            <span class="title">Lihat Data Barang</span>
                        </a></li></a></li>
                    <li><form action="" method="POST" id="keluar">
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
                        <a id="header" class="navbar-brand" href=""><b>INPUT BARANG</b></a>
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
                        <div style="display:inline;"><input class="form-control input-lg" id="kodeBarang" type="text" name="kodeBarang" readonly value="<?php echo $kodeBarang?>"></div>
                    </div>
                    <div class="formgroup">
                        <label for="inputlg">Nama Barang</label>
                        <input class="form-control input-lg" id="namaBarang" type="text" name="namaBarang">

                    </div>
                    <div class="formgroup">
                        <label for="inputsm">Harga Satuan</label>
                        <input class="form-control input-lg" id="harga" type="text" name="hargaBarang" onkeyup="ketikRupiah()">
                    </div>
                    <div class="formgroup">
                        <label for="inputsm">Stock Barang</label>
                        <input class="form-control input-lg" id="stock" type="text" name="stockBarang">
                    </div>
                    <button type="button" class="btnBatal" name="batal" onclick = " BatalAlert()">Batal</button>
                    <button type="submit" class="btnSimpan" name="simpan" onclick="JSalert()">Simpan</button>
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
                        }?>

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
        function JSalert() {
            swal("Sukses", "Berhasil Menambahkan Data!", "success");
        }
        function BatalAlert(){
        swal({
                title: "Apakah Anda Yakin?",
                text: "Jika membatalkan maka inputan tidak akan disimpan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('namaBarang').value = " ";
                    document.getElementById('harga').value = " ";
                    document.getElementById('stock').value = " ";
                }
            });
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>