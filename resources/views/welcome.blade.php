<!DOCTYPE html>
<html>

<head>


    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="{{asset('frontend/http://html5shiv.googlecode.com/svn/trunk/html5.js')}}"></script>
        <script src="{{asset('frontend/js/html5shiv.js')}}"></script>
    <![endif]-->

</head>

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>123231414124


        <!--Start header style1 area-->
        <header class="header-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="inner-content clearfix">
                            <div class="header-style1-logo float-left">
                                <a href="index.html">
                                    <img src="{{asset('frontend/images/resources/logo.png')}}" alt="Awesome Logo">
                                </a>
                            </div>
                            <div class="header-contact-info float-left">
                                <ul>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-support"></span>
                                            </div>
                                            <div class="text">
                                                <p>0986 523 361</p>
                                                <span>vantruongdz.2001@gmail.com</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-gps"></span>
                                            </div>
                                            <div class="text">
                                                <p>32 Me Tri Street</p>
                                                <span>HÀ NỘI</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-style1-button float-right">
                                <a href="datlichhen.html"><span class="icon-date"></span>ĐẶT LỊCH HẸN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End header style1 area-->

        <!--Start mainmenu area-->
        <section class="mainmenu-area ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content clearfix">
                            <nav class="main-menu style1">
                                <div class="navbar-header clearfix">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="dropdown current"><a href="index.html">TRANG CHỦ</a></li>
                                        <li><a href="gioithieu.html">GIỚI THIỆU</a></li>
                                        <li class="dropdown"><a href="chuyennganh.html">Chuyên ngành</a>
                                            <ul>
                                                <li><a href="cayghepnhakhoa.html">Cấy ghép nha khoa</a></li>
                                                <li><a href="nhakhoalaser.html">Nha khoa laser</a></li>
                                                <li><a href="chinhnha.html">Chỉnh nha</a></li>
                                                <li><a href="nhachu.html">Nha chu</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="bacsi.html">Bác sĩ</a></li>
                                        <li class="dropdown"><a href="blog.html">123</a>
                                            <ul>
                                                <li><a href="blog.html">Nha khoa tổng quát</a></li>
                                                <li><a href="blog-large.html">Nha khoa phục hồi</a></li>
                                                <li><a href="blog-single.html">Nha khoa trẻ em</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="banggia.html">BẢNG GIÁ</a></li>
                                        <li class="dropdown"><a href="blog.html">TIN TỨC</a>
                                            <ul>
                                                <li><a href="blog.html">Ưu đãi</a></li>
                                                <li><a href="blog-large.html">Kiến thức</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lienhe.html">LIÊN HỆ</a></li>

                                    </ul>
                                </div>
                            </nav>

                            <div class="mainmenu-right">
                                <div class="toggler-button">
                                    <div class="nav-toggler hidden-bar-opener">
                                        <div class="inner">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End mainmenu area-->
        <br><br>
        <!-- Hidden Navigation Bar -->
        <section class="hidden-bar right-align">
            <div class="hidden-bar-closer">
                <button><span class="flaticon-remove"></span></button>
            </div>
            <div class="hidden-bar-wrapper">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('frontend/images/resources/logo-3.png')}}" alt="" /></a>
                </div>
                <div class="contact-info-box">
                    <h3>Thông tin liên hệ</h3>
                    <ul>
                        <li>
                            <h5>Địa chỉ</h5>
                            <p>32 Me Tri Street</p>
                        </li>
                        <li>
                            <h5>Điện thoại</h5>
                            <p>Phone: 0986 523 361</p>
                        </li>
                        <li>
                            <h5>Email</h5>
                            <p>vantruongdz.2001@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="newsletter-form-box">
                    <h3>Đăng ký nhận bản tin</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-12">
                                <input type="email" name="email" placeholder="Địa chỉ Email...">
                                <button type="submit"><span class="flaticon-arrow"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="offer-box text-center">
                    <div class="big-title">50% <span>Offer</span></div>
                    <h3>Bảo hành 5 năm</h3>
                    <a class="btn-one" href="banggia.html">Gói giá </a>
                </div>
                <div class="copy-right-text">
                    <p>© H-Smile 2018, All Rights Reserved.</p>
                </div>
            </div>
        </section>
        <!-- End Hidden Bar -->

        <!--Main Slider-->
        <section class="main-slider">
            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>
                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/slides/v1-1.jpg')}}" data-title="Slide Title" data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('frontend/images/slides/v1-1.jpg')}}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['700','700','650','360']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['-110','-100','-100','-105']" data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content left-slide">
                                    <div class="big-title">
                                        <br>Nha khoa hiện đại trong một bình tĩnh &<br> cảm giác thư giãn.
                                    </div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="normal" data-width="['700','700','650','400']" data-hoffset="['15','15','15','15']" data-voffset="['65','55','30','15']" data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content left-slide">
                                    <div class="text">Duy trì một nha sĩ được đào tạo chuyên sâu, có trình độ và kinh
                                        nghiệm.</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['700','700','650','400']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['140','130','110','105']" data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content left-slide">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">Đặc sản Oue</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/slides/v1-2.jpg')}}" data-title="Slide Title" data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('frontend/images/slides/v1-2.jpg')}}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['900','900','800','560']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['-90','-100','-90','-100']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content middle-slide text-center">
                                    <div class="big-title">
                                        Một nụ cười hấp dẫn làm cho ấn tượng lâu dài!
                                    </div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="normal" data-width="['900','900','800','560']" data-hoffset="['15','15','15','15']" data-voffset="['30','10','10','0']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content middle-slide text-center">
                                    <div class="text">Hơn 200 nha sĩ tham gia với chúng tôi trong việc cho<span>Bạn là
                                            người giỏi nhất của hiện đại</span><br> chăm sóc răng miệng, ở lại với nụ
                                        cười khỏe mạnh.</div>
                                </div>
                            </div>
                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['900','900','800','560']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['120','100','105','100']" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content middle-slide text-center">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">Tìm hiểu thêm</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/slides/v1-3.jpg')}}" data-title="Slide Title" data-transition="parallaxvertical">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('frontend/images/slides/v1-3.jpg')}}">

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['600','600','650','400']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['-75','-75','-80','-90']" data-x="['right','right','right','right']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content">
                                    <div class="big-title">
                                        Nụ cười khỏe mạnh<br> thông qua khoa học<br> và nghệ thuật.
                                    </div>
                                </div>
                            </div>

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-whitespace="normal" data-width="['600','600','650','400']" data-hoffset="['15','15','15','15']" data-voffset="['65','50','30','15']" data-x="['right','right','right','right']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <br><br>
                                <div class="slide-content">
                                    <div class="text">Duy trì một nha sĩ được đào tạo chuyên sâu, có trình độ và kinh
                                        nghiệm.</div>
                                </div>
                            </div>

                            <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['600','600','650','400']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['140','120','110','105']" data-x="['right','right','right','right']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;">
                                <div class="slide-content">
                                    <div class="btn-box">
                                        <a class="btn-one" href="#">Gặp gỡ các bác sĩ của chúng tôi</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <!--End Main Slider-->

        <!--Start About Area-->
        <section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-logo-box">
                            <div class="sec-title">
                                <h1>Nhiệm vụ về nha khoa H-Smile của chúng tôi</h1>
                            </div>
                            <ul class="fix">
                                <li class="wow fadeInDown" data-wow-delay="300ms">
                                    <img src="{{asset('frontend/images/resources/certificate-1.png')}}" alt="Image">
                                </li>
                                <li class="wow fadeInUp" data-wow-delay="600ms">
                                    <img src="{{asset('frontend/images/resources/certificate-2.png')}}" alt="Image">
                                </li>
                                <li class="wow fadeInUp" data-wow-delay="900ms">
                                    <img src="{{asset('frontend/images/resources/certificate-3.png')}}" alt="Image">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-text-holder">
                            <p> H-Smile được bắt đầu vào năm 1995 như một phòng khám nha khoa tư nhân nhỏ ở Binghamton,
                                NY, Hoa Kỳ. Tìm kiếm dịch vụ chăm sóc nha khoa giá cả phải chăng?</p>
                            <p>Lấy một ví dụ tầm thường, ai trong chúng ta từng thực hiện tập thể dục tốn nhiều công
                                sức, ngoại trừ để có được một số lợi thế từ nó? Nhưng ai có quyền tìm ra lỗi lầm với một
                                người đàn ông chọn tận hưởng một niềm vui không có hậu quả khó chịu, nỗi đau dẫn đến
                                niềm vui ca ngợi những lời dạy của nhà thám hiểm vĩ đại...</p>
                            <div class="author-box fix">
                                <div class="img-box">
                                    <img src="{{asset('frontend/images/resources/ceo.png')}}" alt="Awesome Image">
                                </div>
                                <div class="text-box">
                                    <h3>Dr. Jerome Sinclair</h3>
                                    <span>CEO & Founder</span>
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
        </section>
        <!--End About Area-->

        <!--Start Highlights area-->
        <section class="highlights-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay="600ms">
                        <!--Start single box-->
                        <div class="single-box float-left text-center">
                            <div class="icon-holder">
                                <span class="icon-support-1"></span>
                            </div>
                            <h3>TƯ VẤN</h3>
                            <span class="border-box"></span>
                            <p>Lấy ví dụ tầm thường, thực hiện công việc khó khăn.</p>
                            <a href="#">Bắt đầu</a>
                        </div>
                        <!--End single box-->
                        <!--Start single box-->
                        <div class="single-middle-box float-left text-center">
                            <div class="icon-holder">
                                <span class="icon-support-1"></span>
                            </div>
                            <h3>TƯ VẤN ĐIỆN TỬ</h3>
                            <form name="visit-form" action="#" method="post">
                                <div class="row mar-ninus10">
                                    <div class="col-xl-4 pd10">
                                        <div class="input-box">
                                            <input type="text" name="form_name" value="" placeholder="Tên" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 pd10">
                                        <div class="input-box">
                                            <input type="text" name="form_phone" value="" placeholder="Điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 pd10">
                                        <div class="input-box">
                                            <select class="selectmenu">
                                                <option selected="selected">Bộ phận</option>
                                                <option>Cấy ghép nha khoa</option>
                                                <option>Nha khoa laser</option>
                                                <option>Chỉnh răng</option>
                                                <option>Nha chu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mar-ninus10">
                                    <div class="col-xl-4 pd10">
                                        <div class="input-box">
                                            <input type="text" name="time" placeholder="Thời gian">
                                            <div class="icon-box">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 pd10">
                                        <div class="input-box">
                                            <input type="text" name="date" placeholder="Ngày" id="datepicker">
                                            <div class="icon-box">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 pd10">
                                        <div class="button-box">
                                            <button class="btn-one" type="submit">Gửi Thông tin</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End single box-->
                        <!--Start single box-->
                        <div class="single-box float-right text-center">
                            <div class="icon-holder">
                                <span class="icon-support-1"></span>
                            </div>
                            <h3>Tìm Bác sĩ</h3>
                            <span class="border-box"></span>
                            <p>Lấy ví dụ tầm thường, mà thực hiện công việc khó khăn.</p>
                            <a href="#">Gặp gỡ đội ngũ của chúng tôi</a>
                        </div>
                        <!--End single box-->
                    </div>
                </div>
            </div>
        </section>
        <!--End Highlights area-->

        <!--Start services style1 area-->
        <section class="services-style1-area sec-pd1">
            <div class="container">
                <div class="sec-title max-width text-center">
                    <h3>CHUYÊN NGÀNH</h3>
                    <h1>Dịch vụ chăm sóc nha khoa123213123</h1>
                    <p>Răng của bạn đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn
                        nhai và ăn thức ăn của bạn, nhưng đóng khung khuôn mặt của bạn. Bất kỳ răng bị mất có thể có tác
                        động lớn đến chất lượng cuộc sống của bạn. </p>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="services-carousel owl-carousel owl-theme">
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/1.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Cấy ghép nha khoa</h3>
                                    <p>Tố cáo niềm vui và ca ngợi nỗi đau đã được sinh ra và chúng tôi sẽ cung cấp cho
                                        bạn một tài khoản đầy đủ về hệ thống.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/2.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa thẩm mỹ</h3>
                                    <p>Biết cách theo đuổi niềm vui một cách hợp lý gặp phải hậu quả mà cực kỳ bất cứ ai
                                        yêu thích theo đuổi.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/3.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-dentist"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa laser</h3>
                                    <p>Lấy một ví dụ tầm thường, mà chúng ta từng thực hiện tập thể dục tốn nhiều công
                                        sức, để có được một số lợi thế.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->

                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/1.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Cấy ghép nha khoa</h3>
                                    <p>Tố cáo niềm vui và ca ngợi nỗi đau đã được sinh ra và chúng tôi sẽ cung cấp cho
                                        bạn một tài khoản đầy đủ về hệ thống.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/2.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa thẩm mỹ</h3>
                                    <p>Biết cách theo đuổi niềm vui một cách hợp lý gặp phải hậu quả mà cực kỳ bất cứ ai
                                        yêu thích theo đuổi.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/3.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-dentist"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa laser</h3>
                                    <p>Lấy một ví dụ tầm thường, mà chúng ta từng thực hiện tập thể dục tốn nhiều công
                                        sức, để có được một số lợi thế.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->

                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/1.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Cấy ghép nha khoa</h3>
                                    <p>Tố cáo niềm vui và ca ngợi nỗi đau đã được sinh ra và chúng tôi sẽ cung cấp cho
                                        bạn một tài khoản đầy đủ về hệ thống.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/2.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-teeth-2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa thẩm mỹ</h3>
                                    <p>Biết cách theo đuổi niềm vui một cách hợp lý gặp phải hậu quả mà cực kỳ bất cứ ai
                                        yêu thích theo đuổi.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                            <!--Start single solution style1-->
                            <div class="single-solution-style1">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/services/3.jpg')}}" alt="Awesome Image">
                                    <div class="icon-holder">
                                        <div class="inner-content">
                                            <div class="box">
                                                <span class="icon-dentist"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <h3>Nha khoa laser</h3>
                                    <p>Lấy một ví dụ tầm thường, mà chúng ta từng thực hiện tập thể dục tốn nhiều công
                                        sức, để có được một số lợi thế.</p>
                                    <div class="readmore">
                                        <a href="#"><span class="flaticon-next"></span></a>
                                        <div class="overlay-button">
                                            <a href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End single solution style1-->
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End services style1 area-->

        <!--Start team area v2-->
        <section class="team-area-v2">
            <div class="container">
                <div class="sec-title">
                    <h3>Nha sĩ chuyên nghiệp</h3>
                    <h1>Đội ngũ có trình độ cao</h1>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-team-slider">
                            <ul class="slider-content clearfix bxslider float-left">
                                <li>
                                    <div class="single-team-slide clearfix">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="top">
                                                    <h2>Tiến sĩ Daryl Cornelius</h2>
                                                    <h3>Bác sĩ cấy ghép</h3>
                                                </div>
                                                <div class="text">
                                                    <p>Tiến sĩ Daryl Cornelius là một bác sĩ phẫu thuật nha khoa nổi
                                                        tiếng và là một bác sĩ cấy ghép nha khoa được chứng nhận. Ông là
                                                        giám đốc nha khoa Doc.DMD, Hoa Kỳ. Là một nhà cấy ghép, Tiến sĩ
                                                        Daryl Cornelius đã có kinh nghiệm to lớn về cấy ghép nha khoa
                                                        trong hơn 19 năm.</p>
                                                </div>
                                                <div class="pgrs-bar-wrapper">
                                                    <div class="inner-box">
                                                        <ul class="pgrs-bar">
                                                            <li>
                                                                <h5>Cấy ghép</h5>
                                                                <div class="box">
                                                                    <div class="inner wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0s" data-wow-offset="0" style="width: 75%;">
                                                                        <span>75%</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <a href="#">Đặt Cuộc hẹn</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-7 col-md-10 col-sm-12">
                                                <div class="img-holder">
                                                    <img src="{{asset('frontend/images/team/team-1.png')}}" alt="Awesome Image">
                                                    <ul class="team-social-links">
                                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-team-slide clearfix">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="top">
                                                    <h2>Tiến sĩ Robert B. Moreau</h2>
                                                    <h3>Prosthodontist</h3>
                                                </div>
                                                <div class="text">
                                                    <p>Tiến sĩ Robert B. Moreau là một bác sĩ phẫu thuật nha khoa nổi
                                                        tiếng và là một bác sĩ cấy ghép nha khoa được chứng nhận. Ông là
                                                        giám đốc nha khoa Doc.DMD, Hoa Kỳ. Là một nhà cấy ghép, Tiến sĩ
                                                        Daryl Cornelius đã có kinh nghiệm to lớn về cấy ghép nha khoa
                                                        trong hơn 19 năm.</p>
                                                </div>
                                                <div class="pgrs-bar-wrapper">
                                                    <div class="inner-box">
                                                        <ul class="pgrs-bar">
                                                            <li>
                                                                <h5>Cấy ghép</h5>
                                                                <div class="box">
                                                                    <div class="inner wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0s" data-wow-offset="0" style="width: 75%;">
                                                                        <span>75%</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <a href="#">Đặt Cuộc hẹn</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-7 col-md-10 col-sm-12">
                                                <div class="img-holder">
                                                    <img src="{{asset('frontend/images/team/team-2.png')}}" alt="Awesome Image">
                                                    <ul class="team-social-links">
                                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <div class="slider-pager float-right">
                                <ul class="thumb-box style2">
                                    <li>
                                        <a class="active" data-slide-index="0" href="#">
                                            <div class="img-holder">
                                                <img src="{{asset('frontend/images/team/team-thumb-1.jpg')}}" alt="Awesome Image">
                                            </div>
                                            <div class="text-holder">
                                                <h6>Tiến sĩ Daryl Cornelius</h6>
                                                <span>Bác sĩ cấy ghép</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-slide-index="1" href="#">
                                            <div class="img-holder">
                                                <img src="{{asset('frontend/images/team/team-thumb-2.jpg')}}" alt="Awesome Image">
                                            </div>
                                            <div class="text-holder">
                                                <h6>Tiến sĩ Robert B. Moreau</h6>
                                                <span>Prosthodontist</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="slider-pager arrow-button">
                                <div class="center">
                                    <ul class="nav-link list-inline">
                                        <li id="slider-prev"></li>
                                        <li id="slider-next"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End team area v2-->

        <!--Start works area-->
        <section class="works-area">
            <div class="container wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="sec-title-box text-center">
                    <h3>Chúng tôi hứa sẽ chăm sóc bệnh nhân tận tình.</h3>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="works-content">
                            <div class="works-tab-box">
                                <div class="tabmenu-box text-center">
                                    <ul class="tab-btns tab-buttons">
                                        <li class="p-tab-btn active-btn" data-tab="#p-tab-1"><span>Implants</span></li>
                                        <li class="p-tab-btn" data-tab="#p-tab-2"><span>Thereaphy</span></li>
                                        <li class="p-tab-btn" data-tab="#p-tab-3"><span>surgery</span></li>
                                        <li class="p-tab-btn" data-tab="#p-tab-4"><span>Braces</span></li>
                                        <li class="p-tab-btn" data-tab="#p-tab-5"><span>Cleaning</span></li>
                                    </ul>
                                </div>
                                <div class="tab-content-box">

                                    <div class="single-tab-content active-tab" id="p-tab-1">
                                        <div class="tab-content-carousel owl-carousel owl-theme">
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                        </div>
                                    </div>

                                    <div class="single-tab-content" id="p-tab-2">
                                        <div class="tab-content-carousel owl-carousel owl-theme">
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                        </div>
                                    </div>

                                    <div class="single-tab-content" id="p-tab-3">
                                        <div class="tab-content-carousel owl-carousel owl-theme">
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                        </div>
                                    </div>

                                    <div class="single-tab-content" id="p-tab-4">
                                        <div class="tab-content-carousel owl-carousel owl-theme">
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                        </div>
                                    </div>

                                    <div class="single-tab-content" id="p-tab-5">
                                        <div class="tab-content-carousel owl-carousel owl-theme">
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                            <!--Start Single Item-->
                                            <div class="single-item">
                                                <div class="row mar0">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-before-1.jpg')}}" alt="Awesome Image">
                                                            <div class="before">
                                                                <a href="#">Trước</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd0">
                                                        <div class="img-holder">
                                                            <img src="{{asset('frontend/images/resources/teeth-after-1.jpg')}}" alt="Awesome Image">
                                                            <div class="after">
                                                                <a href="#">Sau</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Item-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End works area-->

        <!--Start Testimonial area-->
        <section class="testimonial-area">
            <div class="container inner-content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title float-left">
                            <h3>Phản hồi</h3>
                            <h1>Khách hàng của chúng tôi nói gì?</h1>
                        </div>
                        <div class="button float-right">
                            <a class="btn-one" href="#">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testimonial-carousel owl-carousel owl-theme">
                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Đó là một trải nghiệm trọn đời với bạn guys....it chắc chắn là phòng khám nha
                                        khoa tốt nhất mà tôi từng đến thăm.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/1.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Erick Frederick</h3>
                                    <span>Denver</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->
                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Bây giờ tôi đã có răng của tôi trở lại, tôi có thể ăn bất cứ điều gì tôi thích
                                        một lần nữa. Tôi muốn giới thiệu trung tâm dento cho tất cả mọi người.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/2.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Evelynne Celie</h3>
                                    <span>Houston</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->

                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Đó là một trải nghiệm trọn đời với bạn guys....it chắc chắn là phòng khám nha
                                        khoa tốt nhất mà tôi từng đến thăm.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/1.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Erick Frederick</h3>
                                    <span>Denver</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->
                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Bây giờ tôi đã có răng của tôi trở lại, tôi có thể ăn bất cứ điều gì tôi thích
                                        một lần nữa. Tôi muốn giới thiệu trung tâm dento cho tất cả mọi người.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/2.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Evelynne Celie</h3>
                                    <span>Houston</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->

                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Đó là một trải nghiệm trọn đời với bạn guys....it chắc chắn là phòng khám nha
                                        khoa tốt nhất mà tôi từng đến thăm.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/1.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Erick Frederick</h3>
                                    <span>Denver</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->
                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p>Bây giờ tôi đã có răng của tôi trở lại, tôi có thể ăn bất cứ điều gì tôi thích
                                        một lần nữa. Tôi muốn giới thiệu trung tâm dento cho tất cả mọi người.</p>
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/testimonial/2.png')}}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3>Evelynne Celie</h3>
                                    <span>Houston</span>
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Testimonial area-->

        <!--Start latest blog area-->
        <section class="latest-blog-area sec-pd1">
            <div class="container inner-content">
                <div class="sec-title max-width text-center">
                    <h3>Tin tức & Mẹo</h3>
                    <h1>Mới nhất từ blog của chúng tôi</h1>
                    <p>Răng của bạn đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn
                        nhai và ăn thức ăn của bạn, nhưng đóng khung khuôn mặt của bạn. Bất kỳ răng bị mất có thể có tác
                        động lớn đến chất lượng cuộc sống của bạn.</p>
                </div>
                <div class="row">
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post">
                            <div class="img-holder">
                                <img src="{{asset('frontend/images/blog/lat-blog-1.jpg')}}" alt="Awesome Image">
                                <div class="categorie-button">
                                    <a class="btn-one" href="#">Răng khỏe mạnh</a>
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="meta-box">
                                    <div class="author-thumb">
                                        <img src="{{asset('frontend/images/blog/author-1.png')}}" alt="Image">
                                    </div>
                                    <ul class="meta-info">
                                        <li><a href="#">Bởi Megan Clarks</a></li>
                                        <li><a href="#">Nov 14, 2018</a></li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a href="blog-single.html">Hướng dẫn cho nha sĩ và bệnh nhân</a>
                                </h3>
                                <div class="text-box">
                                    <p>Không ai từ chối, không thích chúng ta tránh những thú vui, bởi vì tất cả chỉ là
                                        niềm vui, nhưng bởi vì những người không biết.</p>
                                </div>
                                <div class="readmore-button">
                                    <a class="btn-two" href="#"><span class="flaticon-next"></span>Tiếp tục đọc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post">
                            <div class="img-holder">
                                <img src="{{asset('frontend/images/blog/lat-blog-2.jpg')}}" alt="Awesome Image">
                                <div class="categorie-button">
                                    <a class="btn-one" href="#">Công nghệ</a>
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="meta-box">
                                    <div class="author-thumb">
                                        <img src="{{asset('frontend/images/blog/author-2.png')}}" alt="Image">
                                    </div>
                                    <ul class="meta-info">
                                        <li><a href="#">Bởi Megan Clarks</a></li>
                                        <li><a href="#">Nov 14, 2018</a></li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a href="blog-single.html">Tôi có nên đi cho một thiết kế nụ
                                        cười?</a></h3>
                                <div class="text-box">
                                    <p>Cũng không một lần nữa có bất cứ ai yêu thích theo đuổi hoặc mong muốn có được
                                        nỗi đau của chính nó, bepain, nhưng đôi khi hoàn cảnh.</p>
                                </div>
                                <div class="readmore-button">
                                    <a class="btn-two" href="#"><span class="flaticon-next"></span>Tiếp tục đọc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post">
                            <div class="img-holder">
                                <img src="{{asset('frontend/images/blog/lat-blog-3.jpg')}}" alt="Awesome Image">
                                <div class="categorie-button">
                                    <a class="btn-one" href="#">Chăm sóc răng miệng</a>
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="meta-box">
                                    <div class="author-thumb">
                                        <img src="{{asset('frontend/images/blog/author-3.png')}}" alt="Image">
                                    </div>
                                    <ul class="meta-info">
                                        <li><a href="#">Bởi Megan Clarks</a></li>
                                        <li><a href="#">Nov 14, 2018</a></li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a href="blog-single.html">Những điều bạn cần biết về răng?</a>
                                </h3>
                                <div class="text-box">
                                    <p>Nó không chỉ giúp bạn nhai và ăn khung thức ăn của bạn răng bị mất mặt của bạn có
                                        thể ảnh hưởng lớn đến chất lượng cuộc sống của bạn.</p>
                                </div>
                                <div class="readmore-button">
                                    <a class="btn-two" href="#"><span class="flaticon-next"></span>Tiếp tục đọc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                </div>
            </div>
        </section>
        <!--End latest blog area-->

        <!--Start newsletter area-->
        <section class="newsletter-area">
            <div class="container">
                <div class="newsletter-title text-center">
                    <h3>Đăng ký Bản tin</h3>
                    <span>Đăng ký chúng tôi và nhận tin tức, cập nhật và ưu đãi mới nhất trong hộp thư đến của
                        bạn.</span>
                </div>
                <form class="newsletter-form" action="#">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <input type="text" name="fname" placeholder="First Name">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <input type="text" name="lname" placeholder="Last Name">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <button class="btn-one" type="submit">Đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--End newsletter area-->

        <!--Start Footer Contact Info Area-->
        <section class="footer-contact-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-footer-contact-box left-icon wow fadeInDown" data-wow-delay="100ms">
                            <div class="icon-holder">
                                <span class="icon-gps"></span>
                            </div>
                            <div class="text-holder">
                                <h3>Vị trí của chúng tôi</h3>
                                <p>32 Me Tri, Nam Tu Liem, Ha Noi</p>
                                <a class="btn-two" href="#">Tìm vị trí của chúng tôi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-footer-contact-box right-box wow fadeInUp" data-wow-delay="100ms">
                            <div class="icon-holder">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="text-holder">
                                <h3>Hẹn</h3>
                                <p>Thực hiện cuộc hẹn của bạn qua trực tuyến bây giờ.</p>
                                <a class="btn-two" href="datlichhen.html">Đặt lịch hẹn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Footer Contact Info Area-->

        <!--Start footer area-->
        <footer class="footer-area">
            <div class="container">
                <div class="row">

                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="about-us">
                                <div class="footer-logo fix">
                                    <a href="index-2.html">
                                        <img src="{{asset('frontend/images/resources/logo-2.png')}}" alt="Awesome Logo">
                                    </a>
                                </div>
                                <div class="text-box fix">
                                    <p>H-Smile được bắt đầu vào năm 1995 như một phòng khám nha khoa tư nhân nhỏ ở
                                        Binghamton, NY, Hoa Kỳ. Tìm kiếm dịch vụ chăm sóc nha khoa giá cả phải chăng?
                                    </p>
                                    <p class="bottom-text">Lấy một ví dụ tầm thường, mà trong chúng ta từng đảm nhận thể
                                        chất vất vả
                                        Tập thể dục, ngoại trừ để có được.</p>
                                </div>
                                <div class="button fix">
                                    <a class="btn-one" href="#">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->

                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget martop6 marbtm50">
                            <div class="title">
                                <h3>Chuyên ngành</h3>
                            </div>
                            <ul class="specialities">
                                <li><a href="#">Cấy ghép nha khoa</a></li>
                                <li><a href="#">Nha khoa laser</a></li>
                                <li><a href="#">Chỉnh răng</a></li>
                                <li><a href="#">Nha chu</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->

                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget martop6 pdbtm50">
                            <div class="title">
                                <h3>Tiện nghi</h3>
                            </div>
                            <ul class="facilities">
                                <li><a href="#">X-quang răng cá nhân</a></li>
                                <li><a href="#">Phòng chăm sóc đặc biệt</a></li>
                                <li><a href="#">Ngân hàng máu</a></li>
                                <li><a href="#">Khu vực chăm sóc quan trọng</a></li>
                                <li><a href="#">Phòng thí nghiệm</a></li>
                                <li><a href="#">Quy mô và làm sạch</a></li>
                                <li><a href="#">Chất bịt kín fissure</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->

                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget martop6 pdtop-50">
                            <div class="title">
                                <h3>Giờ mở cửa</h3>
                            </div>
                            <ul class="opening-hours">
                                <li>Thứ 2 <span class="float-right">8.30am–6.30pm</span></li>
                                <li>Thứ 3 <span class="float-right">10.00am–8.00pm</span></li>
                                <li>Thứ 4 <span class="float-right">8.30am–6.30pm</span></li>
                                <li>Thứ 5 <span class="float-right">8.30am–7.00pm</span></li>
                                <li>Thứ 6 <span class="float-right">8.30am–3.00pm</span></li>
                                <li>Thứ 7 <span class="float-right">8.30am–2.00pm</span></li>
                                <li>Chủ nhật <span class="float-right clr-green">Đóng</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->

                </div>
            </div>
        </footer>
        <!--End footer area-->

        <!--Start footer bottom area-->
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner clearfix">
                            <div class="footer-social-links float-left">
                                <ul class="sociallinks-style-one">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="copyright-text text-center">
                                <p>© <a href="#">H-Smile</a> 2018, All Rights Reserved.</p>
                            </div>
                            <ul class="footer-menu float-right">
                                <li><a href="#">Điều khoản & Điều kiện</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->

    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target thm-bg-clr" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- Color Palate / Color Switcher -->
    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-gear"></i>
        </div>
        <div class="color-palate-head">
            <h6>Chọn Màu của bạn</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
                <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
                <span class="palate navy-color" data-theme-file="css/color-themes/navy-theme.css"></span>
                <span class="palate yellow-color" data-theme-file="css/color-themes/yellow-theme.css"></span>
                <span class="palate blue-color" data-theme-file="css/color-themes/blue-theme.css"></span>
                <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
                <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
                <span class="palate red-color" data-theme-file="css/color-themes/red-theme.css"></span>
            </div>
        </div>
        <div class="palate-foo">
            <span>Bạn có thể dễ dàng thay đổi và chuyển đổi màu sắc.</span>
        </div>
    </div>
    <!-- /.End Of Color Palate -->

    <!-- main jQuery -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <!-- Wow Script -->
    <script src="{{asset('frontend/js/wow.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- bx slider -->
    <script src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>
    <!-- count to -->
    <script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('frontend/js/appear.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('frontend/js/owl.js')}}"></script>
    <!-- validate -->
    <script src="{{asset('frontend/js/validation.js')}}"></script>
    <!-- mixit up -->
    <script src="{{asset('frontend/js/jquery.mixitup.min.js')}}"></script>
    <!-- isotope script-->
    <script src="{{asset('frontend/js/isotope.js')}}"></script>
    <!-- Easing -->
    <script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
    <!-- Gmap helper -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
    <!--Gmap script-->
    <script src="{{asset('frontend/js/gmaps.js')}}"></script>
    <script src="{{asset('frontend/js/map-helper.js')}}"></script>
    <!-- jQuery ui js -->
    <script src="{{asset('frontend/assets/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
    <!-- Language Switche  -->
    <script src="{{asset('frontend/assets/language-switcher/jquery.polyglot.language.switcher.js')}}"></script>
    <!-- jQuery timepicker js -->
    <script src="{{asset('frontend/assets/timepicker/timePicker.js')}}"></script>
    <!-- Bootstrap select picker js -->
    <script src="{{asset('frontend/assets/bootstrap-sl-1.12.1/bootstrap-select.js')}}"></script>
    <!-- html5lightbox js -->
    <script src="{{asset('frontend/assets/html5lightbox/html5lightbox.js')}}"></script>
    <!-- html5lightbox js -->
    <script src="{{asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!--Color Switcher-->
    <script src="{{asset('frontend/js/color-settings.js')}}"></script>

    <!--Revolution Slider-->
    <script src="{{asset('frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('frontend/js/main-slider-script.js')}}"></script>

    <!-- thm custom script -->
    <script src="{{asset('frontend/js/custom.js')}}"></script>



</body>

<!-- Mirrored from st.ourhtmldemo.com/new/Dento/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 02:04:28 GMT -->

</html>