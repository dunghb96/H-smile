@php
    use App\Models\Service;
    $service = Service::where('status', 1)->where('parent_id', 0)->take(6)->get();
@endphp

<!--Start footer area-->
<footer class="footer-area pdtop80">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="about-us">
                        <div class="footer-logo fix">
                            <a href="{{ route('hsmile.home') }}">
                                <img src="/frontend/images/resources/logo-2.png" alt="Awesome Logo">
                            </a>
                        </div>
                        <div class="text-box fix">
                            <p>{{ getCachedOption('about') }}</p>
                        </div>
                        <div class="button fix">
                            <a class="btn-one" href="{{ route('hsmile.aboutus') }}">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->

            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget martop6 marbtm50">
                    <div class="title">
                        <h3>Dịch vụ đặc biệt</h3>
                    </div>
                    <ul class="specialities">
                        @foreach ($service as $row)
                        <li><a href="{{ route('hsmile.service.detail',['id'=>$row->id]) }}">{{ $row->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->

            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget martop6 pdbtm50">
                    <div class="title">
                        <h3>Tiện ích</h3>
                    </div>
                    <ul class="facilities">
                        <li><a href="#">Chụp X-Quang Răng Cá nhân</a></li>
                        <li><a href="#">Đơn vị chăm sóc đặc biệt</a></li>
                        <li><a href="#">Ngân hàng máu</a></li>
                        <li><a href="#">Khu vực chăm sóc quan trọng</a></li>
                        <li><a href="#">Các phòng thí nghiệm</a></li>
                        <li><a href="#">Quy mô và sạch sẽ</a></li>
                        <li><a href="#">Chất trám khe nứt</a></li>
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
                        <li>Thứ Hai <span class="float-right">8.30am–6.30pm</span></li>
                        <li>Thứ Ba <span class="float-right">10.00am–8.00pm</span></li>
                        <li>Thứ Tư <span class="float-right">8.30am–6.30pm</span></li>
                        <li>Thứ Năm <span class="float-right">8.30am–7.00pm</span></li>
                        <li>Thứ Sáu <span class="float-right">8.30am–3.00pm</span></li>
                        <li>Thứ Bảy <span class="float-right">8.30am–2.00pm</span></li>
                        <li>Chủ nhật <span class="float-right clr-green">Đóng cửa</span></li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->

        </div>
    </div>
</footer>
<!--End footer area-->F
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
                        <p>© <a href="#">H-Smile</a> 2021, Mọi quyền được bảo lưu.</p>
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
