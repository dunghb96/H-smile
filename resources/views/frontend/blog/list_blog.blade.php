@extends('frontend.layout.index')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="section-title">
                <h2>Tin tức nha khoa</h2>
            </div>
            <div class="container" id="new">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Răng xỉn màu. Nguyên nhân do đâu và cách khắc phục.</h5>
                                <p class="card-text">Hàm răng trắng khiến nụ cười của bạn rạng ngời và tỏa sáng tự tin. Tuy
                                    nhiên có tới
                                    trên 90% trong số chúng ta gặp phải tình trạng răng ...</p>
                                <a href="detail-new.html">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 26/04/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-2.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Viêm lợi sau khi bọc răng sứ. Nguyên nhân và cách khắc phục.</h5>
                                <p class="card-text">Trong một số trường hợp sau khi bọc răng sứ, có hiện tượng lợi bị viêm,
                                    sưng, tấy đỏ. Răng cũng yếu và chảy máu khi đánh răng. Miệng có ...</p>
                                <a href="">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 26/04/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-3.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">3 nguyên nhân khiến chân răng sứ bị hôi và cách khắc phục ?</h5>
                                <p class="card-text">Trong một số trường hợp sau khi bọc răng sứ, có hiện tượng lợi bị viêm,
                                    sưng, tấy đỏ. Răng cũng yếu và chảy máu khi đánh răng. Miệng có ...</p>
                                <a href="">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 05/01/2021</small>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-4.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">NHỔ RĂNG CHỈNH NHA CÓ GÂY ẢNH HƯỞNG THẦN KINH?</h5>
                                <p class="card-text">Nhổ răng chỉnh nha là chỉ định của bác sĩ trong một số trường hợp niềng
                                    răng. Có nhiều ý kiến cho rằng nhổ răng gây ảnh hưởng đến sức ...</p>
                                <a href="">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 24/11/2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-5.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">CÁCH LÀM TRẮNG RĂNG BỊ VÀNG HIỆU QUẢ NHẤT HIỆN NAY</h5>
                                <p class="card-text">Một hàm răng trắng sẽ giúp nụ cười tự tin hơn bao giờ hết, do đó tìm
                                    kiếm cách làm trắng răng bị vàng là nhu cầu của rất nhiều...</p>
                                <a href="">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 28/10/2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('frontend/assets/img/news/a-6.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chỉnh nha cố định - Bí quyết cho hàm răng đều đẹp chuẩn vị trí </h5>
                                <p class="card-text">Chỉnh nha cố định luôn là phương pháp truyền thống được khách hàng tin
                                    dùng vì sự hiệu quả khách hàng nhận được trên hàm răng của mình. Để hiểu ...</p>
                                <a href="">Xem thêm</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Ngày 28/12/2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
