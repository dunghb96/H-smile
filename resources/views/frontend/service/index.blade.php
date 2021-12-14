@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Dịch Vụ</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Dịch vụ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start services style1 area-->
<section class="services-style1-area spec-page">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Dịch Vụ</h3>
            <h1>Dịch vụ chăm sóc răng miệng</h1>
            <p>Dịch vụ tại H-Smile cung cấp đầy đủ các loại hình dịch vụ nha khoa theo tiêu chuẩn quốc tế.</p>
        </div>
        <div class="row">
            <!--Start single solution style1-->

            @foreach($service as $row)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="300ms">
                    <div class="img-holder">
                        <img src="{{ asset($row->image) }}" alt="Awesome Image">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-teeth-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>{{$row->name}}</h3>
                        <p>{{$row->short_description}}</p>
                        <div class="readmore">
                            <a href="#"><span class="icon-plus"></span></a>
                            <div class="overlay-button">
                                <a href="{{route('hsmile.service.detail',['id'=>$row->id])}}">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single solution style1-->
            <!--Start single solution style1-->

            <!--End single solution style1-->
        </div>
    </div>
</section>
<!--End services style1 area-->

<!--Start Choose area Style2-->
<section class="choose-area style2" style="background-image: url(/frontend/images/parallax-background/choose-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="choose-carousel2 owl-carousel owl-theme">
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="300ms">
                        <div class="count">
                            <span>01</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-petri-dish"></span>
                        </div>
                        <h3>Advanced Cad Cam Laboratory</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="600ms">
                        <div class="count">
                            <span>02</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-doctor"></span>
                        </div>
                        <h3>Bác sĩ chăm sóc và được kiểm định cao</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="900ms">
                        <div class="count">
                            <span>03</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-dentist-2"></span>
                        </div>
                        <h3>Sử dụng các thiết bị tốt nhất trong phòng khám của chúng tôi</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1200ms">
                        <div class="count">
                            <span>04</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-ui"></span>
                        </div>
                        <h3>Đặt lịch hẹn trực tuyến</h3>
                    </div>
                    <!--End single choose box-->

                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="300ms">
                        <div class="count">
                            <span>01</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-petri-dish"></span>
                        </div>
                        <h3>Advanced Cad Cam Laboratory</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="600ms">
                        <div class="count">
                            <span>02</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-doctor"></span>
                        </div>
                        <h3>Bác sĩ chăm sóc và được kiểm định cao</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="900ms">
                        <div class="count">
                            <span>03</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-dentist-2"></span>
                        </div>
                        <h3>Sử dụng các thiết bị tốt nhất trong phòng khám của chúng tôi</h3>
                    </div>
                    <!--End single choose box-->
                    <!--Start single choose box-->
                    <div class="single-choose-box style2 text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1200ms">
                        <div class="count">
                            <span>04</span>
                        </div>
                        <div class="icon-holder">
                            <span class="icon-ui"></span>
                        </div>
                        <h3>Đặt lịch hẹn trực tuyến</h3>
                    </div>
                    <!--End single choose box-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="choose-bottom-text">
                    <p>H-Smile thành công từ những nụ cười</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Choose area Style2-->

<!--Start Testimonial Sec style2-->
<section class="testimonial-sec style2">
    <div class="container inner-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="sec-title max-width text-center">
                    <h3>Đánh Giá</h3>
                    <h1>Khách hàng nói gì về H-Smile</h1>
                    <p>Tổng hợp nhận xét của khách hàng với nha khoa H-Smile </p>
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
                            <p>It was an experience of lifetime with you guys….it is definitely the best dental clinic I have ever visited. Now I’ve got my tooth back thankyou Dento.</p>
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
                            <p>It was an experience of lifetime with you guys….it is definitely the best dental clinic I have ever visited. Now I’ve got my tooth back thankyou Dento.</p>
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
                            <p>It was an experience of lifetime with you guys….it is definitely the best dental clinic I have ever visited. Now I’ve got my tooth back thankyou Dento.</p>
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
@endsection