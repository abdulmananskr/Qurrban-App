<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px 10px 10px 10px;
    }

    h3 {
        font-family: Verdana;
    }
    </style>

    <h3>
        <center>Laporan Data Transaksi</center>
    </h3> <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Transaksi</th>
                <th scope="col">Tangal</th>
                <th scope="col">Kredit Debit</th>
                <th scope="col">Nominal</th>
                <th scope="col">Saldo</th>
            </tr>
        </thead>
        <tbody>

            <?php $a = 1;
            foreach ($transaksi as $t) { ?> <tr>
                <th scope="row"><?= $a++; ?></th>
                <td class="text-capitalize"><?= $t['nama']; ?></td>
                <td><?= $t['nama_transaksi']; ?></td>
                <td><?= $t['tanggal']; ?></td>
                <td class="text-capitalize"><?= $t['kredit_debet']; ?></td>
                <td><?= "Rp. " . number_format($t['nominal']); ?></td>
                <td><?= "Rp. " . number_format($t['saldo']); ?></td>
            </tr> <?php } ?> </tbody>
    </table>
    </table>
</body>

</html>