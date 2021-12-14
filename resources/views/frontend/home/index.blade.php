@extends('frontend.layouts.app')

@section('main-content')
<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_two_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_two" data-version="5.4.1">
            <ul>
                @foreach ($slide as $image)
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1691" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{ asset($image->image) }}" data-title="Slide Title" data-transition="parallaxvertical">

                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset($image->image) }}">

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['700','700','700','460']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['-130','-140','-125','-110']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                        <div class="slide-content text-center">
                            <div class="big-title">
                                {{ $image->title }}
                            </div>
                        </div>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="normal" data-width="['700','700','700','460']" data-hoffset="['15','15','15','15']" data-voffset="['20','30','25','10']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                        <div class="slide-content text-center">
                            <div class="text">{!! $image->description !!}</div>
                        </div>
                    </div>
                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['700','700','700','460']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['110','120','120','90']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->

<!--Start Welcome area-->
<section class="welcome-area sec-pd1">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Chào mừng đến với H-Smile</h3>
            <h1>Hãy thiết kế nụ cười của bạn</h1>
            <p>Răng đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn mà còn giúp tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn.</p>
        </div>
        <div class="row">
            <!--Start Single Welcome Box-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-welcome-box text-center">
                    <div class="icon-holder">
                        <img src="/frontend/images/icon/icon-1.png" alt="Icon">
                    </div>
                    <div class="text-holder">
                        <h3>Nha khoa nâng cao</h3>
                        <p>Tố cáo niềm vui & ca ngợi nỗi đau đã ra đời và chúng tôi sẽ cung cấp cho bạn một tài khoản hoàn chỉnh của hệ thống.</p>
                        <a class="btn-one" href="#">Dịch vụ</a>
                    </div>
                </div>
            </div>
            <!--End Single Welcome Box-->
            <!--Start Single Welcome Box-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-welcome-box text-center">
                    <div class="icon-holder">
                        <img src="/frontend/images/icon/icon-2.png" alt="Icon">
                    </div>
                    <div class="text-holder">
                        <h3>Thiết bị hiện đại</h3>
                        <p>Mang lại cho bạn những trải nghiệm hoàn toàn mới khi điều trị và làm đẹp răng</p>
                        <a class="btn-one" href="#">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!--End Single Welcome Box-->
            <!--Start Single Welcome Box-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-welcome-box text-center">
                    <div class="icon-holder">
                        <img src="/frontend/images/icon/icon-3.png" alt="Icon">
                    </div>
                    <div class="text-holder">
                        <h3>Phòng khám tiện nghi</h3>
                        <p>phòng khám của chúng tôi luôn sạch đẹp và đáp ứng tốt các nhu cầu của quý khách</p>
                        <a class="btn-one" href="#">Xem giá</a>
                    </div>
                </div>
            </div>
            <!--End Single Welcome Box-->
        </div>
    </div>
</section>
<!--End Welcome area-->

<!--Start fact counter area-->
<section class="fact-counter-area" style="background-image: url(/frontend/images/parallax-background/fact-counter-bg.jpg);">
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
                                <span class="timer" data-from="1" data-to="4257" data-speed="5000" data-refresh-interval="50">4257 ca</span>
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
                                <span class="timer" data-from="1" data-to="18" data-speed="5000" data-refresh-interval="50">18</span>
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
                                <span class="timer" data-from="1" data-to="6" data-speed="5000" data-refresh-interval="50">6</span>
                            </h1>
                            <div class="title">
                                <h3>Chứng chỉ và giải thưởng</h3>
                            </div>
                            <div class="text">
                                <p>Những giá trị mà chũng tôi mang lại được công nhận qua các chứng chỉ và giải thưởng</p>
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

