<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>

            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Url</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($subMenu as $subMenu) { ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $subMenu['title'] ?></td>
                            <td><?= $subMenu['url'] ?></td>
                            <?php if ($subMenu['id'] === '1' || $subMenu['id'] === '3') { ?>
                                <td>Tidak Ada Aksi</td>
                            <?php } else { ?>
                                <td>
                                    <!-- <a href="editmenu/<?= $subMenu['id'] ?>" class="badge badge-success">Edit</a> -->
                                    <a href="hapus/<?= $subMenu['id'] ?>" class="badge badge-danger">Delete</a>
                                </td>
                            <?php } ?>
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

<!-- Modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menu/submenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>