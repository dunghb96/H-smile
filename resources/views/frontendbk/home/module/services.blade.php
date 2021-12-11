<!--Start services style1 area-->
<section class="services-style1-area sec-pd1">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>CHUYÊN NGÀNH</h3>
            <h1>Dịch vụ chăm sóc nha khoa</h1>
            <p>Răng của bạn đóng một vai trò quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn
                nhai và ăn thức ăn của bạn, nhưng đóng khung khuôn mặt của bạn. Bất kỳ răng bị mất có thể có tác
                động lớn đến chất lượng cuộc sống của bạn. </p>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="services-carousel owl-carousel owl-theme">
                    <!--Start single solution style1-->
                    @foreach($service as $item)
                    <div class="single-solution-style1">
                        <div class="img-holder">
                            <img src="{{asset('storage/'.$item->image)}}" alt="Awesome Image">
                            <div class="icon-holder">
                                <div class="inner-content">
                                    <div class="box">
                                        <span class="icon-teeth-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->description}}</p>
                            <div class="readmore">
                                <a href="#"><span class="flaticon-next"></span></a>
                                <div class="overlay-button">
                                    <a href="#">Đọc thêm</a>
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
        </div>

    </div>
</section>
<!--End services style1 area-->