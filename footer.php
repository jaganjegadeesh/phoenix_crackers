<footer class="footer py-0" style="height:40px!important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="text-sm-end d-none d-sm-block py-2">
                    Design &amp; Developed by Srisoftwarez
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
<i class="bi bi-arrow-up-circle-fill"></i>
</button>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/waves.min.js"></script>
<script src="js/feather.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/dashboard-ecommerce.init.js"></script>
<script src="js/app.js"></script>
<script src="js/fonticons.js"></script>
<script src="include/select2/js/select2.min.js"></script>
<script src="include/select2/js/select.js"></script>
<script>
    $(document).on('select2:open', function() {
        var select_box = $('.select2-container--open .select2-selection--single');
        if (select_box.length) {
            select_box.css('border', '1px solid #aaa');
            select_box.closest('.form-group').find('.infos').remove();
        }
        setTimeout(() => {
            let searchField = document.querySelector('.select2-container--open .select2-search__field');
            if (searchField) {
                searchField.focus();
            }
        }, 0);
    });
</script>
</body>
</html>
<?php include "modal_content.php"; ?>
