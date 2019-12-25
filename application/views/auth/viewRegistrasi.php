<div class="container">

    <!-- <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0"> -->
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="my-5 col-lg-6 mx-auto">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-light mb-4">Buat akun!</h1>
                </div>
                <form class="user" method="post" action="<?= base_url() ?>auth/registrasi">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="nama"
                            placeholder="Nama lengkap" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email"
                            placeholder="Alamat email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                            placeholder="Alamat lengkap" value="<?= set_value('alamat'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="role" name="role">
                            <option selected>Daftar sebagai</option>
                            <option value="2">Pembeli</option>
                            <option value="3">Petani</option>
                        </select>
                    </div>
                    <div class=" form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1"
                                name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2"
                                name="password2" placeholder="Ulangi password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                        Daftar
                    </button>
                </form>
                <div class="text-center">
                    <a class="small" href="<?= base_url() ?>auth">Sudah punya akun? Login!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->

</div>