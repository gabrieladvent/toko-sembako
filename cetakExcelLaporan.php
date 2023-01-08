<?php
session_start();
$hasil = $_SESSION['hasil'];
$total = $_SESSION['Total'];
$subTotal = $_SESSION['subTotal'];
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
               font: size 25px;">Laporan Keuangan</h1>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan-Keuangan.xls");
    ?>
    <table>
        <tr>
            <th align="center">Id Jual</th>
            <th align="center">Tanggal Jual</th>
            <th align="center">Kode Barang</th>
            <th align="center">Harga Jual</th>
            <th align="center">Jumlah Pembelian</th>
            <th align="center">Sub Total</th>

        </tr>
        <?php
        $index = 0;
       foreach ($hasil as $hs) : ?>
            <tr>
                <td align="center"><?= $hs['ID_Jual'] ?></td>
                <td align="center"><?= $hs['Tanggal_Jual'] ?></td>
                <td align="center"><?= $hs['Kode_Barang'] ?></td>
                <td align="center"><?= $hs['Harga_Jual_Barang'] ?></td>
                <td align="center"><?= $hs['Jumlah_Barang'] ?></td>
                <td align="center"><?= $subTotal[$index] ?></td>
                <?php $index++; ?>
            </tr>
            <?php
        endforeach;
       ?>
        <tr id=totalPendapatan>
            <td colspan='5' align='center'><b>TOTAL PENDAPATAN<b></td>
            <td align='center'><b><?= $total ?><b></td>
        </tr>
    </table>
</body>

</html>