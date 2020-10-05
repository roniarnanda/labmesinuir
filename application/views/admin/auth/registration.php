<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto ">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Pengguna Baru</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('admin/auth/registration') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Nama Pengguna" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Tambah Pengguna
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>