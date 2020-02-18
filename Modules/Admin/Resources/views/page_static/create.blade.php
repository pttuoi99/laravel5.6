@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
		  <li><a href="{{ route('admin.get.list.paga_static') }}" title="Bài viết">Danh sách</a></li>
		  <li class="active">Thêm Mới</li>
		</ol>
	</div>
	<div class="">
		@include("admin::page_static.form")
	</div>
@stop