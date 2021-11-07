@extends('backend.layouts.app')

@section('title')
Danh sách bài viết
@endsection

@section('content')
@includeIf('backend.components.notification')
@include('backend.layouts.content-header', ['page' => 'Danh sách bài viết'])

<div class="content">
    <h1>Danh sách bài viết</h1>
</div>
@endsection
