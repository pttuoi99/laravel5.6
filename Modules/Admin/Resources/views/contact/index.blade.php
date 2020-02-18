@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li class="active">Danh dách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý liên hệ</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if( isset($contacts))
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->c_name }}</td>
                        <td>{{ $contact->c_email }}</td>
                        <td>{{ $contact->c_title }}</td>
                        <td>{{ $contact->c_content }}</td>
                        <td>
                            @if( $contact->c_status == 1 )
                                <span class="label label-success">Đã xửa lý</span>
                            @else
                                <span class="label label-default">Chưa xửa lý</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn_customer_action" href="{{ route('admin.get.edit.product',$contact->id) }}">Edit</a>
                            <a href="{{ route('admin.get.action.product',['delete',$contact->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop