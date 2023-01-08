<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Transaksi - Mata Dewa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="assets/foto/logo.png" rel="icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
  <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets\css\transaksiNew.css?v=<?php echo time(); ?>" rel="stylesheet">
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
              <span class="title">Lihat Barang</span>
            </a></li></a></li>
          <li>
            <form action="" method="POST">
              <button name="keluar" class="tombol-keluar" data-toggle="tooltip" title="Keluar">Keluar <ion-icon name="enter-outline" size="large"></ion-icon></i></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <section>
    <div class="titel">
      <p class="titel-tulis">MATA DEWA</p>
    </div>
    <div class="main" id="main">
      <div class="container">
        <ion-icon name="menu-outline" class="fas fa-bars" id="btn" onclick="w3_open()">&#9776;></ion-icon>
      </div>

      <?php
      function setIdJual()
      {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toko_mata_dewa";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $query = mysqli_query($conn, "SELECT max(id_jual) as kodeTerbesar FROM transaksi_jual");
        $data = mysqli_fetch_array($query);
        $idjuals = $data['kodeTerbesar'];
        $urutan = (int) substr($idjuals, 2, 3);
        $urutan++;
        $huruf = "T";
        $idjual = $huruf . sprintf("%04s", $urutan);

        return $idjual;
      }
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
      function hilangkanRupiah($rp)
      {
        $hasil = preg_replace('/[Rp. ]/', '', $rp);
        return $hasil;
      }

      if (isset($_GET['btn-hapus'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toko_mata_dewa";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $kodeId = $_GET['btn-hapus'];
        $delet = mysqli_query($conn, "DELETE FROM `simpantransaksi` WHERE kode_barang = '$kodeId'")
          or die(mysqli_connect_error());
      }
      if (isset($_GET['btn-edit'])) {
        $kodeId = $_GET['btn-edit'];
        $jumlahTerbaru = $_GET['penampung'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toko_mata_dewa";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $updet = mysqli_query($conn, "UPDATE simpantransaksi SET jumlahBarang='$jumlahTerbaru' WHERE kode_barang = '$kodeId'")
          or die(mysqli_connect_error());
      }
      if (isset($_POST['konfir-bayar'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toko_mata_dewa";
        $enterMoney = hilangkanRupiah($_POST['jmlh-uang']);
        $totalMoney = hilangkanRupiah($_POST['harga-total']);
        $kembalian = $enterMoney - $totalMoney;
        if ($kembalian < 0) { ?>
          <div class="alert alert-danger" role="alert">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" data-dismiss="alert">&times;</span>
            <h3>Uang Anda Kurang: Rp <?= $kembalian; ?></h3>
          </div>
        <?php
        } else {
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          $idjual = setIdJual();
          $ambildata = mysqli_query($conn, "INSERT INTO detail_transaksi_jual(ID_Jual, Kode_Barang, Jumlah_Barang, Harga_Jual_Barang)
        SELECT id_jual, kode_barang, jumlahBarang, hargaJualbarang
        FROM simpantransaksi") or die(mysqli_connect_error());

          $ambildata2 = mysqli_query($conn, "INSERT INTO transaksi_jual(id_jual, Kode_Karyawan, Tanggal_Jual)
        SELECT id_jual, kode_karyawan, tgl_jual
        FROM simpantransaksi LIMIT 1") or die(mysqli_connect_error());

          $update = mysqli_query($conn, "UPDATE barang inner join simpantransaksi ON (barang.Kode_Barang = simpantransaksi.kode_barang) SET barang.Stock_Barang = (barang.Stock_Barang-simpantransaksi.jumlahBarang);") or die(mysqli_connect_error());

          $hapusdata = mysqli_query($conn, "DELETE FROM simpantransaksi");
          $idjual = setIdJual();

        ?>
          <div class="alert alert-primary" role="alert">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" data-dismiss="alert">&times;</span>
            <h3>Kembalian: Rp <?= $kembalian; ?></h3>
          </div>
      <?php
        }
      }
      ?>

      <div class="judul">
        <h1>TRANSAKSI</h1>
      </div>

      <!-- Conect Database -->
      <?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "toko_mata_dewa";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);


      // ambil data karyawan dari database.
      $sql = "SELECT id_jual FROM transaksi_jual ORDER BY id_jual DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);

      $idjual = setIdJual();


      $barang = mysqli_query($conn, "SELECT * FROM barang");
      $jsArray = "var harga_barang = new Array();";
      $jsArray1 = "var nama_barang = new Array();";
      function rupiah($angka)
      {
          $hasil_rupiah = "Rp " . number_format($angka, 0, '', '.');
          return $hasil_rupiah;
      }
  
      ?>

      <div class="row">
        <div class="contain">
          <form action="" method="POST">
            <div class="wrapper">
              <div class="grid-container">
                <div class="grid-item">
                  <label for="" id="idKasir">Id Karyawan</label>
                  <input type="text" name="kasirId" style="width: 50%; background-color: #d8d8d9;" readonly value="<?= $_SESSION['password-karyawan']; ?>">
                </div>
                <div class="grid-item">
                  <label for="" id="idTrans">Id Transaksi</label>
                  <input type="text" name="transId" value="<?php echo $idjual ?>" style="width: 50%; background-color: #d8d8d9;" readonly>
                </div>
                <div class="grid-item">
                  <label for="" id="nmKasir">Nama Karyawan</label>
                  <input type="text" name="kasirNm" style="width: 50%; background-color: #d8d8d9;" readonly value="<?= $_SESSION['nama-karyawan']; ?>">
                </div>
                <div class="grid-item">
                  <label for="" id="wktuTrans">Waktu Transaksi</label>
                  <input type="text" name="transWktu" value="<?php
                                                              date_default_timezone_set('Asia/Jakarta');
                                                              echo date('Y-m-d', time()); ?>" style="width: 50%; background-color: #d8d8d9; margin-left: 5px;" readonly>
                </div>
              </div>
            </div>
        </div>
      </div>
      <br>
      <div class="row">
        <h1>INPUTAN</h1>
        <div class="contain">
          <div class="wrapper">
            <div class="grid-container">
              <div class="grid-item">
                <label for="" id="kd-brng">Kode Barang</label>
                <input type="text" name="kode-barang" style="width: 50%;" list="datalist1" onchange="changeValue(this.value)" required placeholder="Silahkan Masukan Kode Barang">
                <datalist id="datalist1">
                  <?php if (mysqli_num_rows($barang)) { ?>
                    <?php while ($row_brg = mysqli_fetch_array($barang)) { ?>
                      <option value="<?php echo $row_brg["Kode_Barang"] ?>"> <?php echo $row_brg["Kode_Barang"] ?>
                      <?php $jsArray .= "harga_barang['" . $row_brg['Kode_Barang'] . "'] = {harga_barang:'" . addslashes($row_brg['Harga_Barang']) . "'};";
                      $jsArray1 .= "nama_barang['" . $row_brg['Kode_Barang'] . "'] = {nama_barang:'" . addslashes($row_brg['Nama_Barang']) . "'};";
                    } ?>
                    <?php } ?>
                </datalist>
              </div>
              <div class="grid-item">
                <label for="" id="nm-brng">Nama Barang</label>
                <input type="text" name="nama-barang" style="width: 50%; background-color: #d8d8d9" readonly id="nama_barang">
              </div>
              <div class="grid-item">
                <label for="" id="jmlh-brng">Jumlah Barang</label>
                <input type="text" name="jumlah-barang" style="width: 50%;" required placeholder="Silahkan Masukan Jumlah Barang">
              </div>
              <div class="grid-item">
                <label for="" id="hrg-satuan">Harga Satuan</label>
                <input type="text" name="harga-satuan" style="width: 50%; background-color: #d8d8d9 " readonly onkeyup="ketikRupiah()" id="harga_barang">
              </div>
            </div>
            <div class="untuk-tambah">
              <button type="submit" class="btn btn-primary" name="btn-tambah" onclick="myFunction()">Tambahkan Barang</button>
              <script type="text/javascript">
                <?php echo $jsArray; ?>
                <?php echo $jsArray1; ?>

                function changeValue(kode_barang) {
                  document.getElementById("nama_barang").value = nama_barang[kode_barang].nama_barang;
                  document.getElementById("harga_barang").value = harga_barang[kode_barang].harga_barang;
                };
              </script>
            </div>
          </div>
        </div>
        </form>
      </div>


      <?php
      $idb;
      $idt;
      $jumlahb;
      $hargab;
      $namab;
      $idk;
      if (isset($_POST['btn-tambah'])) {

        $idt = $idjual;
        $idk = $_POST['kasirId'];
        $idb = $_POST['kode-barang'];
        $jumlahb = $_POST['jumlah-barang'];
        $namab = $_POST['nama-barang'];
        $hargab = $_POST['harga-satuan'];
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d', time());
        $cekRedudansi = "SELECT * FROM simpantransaksi WHERE kode_barang='$idb'";
        $query = mysqli_query($conn, $cekRedudansi) or die(mysqli_error($con));

        if (mysqli_num_rows($query) > 0) {
          $sql = "UPDATE `simpantransaksi` SET `jumlahBarang`= ((SELECT jumlahBarang FROM simpantransaksi WHERE kode_barang='$idb')+$jumlahb) WHERE `kode_barang`='$idb'";
        } else {
          $sql = "INSERT INTO simpantransaksi (id_jual, kode_barang, kode_karyawan, namaBarang, jumlahBarang, hargaJualbarang, tgl_jual)
          VALUES('$idt','$idb','$idk', '$namab', '$jumlahb',$hargab,'$tgl')";
        }
        $query = mysqli_query($conn, $sql) or die(mysqli_error($con));
      }
      ?>

      <br>
      <!-- tabel -->
      <h1 class="card-title">TABEL TRANSAKSI</h1>
      <div class="card" style="margin-left: 5%; margin-right: 4%;">
        <div class="card-body">
          <div class="tabelScroll Bar">
            <table class="table table-hover table-bordered" id="myTable">
              <thead align="center">
                <tr>
                  <th scope="col" width="5%">No</th>
                  <th scope="col" width="1%" colspan="2">Aksi</th>
                  <th scope="col" width="10%">Kode Barang</th>
                  <th scope="col" width="25%">Nama Barang</th>
                  <th scope="col" width="15%">Harga Barang (/satuan)</th>
                  <th scope="col" width="10%">Jumlah Barang</th>
                  <th scope="col" width="15%">Harga</th>
                  <div class="col-5 pr-0">
                  </div>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT id_jual, kode_barang,namaBarang, jumlahBarang, hargaJualbarang FROM simpantransaksi";
                $result = mysqli_query($conn, $sql);
                $nomor = 1;
                $total;
                $totalBayar = 0;
                $kembalian = 0;
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $kodeb = $row['kode_barang'];
                    $namabrg = $row['namaBarang'];
                    $hargabrg = $row['hargaJualbarang'];
                    $jmlhbrng = $row['jumlahBarang'];
                    $total = $jmlhbrng * $hargabrg;
                    $totalBayar = $totalBayar + $total;
                    echo "
                    <tr>
                        <th scope='row'>" . $nomor . "</th>
                        <td>"; ?>

                    <form method="GET" style="margin-left: 15px;">
                      <?php $kodeb = $row['kode_barang']; ?>
                      <button class="tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus" name="btn-hapus" value="<?php echo $kodeb ?>"><i class="fa fa-trash"></i></button>
                    </form>
                    <td>
                      <form action="" method="GET" name="edit" id="edit" onsubmit="ambilData()">
                        <input type="hidden" name="penampung" id="penampung" value="">
                        <button class="tombol-edit" name="btn-edit" data-toggle="tooltip" title="Edit" value="<?php echo $kodeb ?>"><i class="fa fa-edit"></i></button>
                      </form>
                    </td>
                <?php
                    echo "</td><td>" . $kodeb . "</td>
                        <td>" . $namabrg . "</td>
                        <td>" . rupiah($hargabrg) . "</td>
                        <td>" . $jmlhbrng . "</td>
                        <td>" . rupiah($total) . "</td>
                      </tr>
                    </tr>
                    ";
                    $nomor++;
                  }
                }
                ?>
                <td colspan="7" align="right">Total Harga: Rp</td>
                <td><?= rupiah($totalBayar) ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--Akhir tabel-->
          <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#myModal">Bayar</button>

        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright Kelompok 2 | Rekayasa Perangkat Lunak
      </div>
    </div>
  </footer>

  <!-- Pop Up Pesan -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">KONFIRMASI PEMBAYARAN</h3>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" data-dismiss="modal">&times;</span>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="id-transaksi">
            <label for="" id="id-trans"><b>Id Transaksi</b></label>
            <input type="text" name="trans-id" id="trans-id" value="<?php echo $idjual ?>" disabled>
            <label for="" id="trans-wkt"><b>Waktu Transaksi</b></label>
            <input type="text" name="trans-waktu" id="waktu-trans" value="<?php
                                                                          date_default_timezone_set('Asia/Jakarta');
                                                                          echo date('m/d/Y h:i', time()); ?>" disabled>
          </div>
          <form action="" method="POST">
            <div class="view-transaksi">
              <label for="" id="total-harga">Total Harga</label>
              <input type="text" name="harga-total" id="harga-total" readonly value="Rp <?= $totalBayar ?>" style="background-color: #d8d8d9">
            </div>
            <div class="proses-transaksi">
              <label for="">Jumlah Uang</label>
              <input type="text" name="jmlh-uang" id="uangMasuk" onkeyup="ketikRupiah()" required>
            </div>
            <div>
              <button type="submit" class="btn-pop-up-konfir btn-primary" name="konfir-bayar">Konfirmasi</button>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn-pop-up-batal btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <?php mysqli_close($conn); ?>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets\js\transaksi-js.js?v=<?php echo time(); ?>"></script>
</body>

</html>