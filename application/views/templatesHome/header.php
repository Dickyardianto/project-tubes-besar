<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/Assets-Dhika/style/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/x-icon"
        href="<?= base_url(); ?>assets/vendor/Assets-Dhika/images/logo/logonsbig.png" />
</head>

<body>

    <!-- Navbar/Header -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="<?= base_url(); ?>home">
                <img src="<?= base_url(); ?>assets/vendor/Assets-Dhika/images/logo/logonsbig.png" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                Niaga Sayur</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto">
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item scrolspy" href="#sayur-buah">Sayur Buah</a>
                            <a class="dropdown-item scrolspy" href="#sayur-daun">Sayur Daun</a>
                            <a class="dropdown-item scrolspy" href="#sayur-batang">Sayur Batang</a>
                            <a class="dropdown-item scrolspy" href="#sayur-akar">Sayur Akar</a>
                        </div>
                    </div>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 ml-3" type="search" placeholder="cari sayur disini !"
                            aria-label="Search" name="search-produk" id="search-produk">
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="navbar-brand mr-4 text-light" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <?php if ($this->session->userdata('email')) : ?>
                    <!-- Coba -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                            <img class="img-profile rounded-circle"
                                src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="30" height="30">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url() ?>auth/logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    <!-- Akhir Coba -->
                    <?php else : ?>
                    <li><a href="<?= base_url() ?>auth" class="btn btn-outline-light my-2 my-sm-0">Login</a></li>
                    </li>
                    <?php endif; ?>


                </ul>
            </div>
        </nav>
    </div>
    <!-- Akhir Navbar/Header -->