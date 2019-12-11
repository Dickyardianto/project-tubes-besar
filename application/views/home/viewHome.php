<!-- Slide -->
<div class="container" style="margin-top:90px;">
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

<!-- Content -->
<div class="container">
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuran as $sayur) : ?>
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
<!-- Akhir Content -->