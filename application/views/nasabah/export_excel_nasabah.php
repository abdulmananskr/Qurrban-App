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
</body>

</html>