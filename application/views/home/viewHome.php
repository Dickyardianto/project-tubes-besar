<!-- Slide -->
<div class="container" id="coba" style="margin-top:90px;">
    <div class="row mb-5">
        <div class="col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url(); ?>assets/vendor/Assets-Dhika/images/slide/1.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url(); ?>assets/vendor/Assets-Dhika/images/slide/2.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url(); ?>assets/vendor/Assets-Dhika/images/slide/3.jpg" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Slide -->
<div id="result"></div>

<!-- Content Diskon-->
<!-- <div class="container">
    <h3 class="h3" id="diskonSayur">Diskon Sayur</h3>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="<?= base_url('assets/img/gambar-sayur') . "/file_1575968693.jpg"; ?>">
                        <img class="pic-2" src="<?= base_url('assets/img/gambar-sayur') . "/file_1575968843.jpg"; ?>">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="#">Tomat Lembang</a></h3>
                    <div class="price">Rp. 10.000
                        <span>Rp20.000</span>
                    </div>
                    <a class="add-to-cart" href="">+ Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Akhir Diskon-->

<!-- Sayur Buah -->
<div class="container">
    <h4 class="mb-3 mt-4" id="sayur-buah">Sayur Buah</h4>
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuranBuahSorting as $sayur) : ?>
        <div class="col-sm-2 textStyle">
            <?php if (!$this->session->userdata('email')) : ?>
            <a href="<?= base_url() ?>auth" class="coba">
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
            <?php else : ?>
            <a href="<?= base_url() ?>transaksi/detailSayur/<?= $sayur['id']; ?>">
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
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Sayur Buah -->

<!-- Sayur Daun -->
<div class="container">
    <h4 class="mb-3 mt-4" id="sayur-daun">Sayur Daun</h4>
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuranDaunSorting as $sayur) : ?>
        <div class="col-sm-2 textStyle">
            <?php if (!$this->session->userdata('email')) : ?>
            <a href="<?= base_url() ?>auth">
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
            <?php else : ?>
            <a href="<?= base_url() ?>transaksi/detailSayur/<?= $sayur['id']; ?>">
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
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Sayur Daun-->

<!-- Sayur Batang -->
<div class="container">
    <h4 class="mb-3 mt-4" id="sayur-batang">Sayur Batang</h4>
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuranBatangSorting as $sayur) : ?>
        <div class="col-sm-2 textStyle">
            <?php if (!$this->session->userdata('email')) : ?>
            <a href="<?= base_url() ?>auth">
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
            <?php else : ?>
            <a href="<?= base_url() ?>transaksi/detailSayur/<?= $sayur['id']; ?>">
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
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Sayur Batang -->

<!-- Sayur Akar -->
<div class="container">
    <h4 class="mb-3 mt-4" id="sayur-akar">Sayur Akar</h4>
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuranAkarSorting as $sayur) : ?>
        <div class="col-sm-2 textStyle">
            <?php if (!$this->session->userdata('email')) : ?>
            <a href="<?= base_url() ?>auth">
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
            <?php else : ?>
            <a href="<?= base_url() ?>transaksi/detailSayur/<?= $sayur['id']; ?>">
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
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Akhir sayur akar -->