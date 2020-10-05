<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/custom/img/img-profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['username']; ?></h5>
                    </p>
                    <div class="row mt-5">
                        <div class="col-md-5">
                            <a href="<?= base_url('admin/user/edit'); ?>" class="btn btn-success">Edit Profil</a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/user/changepassword'); ?>" class="btn btn-success">Ganti Password</a>
                        </div>

                    </div>
                    <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></h5></small></p> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->