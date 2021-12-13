<script src="/backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="/backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="/backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="/backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="/backend/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>

<script src="/backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="/backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="/backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

<script src="/backend/app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="/backend/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="/backend/app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="/backend/app-assets/vendors/js/extensions/dragula.min.js"></script>
<script src="/backend/plugins/tinymce/tinymce.min.js"></script>

<!-- <script src="/backend/app-assets/vendors/js/extensions/jstree.min.js"></script>
<script src="/backend/app-assets/vendors/js/file-uploaders/dropzone.min.js"></script>
<script src="/backend/app-assets/js/scripts/customizer.min.js"></script>-->

<!-- Common CSS -->
<!-- <script src="/backend/app-assets/js/scripts/thangjs.js"></script> -->
<script src="/backend/app-assets/js/core/app-menu.min.js"></script>
<script src="/backend/app-assets/js/core/app.min.js"></script>
<script src="/backend/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="/backend/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="/backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

<script>
    $(window).on('load', function() {
        // $('#minlogo').hide();
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
