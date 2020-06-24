<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div align="right">
                <a href="" class="btn btn-primary " data-toggle="modal" data-target="#newdaftarModal">+ Tambah Data Pendaftaran</a>
            </div>

            <table class="table table-hover text-gray-900" id="mese">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat/Tanggal Lahir</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">No KTP/SIM</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftar as $df) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $df['nama']; ?></td>
                            <td><?= $df['ttl']; ?></td>
                            <td><?= $df['telp']; ?></td>
                            <td><?= $df['ktp']; ?></td>
                            <td><?= $df['pekerjaan']; ?></td>
                            <td><?= $df['alamat']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal-edit<?= $df['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?php echo site_url('pendaftaran/delete/' . $df['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $df['nama']; ?> ?');" class="badge badge-danger">hapus</a>
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

<div class="modal fade" id="newdaftarModal" tabindex="-1" role="dialog" aria-labelledby="newdaftarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newdaftarLabel">Tambah Data Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pendaftaran'); ?>" method="post">
                <div class="modal-body">
                    <label for="text">Nama Lengkap</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div>Tempat, Tanggal Lahir</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Contoh : Bandung, 20 April 1997">
                    </div>
                    <div>No Telepon</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Contoh : 081214247xxx">
                    </div>
                    <div>Nomor KTP/SIM</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Contoh : 3204302001999xxx">
                    </div>
                    <div>Pekerjaan</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Contoh : Dokter">
                    </div>
                    <div>Alamat</div>
                    <div class="form-group">
                        <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Lengkap">
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
foreach ($daftar as $df) : $no++; ?>

    <div id="modal-edit<?= $df['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pendaftaran/ubah'); ?>" method="post">
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
                            <label>No KTP/SIM</label>
                            <div>
                                <input type="text" name="ktp" autocomplete="off" value="<?= $df['ktp']; ?>" required placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <div>
                                <input type="text" name="pekerjaan" autocomplete="off" value="<?= $df['pekerjaan']; ?>" required placeholder="" class="form-control">
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
    </div>
<?php endforeach; ?>