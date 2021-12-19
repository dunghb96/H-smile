@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                       <h2>Liên hệ</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->

<!--Start Contact info map area-->
<section class="contact-info-map-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h1>Hãy đến với H-Smile để sở hữu nụ cười đẹp</h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-info-map">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="contact-info-left">
                                <div class="contact-title">
                                    <h2>Đến với nha khoa thẩm mỹ H-Smile </h2>
                                    <p>Trải nghiệm sự khác biệt đến từ đội ngũ chuyên nghiệp.</p>
                                </div>
                                <div class="state-select-box2">
                                    <div class="state-content">

                                        <div class="state" id="value1">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>{{ getCachedOption('address') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>{{ getCachedOption('hotline') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>{{ getCachedOption('email') }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="google-map-box">
                            <iframe style="border:0; width: 100%; height: 350px;"
                            src="{{ getCachedOption('map') }}"
                            frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact info map area-->

<!--Start contact form area-->
<section class="contact-form-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="contact-title">
                        <h2>Gửi tin nhắn của bạn cho chúng tôi</h2>
                        <p>Đừng ngại, Hãy gửi tin nhắn hoặc thắc mắc của bạn qua biểu mẫu dưới đây, nhóm chuyên gia của chúng tôi sẽ giúp bạn CÀNG SỚM CÀNG TỐT.</p>
                    </div>
                    <form id="contact_form" name="contact_form" class="default-form" action="{{ route('hsmile.contact.post') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" name="name" value="" placeholder="Tên của bạn*" required="">
                                </div>
                                <div class="input-box">
                                    <input type="email" name="email" value="" placeholder="Mail của bạn*" required="">
                                </div>
                                <div class="input-box">
                                    <input type="text" name="phone_number" value="" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <textarea name="message" placeholder="Lời nhắn" required=""></textarea>
                                </div>
                                <div class="button-box">
                                    <button class="btn-one" type="submit" data-loading-text="Please wait...">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End contact form area-->
@endsection

@section('script')
    <script src="{{ asset('user_asset/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('user_asset/js/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('user_asset/js/jquery-validation/localization/messages_ja.min.js') }}"></script>
    <script>
    (function($) {
        var beenSubmitted = false;
        $('#contact_form').validate({
            rules: {
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
                message: {
                    required: true,
                    noSpace: true,
                    maxlength: 1024,
                }
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
                message: {
                    required: "Hãy nhập lời nhắn của bạn",
                    noSpace: "Không được gửi khoảng trống",
                    maxlength: "Nhập tối đa 1024 ký tự",
                }
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
