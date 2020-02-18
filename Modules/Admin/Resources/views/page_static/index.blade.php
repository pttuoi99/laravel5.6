@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="#">Trang chủ</a></li>
		  <li><a href="#">Page static</a></li>
		  <li class="active">Danh dách</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h2>Quản lý<a href="{{ route('admin.get.create.paga_static') }}" class="pull-right"><i class="fas fa-plus-square"></i></a></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th style="width: 20%;">Tiêu đề trang</th>
					<th>Ngày tạo</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($pages))
					@foreach($pages as $page)
						<tr>
							<td>{{ $page->id }}</td>
							<td>{{ $page->ps_name }}</td>
							<td>
								{{ $page->created_at }}
							</td>
							<td>
								<a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;" href="{{ route('admin.get.edit.paga_static',$page->id) }}"><i class="fas fa-edit" style="font-size: 11px;"></i>Cập nhật</a>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
@stop