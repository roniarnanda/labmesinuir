<!-- BREADCRUMB -->
<div class="bread">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(''); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('web/page/'); ?>profil">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- BREADCRUMB -->


<div class="container navtab">
    <div class="tab">
        <button class="tablinks active" onclick="openMenu(event, 'Asisten')">Asisten Laboratorium</button>
        <?php foreach ($profilMenu as $Menu) { ?>

            <button class="tablinks" onclick="openMenu(event, '<?= $Menu['title_id'] ?>')"><?= $Menu['title'] ?></button>
        <?php } ?>


    </div>


    <div id="Asisten" class="tabcontent">
        <div class="mt-3 mb-3">
            <center>
                <h3>Asisten Laboratorium</h3>
            </center>
            <br>
            <form action="#" method="post">
                <?php foreach ($asisten as $asisten) { ?>
                    <div class="card mb-3 ml-4" style="max-width: 800px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/custom/img/img-profile/') . $asisten['foto']; ?>" class="card-img w-75">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?= $asisten['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>NPM</td>
                                                <td><?= $asisten['npm'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mata Kuliah</td>
                                                <td><?= $asisten['matkul'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Dosen Pengampu</td>
                                                <td><?= $asisten['dosen'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>

    <?php foreach ($profilMenu as $Menu) { ?>
        <div id="<?= $Menu['title_id'] ?>" class="tabcontent nodisp">
            <div class="mt-3 mb-3 ml-4">
                <center>
                    <h3><?= $Menu['title'] ?></h3>
                </center><br>
                <p><?= $Menu['description'] ?></p>
            </div>
        </div>
    <?php } ?>

</div>
</div>