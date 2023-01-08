<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Edit Data Karyawan - MATA DEWA</title>
    <link href="assets\foto\logo.png" rel="icon">
    <link rel="stylesheet" href="assets\css\rud.css?v=<?php echo time(); ?>">
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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_mata_dewa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (isset($_COOKIE['var2'])) {
        $kodeKaryawan = $_COOKIE['var2'];
        $sql = "SELECT * FROM karyawans  WHERE Kode_Karyawan='" . $kodeKaryawan . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
    ?>
                <form action="" method="POST"id="form-edit">
                    <img src="logoResol.png" alt="" class="gambar">
                    <h3>FORM EDIT DATA KARYAWAN</h3>
                    <div id="isi-form">
                        <label for="kode" id="labelkode">Kode</label>
                        <input type="text" name="kode" readonly id="kode" required value="<?php echo $row['Kode_Karyawan'] ?>"><br><br>
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" required value="<?php echo $row['Nama_Karyawan'] ?>"><br><br>
                        <label for="no_telp">Harga</label>
                        <input type="text" name="no_telp" id="no_telp" required value="<?php echo $row['No_Telp_Karyawan'] ?>"><br><br>
                        <button name="simpan" type="submit" id="edit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            <?php
            }
        }
        if (isset($_POST['simpan'])) {
            $sql = "UPDATE karyawans SET Nama_Karyawan='" . $_POST['nama'] . "',
            No_Telp_Karyawan='" . $_POST['no_telp'] . "' WHERE Kode_Karyawan='" . $_POST['kode'] . "'";
            if ($conn->query($sql)) {
                setcookie("var2", "", time()-1);
            ?>
                <script>
                    swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil diedit!",
                        type: "success"
                    }).then(function() {
                        location.replace("lihatKaryawanLogin2.php")
                    });
                </script>
            <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            ?>
    <?php
        } else {
        }
    } else {
        header('Location:lihatKaryawanLogin2.php');
    }
    ?>
</body>

</html>