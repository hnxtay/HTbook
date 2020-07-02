@extends('master')
@section('content')
</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Danh sách sản phẩm</h6> 
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-2">
						<ul class="aside-menu">
							@foreach($type_product as $type)
							<li><a href="{{route('loaisanpham',$type->id)}}">{{$type->type_name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-10">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($productByType)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach ($productByType as $pr)
							<div class="col-sm-4">
								<div class="single-item">
									@if ($pr->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif 
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$pr->id)}}"><img src="source/image/product/{{$pr->name}}.jpg" style="width: 100%; height: 350px;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$pr->name}}</p>
										<p class="single-item" style="font-size: 12px;">{{$pr->Author}}</p>
										<p class="single-item-price">
											@if($pr->promotion_price==0)
											<span >{{number_format($pr->unit_price, 0, ',', '.')}} VNĐ</span>
											@else
											<span class="flash-del">{{number_format($pr->unit_price, 0, ',', '.')}}</span>
											<span class="flash-sale">{{number_format($pr->promotion_price, 0, ',', '.')}} VNĐ</span>
											@endif
										</p>

									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('addcart',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$pr->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach 
							</div>
							<div class="row" style="text-align: center;">{{$productByType->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sách Khuyến Mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left">Có {{count($sale_product)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
							<div class="row">
								@foreach($sale_product as $sale)
							<div class="col-sm-4">
								<div class="single-item">
									@if ($sale->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif 
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$sale->name}}.jpg" style="width: 100%; height: 350px;"></a>
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
										<a class="add-to-cart pull-left" href="{{route('addcart', $sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$pr->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
							<div class="row" style="text-align: center;">{{$sale_product->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						 <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection