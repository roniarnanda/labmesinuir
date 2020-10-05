<div class="container">
    <div class="row">
        <div class="col">
            <div class="mt-3 mb-3">
                <h3><?= $menu['title'] ?></h3>
                <br>
                <?= form_open_multipart('admin/menu/edit'); ?>
                <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                <input type="hidden" name="url" value="<?= $menu['url'] ?>">
                <div class="form-group">
                    <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    <textarea class="textarea" id="isi" name="isi"><?= $menu['description'] ?></textarea>
                </div>

                <button class="btn btn-primary float-right" type="submit">Edit <?= $menu['title'] ?></button>
                </form>
            </div>
        </div>
    </div>
</div>