<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Laboratorium Teknik Mesin <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Artikel?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Hapus" jika ingin menghapus artikel.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('admin/'); ?>hapusArtikel/<?= $artikel['id_artikel'] ?>">Delete</a>
            </div>
        </div>
    </div>
</div> -->


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>vendor/sbadmin/js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selectes").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('admin/admin/changeaccess') ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script> -->

<script src="<?= base_url('assets/') ?>vendor/plugin/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote({
            height: 250,
            placeholder: 'Ketikan isi artikel disini',
            toolbar: [
                ['style', ['bold', 'underline', 'italic', 'clear']],
                ['insert', ['link', 'unlink']],
                ['para', ['ul', 'paragraph']]
            ],
            dialogsInBody: true
        });
    })
</script>
<script src="<?= base_url('assets/'); ?>custom/js/script.js"></script>


</body>

</html>