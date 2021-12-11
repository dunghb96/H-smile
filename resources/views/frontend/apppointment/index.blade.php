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
                    <p>Tại đây, bạn có thể yêu cầu các bác sĩ có thời gian sẵn sàng và bạn có thể có được thời gian đến bệnh viện thăm khám hoàn hảo.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="appointment-form-left">
                    <form name="appointment-form" action="{{ route('hsmile.booking') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Bác sĩ</h5>
                                    </div>
                                    <div class="input-box">
                                        <select class="selectmenu select2" name="doctor">
                                            <option value="" selected="selected">Chọn bác sĩ</option>
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->name }}
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
                                        <h5>Ngày</h5>
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="date_at" placeholder="Date" id="datepicker">
                                        <div class="icon-box">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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

                                        <div class="row" style="margin-bottom: 20px;">
                                            <div class="col-xl-12">
                                                <select class="selectmenu select2" name="service">
                                                    <option value="" selected="selected">Chọn dịch vụ</option>
                                                    @foreach($services as $service)
                                                    <option value="{{ $service->id }}">
                                                        {{ $service->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <textarea name="description" placeholder="Mô tả bệnh tình"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Gửi</button>
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
            <div class="col-xl-4 col-lg-6 col-md-9">
                <div class="appointment-right">
                    <form name="appointment-right" action="#" method="post">
                        <div class="confirm-booking">
                            <h3>Thông tin lịch hẹn</h3>
                            <ul>
                                <li><span>Họ tên</span><b>:</b> Nguyễn Văn Hùng</li>
                                <li><span>Dịch vụ</span><b>:</b> Niềng răng</li>
                                <li><span>Bác sĩ</span><b>:</b> Trần Văn A</li>
                                <li><span>Ngày, giờ</span><b>:</b> Nov 22nd, 2018. 11.30am</li>
                                <li><span>Giá</span><b>:</b> $65.00</li>
                            </ul>
                        </div>
                        <!-- <div class="button-box">
                            <button class="btn-one" type="submit">Xác nhận</button>
                            <button class="btn-one" type="submit">Hủy</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Appointment area -->
@endsection

@push('js')
<script src="/frontend/assets/js/apppointment.js"></script>
@endpush