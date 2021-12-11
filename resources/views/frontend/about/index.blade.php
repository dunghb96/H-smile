@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->     
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                       <h2>About Us</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Home</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">About Us</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area--> 

<!--Start About Area-->
<section class="about-area home2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-image-holder wow fadeInLeft" data-wow-delay="900ms">
                    <img src="/frontend/images/resources/about.jpg" alt="Awesome Image">
                </div>    
            </div>
            <div class="col-xl-6">
                <div class="inner-content">
                    <div class="sec-title">
                        <h3>About Us</h3>
                        <h1>Mission and Story About<br> Our Dento</h1>
                    </div>
                    <div class="about-text-holder">
                        <p>Dento was started in the year 1995 as a small private dental clinic in Binghamton, NY, USA. Looking for affordable dental care?</p>
                        <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, pain  resultant pleasure praising teachings of the great explorer...</p>
                        <div class="author-box fix">
                            <div class="img-box">
                                <img src="/frontend/images/resources/ceo.png" alt="Awesome Image">
                            </div>
                            <div class="text-box">
                                <h3>Dr. Jerome Sinclair</h3>
                                <span>CEO & Founder</span>
                            </div>
                            <div class="signatire-box">
                                <img src="/frontend/images/resources/signature.png" alt="Signature">
                            </div>
                        </div>
                        <div class="read-more">
                            <a class="btn-two" href="#"><span class="flaticon-next"></span>More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Area-->

<!--Start fact counter area-->
<section class="fact-counter-area style2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <ul class="clearfix">
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="300ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-tooth-3"></span>    
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="4257" data-speed="5000" data-refresh-interval="50">4257</span>
                            </h1>
                            <div class="title">
                                <h3>Projects Completed</h3>
                            </div>
                            <div class="text">
                                <p>Nor again is there anyone who loves or pursues or desires obtain.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="600ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-doctor-1"></span>    
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="18" data-speed="5000" data-refresh-interval="50">18</span>
                            </h1>
                            <div class="title">
                                <h3>Expert Dentists</h3>
                            </div>
                            <div class="text">
                                <p>Desires to obtain pain of itself, because all circumstances occur.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                    <!--Start single fact counter-->
                    <li class="single-fact-counter text-center wow fadeInUp" data-wow-delay="900ms">
                        <div class="count-box">
                            <div class="icon">
                                <span class="icon-hospital"></span>    
                            </div>
                            <h1>
                                <span class="timer" data-from="1" data-to="6" data-speed="5000" data-refresh-interval="50">6</span>
                            </h1>
                            <div class="title">
                                <h3>Branches In City</h3>
                            </div>
                            <div class="text">
                                <p>Know  pursue pleasure rationally that all consequences service.</p>
                            </div>
                        </div>
                    </li>
                    <!--End single fact counter-->
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End fact counter area--> 

<!--Start mission vision area-->
<section class="mission-vision-area sec-pd2" style="background-image: url(/frontend/images/parallax-background/mission-vision-bg.jpg);">
    <div class="container">
        <div class="row">
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Our Mission</h6>
                    <p>To provide outstanding dental care with a commitment of honesty, integrity & quality...</p>
                    <a class="btn-two" href="#">Read More</a>    
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Our Vision</h6>
                    <p>To be widely recognized as one of  world’s leading & most preferred dental care service...</p>
                    <a class="btn-two" href="#">Read More</a>    
                </div>
            </div>
            <!--End single mission vision box-->
            <!--Start single mission vision box-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-mission-vision-box text-center wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h6>Philosophy</h6>
                    <p>We play an active role in our community to make it abetter place to live and work...</p>
                    <a class="btn-two" href="#">Read More</a>    
                </div>
            </div>
            <!--End single mission vision box-->
        </div>
    </div>
</section>  
<!--End mission vision area--> 

<!--Start Choose area--> 
<section class="choose-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Why Choose Us</h3>
            <h1>Advantages & Technologies</h1>
            <p>Your teeth play an important part in your daily life. It not only helps you to chew and eat your food, but frames your face. Any missing tooth can have a major impact on your quality of life.</p>
        </div>
        <div class="row">
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="300ms">
                    <div class="count">
                        <span>01</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-petri-dish"></span>
                    </div>
                    <h3>Advanced Cad Cam Laboratory</h3>    
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="600ms">
                    <div class="count">
                        <span>02</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-doctor"></span>
                    </div>
                    <h3>Caring & Higly Qulified Doctors</h3>    
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="900ms">
                    <div class="count">
                        <span>03</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-dentist-2"></span>
                    </div>
                    <h3>Use Best Equipments in Our Clinic</h3>    
                </div>
            </div>
            <!--End single choose box-->
            <!--Start single choose box-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-choose-box text-center wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1200ms">
                    <div class="count">
                        <span>04</span>
                    </div>
                    <div class="icon-holder">
                        <span class="icon-ui"></span>
                    </div>
                    <h3>Online Appointment Facility</h3>    
                </div>
            </div>
            <!--End single choose box-->
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="choose-carousel owl-carousel owl-theme" style="background-image: url(/frontend/images/parallax-background/choose-carousel-bg.jpg);">
                    <div class="single-choose-item text-center">
                        <h6>Technologies</h6>
                        <h3>Cad - Cam Dentistry</h3>
                        <p>Cad - Cams are the latest dental innovations which give a micron level accuracy in the fit of the dental prosthesis. </p>
                    </div>
                    <div class="single-choose-item text-center">
                        <h6>Technologies</h6>
                        <h3>Cad - Cam Dentistry</h3>
                        <p>Cad - Cams are the latest dental innovations which give a micron level accuracy in the fit of the dental prosthesis. </p>
                    </div>
                    <div class="single-choose-item text-center">
                        <h6>Technologies</h6>
                        <h3>Cad - Cam Dentistry</h3>
                        <p>Cad - Cams are the latest dental innovations which give a micron level accuracy in the fit of the dental prosthesis. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="video-holder-box" style="background-image: url(/frontend/images/parallax-background/video-holder-bg.jpg);">
                    <div class="icon-holder">
                        <div class="icon">
                            <div class="inner">
                                <a class="html5lightbox" title="Dento Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                                    <span class="flaticon-multimedia"></span>
                                </a>
                            </div>   
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section> 
<!--End Choose area-->  

<!--Start team area-->
<section class="team-area gray-bg">
    <div class="container">
        <div class="sec-title text-center">
            <h3>Professional Dentists</h3>
            <h1>Highly Qualified Team</h1>
        </div> 
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="team-carousel owl-carousel owl-theme">
                   
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/1.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Daryl Cornelius</h3>
                                <span>Implantologist</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/2.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Eugene Renolds</h3>
                                <span>Periodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    <!--Start single item member-->
                    <div class="single-team-member">
                        <div class="img-holder">
                            <img src="/frontend/images/team/3.jpg" alt="Awesome Image">
                            <div class="overlay-style-one"></div>
                            <div class="text-holder text-center">
                                <h3>Dr. Bonnie Alberta</h3>
                                <span>Orthodontists</span>
                                <div class="button">
                                    <a class="btn-one" href="#">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item member-->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--End team area-->
@endsection