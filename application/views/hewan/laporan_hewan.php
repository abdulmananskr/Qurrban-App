 <!-- Begin Page Content -->
 <div class="container-fluid">

     <?= $this->session->flashdata('pesan'); ?> <div class="row">
         <div class="col-lg-12"> <?php if (validation_errors()) { ?>
             <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div> <?php } ?>
             <?= $this->session->flashdata('pesan'); ?>
             <a href="<?= base_url('laporan/cetak_laporan_hewan'); ?>" class="btn btn-primary mb-3"><i
                     class="fas fa-print"></i> Print</a>
             <a href="<?= base_url('laporan/laporan_hewan_pdf'); ?>" class="btn btn-warning mb-3"><i
                     class="far fa-file-pdf"></i> Download Pdf</a>
             <a href="<?= base_url('laporan/export_excel_hewan'); ?>" class="btn btn-success mb-3"><i
                     class="far fa-file-excel"></i> Export ke Excel</a>
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">Jenis</th>
                         <th scope="col">Kategori</th>
                         <th scope="col">Harga</th>
                         <th scope="col">Berat</th>
                         <th scope="col">Umur</th>
                         <th scope="col">Stok</th>
                     </tr>
                 </thead>
                 <tbody>

                     <?php $a = 1;
                        foreach ($hewan_qurban as $h) { ?> <tr>
                         <th scope="row"><?= $a++; ?></th>
                         <td class="text-capitalize"><?= $h['jenis']; ?></td>
                         <td><?= $h['id_kategori']; ?></td>
                         <td><?= "Rp. " . number_format($h['harga']); ?></td>
                         <td><?= $h['berat'], ' Kg'; ?></td>
                         <td><?= $h['umur'], ' Tahun'; ?></td>
                         <td><?= $h['stok']; ?></td>
                     </tr> <?php } ?> </tbody>
             </table>
         </div>
     </div>
 </div> <!-- /.container-fluid -->
 </div>