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
        padding: 10px 10px 10px 10px;
    }
    </style>
    <h3>
        <center>Laporan Data Hewan Qurban</center>
    </h3> <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat</th>
                <th scope="col">Umur</th>
                <th scope="col">Stok</th>
            </tr>
        </thead>
        <tbody>

            <?php $a = 1;
            foreach ($hewan_qurban as $h) { ?> <tr>
                <th scope="row"><?= $a++; ?></th>
                <td class="text-capitalize"><?= $h['jenis']; ?></td>
                <td><?= $h['id_kategori']; ?></td>
                <td><?= "Rp. " . number_format($h['harga']); ?></td>
                <td><?= $h['berat'], ' Kg'; ?></td>
                <td><?= $h['umur'], ' Tahun'; ?></td>
                <td><?= $h['stok']; ?></td>
            </tr> <?php } ?> </tbody>
    </table>
</body>

</html>