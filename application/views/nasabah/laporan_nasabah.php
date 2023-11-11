 <!-- Begin Page Content -->
 <div class="container-fluid">

     <?= $this->session->flashdata('pesan'); ?> <div class="row">
         <div class="col-lg-12"> <?php if (validation_errors()) { ?>
             <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div> <?php } ?>
             <?= $this->session->flashdata('pesan'); ?> <a href="<?= base_url('laporan/cetak_laporan_nasabah'); ?>"
                 class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a> <a
                 href="<?= base_url('laporan/laporan_nasabah_pdf'); ?>" class="btn btn-warning mb-3"><i
                     class="far fa-file-pdf"></i> Download Pdf</a> <a
                 href="<?= base_url('laporan/export_excel_nasabah'); ?>" class="btn btn-success mb-3"><i
                     class="far fa-file-excel"></i> Export ke Excel</a>
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>Nama</th>
                         <th>No Telepon</th>
                         <th>Alamat</th>
                         <th>Email</th>
                         <th>Role Id</th>
                         <th>Is Active</th>
                         <th>Tanggal Input</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $i = 1;
                        foreach ($user as $a) { ?>
                     <tr>
                         <td><?= $i++; ?></td>
                         <td class="text-capitalize"><?= $a['nama']; ?></td>
                         <td><?= $a['no_telepon']; ?></td>
                         <td class="text-capitalize"><?= $a['alamat']; ?></td>
                         <td><?= $a['email']; ?></td>
                         <td><?= $a['role_id']; ?></td>
                         <td><?= $a['is_active']; ?></td>
                         <td><?= date('d-M-Y', $a['tanggal_input']); ?></td>
                     </tr> <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div> <!-- /.container-fluid -->
 </div>