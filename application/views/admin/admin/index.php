<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAdminModal">Tambah Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($users as $users) { ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $users['username'] ?></td>
                            <td><?= $users['name'] ?></td>
                            <?php if ($users['role_id'] === '1') { ?>
                                <td>Administrator</td>
                            <?php } else { ?>
                                <td>Pembuat Konten</td>
                            <?php } ?>
                            <td>
                                <?php if ($users['id'] === '1') { ?>
                                    Role Tidak Bisa Dirubah
                                <?php } else { ?>
                                    <a href=" <?= base_url('admin/admin/gantirole/') . $users['id'] . '/' . $users['role_id'] ?>" class="badge badge-primary">Ganti Role</a>
                                    <a href="<?= base_url('admin/admin/hapus/') . $users['id'] ?>" class="badge badge-danger">Hapus Admin</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>


<!-- Modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="newAdminModal" tabindex="-1" role="dialog" aria-labelledby="newAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAdminModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/admin') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Kata Sandi">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder=" Ulangi Kata Sandi">
                    </div>
                    <div class="form-group">
                        <select name="role" id="role" class="form-control">
                            <option value="">Pilih Role</option>
                            <?php
                            foreach ($role as $role) { ?>
                                <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->