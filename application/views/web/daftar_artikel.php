<div class="container my-3">
    <h1>Daftar Artikel</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="div">
                <?php foreach ($artikel as $artikel) { ?>
                    <div class="card mb-3 mt-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/'); ?>custom/img/artikel/<?= $artikel["gambar"] ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $artikel["judul"] ?></h5>
                                    <p class="card-text"><?= substr($artikel["isi"], 0, 500) ?>....</p>
                                    <p class="card-text"><small class="text-muted"><?= tanggal($artikel['waktu_dibuat']) ?></small></p>
                                    <a href="<?= base_url('web/page/'); ?>artikel/<?= $artikel["id_artikel"] ?>/<?= $artikel["slug"] ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col">
                    <?= $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>