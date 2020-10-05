<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <h5>Role : <?= $role['role']; ?> </h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
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
                            <td>
                                <a href=" <?= base_url('admin/admin/gantirole/') . $users['id'] . '/' . $role['id'] ?>" class="badge badge-primary">Ganti Role</a>
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
<!-- End of Main Content -->