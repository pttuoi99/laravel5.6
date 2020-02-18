@extends('layouts.app')
@section('title')
    {{' Về chúng tôi' }}
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Về chúng tôi</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <h2>{{ isset($page) ? $page->ps_name : 'Đang cập nhật giữ liệu' }}</h2>
                        <div>{!! isset($page) ? $page->ps_content : 'Đang cập nhật giữ liệu' !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop