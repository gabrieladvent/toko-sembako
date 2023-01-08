<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Barang - MATA DEWA</title>

    <!-- Favicons -->
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets\css\lihatBarang.css?v=<?php echo time(); ?>">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="tCSS\lihatBarang.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />

</head>

<body>
    <section id="hero">
            <p class="head">LIHAT DATA BARANG</p>

            <!-- Connect Database -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "toko_mata_dewa";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM barang";
            $result = mysqli_query($conn, $sql);
            ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th class="th-sm">No
                        </th>
                        <th class="th-sm">Kode Barang
                        </th>
                        <th class="th-sm">Nama Barang
                        </th>
                        <th class="th-sm">Harga Barang
                        </th>
                        <th class="th-sm">Stock Barang
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
                            <td><?php echo "Rp " . $row["Harga_Barang"]; ?></td>
                            <td><?php echo $row["Stock_Barang"]; ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <div class="btn-kembali">
                <form action="" method="POST">
                    <button class="kmbli-btn" name="btn-kmbli">Kembali</a></button>
                </form>
            </div>
        </div>
    </section>
    <?php 
    if (isset($_POST['btn-kmbli'])) {
            echo"<script>window.location.replace('HalamanUtama.php');</script>";
        }
    ?>

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
            $('#myTable').dataTable();
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets\js\lihatKaryawan.js?v=<?php echo time(); ?>"></script>

</body>

</html>