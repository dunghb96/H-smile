@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Đặt lịch khám</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="{{ route('hsmile.home') }}">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Đặt lịch khám</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start Appointment area -->
<div class="appointment-area2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-title max-width text-center">
                    <h1>THANH TOÁN THÀNH CÔNG</h1>
                    <p>Tại đây, bạn có thể thanh toán hóa đơn qua hình thức ngân hàng Vietcombank, MBbank ...</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12">
                <div class="appointment-form-left">
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                          rel="stylesheet"/>

                    <div class="page-content container">
                        <div class="page-header text-blue-d2">
                            <h1 class="page-title text-secondary-d1">
                                Hóa đơn
                                <small class="page-info">
                                    <i class="fa fa-angle-double-right text-80"></i>

                                </small>
                            </h1>

                            <div class="page-tools">
                                <div class="action-buttons">
                                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                        Print
                                    </a>
                                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                        Export
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="thankyou-page">
                            <div class="_header">
                                <div class="logo">
                                    <img src="https://codexcourier.com/images/banner-logo.png" alt="">
                                </div>
                                <h1>Thank You!</h1>
                            </div>
                            <div class="_body">
                                <div class="_box">
                                    <h2>
                                        <strong>Please check your email</strong> for further instructions on how to complete your account setup.
                                    </h2>
                                    <p>
                                        Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.
                                    </p>
                                </div>
                            </div>
                            <div class="_footer">
                                <p>Having trouble? <a href="">Contact us</a> </p>
                                <a class="btn" href="">Back to homepage</a>
                            </div>
                        </div>

                    </div>



                </div>


            </div>
        </div>
    </div>
</div>
<!--End Appointment area -->
@endsection
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style>

    </style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--
<script src="/frontend/assets/js/appointment.js"></script> --}}

<script>


</script>

@endpush


