<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 top-margin shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayuran['gambar_sayur']; ?>"
                            class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">
                                <?= $sayuran['jenis_sayur']; ?>/<?= $sayuran['nama_sayur'] ?>/<?= $sayuran['deskripsi'] ?>
                            </p>
                            <hr>
                            <p style="font-size: 30px; color: #d71149; font-weight: bold" class="card-text">
                                Rp.<?= number_format($sayuran['harga']); ?> (/<?= $sayuran['satuan'] . ")" ?></p>
                            <li class="list-group-item list-group-item-warning">Nikmati tawaran terbaik dengan bertemu
                                petani
                                langsung</li>
                            <div class="row mb-0">
                                <div class="col-md text-center mt-3">
                                    <a href=""><button type="button" class="btn btn-success btn-block">Beli
                                            Sekarang</button></a><br>
                                </div>
                            </div>

                            <div class="row warna" style="margin-top: -15px">
                                <div class="col-md mb-1">
                                    <a href=""><button type="button" class="btn btn-block">Tambahkan ke
                                            keranjang</button></a>
                                </div>
                                <div class="col-md">
                                    <a href=""><button type="button" class="btn btn-block">Chat
                                            Petani</button></a><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $id_sayur = $sayuran['id_petani'];
        $queryTampilPetani = "SELECT *, `user`.`id` AS `id_user` 
                                FROM `user` JOIN `sayuran` 
                                ON `user`.`id` = `sayuran`.`id_petani`
                                WHERE `user`.`id` = $id_sayur";

        $petani = $this->db->query($queryTampilPetani)->row_array();
        // var_dump($petani);
        // die;
        ?>
        <div class="col-lg-3 ml-3 top-margin">
            <h5 class="card-title text-center">PETANI</h5>
            <div class="kotak text-center">
                <img class="" src="<?= base_url('assets/img/profile/') . $petani['image']; ?>" width="80" height="80">

            </div>
            <p class="text-center"><?= $petani['nama'] ?></p>
            <hr style="width: 100px; margin-top: -10px;">
            <div class="row mt-2">
                <div class="col-md-1">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="col">
                    <p class="card-text">
                        <?= $petani['alamat'] ?></p>
                </div>
            </div>
            <hr>
            <h5 class="card-title mt-3 text-center">PENGIRIMAN</h5>
            <div class="row text-center">
                <div class="col">
                    <p>COD</p>
                </div>
                <div class="col">
                    <p><i class="far fa-check-circle"></i></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>JNE</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>Grab</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>Gojek</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<section id="viewSayur" class="viewSayur mt-3">
    <div class="container-fluid p-4">
        <div class="row">
            <!-- menampilkan berbagai macam sayuran -->
            <?php foreach ($tampilSayur as $sayur) : ?>
            <div class="col-sm-2 textStyle">
                <a href="<?= base_url() ?>home/detailSayur/<?= $sayur['id']; ?>">
                    <div class="card mb-3 coba">
                        <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayur['gambar_sayur']; ?>"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $sayur['deskripsi'] ?> </p>
                            <p style="color: #d71149;">Rp. <?= number_format($sayur['harga']); ?>
                                (/<?= $sayur['satuan'] . ")" ?></p>
                            <p class="card-text"><small class="text-muted">ditambahkan pada

                                    <?= date('d F Y', $sayur['tanggal_rilis']); ?></small></p>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>