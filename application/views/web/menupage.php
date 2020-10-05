<!-- BREADCRUMB -->
<div class="bread">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(''); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $artikel["title"] ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- BREADCRUMB -->

<!-- ARTIKEL -->

<div class="container artikel" style="min-height: 700px;">
    <div class="row">
        <div class="col-sm-8">
            <h1><?= $artikel["title"] ?></h1>
            <br>
            <p class=""><?= $artikel["description"] ?></p>
        </div>
        <!-- ARTIKEL -->


    </div>

</div>