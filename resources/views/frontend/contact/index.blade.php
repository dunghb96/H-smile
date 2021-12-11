@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start Contact info map area-->
<section class="contact-info-map-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h1>Chúng tôi ở đây để giúp bạn, đừng ngần ngại.</h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-info-map">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="contact-info-left">
                                <div class="contact-title">
                                    <h2>Gửi tin nhắn của bạn cho chúng tôi</h2>
                                    <p>Đừng ngại ngùng, Gửi tin nhắn của bạn hoặc thông qua hình thức, chuyên gia của chúng tôi sẽ giúp bạn càng sớm càng tốt.</p>
                                </div>
                                <div class="state-select-box2">
                                    <div class="state-content">
                                        <div class="state" id="value1">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>Me Tri Ha, Nam Tu Liem, Ha Noi</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>Phone 1: 0986 523 361<br> Phone 2: 0978 325 491</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>vantruongdz.2001@gmail.com</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="state" id="value2">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>487B Nguyen Đình Chieu, Phuong 2, Quan 3, TP HCM</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>Phone 1: 0986 523 361<br> Phone 2: 0978 325 491</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>vantruongdz.2001@gmail.com</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="state" id="value3">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>36 Đien Bien Phu, TP Nam Đinh.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>Phone 1: 0986 523 361<br> Phone 2: 0978 325 491</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>vantruongdz.2001@gmail.com</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="state" id="value4">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>Ninh Kieu, TP Đa Nang</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>Phone 1: 0986 523 361<br> Phone 2: 0978 325 491.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>vantruongdz.2001@gmail.com</p>
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
                                <div
                                    class="google-map"
                                    id="contact-google-map"
                                    data-map-lat="40.584160"
                                    data-map-lng="-74.415543"
                                    data-icon-path="images/resources/map-marker.png"
                                    data-map-title="Brooklyn, New York, United Kingdom"
                                    data-map-zoom="12"
                                    data-markers='{
                                        "marker-1": [40.584160, -74.415543, "<h4>Head Office</h4><p>44/108 Brooklyn, UK</p>"],
                                        "marker-2": [40.602230, -74.689910, "<h4>Head Office</h4><p>44/108 Brooklyn, UK</p>"],
                                        "marker-3": [35.616959, -87.838852, "<h4>Head Office</h4><p>44/108 Brooklyn, UK</p>"]

                                    }'>
                                </div>
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
                        <p>Gửi tin nhắn của bạn UsDont hãy nhút nhát, Gửi tin nhắn hoặc quiries của bạn thông qua biểu mẫu dưới đây, nhóm chuyên gia của chúng tôi sẽ giúp bạn càng sớm càng tốt.</p>
                    </div>
                    <form id="contact-form" name="contact_form" class="default-form" action="http://st.ourhtmldemo.com/new/Dento/inc/sendmail.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" name="form_name" value="" placeholder="Tên của bạn.*" required="">
                                </div>
                                <div class="input-box">
                                    <input type="email" name="form_email" value="" placeholder="Mail của bạn*" required="">
                                </div>
                                <div class="input-box">
                                    <input type="text" name="form_phone" value="" placeholder="Điện thoại">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <textarea name="form_message" placeholder="Thư của bạn..." required=""></textarea>
                                </div>
                                <div class="button-box">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="btn-one" type="submit" data-loading-text="Please wait...">Gửi thư của bạn</button>
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
