<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">

<!-- Head -->

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <base href="{{ route('hsmile.home') }}" />
        <title>H-Smile Admin</title>
        <link rel="apple-touch-icon" href="/layout/favicon.png">
        <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="16x16">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
        @includeIf('backend.layout.styles')
        @stack('css')
</head>
<!-- Head -->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
        <!-- Header -->
        @includeIf('backend.layout.header')
        <!-- Header -->
        <!-- Sidebar -->
        @includeIf('backend.layout.aside')
        <!-- Sidebar -->
        <!-- Content -->
        @yield('content')
        <!-- Content -->
        <!-- Footer -->
        @includeIf('backend.layout.footer')
        <!-- Footer -->
        @includeIf('backend.layout.scripts')
        @stack('js')
</body>

</html>
