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


            <div>
            </div>
            <table class="table table-bordered table-striped text-gray-900" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Sejak</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $us) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $us['name']; ?></td>
                            <td><img src="<?= base_url('assets/img/profile/') . $us['image']; ?>" width="100" height="100"></td>
                            <td><?= $us['email']; ?></td>
                            <td><?php
                                if ($us['role_id'] == 1) {
                                    echo "Administrator";
                                } else if ($us['role_id'] == 2) {
                                    echo "Sales";
                                } else {
                                    echo "Kasir";
                                } ?></td>
                            <td><?= date('d F Y', $us['date_created']); ?></td>
                            <td>
                                <a href="<?php echo site_url('pengguna/edit/' . $us['id']); ?>" class="badge badge-success">edit</a>
                                <a href="<?php echo site_url('pengguna/delete/' . $us['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $us['name']; ?> ?');" class="badge badge-danger">hapus</a>
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