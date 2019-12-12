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



                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah
                    sayuran</a>

                <table class="table table-bordered" id="dataTables">
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
                        <!-- Query -->
                        <?php
                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        $id_petani = $user['id'];

                        // var_dump($id_petani);
                        // die;
                        // $this->db->select('*');
                        // $this->db->from('sayuran');
                        // $this->db->join('user', 'user.id = sayuran.id_petani');
                        // $this->db->where('sayuran.id_petani', $id_petani);
                        // $sayuran2 = $this->db->get();

                        $queryTampilSesuaiId = "SELECT *, `sayuran`.`id` AS `id_sayur`
                                            FROM `sayuran` JOIN `user`
                                            ON `sayuran`.`id_petani` = `user`.`id`
                                            WHERE `sayuran`.`id_petani` = $id_petani";
                        $sayuran2 = $this->db->query($queryTampilSesuaiId)->result_array();
                        // var_dump($sayuran2);
                        // die;
                        ?>
                        <!-- Akhir Query -->

                        <?php $i = 1; ?>
                        <?php foreach ($sayuran2 as $s) : ?>
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
                                <a href="<?= base_url(); ?>petani/ubahSayur/<?= $s['id_sayur']; ?>"
                                    class="badge badge-success"><i class="far fa-edit"></i></a>
                                <a href="<?= base_url(); ?>petani/hapusSayur/<?= $s['id_sayur'] ?>"
                                    class="badge badge-danger" onclick="return confirm('yakin ? ');"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->



<!-- Modal tambah sayur-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah sayuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Fomr tambah sayuran -->
            <?= form_open_multipart('petani/tambahSayuran'); ?>
            <div class="modal-body">
                <div class="form-group">
                        <select class="form-control" id="jenis-sayur" name="jenis-sayur">
                            <option>Jenis Sayur</option>
                            <option>Sayur Buah</option>
                            <option>Sayur Daun</option>
                        </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama-sayur" name="nama-sayur" placeholder="Nama sayur">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"
                        rows="3"></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="satuan" name="satuan">
                            <option selected>Satuan</option>
                            <option value="Kg">(/Kg)</option>
                            <option value="Ons">(/Ons)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="customFile">Pilih gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>

        </div>
    </div>
</div>