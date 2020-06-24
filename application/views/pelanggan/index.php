<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div align="right">
        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#datapelanggan">+ Tambah Data Pelanggan</a>
    </div>

    <table class="table table-hover text-gray-900" id="mese">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Paket</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pelanggan as $pl) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $pl['nama']; ?></td>
                    <td><?= $pl['nama_paket']; ?></td>
                    <td>Rp. <?= $pl['harga']; ?></td>
                    <td><?= $pl['tanggal']; ?></td>
                    <td><?= $pl['status']; ?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#modal-edit<?= $pl['id']; ?>" class="badge badge-success">edit</a>
                        <a href="<?php echo site_url('pelanggan/delete/' . $pl['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $pl['nama']; ?> ?');" class="badge badge-danger">hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="datapelanggan" tabindex="-1" role="dialog" aria-labelledby="newdaftarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newdaftarLabel">Tambah Data Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_daftar" id="id_daftar" class="form-control">
                            <option value="">Nama Pelanggan</option>
                            <?php foreach ($daftarkan as $dfk) : ?>
                                <option value="<?= $dfk['id']; ?>"><?= $dfk['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_paket" id="id_paket" class="form-control">
                            <option value="">Pilih paket</option>
                            <?php foreach ($paketkan as $pkt) : ?>
                                <option value="<?= $pkt['id']; ?>"><?= $pkt['nama_paket']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>

                        </select>
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
foreach ($pelanggan as $pl) : $no++; ?>

    <div id="modal-edit<?= $pl['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pelanggan/ubah'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdaftarLabel">Edit Data Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" readonly value="<?= $pl['id']; ?>" name="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="text" name="nama" autocomplete="off" value="<?= $pl['nama']; ?>" required placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="id_paket" id="id_paket" class="form-control">
                            <option value="<?= $pl['nama_paket']; ?>"><?= $pl['nama_paket']; ?></option>

                    </div>

                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>