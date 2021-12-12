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
                        <h2 class="content-header-title float-left mb-0">Bảng giá</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Bảng giá
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
                                            <th>Tên dịch vụ</th>
                                            <th>Quy trình</th>
                                            <th>Giá</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal fade text-left" id="ngansach" tabindex="-1" aria-labelledby="myModalLabel18" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modal-title4">Thêm ngân sách</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <thead>
                                                    <th style="width:250px">Nguồn ứng viên</th>
                                                    <th style="width:100px">Tổng CV</th>
                                                    <th style="width:190px">Chi phí dự kiến</th>
                                                    <th style="width:190px">Bình quân</th>
                                                    <th></th>
                                                </thead>
                                                <tbody id="ngansach_tb">
                                                    <tr>
                                                        <td class="pr-1"><input type="text" class="form-control input format_number" value="Ngân sách dự kiến" disabled></td>
                                                        <td class="pr-1"><input type="text" class="form-control input format_number" value="" disabled></td>
                                                        <td class="pr-1"><input type="text" class="form-control input format_number" value="" id="chi_phi_du_kien" disabled></td>
                                                        <td class="pr-1"><input type="text" class="form-control input format_number" value="Chi phí bình quân" disabled></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <td class="pr-1"><i data-feather='plus-circle' onclick="addngansach()"></i><span class="float-right">Tổng thực tế</span></td>
                                                    <td class="pr-1"><input type="text" class="form-control input format_number" id="totalcv" value="0" disabled></td>
                                                    <td class="pr-1"><input type="text" name="chi_phi_thuc_te" class="form-control input format_number" value="" id="tongchiphi" disabled></td>
                                                    <td class="pr-1"><input type="text" class="form-control input format_number" value="0" id="tongbinhquan" disabled></td>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-dismiss="modal" onclick="saveduyet()">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
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
<script src="/backend/assets/js/price-list.js"></script>
@endpush