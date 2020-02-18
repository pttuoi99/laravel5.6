@extends('layouts.app')
@section('title')
    {{' Liên hệ' }}
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
                            <li class="category3"><span>Liên hệ</span></li>
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
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <div id="contacts" class="map-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61419.70969055341!2d108.28032928129713!3d15.818086775566126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420945fb341dbb%3A0x5160b04c7beaa436!2zMTXCsDQ5JzA0LjgiTiAxMDjCsDE4JzU1LjMiRQ!5e0!3m2!1svi!2s!4v1576568007550!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>

                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="contact-form">
                                <span class="legend">Mời bạn điền thông tin liên hệ</span>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-10">
                                            <label>Họ tên <sup>*</sup></label>
                                            <input type="text" name="c_name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" name="c_email" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Tiêu đề <sup>*</sup></label>
                                            <input type="text" name="c_title" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Nội dung <sup>*</sup></label>
                                            <textarea name="c_content" class="yourmessage" required></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group col-sm-12 submit-review">
                                        <button type="submit" class="add-tag-btn btn-success btn">Gửi thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop