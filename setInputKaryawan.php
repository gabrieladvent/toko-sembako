 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" type="text/css" href="assets\css\setInputKaryawan.css?v=<?php echo time(); ?>">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="assets\foto\logo.png" rel="icon">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets\css\inputKaryawan.css?v=<?php echo time(); ?>">
   <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
 </head>

 <body>
   <?php
    //  Connect to DataBase
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_mata_dewa";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    if (isset($_POST['simpan']) and $_SERVER['REQUEST_METHOD'] == "POST") {

      $kode = $_POST['kodeKaryawan'];
      $nama = $_POST['namaKaryawan'];
      $noTelp = $_POST['noTelp'];
      $sql = "INSERT INTO `karyawans`(`Kode_Karyawan`, `Nama_Karyawan`, `No_Telp_Karyawan`) VALUES ('$kode','$nama','$noTelp')";
      $result = mysqli_query($conn, $sql);
    }
    ?>
   <section id="hero">
     <div id="main">
       <div class="container">
         <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
       </div>
       <h1 class="h1">Input Data Karyawan</h1>

       <!-- FORM INPUT -->
       <div class="Uicontainer">
         <form action="setInputKaryawan.php" method="POST" style="margin-left: 10%; margin-right: 5%;">
           <div class="formgroup">
             <label for="inputdefault">Kode Karyawan</label>
             <div style="display:inline;"><input class="form-control input-lg" id="kodeKaryawan" type="text" name="kodeKaryawan" readonly value="<?php echo $kode ?>"></div>
           </div>
           <div class="formgroup">
             <label for="inputlg">Nama Karyawan</label>
             <input class="form-control input-lg" id="namaKaryawan" type="text" name="namaKaryawan">
           </div>
           <div class="formgroup">
             <label for="inputsm">No Telepon Karyawan</label>
             <input class="form-control input-lg" id="noTelp" type="text" name="noTelp">
           </div>
           <button type="button" class="btn_btn-primary" name="batal" style="margin-right:380px ;background-color: #ff0000; ">Batal</button>
           <button type="submit" class="btn_btn-primary" id="btnsimpan" name="simpan">Simpan</button>
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
               $sql = "SELECT * FROM karyawans";
               $result = mysqli_query($conn, $sql);
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
              if (isset($_POST['simpan'])) {
                echo "<script>swal('Sukses', 'Berhasil Menambahkan Data!', 'success');</script>";
              }
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
     swal("Sukses", "Berhasil Menambahkan Data!", "success")
       .then((value) => {
         window.location.replace('inputKaryawan.php');
       });
   </script>
 </body>

 </html>