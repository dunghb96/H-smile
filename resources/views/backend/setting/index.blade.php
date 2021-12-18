@extends('backend.layout.app')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">

                <!-- users filter end -->
                <!-- list section start -->
                <form class="form-validate" enctype="multipart/form-data" id="thongtin">
                    <div class="card pd-15">
                        <div class="row mt-1">
                            <div class="col-6">
                                <h4 class="mb-1"><span class="align-middle">Logo</span></h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mb-1"><span class="align-middle">Favicon</span></h4>
                            </div>

                            <div class="col-lg-6 d-flex mb-1">
                                <img id="avatar" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="hinhanh">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="hinhanh" name="hinhanh" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayanh()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex mb-1">
                                <img id="avatar" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="hinhanh">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="hinhanh" name="hinhanh" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayanh()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="mb-1"><span class="align-middle">Thông tin webiste</span></h4>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="tu_ngay">Từ ngày</label>
                                    <select class="form-control" name="tu_ngay" id="tu_ngay">
                                        <option value="">Từ ngày</option>
                                        <option value="1">Thứ 2</option>
                                        <option value="2">Thứ 3</option>
                                        <option value="3">Thứ 4</option>
                                        <option value="4">Thứ 5</option>
                                        <option value="5">Thứ 6</option>
                                        <option value="6">Thứ 7</option>
                                        <option value="7">CN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="tu_ngay">Từ ngày</label>
                                    <select class="form-control" name="tu_ngay" id="tu_ngay">
                                        <option value="">Từ ngày</option>
                                        <option value="1">Thứ 2</option>
                                        <option value="2">Thứ 3</option>
                                        <option value="3">Thứ 4</option>
                                        <option value="4">Thứ 5</option>
                                        <option value="5">Thứ 6</option>
                                        <option value="6">Thứ 7</option>
                                        <option value="7">CN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="ten_giao_dich">Giờ mở cửa</label>
                                    <input type="text" id="tungay" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="ma_so_thue">Giờ đóng cửa</label>
                                    <input type="text" id="denngay" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="name">Hotline</label>
                                    <input id="name" name="name" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input id="name" name="name" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="nguoi_dai_dien">Địa chỉ</label>
                                    <input id="nguoi_dai_dien" name="nguoi_dai_dien" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="ngay_cap">Site title</label>
                                    <input id="ngay_cap" name="ngay_cap" type="text" class="form-control flatpicker" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label for="noi_cap">Site description</label>
                                    <input id="noi_cap" name="noi_cap" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="chuc_danh">Bản đồ</label>
                                    <textarea id="chuc_danh" name="chuc_danh" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="mb-1 mt-1"><span class="align-middle">Social</span></h4>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="nguoi_dai_dien">Facebook</label>
                                    <input id="nguoi_dai_dien" name="nguoi_dai_dien" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="chuc_danh">Zalo</label>
                                    <input id="chuc_danh" name="chuc_danh" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="social_youtube" value="{{ old('social_youtube') ?? option('social_youtube') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                                <button class="dt-button add-new btn btn-primary" onclick="save();"><span>Cập nhật</span></button>
                            </div>

                        </div>



                    </div>

                </form>
            </section>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/backend/assets/js/setting.js"></script>
@endpush