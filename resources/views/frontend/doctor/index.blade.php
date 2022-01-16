@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Gặp Gỡ Các Nha Sĩ Của Chúng Tôi</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Nha sĩ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

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
                                <li data-tab="#doctor" class="tab-btn left"><span>Tên Nha Sĩ</span></li>
                                <li data-tab="#specialization" class="tab-btn active-btn right"><span>Chuyên Môn</span></li>
                            </ul>

                            <div class="tabs-content">

                                <div class="tab" id="doctor">

                                    <form name="doctor-form" action="#" method="post">
                                        <div class="row">


                                            <div class="col-xl-12 col-lg-12">
                                                <div class="input-box">

                                                    <select class="selectmenu">
                                                        @foreach($doctor as $row)
                                                        <option>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Tìm</button>
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
                                                        @foreach($doctor as $row)
                                                        <option>{{$row->majors}}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Find a Doctor</button>
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
                                <h3>Make Appointment</h3>
                            </div>
                            <form class="appoinment-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="form_name" value="" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="email" name="form_email" value="" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="form_phone" value="" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="time" placeholder="Time">
                                            <div class="icon-box">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <input type="text" name="date" placeholder="Date" id="datepicker">
                                            <div class="icon-box">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <textarea name="form_message" placeholder="Message..." required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn-one" type="submit">Book Now</button>
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
                    @foreach($doctor as $row)
                    <div class="single-doctor-item wow fadeInUp" data-wow-delay="300ms">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="img-holder">
                                    <img src="/frontend/images/doctor/1.png" alt="Awesome Image">

                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="text-holder">
                                    <span>{{ $row->majors }}</span>
                                    <h3>{{$row->name}}</h3>
                                    <p>{{$row->short_description}}</p>
                                    <ul>
                                        <li><span class="icon-phone"></span>{{$row->phone_number}}</li>
                                        <li><span class="flaticon-e-mail-envelope"></span>{{$row->email}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--End Single doctor item-->
                    <!--Start Single doctor item-->
                    <!--End Single doctor item-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Doctor area-->
@endsection
