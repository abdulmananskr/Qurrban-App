<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
</head>

<body>
    <style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px 10px 10px 10px;
        text-align: justify;
    }

    h3 {
        font-family: Verdana;
    }
    </style>
    <h2>
        <u>
            <center> BUKTI PEMBELIAN HEWAN QURBAN </center>
        </u>
    </h2>
    <?php
    $a = 1;
    foreach ($transaksi as $t) { ?>
    <table width="100%">
        <tr>
            <td>
                </h2>
                <h3> CV.QURBANKU</h3>
                <p>Jl. Sipelem No.22, Kraton,
                    <br /> Kec. Tegal Bar., Kota Tegal, <br />Jawa Tengah 52112
                </p>

            </td>
            <td>
                <p style="text-align: right;">Kode Transaksi : <?= $t['id_transaksi']; ?></p>
                <p style="text-align: right;">Tanggal : <?= $t['tanggal']; ?></p>
            </td>
        </tr>
    </table>
    <hr>
    <hr>
    <table class="table-data">
        <tr>
            <th scope="col" width="20%">Nama</th>
            <td class="text-capitalize" width="40%">: <?= $user['nama']; ?></td>
            <th scope="col" width="20%">Nama Transaksi</th>
            <td class="text-capitalize" width="20%">: <?= $t['nama_transaksi']; ?></td>
        <tr>
            <th scope=" col">No Telepon</th>
            <td>: <?= $user['no_telepon']; ?></td>
            <th scope="col">Kredit Debit</th>
            <td>: <?= $t['kredit_debet']; ?></td>
        </tr>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td class="text-capitalize">: <?= $user['alamat']; ?></td>
            <th scope="col">Nominal</th>
            <td>: <?= "Rp. " . number_format($t['nominal']); ?></td>
        </tr>
        <tr>

            <th scope="col">Email</th>
            <td class="text-capitalize">: <?= $user['email']; ?></td>
            <th scope="col">Saldo</th>
            <td>: <?= "Rp. " . number_format($t['saldo']); ?></td>
        </tr>
        <?php } ?>
    </table>
    <hr>
    <p style="text-align: right;">Tegal, <?= $t['tanggal']; ?> <br>
        CV.QURBANKU
    </p>
    <br>
    <br>
    <br>
    <p style="text-align: right;">
        Admin
    </p>
</body>

</html>