@extends('backend.layout.app')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Nhân viên</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Nhân viên
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Row grouping -->
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-datatable">
                                <table class="datatables-basic table" id="tableBasic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Vị trí</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal fade text-left" id="addnew" tabindex="-1" aria-labelledby="myModalLabel18" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modal-title">Thêm nhân viên mới</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="frm-add">
                                                <input type="hidden" id="type" name="type">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="name">Họ tên</label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên" required/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="role">Nhân viên</label>
                                                        <select id="role" class="select2 js-example-basic-multiple" name="role[]" multiple="multiple" onchange="changeRole()" required>
                                                            <option label=" "></option>
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">
                                                                {{ $role->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="phone_number">Số điện thoại</label>
                                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Số điện thoại" required/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="position">Vị trí</label>
                                                        <input type="text" name="position" id="position" class="form-control" placeholder="Vị trí" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="majors">Chuyên ngành</label>
                                                        <input type="text" name="majors" id="majors" class="form-control" placeholder="Chuyên ngành" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-password-toggle col-md-6">
                                                        <label class="form-label" for="password">Mật khẩu</label>
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label class="form-label" for="confirm_password">Nhập lại mật khẩu</label>
                                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="short_description">Giới thiệu</label>
                                                        <textarea name="short_description" id="short_description" class="form-control" placeholder="Giới thiệu ngắn"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6 d-none" id="service_input">
                                                        <label for="service">Dịch vụ</label>
                                                        <select id="service" class="select2 js-example-basic-multiple" name="service[]" multiple="multiple" required>
                                                            <option label=" "></option>
                                                            @foreach($services as $service)
                                                            <option value="{{ $service->id }}">
                                                                {{ $service->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </form>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-success btn-submit" onclick="save()">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--/ Row grouping -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/backend/assets/js/employee.js"></script>
@endpush