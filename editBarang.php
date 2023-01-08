<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Edit Data Barang - MATA DEWA</title>
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="assets\css\rud.css?v=<?php echo time(); ?>">
    <script src="assets\js\scriptEditBarang.js?v=<?php echo time(); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js?v=<?php echo time(); ?>"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js?v=<?php echo time(); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js?v=<?php echo time(); ?>"></script>
    <script src="sweetalert2.min.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="sweetalert2.min.css?v=<?php echo time(); ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
</head>

<body id="background-edit">
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, '', '.');
        return $hasil_rupiah;
    }

    function hilangkanRupiah($rp)
    {
        $hasil = preg_replace('/[Rp. ]/', '', $rp);
        return $hasil;
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_mata_dewa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (isset($_COOKIE['var1'])) {
        $kodeBarang = $_COOKIE['var1'];
        $sql = "SELECT * FROM barang  WHERE Kode_Barang='" . $kodeBarang . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
    ?>
                
                    <form action="" method="POST" id="form-edit">
                        <img src="logoResol.png" alt="" class="gambar">
                        <h3>FORM EDIT DATA BARANG</h3>
                        <div id="isi-form">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" readonly id="kode" required value="<?php echo $row['Kode_Barang'] ?>"><br><br>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" required value="<?php echo $row['Nama_Barang'] ?>"><br><br>
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" onkeyup="ketikRupiah() " required value="<?php echo rupiah($row['Harga_Barang']) ?>"><br><br>
                            <label for="stok">Stok</label>
                            <input type="text" name="stok" id="stok" required value="<?php echo $row['Stock_Barang'] ?>"><br><br>
                            <button name="simpan" type="submit" id="edit" class="btn-simpan">Simpan</button>
                        </div>
                    </form>
                
            <?php
            }
        }
        if (isset($_POST['simpan'])) {
            $sql = "UPDATE barang SET Nama_Barang='" . $_POST['nama'] . "',
        Harga_Barang='" . hilangkanRupiah($_POST['harga']) . "',Stock_Barang='" . $_POST['stok'] . "' WHERE Kode_Barang='" . $_POST['kode'] . "'";
            echo hilangkanRupiah($_POST['harga']);
            if ($conn->query($sql)) {
                setcookie("var1", "", time() - 1);
            ?>
                <script language="JavaScript">
                    swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil diedit!",
                        type: "success"
                    }).then(function() {
                        location.replace("lihatBarangLogin2.php")
                    });
                </script>
            <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            ?>
    <?php
        }
    } else {
        header('Location:lihatBarangLogin2.php');
    }
    ?>
</body>

</html>