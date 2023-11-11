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
            <center> BUKTI PESANAN HEWAN QURBAN</center>
        </u>
    </h2>

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
                <p style=" text-align: right;">Kode Pesanan : <?= $id_pesanan; ?></p>
                <p style="text-align: right;">Tanggal : <?= $tgl_pesan; ?></p>
            </td>
        </tr>
    </table>
    <hr>
    <hr>
    <table class="table-data" style="padding-bottom: 0;">
        <tr>
            <th scope="col" width="20%">Nama</th>
            <td class="text-capitalize" width="40%">: <?= $user['nama']; ?></td>
            <th scope="col" width="20%">Jenis Hewan</th>
            <td class="text-capitalize" width="20%">: <?= $jenis; ?></td>
        <tr>
            <th scope=" col">No Telepon</th>
            <td>: <?= $user['no_telepon']; ?></td>
            <th scope="col">Berat</th>
            <td>: <?= $berat, ' Kg'; ?></td>
        </tr>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td class="text-capitalize">: <?= $user['alamat']; ?></td>
            <th scope="col">Umur</th>
            <td>: <?= $umur, ' Tahun'; ?></td>

        </tr>
        <tr>
            <th scope="col">Email</th>
            <td class="text-capitalize">: <?= $user['email']; ?></td>
            <th scope="col">Alamat Pengiriman</th>
            <td>: <?= $alamat_pengiriman; ?></td>
        </tr>

    </table>
    <hr>
    <table class="table-data">
        <tr>
            <th scope="col" width="50%"></th>
            <td></td>
            <th scope="col" width="20%">Harga</th>
            <td width="20%">: <?= "Rp. " . number_format($harga); ?></td>
        </tr>
        <tr>
            <th scope="col" width="50%"></th>
            <td></td>
            <th scope="col" width="20%">Jumlah Beli</th>
            <td width="20%">: <?= $jumlah, ' ekor'; ?></td>
        </tr>
        <tr>
            <th scope="col"></th>
            <td></td>
            <th scope="col">Total Harga</th>
            <td>: <?= "Rp. " . number_format($total_harga); ?></td>
        </tr>
    </table>
    <br>
    <p style=" text-align: right;">Tegal, <?= $tgl_pesan; ?> <br>
        CV.QURBANKU
    </p>
    <br>

    <p style="text-align: right;">
        Admin
    </p>
</body>

</html>