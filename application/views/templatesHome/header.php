<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />

    <title><?= $title ?></title>
</head>

<body>

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
                    <li class="nav-item">
                        <form class="form-inline my-sm-0">
                            <input class="form-control mr-sm ml-5 mr-3" id="cari" type="search" placeholder="Cari Sayuran..." aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">PerkembanganPasar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fas fa-cart-arrow-down"href=""></a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"> 
                        <form class="form-inline my-2 my-lg-0">
                            <button class="btn btn-outline-light my-2 my-sm-0 mr-2" type="submit">Masuk</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Daftar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>