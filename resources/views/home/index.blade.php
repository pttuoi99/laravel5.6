@extends('layouts.app')
@section('title')
	{{' Trang chủ' }}
@endsection
@section('slide')
	@include('components.slide')
@stop
@section('content')
@if(isset($productHot))
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Sản phẩm nổi bật</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach($productHot as $hot)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if( $hot->pro_number == 0)
									<span class="Out-of-stock">Tạm hết hàng</span>
									@endif
									@if($hot->pro_sale != 0)
									<span class="sale">{{ $hot->pro_sale }}%</span>
									@endif
									<a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($hot->pro_avatar)) }}" alt="" style="width: 540px; height: 300px;"/>
										{{--<img class="secondary-image" src="pare_url_file($hot->pro_avatar)" alt="" />--}}
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}" title="Chi tiết"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart',$hot->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>
											</div>
											<div class="quickviewbtn">
												<a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{ number_format($hot->pro_price,0,',','.') }}đ</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{ $hot->pro_name }}</a></h2>
									<p>{{ $hot->pro_description }}</p>
								</div>
							</div>
						</div>
						<!-- single-product end -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- our-product area end -->
	</div>
</div>
@endif

@include('components.product_suggest')
<!-- latestpost area start -->
@if(isset($articleNews))
<div class="latest-post-area">
	<div class="container">
		<div class="area-title">
			<h2>Bài viết mới</h2>
		</div>
		<div class="row">
			<div class="all-singlepost">
				<!-- single latestpost start -->
				@foreach($articleNews as $news)
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-post" style="margin-bottom: 40px;">
						<div class="post-thumb">
							<a href="#">
								<img src="{{ asset(pare_url_file($news->a_avatar)) }}" alt="" style="width: 370px; height: 280px;" />
							</a>
						</div>
						<div class="post-thumb-info">
							<div class="postexcerpt">
								<p style="height: 40px;">{{ $news->a_name }}</p>
								<a href="#" class="read-more">Xem thêm</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- single latestpost end -->
			</div>
		</div>
	</div>
</div>
@endif
<!-- latestpost area end -->
<!-- block category area start -->
<div class="block-category">
	<div class="container">
		<div class="row">
			@if(isset($categoriesHome))
			@foreach($categoriesHome as $category)
			<div class="col-md-4">
				<div class="block-title">
					<h2>{{ $category->c_name }}</h2>
				</div>
				@if(isset($category->products))
				@foreach($category->products as $product)

				<?php 
                    $ageDetail = 0;

                    if ($product->pro_total_rating) {
                        $ageDetail = round($product->pro_total_number / $product->pro_total_rating,2);
                    }
                ?>

				<div class="block-carousel">
					<div class="block-content">
						<div class="single-block">
							<div class="block-image pull-left">
								<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{ pare_url_file($product->pro_avatar) }}" style="width: 170px; height: 188px;" alt="" /></a>
							</div>
							<div class="category-info">
								<h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h3>
								<p>{{ $product->pro_description }}</p>
								<div class="cat-price">{{ number_format($product->pro_price,0,',','.') }}<span class="old-price">{{ number_format($product->pro_price,0,',','.') }}</span></div>
								<div class="pro-rating">
									@for($i = 1; $i <= 5; $i++)
                                    	<a href="#"><i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}"></i></a>
                                    @endfor
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
<!-- block category area end -->
<!-- testimonial area start -->
<div class="testimonial-area lap-ruffel">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="crusial-carousel">
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>BootExperts</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>Lavoro Store!</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>MR Selim Rana</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				<div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
			</div>
		</div>
	</div>
</div>
<!-- Brand Logo Area End -->
@stop
<script>
	$(function(){
		
		 $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
        });

		let routeRenderProduct = '{{ route('post.product.view') }}';
		$(document).on('scroll',function(){
			if ($(window).scrollTop()>400) 
			{
				let products = localStorage.getItem('products');
				products = $.parseJSON(products)

				if (products.length > 0) 
				{
					$.ajax({
						url : routeRenderProduct,
						method : "POST",
						data : { id : products },
						success : function(result)
						{

						}
					});
				}
			}

		});
	});
</script>