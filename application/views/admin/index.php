<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Saldo</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= "Rp. " . number_format($sum); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nasabah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tabungan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $tabungan; ?>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Hewan Qurban</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $sumhewan; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hippo fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->Mtransaksi->gettransaksi()->num_rows(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nasabah</h6>
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
                            <td><?= $t['kredit_debet']; ?></td>
                            <td><?= "Rp. " . number_format($t['nominal']); ?></td>
                            <td><?= "Rp. " . number_format($t['saldo']); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->