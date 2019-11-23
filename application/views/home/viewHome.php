<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-light" href="#">SAYURKEUN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Pricing</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Akhir Navbar -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-light font-weight-bold">YUK BELI SAYUR</h1>
        <h1 class="display-3 text-light font-weight-bold">LANGSUNG KE PETANI !</h1>
    </div>
</div>
<!-- Backgorund -->


<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-sm textStyle">
            <a href="<?= base_url() ?>auth">
                <div class="card mb-3">
                    <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayur['gambar_sayur']; ?>"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?= $sayur['deskripsi'] ?> </p>
                        <p>Rp. <?= $sayur['harga'] ?> (/Kg)</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm textStyle">
            <a href="<?= base_url() ?>auth">
                <div class="card mb-3">
                    <img src="<?= base_url() ?>assets/img/bgSayur.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Kotak Sortasi Angka / Kotak Pas / Number Shape Sorting / Mainan Anak
                            Edukatif /
                            Edukasi Aika Edu Toys</p>
                        <p>Rp. 18.000</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm">
            <div class="card mb-3">
                <img src="<?= base_url() ?>assets/img/bgSayur.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Kotak Sortasi Angka / Kotak Pas / Number Shape Sorting / Mainan Anak Edukatif /
                        Edukasi Aika Edu Toys</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card mb-3">
                <img src="<?= base_url() ?>assets/img/bgSayur.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Kotak Sortasi Angka / Kotak Pas / Number Shape Sorting / Mainan Anak Edukatif /
                        Edukasi Aika Edu Toys</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>


    </div>
    <!-- Akhir Content -->