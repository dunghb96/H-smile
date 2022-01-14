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
                                <li class="breadcrumb-item">Danh sách thuốc
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <button class="btn btn-info">Xuất đơn thuốc</button>
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên thuốc</th>
                                    <th scope="col">Số lượng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_prescription_use as $key =>$prescription)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$prescription->medicine_name}}</td>
                                        <td>{{$prescription->quantity}}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Row grouping -->
        </div>
    </div>
</div>
@endsection
