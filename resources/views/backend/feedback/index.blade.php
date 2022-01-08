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
                        <h2 class="content-header-title float-left mb-0">Feed back</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Feed back
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
                                            <th>Stt</th>
                                            <th>Họ Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Nội dung</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal modal-slide-in new-user-modal fade" id="addnew">
                                <div class="modal-dialog">
                                    <form class="modal-content pt-0" id="frm-add">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Tạo feed back mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="name">Họ Tên</label>
                                                <input id="name" type="text" class="form-control" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Địa chỉ</label>
                                                <input id="address" type="text" class="form-control" name="address" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Chi tiết</label>
                                                <textarea id="content" name="content" rows="3" class="form-control" placeholder="Chi tiết lời phản hồi"></textarea>
                                            </div>
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal modal-slide-in new-user-modal fade" id="editinfo">
                                <div class="modal-dialog">
                                    <form class="modal-content pt-0" id="frm-edit">
                                        <input type="hidden" name="id" id="iid">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Sửa feed back</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="ename">Họ tên</label>
                                                <input id="ename" type="text" class="form-control" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Giá</label>
                                                <input type="text" class="form-control" id="eaddress" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="econtent">Chi tiết</label>
                                                <textarea id="econtent" name="content" rows="3" class="form-control" placeholder="Chi tiết lời phản hồi"></textarea>
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
<script src="/backend/assets/js/feedback.js"></script>
@endpush
@push('css')
    <style>
        .sorting_1 {
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

@endpush
