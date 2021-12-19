<div class="preloader"></div>

<!-- Start Top Bar style2 area -->
<section class="topbar-style2-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="top-left-style2 float-left">
                    <ul>
                        <li><span class="icon-clock"></span><b>{{ $startDate }} - {{ $endDate }}:</b> {{ getCachedOption('time_open') }} đến {{ getCachedOption('time_close') }}</li>
                        <li><span class="icon-phone"></span><b>Hotline:</b> {{ getCachedOption('hotline') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Top Bar style2 area -->

<!--Start header style2 area-->
<header class="header-style2-area stricky">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="inner-content clearfix">
                    <div class="header-style2-logo float-left">
                        <a href="{{ route('hsmile.home') }}">
                            <img src="/frontend/images/resources/logo.png" alt="Awesome Logo" style="height: 60px;">
                        </a>
                    </div>
                    <div class="header-middle clearfix float-left">
                        <nav class="main-menu style1 style2 clearfix">
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
                                    <li class="dropdown {{ request()->is('') ? 'current' : '' }}"><a
                                            href="{{ route('hsmile.home') }}">Trang chủ</a>
                                    </li>
                                    <li class="{{ request()->is('aboutus') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.aboutus') }}">Giới thiệu</a>
                                    </li>
                                    <li class="dropdown {{ request()->is('services') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.services') }}">Dịch vụ</a>
                                    </li>
                                    <li class="{{ request()->is('doctors') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.doctors') }}">Bác sĩ</a>
                                    </li>
                                    <li class="dropdown {{ request()->is('blog') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.blog') }}">Tin tức</a>
                                    </li>
                                    <li class="{{ request()->is('price_list') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.price_list') }}">Bảng giá</a>
                                    </li>
                                    <li class="{{ request()->is('contact') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.contact') }}">Liên hệ</a>
                                    </li>
                                    <li class="{{ request()->is('history') ? 'current' : '' }}">
                                        <a href="{{ route('hsmile.history') }}">Tra cứu</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="header-style2-button float-right">
                        <a href="{{ route('hsmile.appointment') }}"><span class="icon-date"></span>Đặt lịch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End header style2 area-->
