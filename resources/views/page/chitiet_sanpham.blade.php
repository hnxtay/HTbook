@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4">
					@if ($product->promotion_price!=0)
						<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
					@endif 
						<img src="source/image/product/{{$product->name}}.jpg" style="width: 100%; height: 350px;">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{$product->name}}</p>
							<p class="single-item-price">
								@if($product->promotion_price==0)
								<span >{{number_format($product->unit_price, 0, ',', '.')}} VNĐ</span>
								@else
								<span class="flash-del">{{number_format($product->unit_price, 0, ',', '.')}}</span>
								<span class="flash-sale">{{number_format($product->promotion_price, 0, ',', '.')}} VNĐ</span>
								@endif
							</p>
						</div>
						<p class="single-item-title">{{$product->author}}</p>
						<div class="clearfix"></div>
						<div class="single-item-options">
							<a class="add-to-cart" href="{{route('addcart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
						<li><a href="#tab-reviews">Reviews ({{count($comment)}})</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{!!strip_tags($product->description)!!}</p>
					</div>
					<div class="panel" id="tab-reviews">
						<div class="reviews" style="width:750px;" id="cmt">
							@if (isset($comment))
								@foreach ($comment as $cmt)
									<h6>{{$cmt->username}}: {{$cmt->comment}}</h6><p>{{$cmt->created_at}}</p>
									
								@endforeach
							@else
								<p>Không có đánh giá.</p>
							@endif
						</div>
						<div class="space20">&nbsp;</div>
						@if (Auth::check())
						<div class="row cmt">
							<div class="col-md-12"><input id="ip_user" type="hidden" value="{{Auth::user()->fullname}}"></div>
							<div class="space20">&nbsp;</div>
							<form action="" method="post" id="">
							<div class="col-md-12"><textarea style="width:500px; height:75px;" id="ip_cmt" ></textarea></div>
							<div class="space20">&nbsp;</div>
							<div class="col-md-12" style="text-align:right"><button type="button" id="btn_cmt" class="btn btn-primary">Gửi</button></div>
						</form>
						</div>
						@endif
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Related Products</h4>
					
					<div class="row">
						@foreach ($sale_product as $sale)
						<div class="col-sm-4">
							<div class="single-item">
								@if ($sale->promotion_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif 
								<div class="single-item-header">
									<a href="{{route('chitietsanpham',$sale->id)}}"><img src="source/image/product/{{$sale->name}}.jpg" style="width: 100%; height: 350px;"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$sale->name}}</p>
									<p class="single-item-title">{{$sale->Author}}</p>
									<p class="single-item-price">
										@if($sale->promotion_price==0)
										<span >{{number_format($sale->unit_price, 0, ',', '.')}} VNĐ</span>
										@else
										<span class="flash-del">{{number_format($sale->unit_price, 0, ',', '.')}}</span>
										<span class="flash-sale">{{number_format($sale->promotion_price, 0, ',', '.')}} VNĐ</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{route('addcart',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{route('chitietsanpham',$sale->id)}}">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>@endforeach
					</div>
					
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Sản phẩm bán chạy</h3>
					<div class="widget-body">
						@foreach ($sale_product as $sale)
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('chitietsanpham',$sale->id)}}"><img src="source/image/product/{{$sale->name}}.jpg" style="width: 56px; height: 75px;" ></a>
								<div class="media-body">
									{{$sale->name}}
									<div class="beta-sales-price">
										@if($sale->promotion_price==0)
										<span >{{number_format($sale->unit_price, 0, ',', '.')}} VNĐ</span>
										@else
										<span class="flash-sale">{{number_format($sale->promotion_price, 0, ',', '.')}} VNĐ</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản phẩm mới</h3>
					<div class="widget-body">
						@foreach($sale_product as $sale)
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('chitietsanpham',$sale->id)}}"><img src="source/image/product/{{$sale->name}}.jpg" style="width: 56px; height: 75px;" ></a>
								<div class="media-body">
									{{$sale->name}}
									<div class="beta-sales-price">
										@if($sale->promotion_price==0)
										<span >{{number_format($sale->unit_price, 0, ',', '.')}} VNĐ</span>
										@else
										<span class="flash-sale">{{number_format($sale->promotion_price, 0, ',', '.')}} VNĐ</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
@php
	$url =  explode("/", Request::url());
@endphp
<script>
	$("#btn_cmt").click(function () {
		var user = $('input#ip_user').val();
		var cmt = $('#ip_cmt').val();
		var d = new Date();
		$("#cmt").append("<h6>"+ user+": " +cmt+"</h6> "+ d.toLocaleDateString());
		$("#ip_cmt").val("");
		$("#ip_user").val("");
		$.ajax({
			url: "{{ route('post.ajax.comment.add') }}",
			type : "POST",
			dataType : 'json',
			data: {
				cmt: cmt,
				name: user,
				id_post : {{ end($url) }}
			},
			success : function (data) {
				console.log(data);
			},
			error : function(error){
				console.log(error.responseText)
			}
		});
	});
</script>
@endsection('content')