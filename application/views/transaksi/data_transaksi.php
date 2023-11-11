<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Nama Transaksi</th>
                            <th>Tanggal</th>
                            <th>Kredit Debet</th>
                            <th>Nominal</th>
                            <th>Saldo</th>
                            <?php if ($user['role_id'] == 2) : ?>
                            <th>Aksi</th>
                            <?php else : ?>

                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($transaksi as $t) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td class="text-capitalize"><?= $t['nama']; ?></td>
                            <td><?= $t['nama_transaksi']; ?></td>
                            <td><?= $t['tanggal']; ?></td>
                            <td class="text-capitalize"><?= $t['kredit_debet']; ?></td>
                            <td><?= "Rp. " . number_format($t['nominal']); ?></td>
                            <td><?= "Rp. " . number_format($t['saldo']); ?></td>
                            <?php if ($user['role_id'] == 2) : ?>
                            <td>
                                <a href="<?= base_url('transaksi/cetak_bukti_transaksi/') . ($t['id_transaksi']); ?>"
                                    class="badge badge-info">
                                    <i class=" fas fa-file">
                                        Cetak Bukti</i></a>
                            </td>
                            <?php else : ?>
                            <?php endif; ?>
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