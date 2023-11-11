<?php
header("Content-type: application/vnd-ms-exel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
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
            <td><?= $t['tanggal'], ' '; ?></td>
            <td class="text-capitalize"><?= $t['kredit_debet']; ?></td>
            <td><?= "Rp. " . number_format($t['nominal']); ?></td>
            <td><?= "Rp. " . number_format($t['saldo']); ?></td>
        </tr> <?php } ?>
    </tbody>
</table>
</body>

</html>