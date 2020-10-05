    <!-- IMAGE CAROUSEL -->
    <div class="jumbotron-fluid">
        <div class="cr">
            <div id="carouselExampleCaptions" class="carouselslide" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/'); ?>custom/img/web/1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/'); ?>custom/img/web/2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/'); ?>custom/img/web/3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span> -->
                    <!-- </a> -->
                </div>
                <a href="#artikel" class="btn-news bg-nav btn text-white btn-lg btn-block">BERITA TERBARU</a>
            </div>
        </div>
    </div>
    <!-- IMAGE CAROUSEL -->

    <!-- UNTUK MEMBUAT READ MORE -->
    <!-- https://www.dumetschool.com/blog/Membuat-Read-More -->
    <!-- UNTUK MEMBUAT READ MORE -->

    <div class="jumbotron">
        <div class="container">
            <div class="row" id="artikel">

                <div class="col-sm-8">
                    <div style="border-bottom: 1px solid #ff8800;">
                        <h4 class="head">BERITA TERBARU</h4>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($artikel as $artikel) {
                        ?>
                            <div class="card col-sm-4 my-3">
                                <p class="text-secondary ml-3 mt-3"><?= tanggal($artikel['waktu_dibuat']) ?></p>
                                <a href="<?= base_url('web/page/'); ?>artikel/<?= $artikel["id_artikel"] ?>/<?= $artikel["slug"] ?>">
                                    <img src="<?= base_url('assets/'); ?>custom/img/artikel/<?= $artikel["gambar"] ?>" class="card-img-top text-center " style="width: 80%; display: block; margin-left: auto; margin-right: auto;" alt="..."> </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $artikel["judul"] ?></h5>
                                    <p class="card-text"><?= limit_text($artikel["isi"], 25) ?>....</p>
                                    <a href="<?= base_url('web/page/'); ?>artikel/<?= $artikel["id_artikel"] ?>/<?= $artikel["slug"] ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- <div class="col-md-6 my-3" style="width: 18rem;"> -->
                        <!-- </div> -->
                    </div>
                    <?php if ($pagination) { ?>
                        <div>
                            <?= $pagination ?>
                        </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <!-- </div>
    </div>
    </div> -->
        <div class="col-sm-4">
            <div class="clearfix" style="border-bottom: 1px solid #ff8800;">
                <h4 class="head">VIDEO PROFILE</h4>
                <center>
                    <!-- wxYyelqxgGY -->
                    <iframe src="https://www.youtube.com/embed/NRcun8NRjys?ecver=1&amp;iv_load_policy=3&amp;rel=0&amp;yt:stretch=16:9&amp;autohide=0&amp;color=red&amp;width=303&amp;width=303" width="303" height="170" allowtransparency="true" frameborder="0">
                        <div style="text-align: center; margin: auto">
                            <script>
                                function execute_YTvideo() {
                                    return youtube.query({
                                        ids: "channel==MINE",
                                        startDate: "2019-01-01",
                                        endDate: "2022-12-31",
                                        metrics: "views,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,subscribersGained",
                                        dimensions: "day",
                                        sort: "day"
                                    }).then(function(e) {}, function(e) {
                                        console.error("Execute error", e)
                                    })
                                }
                            </script>
                    </iframe>
                </center>
            </div>
            <div class="listing_group" group="video1"></div>
            <div class="clearfix" style="margin-top:20px; border-bottom: 1px solid #ff8800;">
                <h4 class="head">MENU</h4>
                <ul class="listing_group list_nav" group="col2">
                    <?php foreach ($menu as $menu) { ?>
                        <li class="listing"><a class="componen-field" href="<?= base_url('web/page/' . $menu['url']) ?>"><?= $menu['title'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>


        </div>
    </div>
    </div>
    </div>