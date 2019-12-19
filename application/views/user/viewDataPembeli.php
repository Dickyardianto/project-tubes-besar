<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-dataPP" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <!-- Tampilkan pesan error -->

            <table class="table table-hover" id="dataTables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>

                        <td><img src="<?= base_url('assets/img/profile') . "/" . $m['image']; ?>" alt="" width="60"
                                height="60"></td>
                        <td><?= $m['nama']; ?></td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/hapusPembeli/<?= $m['id']; ?>"
                                class="badge badge-danger tombol-hapus">hapus</a>
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