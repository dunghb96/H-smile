<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('hsmile.home') }}">
                    <div class="brand-logo" id="minlogo">
                        <img src="/backend/assets/img/icon1.jpg" height="24" />
                    </div>
                    <h2 class="brand-text">H-SMILE</h2>
                    <!-- <img src="/backend/assets/img/logo/logo1.png" height="30" alt="logo"> -->
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse" onclick="togglelogo()">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
            </li>
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">Truy cập nhanh</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Thông tin website</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Slide</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bài viết</span>
                </a>
            </li>
            <li class=" nav-item {{ request()->is('admin/service') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.service') }}">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Dịch vụ</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bảng giá</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Liên hệ</span>
                </a>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Misc">Quản lý đặt lịch</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Yêu cầu</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bệnh nhân</span>
                </a>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Misc">Quản lý nhân sự</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.employee') }}">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Nhân sự</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.doctor') }}">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bác sĩ</span>
                </a>
            </li>
            <!-- <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('user.list') }}">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Tài khoản</span>
                </a>
            </li> -->
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="message-square"></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Phân quyền</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->