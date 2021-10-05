@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    @include('backend.layouts.content-header', ['page' => 'Dashboard'])
    <!-- Content Heade -->
    <!-- Main content -->
    <div class="content">
        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">Dashboard</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
@endsection