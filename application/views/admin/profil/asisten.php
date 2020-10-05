<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/profil/tambahAsisten'); ?>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="npm" class="col-sm-3 col-form-label">NPM</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM">
                    <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="matkul" class="col-sm-3 col-form-label">Mata Kuliah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="matkul" name="matkul" placeholder="Mata Kuliah">
                    <?= form_error('matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="dosen" class="col-sm-3 col-form-label">Dosen Pengampu</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="dosen" name="dosen" placeholder="Dosen Pengampu">
                    <?= form_error('dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control-file" id="foto" name="foto">
                    <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    </div>
                </div> -->

            <button type="submit" class="btn btn-primary float-right mb-5">Tambah Asisten</button>
            </form>
        </div>
    </div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->