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
                                        <h5>Chọn nha sĩ</h5>
                                    </div>
                                    <div class="input-box">
                                        <select class="selectmenu">
                                            <option value="1" selected="selected">Tiến sĩ Daryl Cornelius</option>
                                            <option value="2">Evelynne Mirando</option>
                                            <option value="3">Tiến sĩ Robert B. Moreau</option>
                                            <option value="4">Tiến sĩ Greg House</option>
                                            <option value="5">Tiến sĩ Sarah Johnson</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="single-box">
                                    <div class="title">
                                        <h5>Thời gian </h5>
                                    </div>
                                    <div class="input-box">
                                        <input  type="text" name="date" placeholder="Ngày" id="datepicker">
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
                                                <input type="text" name="name" placeholder="Tên bệnh nhân*" >
                                            </div>
                                            <div class="col-xl-6">
                                                <select name="" class="selectmenu">
                                                    <option value="1"  selected="selected">Dịch vụ</option>
                                                    <option value="2">Cấy ghép nha khoa</option>
                                                    <option value="3">Nha khoa Laser</option>
                                                    <option value="4">Chỉnh nha</option>
                                                    <option value="5"> Nha chu </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <input type="text" name="phone" value="" placeholder="Số điện thoại*" >
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="age" value="" placeholder="Tuổi*">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <input type="text" name="eamil" value="" placeholder="Email*" >
                                            </div>
                                        </div>
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
<style>
    tr .col2 {
        text-align: right;
    }
</style>
@endsection


