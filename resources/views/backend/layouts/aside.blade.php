<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/admin/dashboard" class="brand-link">
        <img src="/backend/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->avatar ?? '/backend/dist/img/user2-160x160.jpg' }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @canany(['setting_website'])
                <li class="nav-item {{ request()->is('admin/setting/*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Cài đặt
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('setting_website')
                        <li class="nav-item ">
                            <a href="{{ route('setting.option') }}" class="nav-link {{ request()->is('admin/setting/option') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-tools"></i> -->
                                <p style="padding-left: 15px;">Chung</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['show_list_users','show_list_roles'])
                <li class="nav-item {{ request()->is(['admin/role/*','admin/user/*']) ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Người dùng
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('show_list_roles')
                        <li class="nav-item">
                            <a href="{{ route('role.list') }}" class="nav-link {{ request()->is('admin/role/*') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-shield-alt"></i> -->
                                <p style="padding-left: 15px;">
                                    Phân quyền
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('show_list_users')
                        <li class="nav-item">
                            <a href="{{ route('user.list') }}" class="nav-link {{ request()->is('admin/user/*') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-user-lock"></i> -->
                                <p style="padding-left: 15px;">
                                    Tài khoản
                                </p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcanany

                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('post.list') }}" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Bài viết
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
