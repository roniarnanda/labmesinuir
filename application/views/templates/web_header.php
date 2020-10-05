<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css">

    <link href="<?= base_url('assets/'); ?>custom/css/style.css" rel="stylesheet">

    <title>Laboratorium Teknik Mesin - <?= $title ?></title>
</head>

<body>

    <!-- HEADER -->
    <div class="bg-header">
        <div class="container">
            <div class="row ">
                <div class="col-1 head m-auto">
                    <img style="max-width:100%;" src="<?= base_url('assets/'); ?>custom/img/web/Uir.png" class="header_logo">
                </div>
                <div class="col-11 head mt-3">
                    <h2 class="tHeader">Laboratorium Teknik Mesin</h2>
                    <h2 class="t2Header mt-4">Universitas Islam Riau</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER -->

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
        <div class="container">

            <a class="navbar-brand" href="<?= base_url(''); ?>">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($menu as $menu) { ?>
                        <?php if ($menu['title'] === $title) { ?>
                            <li class="nav-item active">
                            <?php } else { ?>
                            <li class="nav-item">
                            <?php } ?>
                            <a class="nav-link" href="<?= base_url('web/page/' . $menu['url']) ?>"><?= $menu['title'] ?><span class="sr-only">(current)</span></a>
                            </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->