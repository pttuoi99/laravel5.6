@extends('user.layout')
@section('content')

    <h1 class="page-header">Cập nhật thông tin</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" disabled placeholder="nhập địa chỉ email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Họ tên:</label>
                    <input type="text" class="form-control" name="name" placeholder="họ tên" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Số điện thoại:</label>
                    <input type="number" class="form-control" name="phone" placeholder="số điện thoại" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Địa chỉ:</label>
                    <input type="text" class="form-control" name="address" placeholder="địa chỉ" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Giới thiệu bản thân:</label>
                    <textarea name="about" id="" class="form-control" cols="30" rows="5" placeholder="mô tả bản thân">{{ $user->about }}</textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Cập nhật</button>
            </form>
        </div>
    </div>
@stop