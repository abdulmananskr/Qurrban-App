<div class="container-fluid">
    <div class="card" style="width: 28rem;">
        <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/hewan/') . $image; ?>"
            alt="Card image cap">
        <div class="card-body">
            <h3 class="card-title text-uppercase text-bold"><?= $jenis; ?></h3>
            <form action="<?= base_url('pesanhewan/pesanHewan'); ?>" method="post">

                <div class="form-group row">
                    <label for="id" class="col-sm-3 col-form-label">Berat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_hewan" name="id_hewan" value="<?= $id_hewan; ?>"
                            hidden>
                        <input type="text" class="form-control" id="berat" name="berat" value="<?= $berat, ' Kg'; ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="umur" name="umur" value="<?= $umur, ' Thn'; ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="stok" name="stok" value="<?= $stok; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah Beli</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value=""
                            placeholder="Masukkan jumlah pesanan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_pengiriman" class="col-sm-3 col-form-label">Alamat pengiriman</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" value=""
                            placeholder="Masukkan alamat pengiriman">
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-info ">Pesan</button>

                <button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Kembali</button>
            </form>
        </div>
    </div>
</div>
</div>