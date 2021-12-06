@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start services style1 area-->
<section class="services-style1-area spec-page">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Chuyên ngành</h3>
            <h1>Dịch vụ chăm sóc răng miệng</h1>
            <p>Răng của bạn đóng một phần quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn của bạn, mà còn tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn. </p>
        </div>
        <div class="row">
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="300ms">
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
                        <h3>
                            Cấy ghép nha khoa</h3>
                        <p>
                            Tố cáo niềm vui & ca ngợi nỗi đau đã ra đời và chúng tôi sẽ cung cấp cho bạn một tài khoản hoàn chỉnh của hệ thống.</p>
                        <div class="readmore">
                            <a href="#"><span class="icon-plus"></span></a>
                            <div class="overlay-button">
                                <a href="#">
                                    Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="600ms">
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
                        <h3>
                            Nha khoa thẩm mỹ</h3>
                        <p>
                            Biết cách theo đuổi niềm vui một cách hợp lý gặp phải những hậu quả mà bất cứ ai cực kỳ yêu thích theo đuổi.</p>
                        <div class="readmore">
                            <a href="#"><span class="flaticon-next"></span></a>
                            <div class="overlay-button">
                                <a href="#">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="900ms">
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
                        <h3>Nha khoa Laser</h3>
                        <p>
                            Lấy một ví dụ tầm thường, mà chúng ta đã từng thực hiện bài tập thể dục vất vả, để đạt được một số lợi thế.</p>
                        <div class="readmore">
                            <a href="#"><span class="flaticon-next"></span></a>
                            <div class="overlay-button">
                                <a href="#">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->

            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="300ms">
                    <div class="img-holder">
                        <img src="{{asset('frontend/images/services/4.jpg')}}" alt="Awesome Image">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-dental"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>Chỉnh nha</h3>
                        <p>
                            Lấy một ví dụ tầm thường, mà chúng ta đã từng thực hiện bài tập thể dục vất vả, để đạt được một số lợi thế.</p>
                        <div class="readmore">
                            <a href="#"><span class="icon-plus"></span></a>
                            <div class="overlay-button">
                                <a href="#">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="600ms">
                    <div class="img-holder">
                        <img src="{{asset('frontend/images/services/5.jpg')}}" alt="Awesome Image">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-tooth-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>
                            Nội nha</h3>
                        <p>Tố cáo niềm vui & ca ngợi nỗi đau đã ra đời và chúng tôi sẽ cung cấp cho bạn một tài khoản hoàn chỉnh của hệ thống.</p>
                        <div class="readmore">
                            <a href="#"><span class="flaticon-next"></span></a>
                            <div class="overlay-button">
                                <a href="#">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
            <!--Start single solution style1-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="900ms">
                    <div class="img-holder">
                        <img src="{{asset('frontend/images/services/6.jpg')}}" alt="Awesome Image">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-tooth-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>Nha chu</h3>
                        <p>Biết cách theo đuổi niềm vui một cách hợp lý gặp phải những hậu quả mà bất cứ ai vô cùng yêu thích theo đuổi.</p>
                        <div class="readmore">
                            <a href="#"><span class="flaticon-next"></span></a>
                            <div class="overlay-button">
                                <a href="#">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single solution style1-->
        </div>
    </div>
</section>
<!--End services style1 area-->

<!--Start Testimonial Sec style2-->
<section class="testimonial-sec style2">
    <div class="container inner-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="sec-title max-width text-center">
                    <h3>Lời chứng thực</h3>
                    <h1>Khách hàng của chúng tôi nói gì?</h1>
                    <p>Răng của bạn đóng một phần quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn của bạn, mà còn tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn. </p>
                    <a class="btn-one" href="#">Các bài đánh giá khác</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testimonial-carousel2 owl-carousel owl-theme">
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="{{asset('frontend/images/icon/1.png')}}" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-Smile.</p>
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
                            <img src="{{asset('frontend/images/icon/2.png')}}" alt="Quote Icon">
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="{{asset('frontend/images/icon/1.png')}}" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-Smile.</p>
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
                            <img src="{{asset('frontend/images/icon/2.png')}}" alt="Quote Icon">
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->
                    <!--Start Single Testimonial Item-->
                    <div class="single-testimonial-style2 text-center">
                        <div class="quote-icon">
                            <img src="{{asset('frontend/images/icon/1.png')}}" alt="Quote Icon">
                        </div>
                        <div class="text-holder">
                            <p>Đó là một trải nghiệm cả đời với các bạn… .đây chắc chắn là phòng khám nha khoa tốt nhất mà tôi từng đến. Bây giờ tôi đã lấy lại được chiếc răng của mình, cảm ơn H-Smile.</p>
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
                            <img src="{{asset('frontend/images/icon/2.png')}}" alt="Quote Icon">
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
