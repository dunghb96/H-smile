@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start Doctor area-->
<section class="doctor-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-8">
                <div class="doctor-sidebar">
                    <!--Start Single Sidebar-->
                    <div class="single-sidebar">
                        <div class="doctor-tab-box tabs-box">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#doctor" class="tab-btn left"><span>Tên Bác sĩ</span></li>
                                <li data-tab="#specialization" class="tab-btn active-btn right"><span>Chuyên ngành</span></li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab" id="doctor">
                                    <form name="doctor-form" action="#" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="input-box">
                                                    <select class="selectmenu">
                                                        <option selected="selected">Tiến sĩ Daryl Cornelius</option>
                                                        <option>Evelynne Mirando</option>
                                                        <option>Tiến sĩ Robert B. Moreau</option>
                                                        <option>Tiến sĩ Greg House</option>
                                                        <option>Tiến sĩ Sarah Johnson</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Tìm Bác sĩ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab active-tab" id="specialization">
                                    <form name="doctor-form" action="#" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="input-box">
                                                    <select class="selectmenu">
                                                        <option>Cấy ghép nha khoa</option>
                                                        <option>Nha khoa Laser</option>
                                                        <option>Chỉnh răng</option>
                                                        <option>Nha chu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Tìm Bác sĩ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Sidebar-->
                    <!--Start Single Sidebar-->
                    <div class="single-sidebar">
                        <div class="sidebar-appoinment">
                            <div class="title">
                                <h3>Đặt Cuộc hẹn</h3>
                            </div>
                            <form class="appoinment-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="form_name" value="" placeholder="Tên" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="email" name="form_email" value="" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="form_phone" value="" placeholder="Điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="time" placeholder="Thời gian">
                                            <div class="icon-box">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="date" placeholder="Ngày" id="datepicker">
                                            <div class="icon-box">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <textarea name="form_message" placeholder="Thông điệp..." required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn-one" type="submit">Đặt ngay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End Single Sidebar-->
                </div>
            </div>
            <div class="col-xl-8">
                <div class="doctor-content">
                    <!--Start Single doctor item-->
                    <div class="single-doctor-item wow fadeInUp" data-wow-delay="300ms">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/doctor/1.png')}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <a class="btn-one" href="#">Hẹn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="text-holder">
                                    <span>Bác sĩ cấy ghép</span>
                                    <h3>Tiến sĩ Daryl Cornelius</h3>
                                    <p>Tiến sĩ Daryl Cornelius là một bác sĩ phẫu thuật nha khoa nổi tiếng và là bác sĩ cấy ghép nha khoa được chứng nhận. Ông ấy là giám đốc các bệnh viện của chúng tôi.</p>
                                    <h6>Trình độ chuyên môn.</h6>
                                    <p>BDS, MDS - Bác sĩ phẫu thuật thẩm mỹ và thẩm mỹ</p>
                                    <ul>
                                        <li><span class="icon-phone"></span>0986 523 361</li>
                                        <li><span class="flaticon-e-mail-envelope"></span>vantruongdz.2001@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single doctor item-->
                    <!--Start Single doctor item-->
                    <div class="single-doctor-item wow fadeInUp" data-wow-delay="600ms">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/doctor/2.png')}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <a class="btn-one" href="#">Hẹn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="text-holder">
                                    <span>Nha chu</span>
                                    <h3>Evelynne Mirando</h3>
                                    <p>Tiến sĩ Evelynne Mirando là một bác sĩ phẫu thuật nha khoa nổi tiếng và là bác sĩ cấy ghép nha khoa được chứng nhận. Ông ấy là giám đốc các bệnh viện của chúng tôi.</p>
                                    <h6>Trình độ chuyên môn</h6>
                                    <p>BDS, MDS - Bác sĩ phẫu thuật thẩm mỹ và thẩm mỹ</p>
                                    <ul>
                                        <li><span class="icon-phone"></span>0986 523 361</li>
                                        <li><span class="flaticon-e-mail-envelope"></span>vantruongdz.2001@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single doctor item-->
                    <!--Start Single doctor item-->
                    <div class="single-doctor-item wow fadeInUp" data-wow-delay="900ms">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/doctor/3.png')}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <a class="btn-one" href="#">Hẹn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="text-holder">
                                    <span>Chỉnh răng</span>
                                    <h3>Tiến sĩ Robert B. Moreau</h3>
                                    <p> Tiến sĩ Robert B. Moreau là một bác sĩ phẫu thuật nha khoa nổi tiếng và là bác sĩ chỉnh răng được chứng nhận. Ông ấy là giám đốc các bệnh viện của chúng tôi.</p>
                                    <h6>Trình độ chuyên môn</h6>
                                    <p>BDS, MDS - Bác sĩ phẫu thuật thẩm mỹ và thẩm mỹ  </p>
                                    <ul>
                                        <li><span class="icon-phone"></span>0986 523 361 </li>
                                        <li><span class="flaticon-e-mail-envelope"></span>vantruongdz.2001@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single doctor item-->
                    <!--Start Single doctor item-->
                    <div class="single-doctor-item wow fadeInUp" data-wow-delay="300ms">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="img-holder">
                                    <img src="{{asset('frontend/images/doctor/4.png')}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <a class="btn-one" href="#">Hẹn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="text-holder">
                                    <span>Nha khoa Laser</span>
                                    <h3>Tiến sĩ Greg House</h3>
                                    <p>Tiến sĩ Greg House là một bác sĩ phẫu thuật nha khoa nổi tiếng và là bác sĩ  nha khoa Laser được chứng nhận. Ông ấy là giám đốc các bệnh viện của chúng tôi.</p>
                                    <h6>Trình độ chuyên môn</h6>
                                    <p>BDS, MDS - Bác sĩ phẫu thuật thẩm mỹ và thẩm mỹ</p>
                                    <ul>
                                        <li><span class="icon-phone"></span>0986 523 361</li>
                                        <li><span class="flaticon-e-mail-envelope"></span>vantruongdz.2001@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single doctor item-->

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Doctor area-->
@endsection
