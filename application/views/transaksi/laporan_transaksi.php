 <!-- Begin Page Content -->
 <div class="container-fluid">

     <?= $this->session->flashdata('pesan'); ?> <div class="row">
         <div class="col-lg-12"> <?php if (validation_errors()) { ?>
             <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div> <?php } ?>
             <?= $this->session->flashdata('pesan'); ?> <a href="<?= base_url('laporan/cetak_laporan_transaksi'); ?>"
                 class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a> <a
                 href="<?= base_url('laporan/laporan_transaksi_pdf'); ?>" class="btn btn-warning mb-3"><i
                     class="far fa-file-pdf"></i> Download Pdf</a> <a
                 href="<?= base_url('laporan/transaksi_export_excel'); ?>" class="btn btn-success mb-3"><i
                     class="far fa-file-excel"></i> Export ke Excel</a>
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">Nama</th>
                         <th scope="col">Nama Transaksi</th>
                         <th scope="col">Tangal</th>
                         <th scope="col">Kredit Debit</th>
                         <th scope="col">Nominal</th>
                         <th scope="col">Saldo</th>
                     </tr>
                 </thead>
                 <tbody>

                     <?php $a = 1;
                        foreach ($transaksi as $t) { ?> <tr>
                         <th scope="row"><?= $a++; ?></th>
                         <td class="text-capitalize"><?= $t['nama']; ?></td>
                         <td><?= $t['nama_transaksi']; ?></td>
                         <td><?= $t['tanggal'], ' '; ?></td>
                         <td class="text-capitalize"><?= $t['kredit_debet']; ?></td>
                         <td><?= "Rp. " . number_format($t['nominal']); ?></td>
                         <td><?= "Rp. " . number_format($t['saldo']); ?></td>
                     </tr> <?php } ?> </tbody>
             </table>
         </div>
     </div>
 </div> <!-- /.container-fluid -->
 </div>