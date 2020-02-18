@extends('layouts.app')
@section('title')
    {{' Giỏ hàng' }}
@endsection
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>#{{ $i }}</td>
                        <td><a href="">{{ $product->pro_name }}</a></td>
                        <td>
                            <img src="{{ pare_url_file($product->options->avatar) }}" style="width: 80px; height: 88px;" alt="">
                        </td>
                        <td>{{ number_format($product->price,0,',','.') }}đ</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ number_format($product->qty * $product->price,0,',','.') }}đ</td>
                        <td>
                            <a href="" class="fa fa-pencil">Edit</a>
                            <a href="{{ route('delete.shopping.cart',$key) }}" class="fa fa-trash-o">Delete</a>
                        </td>
                    </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <h5 class="pull-right">Tổng tiền thanh toán: {{ Cart::subtotal() }}đ <a href="{{ route('get.form.pay') }}" class="btn-success btn">Thanh toán</a> </h5>
        </div>
    </div>
@stop