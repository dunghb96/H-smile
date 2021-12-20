<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        body {
            margin-top: 20px;
        }

        .mail-seccess {
            text-align: center;
            background: #fff;
            border-top: 1px solid #eee;
        }

        .mail-seccess .success-inner {
            display: inline-block;
        }

        .mail-seccess .success-inner h1 {
            font-size: 100px;
            text-shadow: 3px 5px 2px #3333;
            color: #006DFE;
            font-weight: 700;
        }

        .mail-seccess .success-inner h1 span {
            display: block;
            font-size: 25px;
            color: #333;
            font-weight: 600;
            text-shadow: none;
            margin-top: 20px;
        }

        .mail-seccess .success-inner p {
            padding: 20px 15px;
        }

        .mail-seccess .success-inner .btn {
            color: #fff;
        }
    </style>
</head>
<body>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<section class="mail-seccess section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <!-- Error Inner -->
                <div class="success-inner">
                    <h1><i class="fa fa-envelope"></i><span>Yêu cầu đặt lịch thành công!</span></h1>
                    <p>Xin chào, {{$patient}}</p>
                    <p>Cảm ơn bạn đã tin tưởng dịch vụ của chung tôi, yêu cầu đặt lịch của bạn đã được tiếp nhận. Nhân
                        viên tư vấn sẽ gọi lại và xác minh lịch khám của mình một lần nữa</p>

                    <p>Thông tin yêu cầu đặt lịch</p>
                    <ul>
                        <li>Dịch vụ: {{$serviceSelected}}</li>
                        <li>Thời gian: {{ $dateSelected }}</li>
                        <li>Bác sĩ tiếp nhận: {{ $doctor }}</li>
                        <li>Tại: {{$timeat}}</li>
                    </ul>
                    <p class="font-weight-bold">Cảm ơn quý khách</p>


                </div>
                <!--/ End Error Inner -->
            </div>
        </div>
    </div>
</section>

</body>
</html>
