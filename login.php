<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Mata Dewa</title>
    <link href="assets\foto\logo.png" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/laman.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3 style="font-family: Archivo; font-size: 45px; letter-spacing: 5px; font-weight: 900;">MASUK</h3>
                    <?php
                    //validasi karyawan
                    if (isset($_POST['login-btn'])) {
                        $usnm = $_POST['username'];
                        $pswrd = $_POST['password'];
                        if ($pswrd == "admin" && $usnm == "admin") {
                            echo '<script>
                                swal("Anda Berhasil Login sebagai Pemilik.")
                                .then((value) => {
                                    window.location="LaporanPenjualan.php";
                                });</script>';
                        } else{
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "toko_mata_dewa";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT * FROM karyawans WHERE Nama_Karyawan LIKE '$usnm' AND Kode_Karyawan = '$pswrd'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $_SESSION['nama-karyawan'] = $usnm;
                            $_SESSION['password-karyawan'] = $pswrd;
                            $idPassword =  substr($pswrd, 0, 5);

                            if ($idPassword[0] == "K") {
                                echo '<script>
                                swal("Anda Berhasil Login sebagai Karyawan.")
                                .then((value) => {
                                    window.location="newTransaksi.php";
                                });</script>';
                            }
                        } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <label><strong>Gagal Masuk!!!</strong></label>
                                <label>Silahkan cek Username Dan Password</label>
                            </div>
                    <?php }
                    }
                }
                    ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <label>
                            <h5>Nama Pengguna</h5>
                        </label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <ion-icon name="person" size="large"></ion-icon>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Pengguna" name="username" required>
                        </div>
                        <label>
                            <h5>Kata Sandi</h5>
                        </label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <ion-icon name="lock" size="large"></ion-icon>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Masuk" class="btn float-right login_btn" name="login-btn" >
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="lupaPassword.php" class="lupa-password">Lupa Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>