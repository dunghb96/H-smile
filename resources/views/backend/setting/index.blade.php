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
                <form class="form-validate" enctype="multipart/form-data" id="setting" >
                    <div class="card pd-15">
                        <div class="row mt-1">
                            <div class="col-4">
                                <h4 class="mb-1"><span class="align-middle">Logo</span></h4>
                            </div>
                            <div class="col-4">
                                <h4 class="mb-1"><span class="align-middle">Favicon</span></h4>
                            </div>
                            <div class="col-4">
                                <h4 class="mb-1"><span class="align-middle">Logo Footer</span></h4>
                            </div>

                            <div class="col-lg-4 d-flex mb-1">
                                <img id="avatar" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="logo">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="logo" name="logo" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayanh()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex mb-1">
                                <img id="avatar" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="favicon">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="favicon" name="favicon" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayanh()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex mb-1">
                                <img id="avatar" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="logo_footer">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="logo_footer" name="logo_footer" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayanh()" />
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
                                    <label for="begin_date">Từ ngày</label>
                                    <select class="form-control" name="begin_date" id="begin_date">
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
                                    <label for="to_date">Từ ngày</label>
                                    <select class="form-control" name="to_date" id="to_date">
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
                                    <label for="open">Giờ mở cửa</label>
                                    <input type="text" name="open" id="open" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="close">Giờ đóng cửa</label>
                                    <input type="text" name="close" id="close" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="hotline">Hotline</label>
                                    <input id="hotline" name="hotline" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input id="address" name="address" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="site_title">Site title</label>
                                    <input id="site_title" name="site_title" type="text" class="form-control flatpicker" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label for="site_desc">Site description</label>
                                    <input id="site_desc" name="site_desc" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="map">Bản đồ</label>
                                    <textarea id="map" name="map" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="map">Bài giới thiệu</label>
                                    <textarea rows="8" id="about" name="about" class="form-control">{{  old('youtube') ?? option('about') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="mb-1 mt-1"><span class="align-middle">Social</span></h4>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input id="facebook" name="facebook" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="zalo">Zalo</label>
                                    <input id="zalo" name="zalo" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" name="youtube" value="{{ old('youtube') ?? option('youtube') }}" class="form-control">
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
