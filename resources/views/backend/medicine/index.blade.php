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
                        <h2 class="content-header-title float-left mb-0">Dịch vụ</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Dịch vụ
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
                                            <th>Ảnh</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Danh mục</th>
                                            <th>Giá</th>
                                            <th>Thời lượng</th>
                                            <th>Trạng thái</th>
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
                                            <h5 class="modal-title">Thêm dịch vụ mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="name">Tên dịch vụ</label>
                                                <input id="name" type="text" class="form-control" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Danh mục</label>
                                                <select class="form-control" id="category_id" name="category_id" required>
                                                    <option value="0">ROOT</option>
                                                    @foreach($service_category as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá (VND)</label>
                                                <input type="number" class="form-control" id="price" name="price">
                                            </div>
                                            <div class="form-group">
                                                <label>Thời lượng (phút)</label>
                                                <input type="number" class="form-control" id="time" name="time">
                                            </div>
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="icon" name="icon">
                                                    <label class="custom-file-label" for="image">Chọn Icon</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="short_description">Mô tả</label>
                                                <input id="short_description" type="text" class="form-control" name="short_description" placeholder="Mô tả ngắn" />
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Chi tiết</label>
                                                <textarea id="content" name="content" rows="3" class="form-control" placeholder="Chi tiết dịch vụ"></textarea>
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
                                            <h5 class="modal-title">Thêm dịch vụ mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="name">Tên dịch vụ</label>
                                                <input id="ename" type="text" class="form-control" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Danh mục</label>
                                                <select class="form-control" id="ecategory_id" name="category_id" required>
                                                    <option value="0">ROOT</option>
                                                    @foreach($service_category as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Giá (VND)</label>
                                                <input type="number" class="form-control" id="eprice" name="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Thời lượng (phút)</label>
                                                <input type="number" class="form-control" id="etime" name="time">
                                            </div>
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="eicon" name="icon">
                                                    <label class="custom-file-label" for="eicon">Chọn Icon</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="eimage" name="image">
                                                    <label class="custom-file-label" for="eimage">Chọn hình ảnh</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="short_description">Mô tả</label>
                                                <input id="eshort_description" type="text" class="form-control" name="short_description" placeholder="Mô tả ngắn" />
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Chi tiết</label>
                                                <textarea id="econtent" name="content" rows="3" class="form-control" placeholder="Chi tiết dịch vụ"></textarea>
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
<script src="/backend/assets/js/service.js"></script>
@endpush
