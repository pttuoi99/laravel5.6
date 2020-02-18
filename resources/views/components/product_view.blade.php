<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Sản phẩm vừa xem</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach($products as $view)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if( $view->pro_number == 0)
									<span class="Out-of-stock">Tạm hết hàng</span>
									@endif
									@if($view->pro_sale != 0)
									<span class="sale">{{ $view->pro_sale }}%</span>
									@endif
									<a href="{{ route('get.detail.product',[$view->pro_slug,$view->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($view->pro_avatar)) }}" alt="" style="width: 540px; height: 300px;"/>
										{{--<img class="secondary-image" src="pare_url_file($view->pro_avatar)" alt="" />--}}
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product',[$view->pro_slug,$view->id]) }}" title="Chi tiết"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="{{ route('get.detail.product',[$view->pro_slug,$view->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart',$view->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>
											</div>
											<div class="quickviewbtn">
												<a href="{{ route('get.detail.product',[$view->pro_slug,$view->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{ number_format($view->pro_price,0,',','.') }}đ</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{ $view->pro_name }}</a></h2>
									<p>{{ $view->pro_description }}</p>
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