<!--Start About Area-->
<section class="about-area home2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-image-holder">
                    <img src="/frontend/images/resources/about.jpg" alt="Awesome Image">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="inner-content">
                    <div class="sec-title">
                        <h3>Giới thiệu</h3>
                        <h1>Tầm nhìn và sứ mệnh<br> của H-Smile</h1>
                    </div>
                    <div class="about-text-holder">
                        <p>Dento được thành lập vào năm 1995 với tư cách là một phòng khám nha khoa tư nhân nhỏ ở Binghamton, NY, Hoa Kỳ. Tìm kiếm dịch vụ chăm sóc răng miệng giá cả phải chăng?</p>
                        <p>Lấy một ví dụ tầm thường, ai trong chúng ta đã từng thực hiện bài tập thể dục vất vả, ngoại trừ việc đạt được một số lợi thế từ nó? Nhưng ai có quyền nhận lỗi với một người đàn ông chọn cách tận hưởng một niềm vui không có hậu quả khó chịu, niềm vui dẫn đến đau đớn ca ngợi những lời dạy của nhà thám hiểm vĩ đại ...
                        </p>
                        <div class="author-box fix">
                            <div class="img-box">
                                <img src="/frontend/images/resources/ceo.png" alt="Awesome Image">
                            </div>
                            <div class="text-box">
                                <h3>Dr. Jerome Sinclair</h3>
                                <span>CEO & Founder</span>
                            </div>
                            <div class="signatire-box">
                                <img src="/frontend/images/resources/signature.png" alt="Signature">
                            </div>
                        </div>
                        <div class="read-more">
                            <a class="btn-two" href="#"><span class="flaticon-next"></span>More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Area-->

<!--Start services style2 area-->
<section class="services-style1-area spec-page">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Dịch Vụ</h3>
            <h1>Dịch vụ chăm sóc răng miệng</h1>
            <p>Dịch vụ tại H-Smile cung cấp đầy đủ các loại hình dịch vụ nha khoa theo tiêu chuẩn quốc tế.</p>
        </div>
        <div class="row">
            @if (count($service))
            @foreach ($service as $row)
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="img-holder">
                        <img src="{{ $row->image }}" alt="{{ $row->slug }}">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-teeth-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>{{ $row->name }}</h3>
                        <p>{!! $row->short_description !!}</p>
                        <div class="readmore">
                            <a href="{{ route('hsmile.service.detail',['id'=>$row->id]) }}"><span class="icon-plus"></span></a>
                            <div class="overlay-button">
                                <a href="{{ route('hsmile.service.detail',['id'=>$row->id]) }}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
            @endforeach
            @endif
        </div>
    </div>
</section>
<!--End services style2 area-->

<!--Start Appointment Area-->
<section class="appointment-area">
    <div class="appointment-title-box" style="background-image: url(/frontend/images/parallax-background/appointment-title-bg.jpg);">
        <div class="sec-title text-center">
            <h3>Cuộc Hẹn</h3>
            <h1>Đặt chỗ trực tuyến cho chuyến thăm</h1>
        </div>
    </div>
    <div class="container appointment-content">
        <div class="row">

            <div class="col-xl-6 col-lg-6">
                <div class="appointment-image text-center">
                    <img src="/frontend/images/resources/appointment.png" alt="Awesome Image">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="appointment-form">
                    <div class="text">
                        <p>Đối với các thắc mắc chung, hãy điện thoại theo số +1 555-7890-123. Đây là nhân viên có nhân viên từ Thứ Hai đến Thứ Sáu, 9 giờ sáng - 5 giờ chiều.</p>
                    </div>
                    <form name="appointment-form" action="#" method="post">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="input-box">
                                    <input type="text" name="form_name" value="" placeholder="Họ và tên*" required="">
                                </div>
                                <div class="input-box">
                                    <input type="text" name="form_phone" value="" placeholder="Số điện thoại">
                                </div>
                                <div class="input-box">
                                    <input type="text" name="date" placeholder="Ngày" id="datepicker">
                                    <div class="icon-box">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="input-box">
                                    <input type="email" name="form_email" value="" placeholder="Email*" required="">
                                </div>
                                <div class="input-box">
                                    <select class="selectmenu">
                                        <option selected="selected">Nha sĩ</option>
                                        <option>Dr. Daryl Cornelius</option>
                                        <option>Evelynne Mirando</option>
                                        <option>Dr. Robert B. Moreau</option>
                                        <option>Dr. Greg House</option>
                                        <option>Dr. Sarah Johnson</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="time" placeholder="Thời gian">
                                    <div class="icon-box">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="input-box">
                                    <textarea name="form_message" placeholder="Lời nhắn của bạn..." required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="button-box">
                                    <button class="btn-one" type="submit">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Appointment Area-->

<!--Start team area-->
<section class="team-area">
    <div class="container">
        <div class="sec-title text-center">
            <h3>Nha Sĩ Chuyên Nghiệp</h3>
            <h1>Đội có trình độ cao</h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="team-carousel owl-carousel owl-theme">

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->

                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
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


