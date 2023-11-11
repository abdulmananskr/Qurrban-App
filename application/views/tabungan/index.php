<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabungan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Image</th>
                            <th>Nama</th>
                            <th>saldo</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php           
                            $i = 1;           
                            foreach ($tabungan as $a) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml"> <img
                                        src="<?= base_url('assets/img/profile/') . $a['image'];?>" class="img-thumbnail"
                                        width="100px" alt="...">
                                </picture>
                            </td>
                            <td class="text-capitalize"><?= $a['nama']; ?></td>
                            <td><?= "Rp. ". number_format($a['saldo']); ?></td>
                            <!-- <td>
                                <a href="<?= base_url('user/').$a['id'];?>" class="badge badge-info"><i
                                        class="fas fa-edit"></i></a>
                                <a href="<?= base_url('user/').$a['id'];?>"
                                    onclick="return confirm('Kamu yakin akan menghapus  ?');"
                                    class="badge badge-danger"><i class="fas fa-trash"></i></a>
                            </td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>