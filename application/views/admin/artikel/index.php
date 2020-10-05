<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <a href="artikel/tambah" class="btn btn-primary mb-3">Tambah Artikel</a>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th>Tanggal Upload</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($artikel as $artikel) { ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><img src="<?= base_url('assets/') ?>custom/img/artikel/<?= $artikel['gambar'] ?>" alt="" srcset="" width="70px"></td>
                    <td><?= $artikel["judul"] ?></td>
                    <td><?= tanggal($artikel['waktu_dibuat'])  . date(' H:i', $artikel['waktu_dibuat']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/artikel/'); ?>edit/<?= $artikel['id_artikel'] ?>/<?= $artikel['slug'] ?>" class="btn btn-success">Edit</a>
                        <a href="<?= base_url('admin/artikel/'); ?>hapusArtikel/<?= $artikel['id_artikel'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <?= $pagination ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->