<!--Start Testimonial Sec style2-->
<section class="testimonial-sec style2">
    <div class="container inner-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="sec-title max-width text-center">
                    <h3>Lời chứng thực</h3>
                    <h1>Khách hàng của chúng tôi nói gì?</h1>
                    <p>Răng đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn mà còn giúp tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn.</p>
                    <a class="btn-one" href="#">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testimonial-carousel2 owl-carousel owl-theme">
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="/frontend/images/icon/1.png" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .Đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-smile</p>
                        </div>
                        <div class="review-box">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="name">
                            <h3>Evelynne Mirando</h3>
                            <span>Houston</span>
                        </div>
                        <div class="quote-icon2">
                            <img src="/frontend/images/icon/2.png" alt="Quote Icon">
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="/frontend/images/icon/1.png" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .Đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-smile</p>
                        </div>
                        <div class="review-box">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="name">
                            <h3>Evelynne Mirando</h3>
                            <span>Houston</span>
                        </div>
                        <div class="quote-icon2">
                            <img src="/frontend/images/icon/2.png" alt="Quote Icon">
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="/frontend/images/icon/1.png" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .Đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-smile</p>
                        </div>
                        <div class="review-box">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="name">
                            <h3>Evelynne Mirando</h3>
                            <span>Houston</span>
                        </div>
                        <div class="quote-icon2">
                            <img src="/frontend/images/icon/2.png" alt="Quote Icon">
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Testimonial Sec style2-->

<!--Start Warranties sec-->
<section class="warranties-sec" style="background-image: url(/frontend/images/parallax-background/warranties-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="video-holder">
                    <div class="icon-holder">
                        <div class="icon">
                            <div class="inner">
                                <a class="html5lightbox" title="Dento Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                                    <span class="icon-play"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="warranties-content">
                    <h2>Điều trị nha khoa có bảo hành</h2>
                    <p>Để lấy một ví dụ tầm thường, ai trong chúng ta đã từng thực hiện các bài tập thể dục vất vả, ngoại trừ việc đạt được một số lợi ích từ nó?</p>
                    <ul>
                        <li>Bọc Sứ: Bảo hành thay thế miễn phí 5 năm.</li>
                        <li>Trồng răng: Bảo hành thay thế miễn phí 3 năm.</li>
                        <li>Trám: Bảo hành 2 năm.</li>
                        <li>Root Canal: Bảo hành 5 năm.</li>
                        <li>Nobel Biocare: Bảo hành thay thế miễn phí 20 năm.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Warranties sec-->

<!--Start latest blog area-->
<section class="latest-blog-area sec-pd1 pd-btm60">
    <div class="container inner-content">
        <div class="sec-title max-width text-center">
            <h3>Tin tức và Tips</h3>
            <h1>Bài đăng mới nhất</h1>
            <p>Răng đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn mà còn giúp tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn.</p>
        </div>
        <div class="row">
            <!--Start single blog post-->
            @foreach($blog as $row)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-blog-post">
                    <div class="img-holder">
                        <img src="/frontend/images/blog/v1-1.jpg" alt="Awesome Image">
                        <div class="categorie-button">
                            <a class="btn-one" href="#">{{$row->category}}</a>
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="meta-box">
                            <div class="author-thumb">
                                <img src="/frontend/images/blog/author-2.png" alt="Image">
                            </div>
                            <ul class="meta-info">
                                <li><a href="#">By {{$row->author}}</a></li>
                                <li><a href="#">{{$row->created_at}}</a></li>
                            </ul>
                        </div>
                        <h3 class="blog-title"><a href="blog-single.html">{{$row->title}}</a></h3>
                        <div class="text-box">
                            <p>{{$row->short_desc}}</p>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-two" href="{{route('hsmile.blog.detail',['id'=>$row->id])}}"><span class="flaticon-next"></span>Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single blog post-->
            <!--Start single blog post-->

            <!--End single blog post-->
        </div>
    </div>
</section>
<!--End latest blog area-->

<!--Start Brand area-->
<section class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="brand">
                    @if (count($partner))
                    @foreach ($partner as $row)
                    <!--Start single item-->
                    <li class="single-item">
                        <a href="#"><img src="{{ $row->logo }}" alt="{{ $row->name }}"></a>
                    </li>
                    <!--End single item-->
                    @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Brand area-->
@endsection