<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col">
            <!-- <h1 class="h3 text-gray-800"><?= $title; ?></h1> -->
            <!-- /.card-header -->
            <?= form_open_multipart('admin/artikel/tambah'); ?>
            <div class="card-body pad">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Artikel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel">
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    <textarea class="textarea" id="isi" name="isi"></textarea>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <!-- <button type="submit" class="btn btn-primary">Edit</button> -->
                        <button class="btn btn-primary float-right" type="submit">Tambah Artikel</button>
                    </div>
                </div>
                <input type="hidden" name="oleh" value="<?= $user['name'] ?>">
                <!-- <div class="mb-3">
            </div> -->
                </form>
            </div>
        </div>
    </div>
</div>