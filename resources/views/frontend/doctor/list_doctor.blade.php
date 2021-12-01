@extends('frontend.layout.index')
@section('content')
<main id="main">
    <section class="breadcrumbs">
    </section>
    <section>
        <center>
            <h2>ĐỘI NGŨ NHA SĨ</h2>
        </center>
        <br>
        <div class="nhasi">
            <div class="row">
                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/1.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Nguyễn Huy Cường</h2>
                        <p><a href="nhasiNHC.html" class="btn btn-primary " href="#">Xem chi tiết</a></p>
                    </center>
                </div><!-- /.col-lg-4 -->

                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/3.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Phạm Hoài Nam</h2>
                        <p><a href="#" class="btn btn-primary" href="#">Xem chi tiết</a></p>
                    </center>
                </div><!-- /.col-lg-4 -->

                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/4.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Lương Quỳnh Tâm</h2>
                        <p><a href="#" class="btn btn-primary" href="#">Xem chi tiết </a></p>
                    </center>

                </div><!-- /.col-lg-4 -->

                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/6.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Nguyễn Thanh Hà</h2>
                        <p><a href="#" class="btn btn-primary" href="#">Xem chi tiết</a></p>
                    </center>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/10.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Trần Phương</h2>
                        <p><a href="#" class="btn btn-primary" href="#">Xem chi tiết</a></p>
                    </center>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <center>
                        <img class="bd-placeholder-img rounded-circle" width="140" height="140"
                            src="{{ asset('frontend/assets/img/9.jpg') }}" role="img" aria-label="Placeholder: 140x140"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        <h2>Nha sĩ Trần Văn Hùng</h2>
                        <p><a href="#" class="btn btn-primary" href="#">Xem chi tiết</a></p>
                    </center>
                </div><!-- /.col-lg-4 -->
            </div>
        </div>
    </section>
</main>
@endsection
