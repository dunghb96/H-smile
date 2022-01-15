<!-- main jQuery -->
<script src="/frontend/js/jquery.js"></script>
<!-- Wow Script -->
<script src="/frontend/js/wow.js"></script>
<!-- bootstrap -->
<script src="/frontend/js/bootstrap.min.js"></script>
<!-- Slick slider Script -->
<script src="/frontend/js/slick.js"></script>
<!-- bx slider -->
<script src="/frontend/js/jquery.bxslider.min.js"></script>
<!-- count to -->
<script src="/frontend/js/jquery.countTo.js"></script>
<script src="/frontend/js/appear.js"></script>
<!-- owl carousel -->
<script src="/frontend/js/owl.js"></script>
<!-- validate -->
<script src="/frontend/js/validation.js"></script>
<!-- mixit up -->
<script src="/frontend/js/jquery.mixitup.min.js"></script>
<!-- isotope script-->
<script src="/frontend/js/isotope.js"></script>
<!-- Easing -->
<script src="/frontend/js/jquery.easing.min.js"></script>
<!-- Gmap helper -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
<!--Gmap script-->
<script src="/frontend/js/gmaps.js"></script>
<script src="/frontend/js/map-helper.js"></script>
<!-- jQuery ui js -->
<script src="/frontend/assets/jquery-ui-1.11.4/jquery-ui.js"></script>
<!-- Language Switche  -->
<script src="/frontend/assets/language-switcher/jquery.polyglot.language.switcher.js"></script>
<!-- jQuery timepicker js -->
<script src="/frontend/assets/timepicker/timePicker.js"></script>
<!-- Bootstrap select picker js -->
<script src="/frontend/assets/bootstrap-sl-1.12.1/bootstrap-select.js"></script>
<!-- html5lightbox js -->
<script src="/frontend/assets/html5lightbox/html5lightbox.js"></script>
<!-- html5lightbox js -->
<script src="/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--Color Switcher-->
<script src="/frontend/js/color-settings.js"></script>

<!--Revolution Slider-->
<script src="/frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="/frontend/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="/frontend/js/main-slider-script.js"></script>

<!-- thm custom script -->
<script src="/frontend/js/custom.js"></script>
@yield('script')
@stack('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
