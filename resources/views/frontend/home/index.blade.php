@extends('frontend.layout.index')
@section('content')

<!--Main Slider-->
@include('frontend.home.module.slider')
<!--End Main Slider-->

<!--Start About Area-->
@include('frontend.home.module.about')
<!--End About Area-->

<!--Start Highlights area-->
@include('frontend.home.module.highlights')
<!--End Highlights area-->

<!--Start services style1 area-->
@include('frontend.home.module.services')
<!--End services style1 area-->

<!--Start team area v2-->
@include('frontend.home.module.team')
<!--End team area v2-->

<!--Start works area-->
@include('frontend.home.module.works')
<!--End works area-->

<!--Start Testimonial area-->
@include('frontend.home.module.testimonial')
<!--End Testimonial area-->

<!--Start latest blog area-->
@include('frontend.home.module.latest-blog')
<!--End latest blog area-->
@endsection
