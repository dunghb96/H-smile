@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Tin Tức</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start blog area-->
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <!--Start single blog post-->
            @foreach($blog as $row)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-blog-post">
                    <div class="img-holder">
                        <img src="{{ asset($row->image) }}" alt="Awesome Image">
                        <div class="categorie-button">
                            <a class="btn-one" href="#">{{$row->category}}</a>
                        </div>
                    </div>
                    <div class="text-holder">
                        <div class="meta-box">

                            <ul class="meta-info">
                                <li><a href="#">By {{$row->author}}</a></li>
                                <li><a href="#">{{$row->created_at}}</a></li>
                            </ul>
                        </div>
                        <h3 class="blog-title"><a href="blog-single.html">{{$row->title}}</a></h3>
                        <div class="text-box">
                            <p>{{$row->short_desc}}</p>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-two" href="{{route('hsmile.blog.detail',['id'=>$row->id])}}"><span class="flaticon-next"></span>Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single blog post-->
            <!--Start single blog post-->

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