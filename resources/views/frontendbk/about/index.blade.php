@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<section class="about-area home2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-image-holder wow fadeInLeft animated" data-wow-delay="900ms" style="visibility: visible; animation-delay: 900ms; animation-name: fadeInLeft;">
                    <img src="{{asset('frontend/images/resources/about.jpg')}}" alt="Awesome Image">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="inner-content">
                    <div class="sec-title">
                        <h1>Nhiệm vụ về nha khoa H-Smile của chúng tôi</h1>
                    </div>
                    <div class="about-text-holder">
                        <p>H-Smile được bắt đầu vào năm 1995 như một phòng khám nha khoa tư nhân nhỏ ở Binghamton, NY, Hoa Kỳ. Tìm kiếm dịch vụ chăm sóc nha khoa giá cả phải chăng?</p>
                        <p>Lấy một ví dụ tầm thường, ai trong chúng ta từng thực hiện tập thể dục tốn nhiều công sức, ngoại trừ để có được một số lợi thế từ nó? Nhưng ai có quyền tìm ra lỗi lầm với một người đàn ông chọn tận hưởng một niềm vui không có hậu quả khó chịu, nỗi đau dẫn đến niềm vui ca ngợi những lời dạy của nhà thám hiểm vĩ đại...</p>
                        <div class="author-box fix">
                            <div class="img-box">
                                <img src="{{asset('frontend/images/resources/ceo.png')}}" alt="Awesome Image">
                            </div>
                            <div class="text-box">
                                <h3>Dr. Jerome Sinclair</h3>
                                <span>CEO &amp; Founder</span>
                            </div>
                            <div class="signatire-box">
                                <img src="{{asset('frontend/images/resources/signature.png')}}" alt="Signature">
                            </div>
                        </div>
                        <div class="read-more">
                            <a class="btn-two" href="#"><span class="flaticon-next"></span>Xem thêm về chúng tôi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Start fact counter area-->
<section class="fact-counter-area style2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <ul class="clearfix">
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="300ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-tooth-3"></span>
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="4257" data-speed="5000" data-refresh-interval="50">4257</span>
                            </h1>
                            <div class="title">
                                <h3>Các dự án đã hoàn thành</h3>
                            </div>
                            <div class="text">
                                <p>Cũng không có ai yêu hoặc theo đuổi hoặc mong muốn có được.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="600ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-doctor-1"></span>
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="18" data-speed="5000" data-refresh-interval="50">18</span>
                            </h1>
                            <div class="title">
                                <h3>Nha sĩ chuyên nghiệp</h3>
                            </div>
                            <div class="text">
                                <p>Mong muốn có được nỗi đau của chính nó, bởi vì tất cả các hoàn cảnh xảy ra.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="900ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-hospital"></span>
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="6" data-speed="5000" data-refresh-interval="50">6</span>
                            </h1>
                            <div class="title">
                                <h3>Chi nhánh trong thành phố</h3>
                            </div>
                            <div class="text">
                                <p>Biết theo đuổi niềm vui một cách hợp lý rằng tất cả các hậu quả phục vụ.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End fact counter area-->

<!--Start mission vision area-->
<section class="mission-vision-area sec-pd2" style="background-image: url({{asset('images/parallax-background/mission-vision-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Nhiệm vụ của chúng tôi
                    </h6>
                    <p>Cung cấp dịch vụ chăm sóc nha khoa xuất sắc, tận tình, chu đáo với cam kết trung thực, liêm chính và chất lượng...</p>
                    <a class="btn-two" href="#">Đọc thêm</a>
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Tầm nhìn của chúng tôi</h6>
                    <p>Được công nhận rộng rãi là một trong những dịch vụ chăm sóc nha khoa hàng đầu và được ưa thích nhất thế giới...</p>
                    <a class="btn-two" href="#">Đọc thêm</a>
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Triết học</h6>
                    <p>Chúng tôi đóng một vai trò tích cực trong cộng đồng của chúng tôi để làm cho nó abetter nơi để sống và làm việc ...</p>
                    <a class="btn-two" href="#">Đọc thêm</a>
                </div>
            </div>
            <!--End single mission vision box-->
        </div>
    </div>
