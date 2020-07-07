<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <div class="card mb-3">
        <img src="<?= base_url('assets/img/form.jpeg') ?>" class="card-img-top">
    </div> -->

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php foreach ($pendaftar as $us) : ?>
        <div class="card mb-3 col-lg-5 text-gray-900">
            <div class="row no-gutters">
                <div class="col-md">
                    <div class="card-body">
                        <p class="card-text"><?= $us['ktp'] ?></p>
                        <p class="card-text"><?= $us['nama']; ?></p>
                        <p class="card-text"><?= $us['telp'] ?></p>
                        <p class="card-text"><?= $us['alamat']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- /.container-fluid -->
</div>


</div>
<!-- End of Main Content -->