<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <!-- Tampilkan pesan error -->
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg">
                <!-- Belum berhasil update data -->
                <?= form_open_multipart('petani/ubahSayur/' . $sayur['id']); ?>
                <div class="form-row">
                    <div class="col-5">
                        <label for="exampleFormControlInput1">Jenis sayur</label>
                        <input type="hidden" name="id" value="<?= $sayur['id']; ?>"></<input>
                        <input type="text" name="jenis-sayur" id="jenis-sayur" class="form-control"
                            value="<?= $sayur['jenis_sayur']; ?>">
                        <small class="form-text text-danger"><?= form_error('jenis-sayur'); ?></small>

                        <label for="exampleFormControlInput1">Nama sayur</label>
                        <input type="text" name="nama-sayur" id="nama-sayur" class="form-control"
                            value="<?= $sayur['nama_sayur']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama-sayur'); ?></small>

                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                            value="<?= $sayur['deskripsi']; ?>">
                        <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlInput1">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga"
                                    value="<?= $sayur['harga']; ?>">
                                <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="satuan" name="satuan">
                                    <option selected>Satuan</option>
                                    <option value="Kg">(/Kg)</option>
                                    <option value="Ons">(/Ons)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/gambar-sayur/') . $sayur['gambar_sayur']; ?>"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                            <label class="custom-file-label" for="customFile">Pilih gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" name="ubah" class="btn btn-primary float-left mt-2">Ubah data</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->