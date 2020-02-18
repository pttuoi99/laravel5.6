@extends('layouts.app')
@section('title')
    {{ 'Chi tiết bài viết' }}
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
                            <li class="home">
                                <a href="{{ route('get.list.acticle') }}">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
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
                <div class="col-sm-8">
                    <div class="article_content">
                        <h1>{{ $articleDetail->a_name }}</h1>
                        <div>{!! $articleDetail->a_content !!}</div>
                    </div>
                </div>
                <div class="col-sm-4" style="border-left: 1px solid #eee">
                    <h2>Bài viết khác</h2>
                    <div>@include('components.article')</div>
                </div>
            </div>
        </div>
    </div>
@stop