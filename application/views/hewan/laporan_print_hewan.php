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
        <center>Laporan Data Hewan Qurban </center>
    </h3> <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Umur</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($hewan_qurban as $h) { ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td class="text-capitalize"><?= $h['jenis']; ?></td>
                <td><?= $h['id_kategori']; ?></td>
                <td><?= "Rp. " . number_format($h['harga']); ?></td>
                <td><?= $h['berat'], ' Kg'; ?></td>
                <td><?= $h['umur'], ' Tahun'; ?></td>
                <td><?= $h['stok']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
    </script>

</body>

</html>