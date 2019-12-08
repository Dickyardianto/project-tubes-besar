<!-- Akhir Navbar -->
<!-- <div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-light font-weight-bold text-center tshadow" style="line-height: 500px">YUK BELI SAYUR
        </h1> -->
<!-- <h1 class="display-3 text-light font-weight-bold" style="line-height: 0px">LANGSUNG KE PETANI !</h1> -->
<!-- </div>
</div> -->
<!-- Backgorund -->

<div class="bd-example mb-5 top-margin">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="<?= base_url() ?>assets/img/bgSayur.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark">First slide label</h5>
                    <p class="text-dark">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() ?>assets/img/sy-06.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() ?>assets/img/bgSayur.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- Content -->
<div class="container-fluid">
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