</section>
<!--End mission vision area-->

<!--Start Choose area-->
<section class="choose-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Tại sao chọn chúng tôi</h3>
            <h1>Ưu điểm & Công nghệ</h1>
            <p>Răng của bạn đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn của bạn, nhưng đóng khung khuôn mặt của bạn. Bất kỳ răng bị mất có thể có tác động lớn đến chất lượng cuộc sống của bạn.</p>
        </div>
        <div class="row">
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="300ms">
                    <div class="count">
                        <span>01</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-petri-dish"></span>
                    </div>
                    <h3>Phòng thí nghiệm Cad Cam tiên tiến</h3>
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="600ms">
                    <div class="count">
                        <span>02</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-doctor"></span>
                    </div>
                    <h3>Bác sĩ chăm sóc và higly qulified</h3>
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="900ms">
                    <div class="count">
                        <span>03</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-dentist-2"></span>
                    </div>
                    <h3>Sử dụng thiết bị tốt nhất của phòng khám</h3>
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1200ms">
                    <div class="count">
                        <span>04</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-ui"></span>
                    </div>
                    <h3>Cơ sở hội hẹn trực tuyến</h3>
                </div>
            </div>
            <!--End single choose box-->
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="choose-carousel owl-carousel owl-theme" style="background-image: url(images/parallax-background/choose-carousel-bg.jpg')}});">
                    <div class="single-choose-item text-center">
                        <h6>Công nghệ</h6>
                        <h3>Cad - Nha khoa Cam</h3>
                        <p>Cad - Cams là những cải tiến nha khoa mới nhất mang lại độ chính xác ở mức micron trong sự phù hợp của bộ phận giả nha khoa. </p>
                    </div>
                    <div class="single-choose-item text-center">
                        <h6>Công nghệ</h6>
                        <h3>Cad - Nha khoa Cam</h3>
                        <p>Cad - Cams là những cải tiến nha khoa mới nhất mang lại độ chính xác ở mức micron trong sự phù hợp của bộ phận giả nha khoa. </p>
                    </div>
                    <div class="single-choose-item text-center">
                        <h6>Công nghệ</h6>
                        <h3>Cad - Nha khoa Cam</h3>
                        <p>Cad - Cams là những cải tiến nha khoa mới nhất mang lại độ chính xác ở mức micron trong sự phù hợp của bộ phận giả nha khoa. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="video-holder-box" style="background-image: url(images/parallax-background/video-holder-bg.jpg')}});">
                    <div class="icon-holder">
                        <div class="icon">
                            <div class="inner">
                                <a class="html5lightbox" title="Dento Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                                    <span class="flaticon-multimedia"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Choose area-->

<!--Start team area-->
<section class="team-area gray-bg">
    <div class="container">
        <div class="sec-title text-center">
            <h3>Nha sĩ chuyên nghiệp</h3>
            <h1>Đội ngũ có trình độ cao</h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="team-carousel owl-carousel owl-theme">

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/1.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Daryl Cornelius</h3>
                                <span>Bác sĩ cấy ghép</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/2.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Eugene Renolds</h3>
                                <span>Nha chu</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/3.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Bonnie Alberta</h3>
                                <span>Bác sĩ chỉnh nha</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/1.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Daryl Cornelius</h3>
                                <span>Bác sĩ cấy ghép</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/2.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Eugene Renolds</h3>
                                <span>Nha chu</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/3.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Bonnie Alberta</h3>
                                <span>Bác sĩ chỉnh nha</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/1.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Daryl Cornelius</h3>
                                <span>Bác sĩ cấy ghép</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/2.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Eugene Renolds</h3>
                                <span>Nha chu</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="{{asset('frontend/images/team/3.jpg')}}" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Tiến sĩ Bonnie Alberta</h3>
                                <span>Bác sĩ chỉnh nha</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Biết thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->

                </div>
            </div>
        </div>
    </div>
</section>
<!--End team area-->

@endsection
