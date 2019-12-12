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
            <a class="navbar-brand" href="#">
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
                        <a class="nav-item nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Diskon Sayur</a>
                            <a class="dropdown-item" href="#">Sayur Lokal</a>
                            <a class="dropdown-item" href="#">Rekomendasi Sayur</a>
                            <a class="dropdown-item" href="#">Sayur Laris</a>
                        </div>
                    </div>
                   
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 ml-3" type="search" placeholder="cari sayur disini !"
                            aria-label="Search">
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                         <a class="navbar-brand mr-4 text-light" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Akhir Navbar/Header -->