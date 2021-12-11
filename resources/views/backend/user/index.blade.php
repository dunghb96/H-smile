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
                        <h2 class="content-header-title float-left mb-0">Hồ sơ nhân sự</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item">Nhân sự
                                </li>
                                <li class="breadcrumb-item active">Hồ sơ nhân sự
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
                            <div class="card-body mt-2">
                                <form class="dt_adv_search" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-row mb-1">
                                                <div class="col-lg-4">
                                                    <label>Tên nhân viên:</label>
                                                    <input type="text" class="form-control dt-input dt-full-name" data-column="1" placeholder="Tìm kiếm tên nhân viên" data-column-index="0" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Email:</label>
                                                    <input type="text" class="form-control dt-input" data-column="5" placeholder="demo@example.com" data-column-index="1" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Phòng ban:</label>
                                                    <input type="text" class="form-control dt-input" data-column="4" placeholder="Nhập phòng ban" data-column-index="2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr class="my-0" />
                            <div class="card-datatable">
                                <table class="datatables-basic table" id="tableBasic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Đơn vị</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal modal-slide-in new-user-modal fade" id="addnew">
                                <div class="modal-dialog">
                                    <form class="add-new-user modal-content pt-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm tài khoản mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="name">Tên đăng nhập</label>
                                                <input id="name" type="text" class="form-control" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mật khẩu</label>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2" />
                                                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Quyền</label>
                                                <select id="role" class="js-example-basic-multiple" name="role[]" multiple="multiple" required>
                                                    <!-- <option value="">Chọn các quyền</option> -->
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </form>
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
<script src="/backend/assets/js/user.js"></script>
@endpush