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
    <title>H-Smile - Medicine Print</title>
    <link rel="apple-touch-icon" href="/layout/favicon.png">
    <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/frontend/images/favicon/favicon40x40.png" sizes="16x16">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/backend/app-assets/images/ico/favicon.ico"> -->
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
        <div class="content-wrapper container-xxl p-0">
            
            <div class="content-body">
                <div class="row">
                    <div class="col-10">
                        <div class="card-body invoice-padding pb-0">
                            <!-- Header starts -->
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                <div>
                                    <div class="logo-wrapper">
                                        <img width="50%" src="{{ asset('frontend/images/resources/logo.png') }}" />
                                        <br>
                                    </div>
                                    <p class="card-text mb-25 mt-4"><span class="font-weight-bold">Tên khách hàng:</span> <span id="customer_name"> {{ $prescription_use->examinationSchedule->patient->full_name }} </span></p>
                                    <p class="card-text mb-25"><span class="font-weight-bold">Địa chỉ:</span> <span id="customer_address">{{ $prescription_use->examinationSchedule->patient->address }}</span></p>
                                    <p class="card-text mb-25"><span class="font-weight-bold">Số điện thoại:</span> <span id="customer_phone">{{ $prescription_use->examinationSchedule->patient->phone_number }}</span></p>
                                    <p class="card-text mb-0"><span class="font-weight-bold">Email:</span> <span id="customer_email">{{ $prescription_use->examinationSchedule->patient->email }}</span></p>
                                </div>
                                <div class="mt-md-0 mt-2">
                                    <h4 class="invoice-title">
                                        Đơn thuốc #000{{ $prescription_use->schedule_id }}
                                        <span class="invoice-number" id="order_id"></span>
                                    </h4>
                                    <div class="invoice-date-wrapper mt-4">
                                        @php
                                        use Carbon\Carbon;
                                        @endphp
                                        <p class="invoice-date-title"><span class="font-weight-bold">Ngày tạo:</span> {{ Carbon::parse($prescription_use->created_at)->format('d/m/Y H:i:s') }}</p>
                                        <p class="invoice-date" id="create_at"></p>
                                    </div>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"><span class="font-weight-bold">Người tạo:</span> {{ $prescription_use->examinationSchedule->doctors->name }}</p>
                                        <p class="invoice-date" id="order_status"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Header ends -->
                        </div>
                    </div>

                </div><br><br>
                <section>
                    <div class="row">
                        <div class="col-12">
                            @if (isset($medicine))
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên thuốc</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thời gian và liều lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicine as $key => $value)
                                        <tr>
                                            <td>{{$value}}</td>
                                            <td>{{$quantity[$key]}}</td>
                                            <td>{{$detail[$key]}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row mt-2">
                                    <div class="col-10">
                                        <h5 style="text-decoration-line: underline;">Ghi chú: </h5>
                                        <p>{{ $prescription_use->note }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!--/ Row grouping -->
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
    <script src="/backend/assets/js/in-medicine.js"></script>
</body>
<!-- END: Body-->

</html>