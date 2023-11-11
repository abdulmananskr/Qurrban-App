<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($hewan_qurban as $h) { ?>
            <form action="<?= base_url('hewan/editHewan'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_hewan" name="id_hewan"
                            value="<?= $h['id_hewan']; ?>" hidden>
                        <?= form_error('id_hewan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-3 col-formlabel">Jenis Hewan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $h['jenis']; ?>">
                        <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-3 col-formlabel">Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori"
                            value="<?= $h['id_kategori']; ?>">
                        <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-formlabel">harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga"
                            placeholder="Masukkan nama harga" value="<?= $h['harga']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-formlabel">stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok"
                            placeholder="Masukkan nama stok" value="<?= $h['stok']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-formlabel">Image</label>
                    <div class="col-sm-9">
                        <picture>
                            <img src="<?= base_url('assets/img/hewan/') . $h['image']; ?>"
                                class="rounded mx-auto mb-3 d-blok img-thumbnail" alt="">
                        </picture>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Pilih file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3"
                            value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3"
                            value="Update">
                    </div>
                </div>
        </div>
        </form>
        <?php } ?>
    </div>
</div>
</div>