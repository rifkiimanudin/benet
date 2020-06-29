<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3">
        <img src="<?= base_url('assets/img/form.jpeg') ?>" class="card-img-top">
    </div>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 padding-250 text-right text-gray-900">
            <form action="<?= base_url('pemesanan/form') ?>" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">No KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ktp" name="ktp">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Tempat Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Contoh : Bandung, 20 April 1997">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" placeholder="" name="alamat"></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('pemesanan/pendaftaran') ?>" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->