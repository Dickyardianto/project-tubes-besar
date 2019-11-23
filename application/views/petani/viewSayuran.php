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
            <!-- Tampilkan pesan error -->

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah
                sayuran</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis sayur</th>
                        <th scope="col">Nama sayur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sayuran as $s) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $s['jenis_sayur']; ?></td>
                        <td><?= $s['nama_sayur']; ?></td>
                        <td><?= $s['deskripsi']; ?></td>
                        <td><?= $s['harga']; ?></td>
                        <td><img src="<?= base_url('assets/img/gambar-sayur') . "/" . $s['gambar_sayur']; ?>" alt=""
                                width="60" height="60">
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>menu/ubahSubMenu/<?= $s['id']; ?>"
                                class="badge badge-success">edit</a>
                            <a href="<?= base_url(); ?>menu/deleteSubMenu/<?= $s['id']; ?>" class="badge badge-danger"
                                onclick="return confirm('yakin ? ');">delete</a>
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