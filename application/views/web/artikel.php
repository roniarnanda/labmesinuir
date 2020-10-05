<!-- BREADCRUMB -->
<div class="bread">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(''); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('web/page/'); ?>artikel">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $artikel["judul"] ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- BREADCRUMB -->

<!-- ARTIKEL -->

<div class="container artikel" style="min-height: 700px;">
    <div class="row">
        <div class="col-sm-8">
            <h1><?= $artikel["judul"] ?></h1>
            <p class="text-secondary ml-3 mt-3"><?= tanggal($artikel['waktu_dibuat']) . date(' H:i', $artikel['waktu_dibuat']) ?></p>
            <p class="text-secondary ml-3 mt-3">Dipublish oleh <?= $artikel['oleh'] ?>
                <?php if ($artikel['penyunting']) { ?>
                    | Disunting oleh <?= $artikel['penyunting'] ?>
                <?php } ?>
            </p>
            <img style="width: 60%;" src="<?= base_url('assets/'); ?>custom/img/artikel/<?= $artikel["gambar"] ?>" class="card-img-top" alt="...">
            <br>
            <p class=""><?= $artikel["isi"] ?></p>
        </div>
        <!-- ARTIKEL -->

        <div class="col-sm-4">
            <div>
                <h4 class="head">BERITA LAINNYA</h4>
            </div>
            <ul>
                <?php
                foreach ($artikel_list as $artikel_list) {
                    if ($artikel_list['id_artikel'] != $artikel['id_artikel']) {
                        # code...
                ?>
                        <li><a href="<?= base_url('web/page/'); ?>artikel/<?= $artikel_list["id_artikel"] ?>/<?= $artikel_list["slug"] ?>"><?= $artikel_list["judul"] ?></a></li>
                <?php }
                } ?>
            </ul>
        </div>

    </div>

</div>