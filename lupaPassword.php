<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lupa Password - MATA DEWA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/foto/logo.png" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="assets\css\lupaPassword.css?v=<?php echo time();?>">
</head>
<body>
                <center>
                    <img src="assets\foto\logo.png" alt="">
                    <h1>LUPA PASSWORD</h1>
                    <h2>JIKA ANDA LUPA PASSWORD</h2>
                    <h2>SILAHKAN MENGHUBUNGI ADMIN</h2>
                    <h3>TERIMA KASIH</h3>
                    <form action="" method="GET">
                        <input class="btn" type="submit" value="Kembali" name="kembali">
                    </form>
                </center>

                <?php
                    if (isset($_GET['kembali'])) {
                        echo '<script>window.location="login.php"</script>';
                    }
                ?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>