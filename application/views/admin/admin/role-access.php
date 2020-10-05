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
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($menu as $menu) { ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $menu['menu'] ?></td>
                            <td>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $menu['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $menu['id']; ?>">
                                    </div>
                                </div>
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