<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="<?= base_url('assets/lib/jquery/jquery.min.js'); ?>"
        type="text/javascript"></script>
        <script src="<?= base_url('assets/lib/jquery-ui/jquery-ui.min.js');?>"></script>
<script src="<?= base_url('assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/js/app.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/prettify/prettify.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net/js/jquery.dataTables.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/pdfmake/pdfmake.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/pdfmake/vfs_fonts.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/lib/jquery.niftymodals/js/jquery.niftymodals.js'); ?>"
        type="text/javascript"></script>
<script type="application/javascript"
        src="<?= base_url('assets/lib/fa/js/all.js'); ?>"></script>
<script type="application/javascript"
        src="<?= base_url('assets/lib/fa/js/brands.js'); ?>"></script>
<script type="application/javascript"
        src="<?= base_url('assets/lib/fa/js/fontawesome.js'); ?>"></script>
<script type="application/javascript"
        src="<?= base_url('assets/lib/fa/js/regular.js'); ?>"></script>
<script type="application/javascript"
        src="<?= base_url('assets/lib/fa/js/solid.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/file_java.js');?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/file_auto.js');?>"></script>
<script type="application/javascript" src="<?= base_url('assets/lib/fa/js/v4-shims.js'); ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/lib/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script type="<?= base_url('assets/lib/mprogress/js/mprogress.min.js'); ?>"></script>
<script type="text/javascript">
    $.fn.niftyModal('setDefaults', {
        overlaySelector: '.modal-overlay',
        contentSelector: '.modal-content',
        closeSelector: '.modal-close',
        classAddAfterOpen: 'modal-show'
    });
    $(document).ready(function () {
        //-initialize the javascript
        App.init();
        App.dataTables();
        
        //Runs prettify
        prettyPrint();
        // Alert
        App.uiSweetalert2();
        const ps = new PerfectScrollbar('.be-content', {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
    });

</script>

