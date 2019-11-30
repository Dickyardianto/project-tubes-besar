<!-- Akhir Navbar -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-light font-weight-bold text-center tshadow" style="line-height: 500px">YUK BELI SAYUR
        </h1>
        <!-- <h1 class="display-3 text-light font-weight-bold" style="line-height: 0px">LANGSUNG KE PETANI !</h1> -->
    </div>
</div>
<!-- Backgorund -->


<!-- Content -->
<div class="container">
    <div class="row">
        <!-- menampilkan berbagai macam sayuran -->
        <?php foreach ($sayuran as $sayur) : ?>
        <div class="col-sm-3 textStyle">
            <a href="<?= base_url() ?>home/detailSayur/<?= $sayur['id']; ?>">
                <div class="card mb-3">
                    <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayur['gambar_sayur']; ?>"
                        class="card-img-top" alt="..." width="40" height="120">
                    <div class="card-body">
                        <p class="card-text"><?= $sayur['deskripsi'] ?> </p>
                        <p>Rp. <?= $sayur['harga'] ?> (/Kg)</p>
                        <p class="card-text"><small class="text-muted">Last updated

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