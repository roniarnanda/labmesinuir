<div class="container navtab">
    <div class="tab">
        <button class="tablinks active" onclick="openMenu(event, 'Gambar1')">Gambar 1</button>
        <button class="tablinks" onclick="openMenu(event, 'Gambar2')">Gambar 2</button>
        <button class="tablinks" onclick="openMenu(event, 'Gambar3')">Gambar 3</button>
    </div>


    <div id="Gambar1" class="tabcontent">
        <div class="mt-3 mb-3">
            <div class="row">
                <div class="col-5 ml-3">
                    <h3>Gambar 1</h3>
                </div>
            </div>
            <br>
            <?= form_open_multipart('admin/profil/utama'); ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                            </div>
                        </div>
                        <input type="hidden" name="ke" value="1">
                        <div class="col-sm-3"><button type="submit" class="btn btn-primary">Ganti Gambar</button></div>
                        <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
                <div class="ml-3">
                    <img src="<?= base_url('assets/'); ?>custom/img/web/1.jpg" class="w-100" alt="" srcset="">
                </div>
            </div>

        </div>
    </div>
    <div id="Gambar2" class="tabcontent nodisp">
        <div class="mt-3 mb-3">
            <div class="row">
                <div class="col-5 ml-3">
                    <h3>Gambar 2</h3>

                </div>
            </div>
            <br>
            <?= form_open_multipart('admin/profil/utama'); ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                            </div>
                        </div>
                        <input type="hidden" name="ke" value="2">
                        <div class="col-sm-3"><button type="submit" class="btn btn-primary">Ganti Gambar</button></div>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
                <div class="ml-3">
                    <img src="<?= base_url('assets/'); ?>custom/img/web/2.jpg" class="w-100" alt="" srcset="">
                </div>
            </div>

        </div>
    </div>
    <div id="Gambar3" class="tabcontent nodisp">
        <div class="mt-3 mb-3">
            <div class="row">
                <div class="col-5 ml-3">
                    <h3>Gambar 2</h3>
                </div>
            </div>
            <br>
            <?= form_open_multipart('admin/profil/utama'); ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                            </div>
                        </div>
                        <input type="hidden" name="ke" value="3">
                        <button type="submit" class="btn btn-primary col-sm-3">Ganti Gambar</button>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
                <div class="ml-3">
                    <img src="<?= base_url('assets/'); ?>custom/img/web/3.jpg" class="w-100" alt="" srcset="">
                </div>
            </div>

        </div>
    </div>

</div>
</div>