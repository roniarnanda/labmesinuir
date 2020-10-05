<div class="footer mt-4">
    <div class="container">
        <div class="nav row mt-5">
            <div class="col-xs-6 col-sm-3 mt-5">
                <div class="fb-page" style="margin-top:10px; border:2px solid #8c8; background:#fff;" data-href="https://www.facebook.com/uirunggul2020/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/uirunggul2020/">
                            <a href="https://www.facebook.com/uirunggul2020/">UIR Unggul 2020</a>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3">

            </div>

            <div class="col-xs-6 col-sm-3">


            </div>

            <div class="col-xs-6 col-sm-3 mt-5">
                <address style="text-align:left; margin-top:10px; font-size: 12px;color:#fff;">
                    <b>Laboratorium Teknik Mesin</b><br>
                    <b>UNIVERSITAS ISLAM RIAU</b>
                    <br /> Jl. Kaharuddin Nasution 113 Pekanbaru Riau 28284
                    <br> Fakultas Teknik Gedung B
                    <br />Email : info@uir.ac.id</address>
                <div class="pull-left somed">
                    <a target="blank" href="https://www.facebook.com/groups/428552834008896/"><i class="fa fa-facebook fa-2x"></i></a>
                    <a target="blank" href="index.html#"><i class="fa fa-twitter fa-2x"></i></a>
                    <a target="blank" href="https://instagram.com/laborituir/"><i class="fa fa-instagram fa-2x"></i></a>
                </div>

            </div>
        </div>

        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Laboratorium Teknik Mesin <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- <div class="footer-copyright">
    <span class="btn btn-lg btn-block text-white">Copyright © 2020 Laboratorium Teknik Mesin</span>
</div> -->











<script src="<?= base_url('assets/'); ?>custom/js/vertical-tab.js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>custom/js/script.js"></script>
</body>


<script>
    $(document).ready(function() {
        $('#modal-id').click({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        })
    });
</script>

</html>