<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Begin Page Content -->


    <?php $no = 1;
    foreach ($pelanggan as $us) : $no++; ?>

        <div class="row text-gray-900">
            <div class="col-lg-6">


                <div class="form-group row">
                    <input type="hidden" id="id" name="id" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm col-form-label">Nama Pelanggan</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $us['nama']; ?>" required placeholder="" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm col-form-label">Nama Paket</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $us['nama_paket']; ?>" required placeholder="" disabled>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

    <hr>

    <form action="<?= base_url('pembayaran/transaksi') ?>" method="post">

        <div class="form-group row">
            <label for="name" class="col-sm-1 col-form-label col-lg-3">Pilih Bulan</label>
            <div class="col-sm">
                <select name="bulan" id="bulan" class="form-control col-sm-2">
                    <option value="januari">Januari</option>
                    <option value="februari">Februari</option>
                    <option value="maret">Maret</option>
                    <option value="april">April</option>
                    <option value="mei">Mei</option>
                    <option value="juni">Juni</option>
                    <option value="juli">Juli</option>
                    <option value="agustus">Agustus</option>
                    <option value="september">September</option>
                    <option value="oktober">Oktober</option>
                    <option value="november">November</option>
                    <option value="desember">Desember</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-1 col-form-label col-lg-3">Pilih Tahun</label>
            <div class="col-sm">
                <select name="tahun" id="tahun" class="form-control col-sm-2">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-1 col-form-label col-lg-3">Harga</label>
            <div class="col-sm-2">
                <?php foreach ($pelanggan as $pkt) : ?>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $pkt['harga']; ?>">
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Bayar</button> <br>
    </form>
    <br>

    <table class="table table-hover text-gray-900" id="example">

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">id transaksi</th>
                <th scope="col">tanggal</th>
                <th scope="col">Bulan</th>
                <th scope="col">Tahun</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $ts) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ts['id_pelanggan']; ?></td>
                    <td><?= $ts['tanggal']; ?></td>
                    <td><?= $ts['bulan']; ?></td>
                    <td><?= $ts['tahun']; ?></td>
                    <td><?= $ts['harga']; ?></td>
                    <td>
                        <a href="<?= base_url('pembayaran/hapus/' . $ts['id']); ?>" class="badge badge-danger">Hapus</a>

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