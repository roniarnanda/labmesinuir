<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col">
            <!-- <h1 class="h3 text-gray-800"><?= $title; ?></h1> -->
            <!-- /.card-header -->
            <div class="card-body pad">
                <?= form_open_multipart('admin/artikel/edit/' . $artikel['id_artikel'] . '/' . $artikel['slug']); ?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" value="<?= $artikel['judul'] ?>">
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/custom/img/artikel/') . $artikel['gambar']; ?>" class=" img-thumbnail " width="90px">
                            </div>
                            <div class="col-sm-10">
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    <textarea class="textarea" id="isi" name="isi"><?= $artikel['isi'] ?></textarea>
                </div>
                <!-- <div class="mb-3">
            </div> -->
                <input type="hidden" name="penyunting" value="<?= $user['name'] ?>">
                <button class="btn btn-primary float-right" type="submit">Edit Artikel</button>
                </form>
            </div>
        </div>
    </div>
</div>