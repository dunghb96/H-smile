
<!--Start header style1 area-->
<header class="header-style1-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="inner-content clearfix">
                    <div class="header-style1-logo float-left">
                        <a href="index.html">
                            <img src="{{ asset('frontend/images/resources/logo.png') }}" alt="Awesome Logo">
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
                                        <p>+84 988 077 68</p>
                                        <span>hsmile@gmail.com</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-item">
                                    <div class="icon">
                                        <span class="icon-gps"></span>
                                    </div>
                                    <div class="text">
                                        <p>Số 1 Ngô Văn Sở, Trần </p>
                                        <span>Hưng Đạo Hoàn Kiếm,Hà Nội</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="header-style1-button float-right">
                        <a href="{{ route('form') }}"><span class="icon-date"></span>ĐẶT LỊCH HẸN</a>
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
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="dropdown current"><a href="{{ route('home') }}">TRANG CHỦ</a></li>
                                <li><a href="{{ route('about') }}">GIỚI THIỆU</a></li>
                                <li class="dropdown"><a href="{{ route('service.list') }}">DỊCH VỤ</a>
                                    <ul>
                                        <li><a href="cayghepnhakhoa.html">Cấy ghép nha khoa</a></li>
                                        <li><a href="nhakhoalaser.html">Nha khoa laser</a></li>
                                        <li><a href="chinhnha.html">Chỉnh nha</a></li>
                                        <li><a href="nhachu.html">Nha chu</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('doctor.list') }}">Bác sĩ</a></li>
                                <li ><a href="{{ route('price.list') }}">BẢNG GIÁ</a></li>
                                <li ><a href="{{ route('blog.list') }}">TIN TỨC</a></li>
                                <li><a href="{{ route('contact') }}">LIÊN HỆ</a></li>

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
            <a href="index.html"><img src="{{ asset('frontend/images/resources/logo-3.png') }}" alt="" /></a>
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
