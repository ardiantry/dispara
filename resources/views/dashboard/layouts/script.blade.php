<!-- JAVASCRIPT -->

 <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>

<script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<!-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> -->

<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- Sweet alert init js-->
<script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

<!-- <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script> -->
<script src="{{ asset('assets/js/app.js') }}"></script> 
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script> 
<!--tinymce js-->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<!-- Summernote js -->
<!-- <script src="{{ asset('assets/libs/summernote/summernote-bs4.min.js') }}"></script> -->
<!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<!-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> -->
<script>
    function confirmDelete(element) {
        var id = $(element).data('id');
        var title = $(element).data('title');

        Swal.fire({
            title: "Apakah yakin?",
            html: "Data <strong>" + title + "</strong> akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1cbb8c",
            cancelButtonColor: "#f14e4e",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
        }).then(function(result) {
            if (result.value) {
                Swal.fire(
                    "Terhapus!",
                    "Data " + title + " berhasil dihapus",
                    "success"
                );
                $("#form-delete-" + id).submit();
            }
        });
    }
</script>
