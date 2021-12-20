@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                       <h2>Giới thiệu</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Giới thiệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->

<!--Start About Area-->
<section class="about-area home2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-image-holder wow fadeInLeft" data-wow-delay="900ms">
                    <img src="/frontend/images/resources/about.jpg" alt="Awesome Image">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="inner-content">
                    <div class="sec-title">
                        <h3>Về chúng tôi</h3>
                        <h1>Sứ mệnh của H-Smile</h1>
                    </div>
                    <div class="about-text-holder">
                        <p>Nha khoa thẩm mỹ quốc tế H-Smile được thành lập với tôn chỉ giúp đỡ khách hàng thay đổi cuộc sống thông
                            qua nụ cười mới mang lại hạnh phúc và sự thành công. H-Smile quan tâm và chú trọng đến vấn đề sức khỏe và tính
                             thẩm mỹ cao trong dịch vụ nha khoa. Chúng tôi cam kết tư vấn thật tâm, hiệu quả và cung cấp dịch vụ chất lượng
                              hoàn hảo đem lại sự trải nghiệm tuyệt vời nhất cho khách hàng trên mỗi hệ thống của nha khoa H-Smile.</p>
                        <p>H-Smile hiểu rằng, mỗi khách hàng đến với chúng tôi luôn có 1 câu chuyện riêng, một nhu cầu và mong muốn riêng.</p>
                        <p>Thấu hiểu được tâm lý đó H-Smile lựa chọn giải pháp tối ưu cho khách hàng trong quá trình tư vấn nha khoa thẩm mỹ.
                            Đặc biệt, chúng tôi tự hào rằng các kỹ thuật thẩm mỹ nha của H-Smile được cập nhật thường xuyên, là công nghệ
                            tiên tiến và mới nhất trên thế giời, bảo toàn răng gốc tối đa, an toàn, bêng vững theo thời gian. Hữu xạ tự
                            nhiên hương đó cũng là lý do vì sao H-Smile lại có tỷ lệ giới thiệu khách hàng từ khách hàng cũ cao nhất
                            trong giới nha khoa thẩm mỹ.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Area-->

<!--Start fact counter area-->
<section class="fact-counter-area style2" >
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
                                <span class="timer" data-from="1" data-to="{{ $doneAppoint }}" data-speed="5000" data-refresh-interval="50">{{ $doneAppoint }}</span>
                            </h1>
                            <div class="title">
                                <h3>Đã hoàn thành</h3>
                            </div>
                            <div class="text">
                                <p>Số dự án đã thành công của chúng tôi.</p>
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
                                <span class="timer" data-from="1" data-to="{{ $countDoctor }}" data-speed="5000" data-refresh-interval="50">{{ $countDoctor }}</span>
                            </h1>
                            <div class="title">
                                <h3>Nha sĩ chuyên nghiệp</h3>
                            </div>
                            <div class="text">
                                <p>Kinh nghiệm làm việc mang đến cho khách hàng sự tin tưởng</p>
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
                                <span class="timer" data-from="1" data-to="1" data-speed="5000" data-refresh-interval="50">1</span>
                            </h1>
                            <div class="title">
                                <h3>Cơ Sở</h3>
                            </div>
                            <div class="text">
                                <p>Chúng tôi sẽ mở rộng chi nhánh trong tương lai</p>
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
<section class="mission-vision-area sec-pd2" style="background-image: url(/frontend/images/parallax-background/mission-vision-bg.jpg);">
    <div class="container">
        <div class="row">
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>NHIỆM VỤ CỦA CHÚNG TÔI</h6>
                    <p>Cung cấp dịch vụ chăm sóc răng miệng vượt trội với cam kết trung thực, toàn vẹn & chất lượng ..</p>
                    <a class="btn-two" href="#">Đọc thêm</a>
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>TẦM NHÌN CỦA CHÚNG TÔI</h6>
                    <p>Được công nhận rộng rãi là một trong những dịch vụ chăm sóc răng miệng hàng đầu và được ưa chuộng nhất trên thế giới ...</p>
                    <a class="btn-two" href="#">Đọc thêm</a>
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Triết lý</h6>
                    <p>Chúng tôi đóng một vai trò tích cực trong cộng đồng của mình để biến nó thành nơi sinh sống và làm việc ...</p>
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
            <h3>Tại Sao Chọn Chúng Tôi</h3>
            <h1>Ưu điểm & Công nghệ</h1>
            <p>Răng đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn mà còn giúp tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn.</p>
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
                    <h3>Phòng thí nghiệm tiên tiến</h3>
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
                    <h3>Bác sĩ chăm sóc & được kiểm định cao</h3>
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
                    <h3>Sử dụng các thiết bị tốt nhất trong phòng khám </h3>
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
                    <h3>Đặt hẹn trực tuyến</h3>
                </div>
            </div>
            <!--End single choose box-->
        </div>
    </div>
</section>
<!--End Choose area-->

<!--Start team area-->
<section class="team-area">
    <div class="container" style="margin-top: 100px">
        <div class="sec-title text-center">
            <h3>Nha Sĩ Chuyên Nghiệp</h3>
            <h1>Đội ngũ nha sĩ có trình độ cao</h1>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="team-carousel owl-carousel owl-theme">
                    <!--Start single item member-->
                    @foreach($doctor as $row)
                        <div class="single-team-member">
                            <div class="img-holder">
                                <img src="{{ $row->users->avatar ? $row->users->avatar :'/frontend/images/team/1.jpg' }}" alt="{{ $row->users->avatar ?? '/frontend/images/team/1.jpg' }}">
                                <div class="overlay-style-one"></div>
                                <div class="text-holder text-center">
                                    <h3>{{$row->name}}</h3>
                                    <span>{{ $row->majors }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End team area-->
@endsection
