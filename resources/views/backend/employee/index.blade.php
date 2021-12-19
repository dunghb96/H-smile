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
                                            <section class="horizontal-wizard">
                                                <div class="bs-stepper horizontal-wizard-example" style="box-shadow: 0 0 0 0 #ffff;">
                                                    <div class="bs-stepper-header">
                                                        <div class="step" data-target="#tab1">
                                                            <button type="button" class="step-trigger">
                                                                <span class="bs-stepper-box">1</span>
                                                                <span class="bs-stepper-label">
                                                                    <span class="bs-stepper-title">Thông tin cá nhân</span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="line">
                                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                                        </div>
                                                        <div class="step" data-target="#tab2">
                                                            <button type="button" class="step-trigger">
                                                                <span class="bs-stepper-box">2</span>
                                                                <span class="bs-stepper-label">
                                                                    <span class="bs-stepper-title">Tài khoản</span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="bs-stepper-content">
                                                        <div id="tab1" class="content">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="name">Họ tên</label>
                                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên" />
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="type">Vị trí</label>
                                                                        <select class="form-control select2" name="type" id="type" onchange="changeType()">
                                                                            <option value=""></option>
                                                                            <option value="1">Nha sĩ</option>
                                                                            <option value="2">Thu ngân</option>
                                                                            <option value="3">Quản trị viên</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="phone_number">Số điện thoại</label>
                                                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Số điện thoại" />
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
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="short_description">Giới thiệu</label>
                                                                        <textarea name="short_description" id="short_description" class="form-control" placeholder="Giới thiệu ngắn" ></textarea>
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
                                                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                </button>
                                                                <button class="btn btn-primary btn-next">
                                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div id="tab2" class="content">
                                                            <form id="frm">
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="username">Tên đăng nhập</label>
                                                                        <input type="text" name="username" id="username" class="form-control" placeholder="User name" />
                                                                    </div>
                                                                    <div class="form-group form-password-toggle col-md-6">
                                                                        <label class="form-label" for="password">Mật khẩu</label>
                                                                        <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="role">Quyền</label>
                                                                        <select id="role" class="select2 js-example-basic-multiple" name="role[]" multiple="multiple" required>
                                                                            <option label=" "></option>
                                                                            @foreach($roles as $role)
                                                                            <option value="{{ $role->id }}">
                                                                                {{ $role->name }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="d-flex justify-content-between">
                                                                <button class="btn btn-primary btn-prev">
                                                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                </button>
                                                                <button class="btn btn-success btn-submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
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
<script src="/backend/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="/backend/assets/js/employee.js"></script>
@endpush