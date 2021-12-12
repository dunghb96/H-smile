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
                        <h2 class="content-header-title float-left mb-0">Blog</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Bài viết
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
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal new-user-modal fade" id="addnew">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content pt-0">
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm bài viết mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <form id="frm-add" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label>Hình ảnh</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">Tiêu đề</label>
                                                    <input id="title" type="text" class="form-control" name="title" />
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label for="category">Danh mục</label>
                                                        <select class="form-control" id="category" name="category" required>
                                                            @foreach($blogcates as $cate)
                                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Mô tả ngắn</label>
                                                    <input id="short_desc" type="text" class="form-control" name="short_desc" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Mô tả</label>
                                                    <textarea id="description" name="content" rows="10" class="form-control my-editor" placeholder="Bắt đầu bài viết"></textarea>
                                                </div>
                                                <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal new-user-modal fade" id="editinfo">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content pt-0">
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button> -->
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm slide mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <form id="frm-edit" enctype="multipart/form-data">
                                                < <!-- <img id="slide" src="/frontend/images/slides/v1-1.jpg" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="350" /> -->
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                        <label class="custom-file-label" for="image">Chọn hình ảnh</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Tiêu đề</label>
                                                    <input id="title" type="text" class="form-control" name="title" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Danh mục</label>
                                                    <select class="form-control" id="category" name="category" required>
                                                        @foreach($blogcates as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Mô tả</label>
                                                    <textarea id="description" name="description" rows="5" class="form-control my-editor" placeholder="Chi tiết dịch vụ"></textarea>
                                                </div>
                                                <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>F
                                            </form>

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
<script src="/backend/dist/js/pages/form/tinymce/tinymce.js"></script>
<script src="/backend/assets/js/blog.js"></script>
@endpush
