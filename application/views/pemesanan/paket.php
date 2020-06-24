<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <div align="right">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newpaketModal">+ Tambah Data Paket</a>
            </div>


            <table class="table table-hover text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Kecepatan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($paket as $pk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pk['nama_paket']; ?></td>
                            <td><?= $pk['kecepatan']; ?></td>
                            <td>Rp. <?= number_format($pk['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal-edit<?= $pk['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?php echo site_url('pemesanan/paket/delete_pkt/' . $pk['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $pk['nama_paket']; ?> ?');" class="badge badge-danger">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="newpaketModal" tabindex="-1" role="dialog" aria-labelledby="newpaketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newpaketLabel">Tambah Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pemesanan/paket'); ?>" method="post">
                <div class="modal-body">
                    <label for="text">Nama Paket</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="">
                    </div>
                    <div>Kecepatan</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kecepatan" name="kecepatan" placeholder="">
                    </div>
                    <div>Harga</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 0;
foreach ($paket as $pk) : $no++; ?>

    <div id="modal-edit<?= $pk['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pemesanan/paket/edit_pkt'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdaftarLabel">Edit Data Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" readonly value="<?= $pk['id']; ?>" name="id" class="form-control">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <div>
                                <input type="text" name="nama_paket" autocomplete="off" value="<?= $pk['nama_paket']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kecepatan</label>
                            <div>
                                <input type="text" name="kecepatan" autocomplete="off" value="<?= $pk['kecepatan']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div>
                                <input type="text" name="harga" autocomplete="off" value="<?= $pk['harga']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>