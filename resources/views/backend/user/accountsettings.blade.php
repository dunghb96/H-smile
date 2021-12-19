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
                            <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                              href="app-todo.html"><i class="mr-1"
                                                                                                      data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item"
                                                                               href="app-chat.html"><i class="mr-1"
                                                                                                       data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                                                               href="app-email.html"><i class="mr-1"
                                                                                                        data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                                                                href="app-calendar.html"><i class="mr-1"
                                                                                                            data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column nav-left">
                                <!-- change password -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-password" data-toggle="pill"
                                       href="#account-vertical-password" aria-expanded="false">
                                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Change Password</span>
                                    </a>
                                </li>
                                <!-- information -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-pill-info" data-toggle="pill"
                                       href="#account-vertical-info" aria-expanded="false">
                                        <i data-feather="info" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Information</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!--/ left menu section -->

                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">

                                        <!-- change password -->
                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                             aria-labelledby="account-pill-password" aria-expanded="false">
                                            <!-- form -->
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if($errors)
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                            <form class="validate-form" id="frm-changePassword">
                                                <input type="hidden" name="id" id="iid" value="{{$dataUser->id}}">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="old-password">Mật khẩu hiện tại</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control"
                                                                       id="old-password" name="old-password"
                                                                       placeholder="Mật khẩu hiện tại"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="new-password">Mật khẩu mới</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="new-password"
                                                                       name="new-password" class="form-control"
                                                                       placeholder="Mật khẩu mới"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="re-new-password">Nhập lại mật khẩu mới</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control"
                                                                       id="re-new-password" name="re-new-password"
                                                                       placeholder="Nhập lại mật khẩu mới"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer"><i
                                                                            data-feather="eye"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-primary mr-1 mt-1"
                                                                onclick="editPassword()">Save changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-1">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                        <!--/ change password -->

                                        <!-- information -->
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-info"
                                             aria-labelledby="account-pill-general" aria-expanded="true">
                                            <!-- form -->
                                            <form class="validate-form" id="frm-edit" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="iid" value="{{$dataUser->id}}">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="name">Họ và tên</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" value="{{$dataUser->name}}"
                                                                   placeholder="Họ tên"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email">E-mail</label>
                                                            <input type="email" class="form-control" id="email"
                                                                   name="email" value="{{$dataUser->email}}"
                                                                   placeholder="Email" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="dien_thoai">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phoneNumber"
                                                                   value="{{$dataUser->phoneNumber}}"
                                                                   name="phoneNumber" placeholder="Số điện thoại"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="ngay_sinh">Ngày sinh</label>
                                                            <input type="date" class="form-control flatpickr-basic"
                                                                   placeholder="Ngày sinh" id="date"
                                                                   value="{{$dataUser->date}}" name="date"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="cmnd">CMND/CCCD</label>
                                                            <input type="text" class="form-control flatpickr"
                                                                   placeholder="CMND/CCCD" id="identityCard"
                                                                   value="{{$dataUser->identityCard}}"
                                                                   name="identityCard"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="dia_chi">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="address"
                                                                   placeholder="Địa chỉ" value="{{$dataUser->address}}"
                                                                   name="address"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="ghi_chu">Giới thiệu</label>
                                                            <textarea class="form-control" name="description"
                                                                      id="description" rows="4"
                                                                      placeholder="Giới thiệu">{{$dataUser->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="col-8">

                                                        </div>
                                                        <div class="media">
                                                            <a href="javascript:void(0);" class="mr-25">
                                                                @if($dataUser->avatar != null)
                                                                    <img src="{{$dataUser->avatar}}" id="avatar"
                                                                         class="rounded mr-50" alt="profile image"
                                                                         height="80"
                                                                         width="80" style="object-fit:cover"/>
                                                                @else
                                                                    <img src="/images/user.svg" id="avatar"
                                                                         class="rounded mr-50" alt="profile image"
                                                                         height="80"
                                                                         width="80" style="object-fit:cover"/>
                                                                @endif
                                                            </a>
                                                            <!-- upload and reset button -->
                                                            <div class="media-body mt-75 ml-1">
                                                                <div class="form-group">
                                                                    <label>Ảnh đại diện</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                               id="avatar" name="avatar">
                                                                        <label class="custom-file-label" for="eimage">Chọn
                                                                            hình ảnh</label>
                                                                    </div>
                                                                </div>
                                                                <p>Cho phép JPG, GIF or PNG. Max size of 5MB</p>
                                                            </div>
                                                            <!--/ upload and reset button -->
                                                        </div>

                                                    </div>

                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-primary mt-1 mr-1"
                                                                onclick="save()">Save changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-1">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                        <!--/ information -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
                <!-- / account setting page -->

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="/backend/assets/js/accountsettings.js"></script>
@endpush
