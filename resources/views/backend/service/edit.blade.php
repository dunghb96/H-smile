@extends('backend.layouts.app')

@section('title')
Sửa dịch vụ
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('backend.layouts.content-header', ['page' => 'Sửa dịch vụ'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @include('backend.components.notification')
          <div class="card">
            <form class="col-md-12" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="inputDescription">Name Service</label>
                  <input name="name" value="{{old('name',$service->name)}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
                  @error('name')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="inputSpentBudget">detail</label>
                  <input type="text" value="{{old('detail',$service->detail)}}" name="detail" class="form-control">
                  @error('detail')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select id="inputStatus" class="form-control custom-select" value="{{old('status')}}" name="Status">
                    <option value="1" {{($service->status==1) ? 'selected' : ""}}>Tạm ngưng</option>
                    <option value="2" {{($service->status==2) ? 'selected' : ""}}>Đang tiến hành</option>

                  </select>
                </div>

              </div>
              <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">

            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Ảnh đại diện</label>
                <input type="file" name="image" value="{{$service->image}}" class="form-control">
                <img src="{{asset('storage/' . $service->image)}}" width="50%">
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('service') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-success float-center">Create new Porject</button>
        </div>
      </div>

      </form>
    </div>
  </div>
</div>
</div>
</div>

</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/pages/form/select2/select2.init.js') }}"></script>
@endpush