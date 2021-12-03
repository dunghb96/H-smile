@extends('frontend.layout.index')
@section('content')
    <section class="breadcrumbs">
    </section>
    <section class="inner-page">

        <div class="container">
            <div class="section-title">
                <h2>ĐẶT LỊCH HẸN</h2>
                <p style="text-align: center;"><i>Vui lòng để lại thông tin, nhu cầu của quý khách.</i> </p>
                <p style="text-align: center;"><i> Nha khoa H-Smile sẽ liên hệ đến Quý Khách trong thời gian sớm nhất</i>
                </p>
            </div>
            <br>
            <form action="{{ route('postData') }}" method="post" role="form" class="php-email-form" >
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Họ Và Tên"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                            data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        Giới tính : &nbsp;
                        <input type="radio"  name="gender" id="gender" value="0"> Nam &nbsp;
                        <input type="radio"  name="gender" id="gender" value="1"> Nữ
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Địa chỉ"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="number" class="form-control" name="age" id="age" placeholder="Tuổi"
                            data-rule="age" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Số Điện Thoại"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <textarea class="form-control" name="reason" rows="5" placeholder="Lý do khám"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <textarea class="form-control" name="status_desc" rows="5" placeholder="Mô tả triệu chứng"></textarea>
                    <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <select name="department" id="department" class="form-select">
                            <option value="">Dịch Vụ</option>
                            <option value="Department 1">Dịch Vụ 1</option>
                            <option value="Department 2">Dịch Vụ 2</option>
                            <option value="Department 3">Dịch Vụ 3</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select">
                            <option value="">Nha sĩ</option>
                            <option value="Doctor 1">Nha sĩ 1</option>
                            <option value="Doctor 2">Nha sĩ 2</option>
                            <option value="Doctor 3">Nha sĩ 3</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Ngày Hẹn"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <select name="doctor" id="doctor" class="form-select">
                            <option value="">Ca khám</option>
                            <option value="time 1">Ca 1</option>
                            <option value="time 2">Ca 2</option>
                            <option value="time 3">Ca 3</option>
                            <option value="time 4">Ca 4</option>
                            <option value="time 5">Ca 5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Ghi Chú"></textarea>
                    <div class="validate"></div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit"
                        style="border: none;background-color: #1977cc;color: white;width: 80px;height:50px;border-radius: 10px;">Đặt lịch
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
