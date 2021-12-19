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
                <form class="form-validate" enctype="multipart/form-data" id="frm-setting" >
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
                                <img id="logo-img" src="{{option('logo')}}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="logo">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="logo" name="logo" hidden accept="image/png, image/jpeg, image/jpg" onchange="thaylogo()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex mb-1">
                                <img id="favicon-img" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="favicon">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="favicon" name="favicon" hidden accept="image/png, image/jpeg, image/jpg" onchange="thayfavicon()" />
                                            <span class="d-block d-sm-none">
                                                <i class="mr-0" data-feather="edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex mb-1">
                                <img id="logofooter-img" src="" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" width="150" />
                                <div class="media-body col-lg-12 mt-50">
                                    <div class="d-flex mt-1 px-0">
                                        <label class="btn btn-primary mr-75 mb-0" for="logo_footer">
                                            <span class="d-none d-sm-block">Thay ảnh</span>
                                            <input class="form-control" type="file" id="logo_footer" name="logo_footer" hidden accept="image/png, image/jpeg, image/jpg" onchange="thaylogofooter()" />
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
                                    <label for="start_date">Từ ngày</label>
                                    <select class="form-control" name="start_date" id="start_date">
                                        <option value="">Từ ngày</option>
                                        <option value="1" {{ option('start_date') == 1 ? 'selected' : '' }}>Thứ 2</option>
                                        <option value="2" {{ option('start_date') == 2 ? 'selected' : '' }}>Thứ 3</option>
                                        <option value="3" {{ option('start_date') == 3 ? 'selected' : '' }}>Thứ 4</option>
                                        <option value="4" {{ option('start_date') == 4 ? 'selected' : '' }}>Thứ 5</option>
                                        <option value="5" {{ option('start_date') == 5 ? 'selected' : '' }}>Thứ 6</option>
                                        <option value="6" {{ option('start_date') == 6 ? 'selected' : '' }}>Thứ 7</option>
                                        <option value="7" {{ option('start_date') == 7 ? 'selected' : '' }}>CN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Đến ngày</label>
                                    <select class="form-control" name="end_date" id="end_date">
                                        <option value="">Đến ngày</option>
                                        <option value="1" {{ option('end_date') == 1 ? 'selected' : '' }}>Thứ 2</option>
                                        <option value="2" {{ option('end_date') == 2 ? 'selected' : '' }}>Thứ 3</option>
                                        <option value="3" {{ option('end_date') == 3 ? 'selected' : '' }}>Thứ 4</option>
                                        <option value="4" {{ option('end_date') == 4 ? 'selected' : '' }}>Thứ 5</option>
                                        <option value="5" {{ option('end_date') == 5 ? 'selected' : '' }}>Thứ 6</option>
                                        <option value="6" {{ option('end_date') == 6 ? 'selected' : '' }}>Thứ 7</option>
                                        <option value="7" {{ option('end_date') == 7 ? 'selected' : '' }}>CN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="time_open">Giờ mở cửa</label>
                                    <input type="text" name="time_open" id="time_open" value="{{ old('time_open') ?? option('time_open') }}" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <label for="time_close">Giờ đóng cửa</label>
                                    <input type="text" name="time_close" id="time_close" value="{{ old('time_close') ?? option('time_close') }}" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="hotline">Hotline</label>
                                    <input id="hotline" name="hotline" type="text" value="{{ old('hotline') ?? option('hotline') }}" class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="text" value="{{ old('email') ?? option('email') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input id="address" name="address" type="text" value="{{ old('address') ?? option('address') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="site_title">Site title</label>
                                    <input id="site_title" name="site_title" type="text" value="{{ old('site_title') ?? option('site_title') }}" class="form-control flatpicker" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label for="site_desc">Site description</label>
                                    <input id="site_desc" name="site_desc" type="text" value="{{ old('site_desc') ?? option('site_desc') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="map">Bản đồ</label>
                                    <textarea id="map"rows="5"  name="map" class="form-control">{{ old('map') ?? option('map') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="about">Bài giới thiệu</label>
                                    <textarea rows="5" id="about" name="about" class="form-control">{{  old('about') ?? option('about') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="mb-1 mt-1"><span class="align-middle">Social</span></h4>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input id="facebook" name="facebook" type="text" value="{{ old('facebook') ?? option('facebook') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label for="zalo">Zalo</label>
                                    <input id="zalo" name="zalo" type="text" value="{{ old('zalo') ?? option('zalo') }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" id="youtube" name="youtube" value="{{ old('youtube') ?? option('youtube') }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between">
                                <button class="dt-button btn btn-primary" type="button" onclick="save();"><span>Cập nhật</span></button>
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
