<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="row">
            <div class="col-lg-5">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5">
                <form action="<?= base_url() ?>petani/ubahPassword" method="post">
                    <form>
                        <div class="form-group">
                            <label for="password_saat_ini">Password saat ini</label>
                            <input type="password" class="form-control" name="password_saat_ini" id="password_saat_ini">
                            <?= form_error('password_saat_ini', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">Password baru</label>
                            <input type="password" class="form-control" name="password_baru1" id="password_baru1">
                            <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2">Ulangi Password baru</label>
                            <input type="password" class="form-control" name="password_baru2" id="password_baru2">
                            <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ubah password</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->