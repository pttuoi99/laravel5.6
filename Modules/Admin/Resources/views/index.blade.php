@extends('admin::layouts.master')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<h1 class="page-header">Tổng Quan</h1>
<div class="row placeholders">
	<div class="col-xs-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
		<h4><?php $count = DB::table('users')->count(); echo "$count thành viên"; ?></h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
		<h4><?php $count = DB::table('products')->count(); echo "$count sản phẩm"; ?></h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
		<h4 style="left: 72px;"><?php $count = DB::table('articles')->count(); echo "$count bài viết"; ?></h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
		<h4 style="left: 32px;"><?php $count = DB::table('ratings')->count(); echo "$count lượt đánh giá"; ?></h4>
	</div>
</div>
<!-- <div class="row">
	<div class="col-sm-4">
		<figure class="highcharts-figure">
			<div id="container"></div>
		</figure>
	</div>
	<div class="col-sm-8">
		<h5>Danh sách đơn hàng</h5>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Tên khách hàng</th>
					<th>Số điện thoại</th>
					<th>Tổng tiền</th>
					<th>Trạng thái</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				@foreach($transactionNews as $transaction)
				<tr>
					<td>#{{ $transaction->id }}</td>
					<td>{{ $transaction->user->name }}</td>
					<td>{{ $transaction->tr_phone }}</td>
					<td>{{ number_format($transaction->tr_total,0,',','.') }}VNĐ</td>
					<td>
						@if( $transaction->tr_status == 1)
						<a href="#" class="label-success label">Đã xử lý</a>
						@else
						<a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="label-default label">Chờ xử lý</a>
						@endif
					</td>
					<td>
						{{ $transaction->created_at->format('d-m-Y') }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Họ tên</th>
						<th>Tiêu đề</th>
						<th>Nội dung</th>
						<th>Trạng thái</th>
					</tr>
				</thead>
				<tbody>
					@if( isset($contacts))
					@foreach($contacts as $contact)
					<tr>
						<td>{{ $contact->id }}</td>
						<td>{{ $contact->c_name }}</td>
						<td>{{ $contact->c_title }}</td>
						<td>{{ $contact->c_content }}</td>
						<td>
							@if( $contact->c_status == 1 )
							<span class="label label-success">Đã xửa lý</span>
							@else
							<span class="label label-default">Chưa xửa lý</span>
							@endif
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-6">
		<h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên thành viên</th>
						<th>Sản phẩm</th>
						<th><i style="color: yellow" class="fa fa-star"></i></th>
					</tr>
				</thead>
				<tbody>
					@if(isset($ratings))
					@foreach($ratings as $rating)
					<tr>
						<td>{{ $rating->id }}</td>
						<td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
						<td><a href="{{route('get.detail.product',[str_slug($rating->product->pro_name),$rating->ra_product_id]) }}">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a></td>
						<td>{{ $rating->ra_number }}</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script>
			// Create the chart
			
			let data = "{{ $dataMoney }}";

			dataChart = JSON.parse(data.replace(/&quot;/g, '"'));

			Highcharts.chart('container', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Biểu đồ doanh thu ngày và tháng'
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: 'Mức độ'
					}

				},
				legend: {
					enabled: false
				},
				plotOptions: {
					series: {
						borderWidth: 0,
						dataLabels: {
							enabled: true,
							format: '{point.y:.f} VNĐ'
						}
					}
				},

				tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f} VNĐ</b><br/>'
				},

				series: [
				{
					name: "Browsers",
					colorByPoint: true,
					data: dataChart
				}
				],
			});
	</script> -->
@endsection