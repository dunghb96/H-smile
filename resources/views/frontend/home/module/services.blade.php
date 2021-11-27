<section id="services" class="services">

  <div class="container">

    <div class="section-title">
      <h2>Dịch vụ</h2>
      <p>H-Smile tập trung cung cấp các dịch vụ nha khoa thẩm mỹ trong môi trường nhẹ nhàng, chu đáo, chuyên
        nghiệp. Đảm bảo mọi khách hàng tới Win Smile đều có những trải nhiệm nha khoa đẳng cấp, ưng ý nhất cho đường
        cười của chính mình.</p>
    </div>

    <div class="row">
      @foreach($service as $item)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="icon-box">
          <div class="icon"><img src="{{asset('frontend/assets/img/icon/teeth-1.jpg')}}" alt="" srcset=""></div>
          <h4><a href="">{{$item -> name}}</a></h4>
          <p style=" display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;
 overflow: hidden;">{{$item->description}}</p>
        </div>
      </div>
      @endforeach








      <a href="#" class="more-btn" style="font-size: 16px;text-align: right;">Xem thêm</a>
    </div>

  </div>
</section>