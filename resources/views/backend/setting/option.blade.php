@extends('backend.layouts.app')

@section('title')
Cài đặt chung
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Cài đặt chung'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('backend.components.notification')
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Setting website</h4> <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo</label>
                                            @includeIf('backend.components.select_file', [
                                            'keyId' => "site_logo",
                                            'inputName' => "site_logo",
                                            'inputValue' => old('site_logo') ?? option('site_logo') ?? '',
                                            'lfmType' => 'file',
                                            'classPreview' => 'col-4',
                                            'classInput' => 'col-8',
                                            'note' => '',
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo footer</label>
                                            @includeIf('backend.components.select_file', [
                                            'keyId' => "site_logo_footer",
                                            'inputName' => "site_logo_footer",
                                            'inputValue' => old('site_logo_footer') ?? option('site_logo_footer') ?? '',
                                            'lfmType' => 'file',
                                            'classPreview' => 'col-4',
                                            'classInput' => 'col-8',
                                            'note' => '',
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Favicon</label>
                                            @includeIf('backend.components.select_file', [
                                            'keyId' => "site_favicon",
                                            'inputName' => "site_favicon",
                                            'inputValue' => old('site_favicon') ?? option('site_favicon') ?? '',
                                            'lfmType' => 'file',
                                            'classPreview' => 'col-4',
                                            'classInput' => 'col-8',
                                            'note' => '',
                                            ])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hotline</label>
                                            <input type="text" name="contact_phone" value="{{ old('contact_phone') ?? option('contact_phone') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="contact_email" value="{{ old('contact_email') ?? option('contact_email') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="contact_address" value="{{ old("contact_address") ?? option("contact_address") }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Google maps</label>
                                            <textarea class="form-control" name="contact_google_maps" rows="5">{{ old("contact_google_maps") ?? option("contact_google_maps") }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Site title</label>
                                            <input class="form-control" name="site_title" value="{{old("site_title") ?? option("site_title") }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Site description</label>
                                            <textarea class="form-control" name="site_description" rows="5">{{ old("site_description") ?? option("site_description") }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Email notification</h4> <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><small>Separate emails by commas</small></label>
                                            <input type="text" name="emails_receive_notification" value="{{ old('emails_receive_notification') ?? option('emails_receive_notification') }}" class="form-control tags" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Social</h4> <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" name="social_facebook" value="{{ old('social_facebook') ?? option('social_facebook') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Line ID</label>
                                            <input type="text" name="social_line" value="{{ old('social_line') ?? option('social_line') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Zalo</label>
                                            <input type="text" name="social_zalo" value="{{ old('social_zalo') ?? option('social_zalo') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            <input type="text" name="social_linkedin" value="{{ old('social_linkedin') ?? option('social_linkedin') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" name="social_instagram" value="{{ old('social_instagram') ?? option('social_instagram') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input type="text" name="social_youtube" value="{{ old('social_youtube') ?? option('social_youtube') }}" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/bootstrap-tagsinput/tagsinput.css') }}">
<link rel="stylesheet" type="text/css" href="/backend/plugins/select2/css/select2.min.css">
@endpush

@push('js')
<script src="{{ asset('backend/plugins/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="{{ asset('backend/dist/js/pages/form/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap-tagsinput/tagsinput.js') }}"></script>
<script>
    $(function() {
        $('input.tags').tagsinput({
            trimValue: true
        });
    })
</script>
@endpush