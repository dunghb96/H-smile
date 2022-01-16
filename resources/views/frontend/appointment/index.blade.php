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
                    <p>Tại đây, bạn có thể yêu cầu các bác sĩ có thời gian sẵn sàng và bạn có thể có được thời gian
                        đến
                        bệnh viện thăm khám hoàn hảo.</p>
                </div>
            </div>
        </div>
        @if(session('alert') == "Đặt lịch thành công! Hãy kiểm tra email để biết chi tiết thông tin đặt lịch")
        <section class='alert alert-success'>{{session('alert')}}</section>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="appointment-form-left">
                    <form id="form-send" name="appointment-form" action="{{ route('hsmile.booking') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <!-- <div class="col-xl-12 col-lg-12"> -->
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Dịch vụ</h5>
                                    </div>
                                    <div class="col-10">
                                        <select class=" js-example-basic-multiple" size="2" name="service[]" id="service" multiple="multiple" required>
                                            <!-- <option value="" selected="selected">Chọn dịch vụ</option> -->
                                            @foreach ($services as $service)
                                            <option value="{{ $service->id }}">
                                                {{ $service->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="single-box">
                                        <div class="title">
                                            <h5>Nha sĩ</h5>
                                        </div>
                                        <div class="input-box">
                                            <select class="selectmenu select2" name="service[]" id="service"
                                                    multiple="multiple" required>
                                                <option value="" selected="selected">Chọn nha sĩ</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">
                                                        {{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Ngày</h5>
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="date_at" placeholder="Date" id="my_date_picker" autocomplete="off" required>
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
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Thông tin</h5>
                                    </div>
                                    <div class="input-box">
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <input type="text" name="name" value="" placeholder="Họ và Tên" required>
                                            </div>
                                            <!-- <div class="col-xl-4 col-lg-12">
                                                <div class="single-box">
                                                    <div class="title ca">
                                                        <h5>Tuổi</h5>
                                                    </div>
                                                    <div class="input-box">
                                                        <input type="text" name="age" value="" placeholder="Tuổi"
                                                                required>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <input type="text" name="phone_number" id="phone_number" value="" placeholder="Số điện thoại" required>
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="email" value="" placeholder="Email">
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-xl-6">
                                                <input type="text" name="address" value="" placeholder="Địa chỉ" required>
                                            </div>
                                            <div class="col-xl-6" style="margin-top: 15px;">
                                                <label for="gender"><span style="color: black">Giới tính :</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" value="0" required> Nam &nbsp;
                                                    &nbsp;
                                                    <input type="radio" name="gender" value="1" required> Nữ &nbsp;
                                                    &nbsp;
                                                    <input type="radio" name="gender" value="2" required> Khác
                                                    &nbsp; &nbsp;
                                                </label>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <textarea name="note" placeholder="Mô tả tình trạng"></textarea>
                                            </div>
                                        </div>

                                       <div class="row">
                                            <div class="col-xl-8">
                                                <input type="text" name="nhapOtp" id="nhapOtp" placeholder="Nhập OTP" onkeyup="showBtnSubmit()">
                                                @error('nhapOtp')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                            <div class="col-xl-4">
                                                <button type="button" class="btn btn-secondary p-3" id="btnOtp" onclick="layOTP()">Nhận OTP
                                                </button>
                                            </div>
                                            <div id="errorOTP" class="col-xl-12" style="display: none;">
                                                <div id="errorOTPMessage" class="alert alert-danger" role="alert">
                                                </div>
                                            </div>
                                        </div>
                                        @if(session('alert') == "Sai mã OTP")
                                        <section class='alert alert-danger'>{{session('alert')}}</section>
                                        @endif


{{--                                        <section class='alert alert-danger'>{{Cookie::get('patient_code')}}--}}
{{--                                        </section>--}}

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one btn-secondary" type="submit" id="sendAppoinment" disabled>Gửi</button>
                                                    <a class="btn-one" href="{{ route('hsmile.history') }}">Tra cứu lịch sử</a>
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
    </div>
</div>
<!--End Appointment area -->
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection--multiple {
        width: 620px;
        height: 53px;
    }
    .select2-dropdown--below, .select2-dropdown--above {
        width: 620px !important;
    }

    .select2-search__field {
        height: 20px !important;
        /* overflow: auto !important; */
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/frontend/assets/js/appointment.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
            $("#my_date_picker").datepicker({
                dateFormat: 'dd-mm-yy',
                dayNamesMin: ["CN", "2", "3", "4", "5", "6", "7"],
                monthNames: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                minDate: 0
            });
        });
    })



    function showBtnSubmit(){
        $("#sendAppoinment").prop("disabled", false);
    }

    function hideBtn() {
        var btn = document.querySelector("#btnOtp");
        var time = 20;
        timer = setInterval(function() {
            if (time === 0) {
                btn.disabled = false;
                btn.innerHTML = "Gửi lại OTP";
                time = 20;
                clearInterval(timer); //Stop timing
            } else {
                btn.disabled = true;
                btn.innerHTML = "Gửi lại sau " + time + "(s)";
                time--;
            }
        }, 1000)
    }

    function layOTP() {
        if (document.querySelector("#phone_number").value.length <= 0) {
            document.querySelector("#errorOTP").style.display = "block";
            document.querySelector("#errorOTPMessage").innerHTML = "Nhập số điện thoại";
        } else {
            document.querySelector("#errorOTP").style.display = "none";

            var info = {};
            var info = new FormData($("#form-send")[0]);
            $.ajax({
                type: "post",
                dataType: "json",
                data: info,
                url: "/send-sms-notification",
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        // notyfi_success(data.msg);
                    }
                }

            })
            hideBtn();
        }


    }
</script>
@endpush
