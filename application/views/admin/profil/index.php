<div class="container navtab">
    <div class="tab">
        <button class="tablinks active" onclick="openMenu(event, 'Asisten')">Asisten Laboratorium</button>
        <?php foreach ($profilMenu as $Menu) { ?>

            <button class="tablinks" onclick="openMenu(event, '<?= $Menu['title_id'] ?>')"><?= $Menu['title'] ?></button>
        <?php } ?>


    </div>


    <div id="Asisten" class="tabcontent">
        <div class="mt-3 mb-3">
            <div class="row">
                <div class="col-5">
                    <h3>Asisten Laboratorium</h3>
                </div>
                <div class="col-7">
                    <a href="<?= base_url('admin/profil/tambahAsisten'); ?>" class="btn btn-primary mb-1">Tambah Asisten</a>
                </div>
            </div>
            <br>
            <form action="#" method="post">
                <?php foreach ($asisten as $asisten) { ?>
                    <div class="card mb-3" style="max-width: 800px;">
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
                                    <a href="<?= base_url('admin/profil/hapusAsisten/' . $asisten['id']); ?>" class="btn btn-danger float-right mb-1">Hapus</a>
                                    <a href="<?= base_url('admin/profil/editAsisten/' . $asisten['id']); ?>" class="btn btn-success float-right mb-1 mr-2">Edit</a>
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
            <div class="mt-3 mb-3">
                <h3><?= $Menu['title'] ?></h3>
                <form action="profil/edit" method="post">
                    <input type="hidden" name="id" value="<?= $Menu['id'] ?>">
                    <div class="form-group">
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                        <textarea class="textarea" id="isi" name="isi"><?= $Menu['description'] ?></textarea>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Edit <?= $Menu['title_id'] ?></button>
                </form>
            </div>
        </div>
    <?php } ?>

</div>
</div>