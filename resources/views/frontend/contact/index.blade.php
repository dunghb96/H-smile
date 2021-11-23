@extends('frontend.layout.index')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        </section>
        <!-- End Breadcrumbs Section -->
        <section class="inner-page">
            <div class="container">
                <section id="contact" class="contact">
                    <div class="container">
                        <div class="section-title">
                            <h2>Liên hệ</h2>
                            <p>Chất lượng cuộc sống ngày càng tăng cao dẫn đến nhu cầu khám chữa và chăm sóc răng miệng
                                cũng được chú trọng hơn. Là cơ sở đi đầu trong việc cung cấp những dịch vụ khám chữa
                                răng hàm mặt và chỉnh nha chất lượng cao, H-Smile được khách hàng tín nhiệm
                                bởi đội ngũ bác sĩ chuyên môn cao và cơ sở vật chất hiện đại đạt chuẩn quốc tế</p>
                        </div>
                    </div>
                    <div>
                        <iframe style="border:0; width: 100%; height: 350px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.307443384207!2d105.84752411437815!3d21.02038099344149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab928ae4efdb%3A0xdc9feb22c4e3ecce!2zMSBOZ8O0IFbEg24gU-G7nywgVHLhuqduIEjGsG5nIMSQ4bqhbywgSG_DoG4gS2nhur9tLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1636623294768!5m2!1svi!2s"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="container">
                        <div class="row mt-5">

                            <div class="col-lg-4">
                                <div class="info">
                                    <div class="address">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Vị trí:</h4>
                                        <p>Số 1 Ngô Văn Sở, Trần Hưng Đạo, Hoàn Kiếm, Hà Nội</p>
                                    </div>
                                    <div class="email">
                                        <i class="bi bi-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>hsmile@gmail.com</p>
                                    </div>
                                    <div class="phone">
                                        <i class="bi bi-phone"></i>
                                        <h4>Call:</h4>
                                        <p> +84 988 077 68</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-5 mt-lg-0">
                                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Họ và tên" required>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="Email" id="email"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="number" class="form-control" name="" id="Số điện thoại"
                                            placeholder="Subject" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="message" rows="5" placeholder="Lời nhắn"
                                            required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Tin nhắn của bạn đã được gửi. Cảm ơn bạn!</div>
                                    </div>
                                    <div class="text-center"><button type="submit">Gửi</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection
