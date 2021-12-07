@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start Contact info map area-->
<section class="contact-info-map-area">
    <div class="container">
    <div class="section-title">
            <h2>Liên Hệ</h2>
            <p>Chất lượng cuộc sống ngày càng tăng cao dẫn đến nhu cầu khám chữa và chăm sóc răng miệng
            cũng được chú trọng hơn. Là cơ sở đi đầu trong việc cung cấp những dịch vụ khám chữa
            răng hàm mặt và chỉnh nha chất lượng cao, H-Smile được khách hàng tín nhiệm
            bởi đội ngũ bác sĩ chuyên môn cao và cơ sở vật chất hiện đại đạt chuẩn quốc tế</p>
                        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-info-map">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="contact-info-left">
                                <div class="state-select-box2">
                                    <div class="state-content">
                                        <div class="state" id="value1">
                                            <ul>
                                                <li>
                                                    <div class="text">
                                                        <h5>Địa chỉ</h5>
                                                        <p>Số 1 Ngô Văn Sở, Trần Hưng Đạo, Hoàn Kiếm, Hà Nội</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Phone</h5>
                                                        <p>+84 988 077 68</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="text">
                                                        <h5>Email</h5>
                                                        <p>hsmile@gmail.com</p>
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
                            <iframe style="border:0; width: 100%; height: 350px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.307443384207!2d105.84752411437815!3d21.02038099344149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab928ae4efdb%3A0xdc9feb22c4e3ecce!2zMSBOZ8O0IFbEg24gU-G7nywgVHLhuqduIEjGsG5nIMSQ4bqhbywgSG_DoG4gS2nhur9tLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1636623294768!5m2!1svi!2s"
                            frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="contact-title">
                        <h2>Gửi tin nhắn của bạn cho chúng tôi</h2>
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
