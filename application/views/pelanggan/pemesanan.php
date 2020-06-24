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

        <table class="table table-hover text-gray-900" id="mese">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">KTP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat/Tanggal Lahir</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Action</th>
                </tr>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($paket as $df) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $df['ktp']; ?></td>
                        <td><?= $df['nama']; ?></td>
                        <td><?= $df['ttl']; ?></td>
                        <td><?= $df['pekerjaan']; ?></td>
                        <td><?= $df['telp']; ?></td>
                        <td><?= $df['alamat']; ?></td>
                        <td><?= $df['id_paket']; ?></td>
                        <td>
                            <a href="<?php echo site_url('pemesanan/edit/' . $df['id']); ?>" class="badge badge-success">edit</a>
                            <a href="<?php echo site_url('pemesanan/delete/' . $df['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $df['nama']; ?> ?');" class="badge badge-danger">hapus</a>

                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->