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
        <div class="card-header py-3">
            <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#hewanBaruModal"><i
                    class="fas fa-plus"></i> Tambah Hewan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Image</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Umur</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($hewan_qurban as $h) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml"> <img
                                        src="<?= base_url('assets/img/hewan/') . $h['image']; ?>" class="img-thumbnail"
                                        width="100px" alt="...">
                                </picture>
                            </td>
                            <td class="text-capitalize"><?= $h['jenis']; ?></td>
                            <td><?= $h['id_kategori']; ?></td>
                            <td><?= "Rp. " . number_format($h['harga']); ?></td>
                            <td><?= $h['berat'], ' Kg'; ?></td>
                            <td><?= $h['umur'], ' Tahun'; ?></td>
                            <td><?= $h['stok'], ' Ekor'; ?></td>
                            <td>
                                <a href="<?= base_url('hewan/editHewan/') . $h['id_hewan']; ?>"
                                    class="badge badge-info"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('hewan/hapushewan/') . $h['id_hewan']; ?>"
                                    onclick="return confirm('Kamu yakin akan menghapus <?= $title . ' ' . $h['jenis'] . ' harga ' . 'Rp. ', number_format($h['harga']); ?> ?');"
                                    class="badge badge-danger"><i class="fas fa-trash"></i></a>
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

<!-- Modal Tambah Hewan Qurban baru-->
<div class="modal fade" id="hewanBaruModal" tabindex="-1" role="dialog" aria-labelledby="hewanBaruModalLabel"
    ariahidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hewanBaruModalLabel" data-toggle="modal" data-target="#hewanBaruModal">
                    Tambah Hewan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('hewan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jenis" name="jenis"
                            placeholder="Masukkan jenis Hewan">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori_hewan as $k) { ?>
                            <option value="<?= $k['id']; ?>">
                                <?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga"
                            placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok"
                            placeholder="Masukkan Stok">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image"
                            placeholder="pilih gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->