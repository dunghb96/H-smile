<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from st.ourhtmldemo.com/new/Dento/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 02:04:57 GMT -->

@include('frontend.layouts.head')

<body>
    <div class="boxed_wrapper">

        @include('frontend.layouts.header')

        @yield('main-content')

        @include('frontend.layouts.footer')

    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target thm-bg-clr" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- Color Palate / Color Switcher -->
    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-gear"></i>
        </div>
        <div class="color-palate-head">
            <h6>Choose Your Color</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
                <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
                <span class="palate navy-color" data-theme-file="css/color-themes/navy-theme.css"></span>
                <span class="palate yellow-color" data-theme-file="css/color-themes/yellow-theme.css"></span>
                <span class="palate blue-color" data-theme-file="css/color-themes/blue-theme.css"></span>
                <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
                <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
                <span class="palate red-color" data-theme-file="css/color-themes/red-theme.css"></span>
            </div>
        </div>
        <div class="palate-foo">
            <span>You can easily change and switch the colors.</span>
        </div>
    </div>
    <!-- /.End Of Color Palate -->

    @include('frontend.layouts.scripts')

    @stack('js')

</body>

<!-- Mirrored from st.ourhtmldemo.com/new/Dento/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 02:06:23 GMT -->

</html>