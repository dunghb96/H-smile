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
                    <h1><i class="fa fa-envelope"></i><span>Lịch hẹn khám nha khoa!</span></h1>
                    <p>Xin chào, {{$patientName->full_name}}</p>
                    <p>Cảm ơn bạn đã chờ đợi, chúng tôi đã sắp xếp lịch thành công cho bạn. Vui lòng bạn đến đúng
                        giờ</p>
                    <span class="font-weight-bold">Tại <span>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội </span></span>
                    <p>Thông tin lịch khám</p>
                    <ul>
                        <li>Dịch vụ: {{$serviceSelected->name}}</li>
                        <li>Thời gian: {{ date('d-m-Y', strtotime($dateSelected)) }}</li>
                        <li>Thời gian: lúc {{ $time_at }}</li>

                        <li>Bác sĩ tiếp nhận: {{ $doctorSelected->name }}</li>
                        <li>Email bác sĩ: {{ $doctorSelected->email }}</li>
                        <li>Số điện thoại bác sĩ: {{ $doctorSelected->phone_number }}</li>

                        {{--                        <li>Tại: {{$timeat}}</li>--}}
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
