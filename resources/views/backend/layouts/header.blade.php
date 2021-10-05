<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('hsmile.home') }}" class="nav-link">Trang chủ</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto float-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark pt-1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/images/user.svg" alt="user" class="rounded-circle" width="36">
                <span class="ml-2 font-medium">{{ Auth::user()->name ?? __('label.guest') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                    <div class=""><img src="/images/user.svg" alt="user" class="rounded" width="80"></div>
                    <div class="ml-2">
                        <h4 class="mb-0">{{ Auth::user()->name ?? __('label.guest') }}</h4>
                        <p class=" mb-0 text-muted">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('user.edit_profile') }}"><i class="far fa-user mr-2 ml-1"></i>Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout"><i class="fa fa-power-off mr-1 ml-1"></i> Đăng xuất</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>