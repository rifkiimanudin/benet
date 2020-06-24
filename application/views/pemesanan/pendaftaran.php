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
                <a href="<?= base_url('pemesanan/form') ?>" class="btn btn-primary mb-3 ">+ Tambah Data Pendaftaran</a>
            </div>

            <table class="table table-hover text-gray-900" id="mese">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">KTP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat, Tanggal Lahir</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelanggan as $df) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $df['ktp']; ?></td>
                            <td><?= $df['nama']; ?></td>
                            <td><?= $df['ttl']; ?></td>
                            <td><?= $df['telp']; ?></td>
                            <td><?= $df['alamat']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal-edit<?= $df['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?php echo site_url('pemesanan/detele_df/' . $df['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $df['nama']; ?> ?');" class="badge badge-danger">hapus</a>
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

<?php $no = 0;
foreach ($pelanggan as $df) : $no++; ?>

    <div id="modal-edit<?= $df['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pemesanan/ubah'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdaftarLabel">Edit Data Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" readonly value="<?= $df['id']; ?>" name="id" class="form-control">
                        <div class="form-group">
                            <label>No KTP</label>
                            <div>
                                <input type="text" name="ktp" autocomplete="off" value="<?= $df['ktp']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div>
                                <input type="text" name="nama" autocomplete="off" value="<?= $df['nama']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat, Tanggal lahir</label>
                            <div>
                                <input type="text" name="ttl" autocomplete="off" value="<?= $df['ttl']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <div>
                                <input type="text" name="telp" autocomplete="off" value="<?= $df['telp']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <div>
                                <input type="text" name="alamat" autocomplete="off" value="<?= $df['alamat']; ?>" required placeholder="" class="form-control">
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
<?php endforeach; ?>