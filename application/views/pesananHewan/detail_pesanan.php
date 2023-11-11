<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <?php if (validation_errors()) { ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-4">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark" style="text-align: center;">
                        <tr>
                            <th>NO</th>
                            <th width="5%">Id Pesanan</th>
                            <th width="5%">Nama</th>
                            <th width="5%">Jenis Hewan</th>
                            <th>Harga</th>
                            <th>Berat </th>
                            <th>Umur </th>
                            <th>Alamat Pengiriman</th>
                            <th width="10%">Tanggal Pemesanan</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pemesanan_hewan as $p) { ?>
                        <tr>
                            <td style="text-align: center;"><?= $i++; ?></td>
                            <td><?= $p['id_pesanan']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['jenis']; ?></td>
                            <td><?= "Rp. " . number_format($p['harga']); ?></td>
                            <td><?= $p['berat'], ' Kg'; ?></td>
                            <td><?= $p['umur'], ' Thn'; ?></td>
                            <td><?= $p['alamat_pengiriman']; ?></td>
                            <td><?= $p['tgl_pesan']; ?></td>
                            <td><?= $p['jumlah'], ' ekor'; ?></td>
                            <td><?= "Rp. " . number_format($p['total_harga']); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <center>
                    <p> <a class="btn btn-outline-secondary fas fw fareply" onclick="window.history.go(-1)">
                            Kembali</a> </p>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- end conten fluid -->
</div>
<!-- End of Main Content -->