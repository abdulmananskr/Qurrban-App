<div class="container-fluid">
    <div class="row">
        <?php if (validation_errors()) { ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-6">
            <?= $this->session->flashdata('pesan');?>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                        class="img-thumbnail rounded-circle">
                </div>

            </div>
        </div>
        <div class=" col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Profile</div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-formlabel">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-capitalize" id="nama" name="nama"
                                        value="<?= $user['nama']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telepon" class="col-sm-3 col-formlabel">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                        value="<?= $user['no_telepon']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-formlabel">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-capitalize" id="alamat" name="alamat"
                                        value="<?= $user['alamat']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_terbit" class="col-sm-3 col-formlabel">Nama</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <a href="<?= base_url('user/ubahprofil'); ?>"
                                        class="btn btn-primary col-lg-5 mt-3"><i class="fas fa-user-edit"></i>
                                        Ubah Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content wrapper end -->
</div>