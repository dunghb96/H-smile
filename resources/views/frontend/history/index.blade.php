

@php
    use App\Models\Appointment;
@endphp
@extends('frontend.layouts.app')

@section('main-content')

<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Lịch sử khám</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="{{ route('hsmile.home') }}">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Lịch sử khám</li>
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
                    <h1>Xem lịch sử khám của bạn</h1>
                    <p>Tại đây, bạn có thể xem lại lịch sử khám của bạn bằng cách nhập số điện thoại đã đăng ký đặt lịch và chọn nút tìm kiếm.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8" style="margin: 0 auto;">
                <div class="appointment-form-left">
                    <form id="search-form" action="{{ route('hsmile.search') }}" method="get" autocomplete="off">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="input-box">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <input type="text" name="phone" value="{{ $phone ?? '' }}" placeholder="Nhập số điện thoại của bạn" >
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
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="col-12">
                @if (isset($customer))
                    <h1 style="margin-left: 20px; color: #32B6A1"><span style="font-size: medium"> khách hàng :</span> {{ $customer->full_name }}</h1>
                @else
                <center><h1 style="margin-left: 20px; color: #32B6A1">Bạn chưa đặt lịch khám</h1></center>
                @endif
            </div>
            @if (isset($list))
                <table class="table table-bordered" style="text-align: center">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Ngày khám</th>
                        <th>Ca khám</th>
                        <th>Nha sĩ</th>
                        <th>Dịch vụ</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->date_at }}</td>
                                <td>{{ $row->time_at }}</td>
                                <td>{{ $row->doctor->name }}</td>
                                <td>{{ $row->service->name }}</td>
                                <td>{{ Appointment::STATUS[$row->status] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('user_asset/js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/localization/messages_ja.min.js') }}"></script>

<script>
(function($) {
    var beenSubmitted = false;
    $('#search-form').validate({
        rules: {
            phone: {
                required: true,
                noSpace: true,
                digits: true,
            },
        },
        messages: {

        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.closest('.show-error').length > 0) {
                element.closest('.show-error').find('.search-form').after(error);
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
</script>
@endsection
@section('head')
    <style>
        .invalid-feedback {
            margin-top: -20px;
            margin-bottom: 20px;
        }
    </style>
@endsection
