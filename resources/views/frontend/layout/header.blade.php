 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">hsmile@gmail.com</a>
        <i class="bi bi-phone"></i>+84 988 077 68
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html"><img src="{{ asset('frontend/assets/img/logo/logo1.png') }}" alt=""  srcset=""></a></h1>

      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('home') }}">Trang chủ</a></li>
          <li><a class="nav-link scrollto" href="{{ route('doctor.list') }}">Nha sĩ</a></li>
          <li><a class="nav-link scrollto" href="{{ route('service.list') }}">Dịch vụ</a></li>
          <li><a class="nav-link scrollto" href="{{ route('price.list') }}">Bảng giá</a></li>
          <li><a class="nav-link scrollto" href="{{ route('blog.list') }}">Tin tức</a></li>
          <li><a class="nav-link scrollto" href="{{ route('about') }}">Về H-Smile</a></li>
          <li><a class="nav-link scrollto" href="{{ route('contact') }}">Liên hệ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('form') }}" class="appointment-btn scrollto"><svg xmlns="http://www.w3.org/2000/svg" width="20"
        height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color: azure;">
        <path
          d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
        <path
          d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
      </svg> Đặt Lịch Hẹn</a>
    </div>
  </header>
