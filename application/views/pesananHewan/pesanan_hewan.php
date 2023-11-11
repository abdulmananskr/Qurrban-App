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
                            <th width="5%">Id User</th>
                            <th width="5%">Id Hewan</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Alamat Pengiriman</th>
                            <th width="10%">Tanggal Pemesanan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pemesanan_hewan as $p) { ?>
                        <tr>
                            <td style="text-align: center;"><?= $i++; ?></td>
                            <td><?= $p['id_pesanan']; ?></td>
                            <td><?= $p['id_user']; ?></td>
                            <td><?= $p['id_hewan']; ?></td>
                            <td><?= "Rp. " . number_format($p['harga']); ?></td>
                            <td><?= $p['jumlah'], ' ekor'; ?></td>
                            <td><?= $p['alamat_pengiriman']; ?></td>
                            <td><?= $p['tgl_pesan']; ?></td>
                            <td><?= "Rp. " . number_format($p['total_harga']); ?></td>
                            <td>
                                <?php if ($user['role_id'] == 2) : ?>
                                <a href="<?= base_url('Pesanhewan/cetakBuktiPesanan/') . $p['id_pesanan'] ?>"
                                    class="badge badge-info"><i class="fas fa-file"> Cetak bukti</i></a>
                                <a href="<?= base_url('pesanhewan/detailPesanan/') . $p['id_pesanan'] ?>"
                                    class="badge badge-warning"><i class="fas fa-search">Detail Pesanan</i></a>
                                <?php else : ?>
                                <a href="<?= base_url('pesanhewan/detailPesanan/') . $p['id_pesanan'] ?>"
                                    class="badge badge-warning"><i class="fas fa-search">Detail Pesanan</i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end conten fluid -->
</div>
<!-- End of Main Content -->