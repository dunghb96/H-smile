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
                    <h1>Tạo lịch hẹn</h1>
                    <p>Tại đây, bạn có thể yêu cầu các bác sĩ có thời gian sẵn sàng và bạn có thể có được thời gian đến
                        bệnh viện thăm khám hoàn hảo.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="appointment-form-left">
                    <form name="appointment-form" action="{{ route('hsmile.booking') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Dịch vụ</h5>
                                    </div>
                                    <div class="input-box">
                                        <select class="selectmenu select2" name="service" id="service" onchange="changeSV()">
                                            <option value="" selected="selected">Chọn dịch vụ</option>
                                            @foreach ($services as $service)
                                            <option value="{{ $service->id }}">
                                                {{ $service->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Bác sĩ</h5>
                                    </div>
                                    <div class="input-box">
                                        <select class="selectmenu" name="doctor" id="doctor">
                                            <!-- <option value="" selected="selected">Chọn bác sĩ</option> -->
                                            <!-- @foreach ($doctors as $doctor) <option value="{{ $doctor->id }}">
                                                    {{ $doctor->name }}
                                                </option> @endforeach -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Ngày</h5>
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="date_at" placeholder="Date" id="my_date_picker" autocomplete="off">
                                        <div class="icon-box">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="single-box">
                                    <div class="title ca">
                                        <h5>Ca</h5>
                                    </div>
                                    <div class="input-box">
                                        <select class="selectmenu" name="shift" id="shift">
                                            <!-- <option value="" selected="selected">Chọn bác sĩ</option> -->
                                            <option value="1" selected="selected">Ca sáng</option>
                                            <option value="2" selected="selected">Ca chiều</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <!-- <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="single-box">
                                        <div class="title">
                                            <h5>Thời gian</h5>
                                        </div>
                                        <div class="input-box">
                                            <input type="hidden" name="time_at" placeholder="Date" id="time_at">
                                            <div class="available-time">
                                                <ul id="time">
                                                    <li class="active">08:00</li>
                                                    <li>10:00</li>
                                                    <li>11:00</li>
                                                    <li>14:00</li>
                                                    <li>15:00</li>
                                                    <li>16:00</li>
                                                    <li>17:00</li>
                                                    <li>18:00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Thông tin</h5>
                                    </div>
                                    <div class="input-box">

                                        <div class="row">
                                            <div class="col-xl-8">
                                                <input type="text" name="name" value="" placeholder="Họ và tên" required="">
                                            </div>
                                            <div class="col-xl-4">
                                                <input type="text" name="age" value="" placeholder="Tuổi">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <input type="text" name="phone_number" value="" placeholder="Số điện thoại" required="">
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="email" value="" placeholder="Email" required="">
                                            </div>
                                        </div>

                                        <!-- <div class="row" style="margin-bottom: 20px;">
                                                <div class="col-xl-12">
                                                    <select class="selectmenu select2" name="service">
                                                        <option value="" selected="selected">Chọn dịch vụ</option>
                                                        @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">
                                                            {{ $service->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> -->

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <textarea name="description" placeholder="Mô tả tình trạng"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Gửi</button>
                                                    <a class="btn-one" href="{{ route('hsmile.history') }}">Tra cứu
                                                        lịch sử</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="row" style="margin-top: 40px">
            <div class="col-md-12">
                <div class="sec-title max-width text-center">
                    <h1>Xem lịch sử khám của bạn</h1>
                    <p>Tại đây, bạn có thể xem lại lịch sử khám của bạn bằng cách nhập số điện thoại đã đăng ký đặt lịch và chọn nút tìm kiếm.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="appointment-form-left">
                    <form id="search-form" action="{{ route('hsmile.search') }}" method="get" autocomplete="off">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="input-box">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <input type="text" name="phone" value="{{ $phone ?? '' }}" placeholder="Nhập số điện thoại của bạn">
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Tra cứu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div> -->
    </div>
</div>
<!--End Appointment area -->
@endsection

@push('js')
<script src="/frontend/assets/js/appointment.js"></script>
{{-- <script src="{{ asset('user_asset/js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/localization/messages_ja.min.js') }}"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script> --}}
<script>
    $(document).ready(function() {

        $(function() {
            $( "#my_date_picker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                dayNamesMin: [ "CN", "2", "3", "4", "5", "6", "7" ],
                monthNames: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
                minDate: 0
            });
        });
    })
</script>

{{-- <script>
    (function($) {
        var beenSubmitted = false;
        $('#contact_form').validate({
            rules: {
                service: {
                    required: true,
                },
                doctor: {
                    required: true,
                },
                date_at: {
                    required: true,
                },
                shift: {
                    required: true,
                },
                name: {
                    required: true,
                    noSpace: true,
                },
                email: {
                    required: true,
                    noSpace: true,
                    email: true
                },
                phone_number: {
                    required: true,
                    noSpace: true,
                    digits: true
                },
            },
            messages: {
                name: {
                    required: "Hãy nhập tên đẩy đủ",
                    noSpace:  "không được gửi khoảng trống",
                },
                email: {
                    required: "Hãy nhập email",
                    noSpace:  "không được gửi khoảng trống",
                    email: "không đúng định dạng email"
                },
                phone_number: {
                    required: "Hãy nhập số điện thoại",
                    noSpace: "Không được gửi khoảng trống",
                    digits: "Hãy nhập số",
                },
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                if (element.closest('.show-error').length > 0) {
                    element.closest('.show-error').find('.contact_form').after(error);
                } else {
                    error.insertAfter(element); // default error placement.
                }
            },

            submitHandler: function(form) {
                if (!beenSubmitted) {
                    beenSubmitted = true;
                    sendTransactionMessage();
                }
            },
        });
        $.validator.addMethod("noSpace", function(value, element) {
            return value == '' || value.trim().length != 0;
        }, "");
    })(jQuery)
</script> --}}

@endpush


