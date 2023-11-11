<div class="container-fluid">
    <div class="row">
        <?php if (validation_errors()) { ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="row gutters">
        <div class="col-sm-6 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                Saldo</div>
                            <div class="h3 mb-3 font-weight-bold text-gray-800">
                                <?= "Rp. " . number_format($tabungan['saldo']); ?>
                            </div>

                            <button href="" class="btn btn-primary mb-1" data-toggle="modal" data-target="#topupModal"
                                type="button">
                                <i class="fas fa-plus">Top Up</i>
                            </button>
                            <button href="" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#tariktunaiModal" type=" button">
                                <i class="fas fa-solid fa-money-bill-wave"> Tarik Tunai</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="card-group col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><span style="color: green;">
                            <i class="fas fa-solid fa-arrow-up"></i>
                        </span>
                    </h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <span style="color: red;">
                            <i class="fas fa-solid fa-arrow-down"></i>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <?php
        foreach ($hewan_qurban as $h) { ?>
        <div class="col-md-2 col-md-3 mb-2">
            <div class="card shadow">
                <img class="card-img-top img-fluid" width="100px"
                    src="<?= base_url('assets/img/hewan/') . $h['image']; ?>" alt="Card image cap">
                <div class="card-body bg-gray-200">
                    <h6 class="card-title font-weight-bold text-primary text-uppercase"><?= $h['jenis']; ?></h6>
                    <p class="card-text font-weight-bold text-gray"><?= "Rp. " . number_format($h['harga']); ?>
                    </p>
                    <a href="<?php echo base_url('pesanhewan/pesanHewan/' . $h['id_hewan']); ?>"
                        class="btn btn-primary "> <i class="fas fw fa-shopping-cart"></i> Pesan</a>
                    <a href="<?= base_url('home/detailHewan/' . $h['id_hewan']); ?> " class="btn btn-warning"><i
                            class="fas fa-search"></i>
                        Detail</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Modal Top up-->
<div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel" ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topupModalLabel" data-toggle="modal" data-target="#topupModal">
                    Top Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/topup'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nominal" name="nominal"
                            placeholder="Masukkan Nominal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                        Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Top up -->

<!-- Modal Tarik Tunai-->
<div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog" aria-labelledby="tariktunaiModalLabel"
    ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tariktunaiModalLabel" data-toggle="modal" data-target="#tariktunaiModal">
                    Tarik Tunai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/tariktunai'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nominal" name="nominal"
                            placeholder="Masukkan Nominal ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                        Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tarik tunai -->