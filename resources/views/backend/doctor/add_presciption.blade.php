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
                        <h2 class="content-header-title float-left mb-0">Nha sĩ</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Nha sĩ
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Row grouping -->
           <form action="{{ route('admin.doctor.store_prescription')}}" method="post" >
            @csrf
                <div class="add_medicine">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="medicine_name[]" id="">
                                @foreach ($medicine as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="quantity[]" placeholder="Số lượng">
                        </div>
                        <div class="col-4">
                            <a class="btn btn-success" onclick="addMedicine()">Thêm</a>
                            <a class="btn btn-danger" onclick="deleteMedicine()">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit"  class="btn btn-primary">Tạo đơn thuốc</button>
                </div>
            </form>
            <!--/ Row grouping -->
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    function addMedicine () {
    $(".add_medicine").append(`
               <div class="row">
                    <div class="col-4">
                        <select class="form-control" name="medicine_name[]" id="">
                            @foreach ($medicine as $row)
                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="quantity[]" placeholder="Số lượng">
                    </div>
                    <div class="col-4">
                        <a class="btn btn-success"  onclick="addMedicine()">Thêm</a>
                        <a class="btn btn-danger delete_medicine" onclick="deleteMedicine()">Xóa</a>
                    </div><br>
                </div>
    `);
    function deleteMedicine(e) {
        console.log(123);
        e.parent().parent().remove();
    }

    function deleteMedicine(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        }
        $(function() {
            $(document).on('click', '.delete_medicine', deleteMedicine);
        })
}
</script>

@endpush
