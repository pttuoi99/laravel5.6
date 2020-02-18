@extends('layouts.app')
@section('title')
    {{ 'Chi tiết sản phẩm' }}
@endsection
@section('content')
    <!-- breadcrumbs area start -->
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
                                <a href="/">{{ $cateProduct->c_name }}</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $productDetail->pro_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="big-1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h1>
                                <div class="rating-price">
                                    <?php 
                                        $ageDetail = 0;

                                        if ($productDetail->pro_total_rating) {
                                            $ageDetail = round($productDetail->pro_total_number / $productDetail->pro_total_rating,2);
                                        }
                                     ?>
                                    <div class="pro-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                        <a href="#"><i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{ number_format($productDetail->pro_price,0,',','.') }}đ</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{!! $productDetail->pro_description !!}</p>
                                </div>
{{--                                    <p class="availability in-stock">Availability: <span>In stock</span></p>--}}
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Quantity:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="{{ asset('img/single-share.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="" data-toggle="tab">Chi tiết sản phẩm</a></li>
                        <li class=""><a href="#" data-toggle="tab">Đánh giá</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{!! $productDetail->pro_content !!}</p>
                            </div>
                        </div>
                        <div class="component_rating" style="margin-bottom: 20px;">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="component_rating_content">
                                <div class="rating_item">
                                    <span class="fa fa-star"></span><b>{{ $ageDetail }}</b>
                                </div>
                                <div class="list_rating" style="width: 60%; padding: 20px;">
                                    @foreach($arrayRatings as $key => $arrayRating)
                                    <?php 
                                        $itemAge = round(($arrayRating['total']/$productDetail->pro_total_rating) *100,2);
                                     ?>
                                        <div class="item_rating" style="display: flex; align-items: center">
                                            <div style="width: 10%; font-size: 14px">
                                                {{ $key }}<span class="fa fa-star"></span>
                                            </div>
                                            <div class="demo">
                                                <span><b style="width: {{ $itemAge }}"></b></span>
                                            </div>
                                            <div style="width: 20%;">
                                                <a href="">{{ $arrayRating['total'] }} đánh giá ({{ $itemAge }}%)</a>
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                                <div><a href="" class="js_rating_action">Gửi đánh giá của bạn</a>
                                </div>
                            </div>
                            <?php
                            $listRatingText = [
                                1 => 'Không thích',
                                2 => 'Tạm đươc',
                                3 => 'Bình thường',
                                4 => 'Tốt',
                                5 => 'Rất tốt',
                             ];
                            ?>
                            <div class="form_rating hide">
                                <div style="display: flex; margin-top: 15px;font-size: 15px;" >
                                    <p style="margin-bottom: 0" >Chọn đánh giá của bạn</p>
                                        <span style="margin: 0 15px;" class="list_start">
                                            @for($i = 1; $i <= 5; $i ++)
                                                <i class="fa fa-star" data-key="{{ $i }}"></i>
                                            @endfor    
                                        </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px;">
                                    <textarea name="" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
                                </div>
                                <div style="margin-top: 15px;">
                                    <a href="{{ route('post.rating.product',$productDetail) }}" class="js_rating_product">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating">
                            @if(isset($ratings))
                                @foreach($ratings as $rating)
                                    <div class="rating_item_1">
                                        <div>
                                            <span>{{ isset($rating->user->name) ? $rating->user->name : '' }}</span>
                                            <a href=""><i class="fa fa-check-circle-o"></i> Đã mua hàng tại website</a>
                                        </div>
                                        <p>
                                            <span class="pro-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fa fa-star {{ $i <= $rating->ra_number ? 'active' : '' }}"></i>
                                                @endfor        
                                            </span>
                                            <span>{{ $rating->ra_content }}</span>
                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock-o"></i> {{ $rating->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>

        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
        });

        $(function () {
           let listStart = $(".list_start .fa")

            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm đươc',
                3 : 'Bình thường',
                4 : 'Tốt',
                5 : 'Rất tốt',
        }

           listStart.mouseover(function(){
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active')

                $(".number_rating").val(number);
                $.each(listStart,function (key,value) {
                    if (key + 1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();

           });

           $(".js_rating_action").click(function (event) {
                event.preventDefault();

               if ($(".form_rating").hasClass('hide'))
               {
                   $(".form_rating").addClass('active').removeClass('hide')
               }else
               {
                   $(".form_rating").addClass('hide').removeClass('active')
               }
           })

            $(".js_rating_product").click(function (e) {
                event.preventDefault();
                let content = $("#ra_content").val();
                let number  = $(".number_rating").val();
                let url =$(this).attr('href');

                if (content && number)
                {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data : {
                            number : number,
                            r_content : content,
                            created_at : created_at
                        }
                    }).done(function (result) {
                        if (result.code == 1)
                        {
                            alert("Gửi đánh giá thành công");
                            location.reload();
                        }
                    });
                }
            });

            //lưu id sản phẩm vào storage
            let idProduct = $("#content_product").attr('data-id');

            //lấy giá trị  storage
            let products = localStorage.getItem('products');

            if (products == null) 
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct)
                localStorage.setItem('products'.JSON.stringify(arrayProduct))
            }else
            {
                //chuyển về mảng
                products = $.parseJSON(products)

                if (products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }

            }
        });
    </script>
@stop