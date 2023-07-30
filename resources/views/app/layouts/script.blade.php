<!-- JS here -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('app/assets/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('app/assets/js/meanmenu.js') }}"></script>
<script src="{{ asset('app/assets/js/slick.js') }}"></script>
<script src="{{ asset('app/assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('app/assets/js/parallax.js') }}"></script>
<script src="{{ asset('app/assets/js/backtotop.js') }}"></script>
<script src="{{ asset('app/assets/js/nice-select.js') }}"></script>
<script src="{{ asset('app/assets/js/counterup.js') }}"></script>
<script src="{{ asset('app/assets/js/wow.js') }}"></script>
<script src="{{ asset('app/assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('app/assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('app/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('app/assets/js/main.js') }}"></script>

<script>
   // const modalShow = new bootstrap.Modal('#ikuteventModal');

    @if (session('success') || session('error') || $errors->any())
        modalShow.show();
    @endif
</script>
