@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start blog area-->
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <!--Start single blog post-->
            @foreach($blog as $item)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-blog-post">
                    <div class="img-holder">
                        <img src="{{$item->image}}" alt="Awesome Image">
                        <div class="categorie-button">
                            <a class="btn-one" href="#">Healthy Teeth</a>
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="meta-box">
                            <div class="author-thumb">
                                <img src="{{asset('frontend/images/blog/author-1.png')}}" alt="Image">
                            </div>
                            <ul class="meta-info">
                                <li><a href="#">By Megan Clarks</a></li>
                                <li><a href="#">Nov 14, 2018</a></li>
                            </ul>
                        </div>
                        <h3 class="blog-title"><a href="blog-single.html">{{$item->title}}</a></h3>
                        <div class="text-box">
                            <p>It not only helps you to chew and eat your food frames your faceany missing tooth can major impact your quality of life.</p>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-two" href="#"><span class="flaticon-next"></span>Continue REading</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single blog post-->

        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="post-pagination text-center">
                    <li class="float-left"><a class="left" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                    <li class="text-center">1 of 4</li>
                    <li class="float-right"><a class="right" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End blog area-->
@endsection