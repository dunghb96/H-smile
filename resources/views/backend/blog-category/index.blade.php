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
                        <h2 class="content-header-title float-left mb-0">Bài viết</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Danh mục
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
                                            <th>Tên danh mục</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal fade text-left show" id="addnew" tabindex="-1" aria-labelledby="myModalLabel19" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel19">Thêm danh mục mới</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form class="modal-body" id="frm-add">
                                            <div class="form-group">
                                                <label for="name">Tên danh mục</label>
                                                <input id="name" type="text" class="form-control" name="name" required />
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="modal new-user-modal fade" id="addnew">
                                <div class="modal-sm">
                                    <form class="modal-content pt-0" id="frm-add">
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm danh mục mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="name">Tên danh mục</label>
                                                <input id="name" type="text" class="form-control" name="name" required />
                                            </div>
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
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
<script src="/backend/assets/js/blog-category.js"></script>
@endpush