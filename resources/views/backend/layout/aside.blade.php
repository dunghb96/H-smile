<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header" style="margin-bottom: 20px;">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('hsmile.home') }}">
                    <img width="80%" src="{{ asset('frontend/images/resources/logo.png') }}" />
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
                </a>
            </li>
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">Truy cập nhanh</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->is('admin/setting') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.setting') }}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Thông tin website</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/slide') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.slide') }}">
                    <i data-feather='sliders'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Slide</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is(['admin/blog','admin/blog-category']) ? 'has-sub sidebar-group-active open' : '' }}">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Blog</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->is('admin/blog-category') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('admin.blog_category') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Danh mục</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/blog') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('admin.blog') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Bài viết</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ request()->is('admin/service') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.service') }}">
                    <i data-feather='grid'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Dịch vụ</span>
                </a>
            </li>
            <!-- <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='clipboard'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bảng giá</span>
                </a>
            </li> -->
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.contact') }}">
                    <i data-feather='mail'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Liên hệ</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.partner') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Đối tác</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.feedback') }}">
                    <i data-feather='message-square'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Feed back</span>
                </a>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Misc">Quản lý đặt lịch</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.appointment') }}">
                    <i data-feather='bell'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Yêu cầu</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.examination_schedule') }}">
                    <i data-feather='calendar'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Lịch khám</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.patient') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Khách hàng</span>
                </a>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Misc">Quản lý nhân sự</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.employee') }}">
                    <i data-feather='user-plus'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Nhân sự</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.doctor') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Bác sĩ</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='lock'></i>
                    <span class="menu-title text-truncate" data-i18n="Chat">Phân quyền</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->