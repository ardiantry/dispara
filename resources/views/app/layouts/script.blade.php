<!-- JS here -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('app/assets/js/vendor/waypoints.js') }}"></script>
<!-- <script src="{{ asset('app/assets/js/bootstrap-bundle.js') }}"></script> -->
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
