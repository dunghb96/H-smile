@extends('frontend.layout.index')
@section('content')

<!-- ======= Hero Section ======= -->
   @include('frontend.home.module.hero')
<!-- End Hero -->

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    @include('frontend.home.module.why-us')
    <!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    @include('frontend.home.module.about')
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    @include('frontend.home.module.counts')
    <!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    @include('frontend.home.module.services')
    <!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    @include('frontend.home.module.doctors')
    <!-- End Doctors Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('frontend.home.module.faq')
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('frontend.home.module.testimonials')
    <!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->
@endsection
