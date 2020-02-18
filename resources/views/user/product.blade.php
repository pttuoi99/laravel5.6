@extends('user.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h5>Danh sách sản phẩm bán chạy</h5>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Lượt bán</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($products))
                    @foreach($products as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                                <a href="{{ route('get.detail.product',[$value->pro_slug,$value->id]) }}" target="_blank">{{ $value->pro_name }}</a>
                            </td>
                            <td>
                                <img src="{{ pare_url_file($value->pro_avatar) }}" style="width: 80px; height: 80px;" alt="">
                            </td>
                            <td>{{ number_format($value->pro_price ,0,',','.') }}VNĐ</td>
                            <td>{{ $value->pro_pay }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop