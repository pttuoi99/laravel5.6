@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
		  <li><a href="#">Trang chủ</a></li>
		  <li><a href="#">Bài viết</a></li>
		  <li class="active">Danh dách</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-inline" action="" style="margin-bottom: 20px;">
				<div class="form-group">
					<input type="text" class="form-control" id="name" placeholder="Tên bài viết ..." name="name" value="{{ \Request::get('name') }}">
				</div>


				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<h2>Quản lý bài viết<a href="{{ route('admin.get.create.article') }}" class="pull-right"><i class="fas fa-plus-square"></i></a></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th style="width: 18%;">Tên bài viết</th>
					<th style="width: 90px; height: 100px;">Hình ảnh</th>
					<th style="width: 290px;">Mô tả</th>
					<th>Nổi bật</th>
					<th>Trạng thái</th>
					<th>Ngày tạo</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($articles))
					@foreach($articles as $article)
						<tr>
							<td>{{ $article->id }}</td>
							<td>{{ $article->a_name }}</td>
							<td>
								<img src="{{ pare_url_file($article->a_avatar) }}" alt="" class="img img-responsive" width="100px" height="88px">
							</td>
							<td>{{ $article->a_description }}</td>
							<td>
								<a href="{{ route('admin.get.action.article',['hot',$article->id]) }}" class="label {{ $article->getHot($article->c_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
							</td>
							<td>
								<a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="label {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
							</td>
							<td>
								{{ $article->created_at }}
							</td>
							<td>
								<a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;" href="{{ route('admin.get.edit.article',$article->id) }}"><i class="fas fa-edit" style="font-size: 11px;"></i>Cập nhật</a>
								<a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;" href="{{ route('admin.get.action.article',['delete',$article->id]) }}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i>Xóa</a>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
@stop