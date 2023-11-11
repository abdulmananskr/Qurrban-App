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
                <th>NO</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Role Id</th>
                <th>Is Active</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($user as $a) { ?>
            <tr>
                <td style="text-align: center;"><?= $i++; ?></td>
                <td class="text-capitalize"><?= $a['nama']; ?></td>
                <td><?= $a['no_telepon']; ?></td>
                <td class="text-capitalize"><?= $a['alamat']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= $a['role_id']; ?></td>
                <td><?= $a['is_active']; ?></td>
                <td><?= date('d-M-Y', $a['tanggal_input']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </table>
</body>

</html>