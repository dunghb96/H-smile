<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from st.ourhtmldemo.com/new/Dento/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 02:01:40 GMT -->

<head>
    <meta charset="UTF-8">
    <title>@yield('title') || H-Smile </title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('frontend.layout.style')
    @yield('head')
</head>

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>


        <!--Start header style1 area-->
        @include('frontend.layout.header')
        <!--End header style1 area-->


        @yield('content')

        @include('frontend.layout.footer')


    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target thm-bg-clr" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- Color Palate / Color Switcher -->
    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-gear"></i>
        </div>
        <div class="color-palate-head">
            <h6>Chọn Màu của bạn</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active" data-theme-file="{{asset('frontend/css/color-themes/default-theme.css')}}"></span>
                <span class="palate teal-color" data-theme-file="{{asset('frontend/css/color-themes/teal-theme.css')}}"></span>
                <span class="palate navy-color" data-theme-file="{{asset('frontend/css/color-themes/navy-theme.css')}}"></span>
                <span class="palate yellow-color" data-theme-file="{{asset('frontend/css/color-themes/yellow-theme.css')}}"></span>
                <span class="palate blue-color" data-theme-file="{{asset('frontend/css/color-themes/blue-theme.css')}}"></span>
                <span class="palate purple-color" data-theme-file="{{asset('frontend/css/color-themes/purple-theme.css')}}"></span>
                <span class="palate olive-color" data-theme-file="{{asset('frontend/css/color-themes/olive-theme.css')}}"></span>
                <span class="palate red-color" data-theme-file="{{asset('frontend/css/color-themes/red-theme.css')}}"></span>
            </div>
        </div>
        <div class="palate-foo">
            <span>Bạn có thể dễ dàng thay đổi và chuyển đổi màu sắc.</span>
        </div>
    </div>
    <!-- /.End Of Color Palate -->

    @include('frontend.layout.script')
    @yield('script')
</body>

<!-- Mirrored from st.ourhtmldemo.com/new/Dento/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 02:04:28 GMT -->

</html>
