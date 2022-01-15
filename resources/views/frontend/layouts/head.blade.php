<head>
    <meta charset="UTF-8">
    <title>H-Smile</title>

    <!-- responsive meta -->
    <meta name="{{ getCachedOption('site_title') }}" content="{{ getCachedOption('site_desc') }}">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- master stylesheet -->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="/frontend/css/responsive.css">
    <!--Color Switcher Mockup-->
    <link rel="stylesheet" href="/frontend/css/color-switcher-design.css">
    <!--Color Themes-->
    <link rel="stylesheet" href="/frontend/css/color-themes/default-theme.css" id="theme-color-file">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/frontend/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="16x16">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&amp ;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@400;500&display=swap" rel="stylesheet">
    @yield('head')
    @stack('css')

</head>
