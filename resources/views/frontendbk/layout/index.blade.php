<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home || H-Smile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('frontend.layout.style')
</head>

<body>
    <div class="boxed_wrapper">
        <div class="preloader"></div>

        @include('frontend.layout.header')


        @yield('content')


        @include('frontend.layout.footer')
    </div>
    <div class="scroll-to-top scroll-to-target thm-bg-clr" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>

    @include('frontend.layout.script')

</body>

</html>
