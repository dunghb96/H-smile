@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<section class="about-area home2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-image-holder wow fadeInLeft animated" data-wow-delay="900ms" style="visibility: visible; animation-delay: 900ms; animation-name: fadeInLeft;">
                    <img src="images/resources/about.jpg" alt="Awesome Image">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="inner-content">
                    <div class="sec-title">
                        <h1>Nhiệm vụ về nha khoa H-Smile của chúng tôi</h1>
                    </div>
                    <div class="about-text-holder">
                        <p>H-Smile được bắt đầu vào năm 1995 như một phòng khám nha khoa tư nhân nhỏ ở Binghamton, NY, Hoa Kỳ. Tìm kiếm dịch vụ chăm sóc nha khoa giá cả phải chăng?</p>
                        <p>Lấy một ví dụ tầm thường, ai trong chúng ta từng thực hiện tập thể dục tốn nhiều công sức, ngoại trừ để có được một số lợi thế từ nó? Nhưng ai có quyền tìm ra lỗi lầm với một người đàn ông chọn tận hưởng một niềm vui không có hậu quả khó chịu, nỗi đau dẫn đến niềm vui ca ngợi những lời dạy của nhà thám hiểm vĩ đại...</p>
                        <div class="author-box fix">
                            <div class="img-box">
                                <img src="images/resources/ceo.png" alt="Awesome Image">
                            </div>
                            <div class="text-box">
                                <h3>Dr. Jerome Sinclair</h3>
                                <span>CEO &amp; Founder</span>
                            </div>
                            <div class="signatire-box">
                                <img src="images/resources/signature.png" alt="Signature">
                            </div>
                        </div>
                        <div class="read-more">
                            <a class="btn-two" href="#"><span class="flaticon-next"></span>Xem thêm về chúng tôi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
