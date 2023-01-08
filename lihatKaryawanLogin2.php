<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Lihat Data Karyawan - MATA DEWA</title>
    <link rel="stylesheet" href="assets\css\rud.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css?v=<?php echo time(); ?>">
    <script src="assets\js\scriptEditBarang.js?v=<?php echo time(); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js?v=<?php echo time(); ?>"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js?v=<?php echo time(); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js?v=<?php echo time(); ?>"></script>
    <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>


</head>

<body>
    <!-- Header -->
    <header>
        <div class="sidebar" id="mySidebar" style="display:none">
            <ion-icon name="menu-outline" id="btnclose" onclick="w3_close() ">&times;</ion-icon>
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
    <!-- Main -->
    <section id="hero">
        <div id="main">
            <div class="container">
                <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
            </div>
            <h2 class="judul"><strong>Lihat Data Karyawan </strong></h2>
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

            $sql = "SELECT * FROM karyawans";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // output data of each row
            ?>
                <center>
                    <div class="kepala">
                    
                    </div>
                    <div class='tabel-sc'>
                        <table id="tabelKaryawan" class="table table-striped" onclick='tampil()'>
                            <thead>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama karyawan</th>
                                <th>No. Telp</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row["Kode_Karyawan"] ?></td>
                                        <td><?php echo $row["Nama_Karyawan"] ?></td>
                                        <td><?php echo $row["No_Telp_Karyawan"] ?></td>
                                        <td class='delete'><a id="hapus" data-id="<?php echo $row["Kode_Karyawan"] ?>" href='#'>
                                                <ion-icon name='trash-outline'></ion-icon>
                                            </a></td>
                                        <td class='edit'><a id="edit" data-id="<?php echo $row["Kode_Karyawan"] ?>" href='#'>
                                                <ion-icon name='create-outline'></ion-icon>
                                            </a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php

            } else {
                echo "0 results";
            }
                ?>

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
            document.getElementById("main").style.marginLeft = "5%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("btn").style.display = "inline-block";
        }

        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        });


        $('#tabelKaryawan #edit').click(function() {
            var id = $(this).attr('data-id');
            document.cookie = "var2=" + id + "", window.location = "editKaryawan.php"
        })

        $('#tabelKaryawan #hapus').click(function() {
            var id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah anda Yakin?',
                text: "Data akan terhapus secara permanen!",
                icon: 'warning',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'

            }).then((result) => {
                if (result.isConfirmed) {
                    document.cookie = "var2=" + id + "", window.location = "hapusKaryawan.php"
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus',
                        'success'
                    )
                }
            })
        })

        $('#tabelKaryawan').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "zeroRecords": "Maaf - Data tidak ada",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data",
                "infoFiltered": "(pencarian dari _MAX_ data)",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }

            },
            responsive: true,
            stateSave: true // keep paging
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>