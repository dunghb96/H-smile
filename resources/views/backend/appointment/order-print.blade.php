<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>H-Smile - Order Print</title>
    <link rel="apple-touch-icon" href="/layout/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/backend/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/app-invoice-print.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style.css">
    <!-- END: Custom CSS-->

    <script src="/backend/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/backend/assets/js/lib.js"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                                <img width="50%" src="{{ asset('frontend/images/resources/logo.png') }}" />
                            </div>
                            <p class="card-text mb-25"><span class="font-weight-bold">Tên khách hàng:</span> <span id="customer_name"></span></p>
                            <p class="card-text mb-25"><span class="font-weight-bold">Địa chỉ:</span> <span id="customer_address"></span></p>
                            <p class="card-text mb-25"><span class="font-weight-bold">Số điện thoại:</span> <span id="customer_phone"></span></p>
                            <p class="card-text mb-0"><span class="font-weight-bold">Email:</span> <span id="customer_email"></span></p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="font-weight-bold text-right mb-1">Đơn hàng <span id="order_id"></span></h4>
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">Ngày tạo:</p>
                                <p class="invoice-date" id="create_at"></p>
                            </div>
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">Trạng thái:</p>
                                <p class="invoice-date" id="order_status"></p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">STT</th>
                                    <th class="py-1">Dịch vụ</th>
                                    <th class="py-1">Thời lượng</th>
                                    <th class="py-1">Chi phí</th>
                                </tr>
                            </thead>
                            <tbody id="order-detail">

                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0">
                                <span class="font-weight-bold">Người thanh toán:</span> <span class="ml-75" id="staff_name"></span>
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Tổng cộng:</p>
                                    <p class="invoice-total-amount" id="total_price"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span>Cảm ơn bạn đã tin dùng dịch vụ của chúng tôi!</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <!-- BEGIN: Theme JS-->
    <script src="/backend/app-assets/js/core/app-menu.js"></script>
    <script src="/backend/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
    <script src="/backend/app-assets/vendors/js/extensions/toastr.min.js"></script>
    

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script src="/backend/assets/js/order-print.js"></script>
</body>
<!-- END: Body-->

</html>