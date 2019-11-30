<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="card mb-3 top-margin shadow" style="max-width: 850px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayuran['gambar_sayur']; ?>" class="card-img"
                    alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">
                        <?= $sayuran['jenis_sayur']; ?>/<?= $sayuran['nama_sayur'] ?>/<?= $sayuran['deskripsi'] ?></p>
                    <hr>
                    <p style="font-size: 30px; color: #d71149; font-weight: bold" class="card-text">
                        Rp.<?= number_format($sayuran['harga']); ?></p>
                    <li class="list-group-item list-group-item-warning">Nikmati tawaran terbaik dengan bertemu petani
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->