<div class="container">

    <div class="x_panel" align="center">

        <div class="x_content">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail" style="height: auto; position: relative; left: 1 00%; width: 200%;">
                        <img src="<?php echo base_url('assets/img/hewan/') . $gambar; ?>"
                            style="max-width:100%; max-height: 100%; height: 250px; width: 220px">

                        <div class="caption">
                            <h5 style="min-height:40px;" align="center"><?= $jenis ?></h5>
                            <center>
                                <table class="table table-stripped">
                                    <tr>
                                        <th nowrap>Jenis Hewan: </th>
                                        <td nowrap><?= $jenis; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Kategori: </th>
                                        <td><?= $id_kategori ?></td>
                                    </tr>
                                    <tr>
                                        <th nowrap>Harga: </th>
                                        <td><?= "Rp. " . number_format($harga)  ?></td>
                                        <td>&nbsp;</td>
                                        <th>Berat: </th>
                                        <td><?= $berat, ' Kg' ?></td>

                                    </tr>
                                    <tr>
                                        <th>Umur: </th>
                                        <td><?= $umur, ' Tahun' ?></td>
                                        <td>&nbsp;</td>
                                        <th>Tersedia:</th>
                                        <td><?= $stok, ' ekor' ?></td>
                                    </tr>
                                </table>
                            </center>
                            <p> <a class="btn btn-outline-secondary fas fw fareply" onclick="window.history.go(-1)">
                                    Kembali</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>