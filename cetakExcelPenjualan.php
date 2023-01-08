<?php
session_start();
$hasil = $_SESSION['hasil'];
$total = $_SESSION['Total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <h1 style="font-family: cursive;
               font: size 25px;">Laporan Penjualan</h1>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan-Penjualan.xls");
    ?>
    <table>
        <tr>
            <th align="center">Id Jual</th>
            <th align="center">Tanggal Jual</th>
            <th align="center">Kode Barang</th>
            <th align="center">Nama Barang</th>
            <th align="center">Sisa Stok Barang</th>
            <th align="center">Total Jual (pcs)</th>

        </tr>
        <?php
        foreach ($hasil as $hs) : ?>
            <tr>
                <td align="center"><?= $hs['ID_Jual'] ?></td>
                <td align="center"><?= $hs['Tanggal_Jual'] ?></td>
                <td align="center"><?= $hs['Kode_Barang'] ?></td>
                <td align="center"><?= $hs['Nama_Barang'] ?></td>
                <td align="center"><?= $hs['Stock_Barang'] ?></td>
                <td align="center"><?= $hs['Jumlah_Barang'] ?></td>
            </tr>
        <?php
        endforeach; ?>
        <tr id=totalPendapatan>
            <td colspan='5' align='center'><b>TOTAL BARANG TERJUAL<b></td>
            <td align='center'><b><?= $total ?><b></td>
        </tr>
    </table>
</body>

</html>