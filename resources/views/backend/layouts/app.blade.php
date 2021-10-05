<!DOCTYPE html>
<html lang="en">

<!-- Head -->
@includeIf('backend.layouts.head')
<!-- Head -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        @includeIf('backend.layouts.header')
        <!-- Header -->

        <!-- Sidebar -->
        @includeIf('backend.layouts.aside')
        <!-- Sidebar -->

        <!-- Content -->
        @yield('content')
        <!-- Content -->

        <!-- Footer -->
        @includeIf('backend.layouts.footer')
        <!-- Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/backend/dist/js/adminlte.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="/backend/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    
    @stack('js')

    <script src="/backend/dist/js/my-script.js"></script>
    
</body>

</html>