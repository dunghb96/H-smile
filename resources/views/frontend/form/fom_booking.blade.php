@extends('frontend.layout.index')
@section('content')
    @include('frontend.layout.breadcrumb')
    <!--Start Appointment area -->
<div class="appointment-area2" id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-title max-width text-center">
                    <h1>Đặt lịch hẹn</h1>
                    <p>Tại đây, bạn có thể yêu cầu các bác sĩ có thời gian sẵn sàng và bạn có thể có được thời gian đến bệnh viện thăm khám hoàn hảo.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8" style="margin: 0 auto;">
                <div class="appointment-form-left">
                    <form id="appointment_form" action="{{ route('postData') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Thời gian </h5>
                                    </div>
                                    <div class="input-box">
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input  type="text" name="date" placeholder="Chọn ngày hẹn" id="my_date_picker" >
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Chọn giờ khám</h5>
                                    </div>
                                    <div class="input-box">
                                        <div class="available-time">
                                            <ul>
                                                <li class="active">9.00am</li>
                                                <li>11.30am</li>
                                                <li>12.00pm</li>
                                                <li>3.00pm</li>
                                                <li>4.00pm</li>
                                                <li>5.00pm</li>
                                                <li>5.30pm</li>
                                                <li>6.00pm</li>
                                                <li>7.00pm</li>
                                                <li>7.30pm</li>
                                            </ul>
                                            <input type="hidden" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Thông tin <br><br> của bạn </h5>
                                    </div>
                                    <div class="input-box">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="name" placeholder="Tên bệnh nhân*" >
                                            </div>
                                            <div class="col-xl-6">
                                                @error('age')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="age" value="" placeholder="Tuổi*" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="phone" value="" placeholder="Số điện thoại*" >
                                            </div>
                                            <div class="col-xl-6">
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                Giới tính :
                                                <input type="radio" name="gender" value="0" > Nam<br>
                                                &emsp;&emsp;&emsp;&emsp;&ensp;  <input type="radio" name="gender" value="1"> Nữ
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="email" value="" placeholder="Email*" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                Chọn dịch vụ
                                                <select class="form-control" id="sel1" name="service" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                                @error('service')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6">
                                                Chọn nha sĩ
                                                <select class="form-control" id="sel1" name="doctor" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                                @error('doctor')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br><br>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <textarea name="form_description" placeholder="Miêu tả..."></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="button-box">
                                                    <button class="btn-one" type="submit">Lựa chọn</button>
                                                    <a class="btn-one" >Xem lịch đã đặt</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Appointment area -->
@endsection
@section('style')
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<style>
    tr .col2 {
        text-align: right;
    }
</style>
@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
<script>
    $(document).ready(function() {

        $(function() {
            $( "#my_date_picker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                dayNamesMin: [ "CN", "2", "3", "4", "5", "6", "7" ],
                monthNames: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ]
            });
        });
    })
</script>
@endsection

