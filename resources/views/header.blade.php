<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Nam Kì Khởi Nghĩa - Ngũ Hành Sơn - Đà Nẵng</a></li>
						<li><a href="{{route('trangchu')}}"><i class="fa fa-phone"></i> 0354122241 </a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if (Auth::check())
						<li><a href="{{route('profile')}}"><i class="fa fa-user"></i>{{Auth::user()->fullname}}</a></li>
						<li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
						@else
						<li><a href="{{route('dangki')}}">Đăng kí</a></li>
						<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="search" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng @if(Session::has('cart')) {{Session('cart')->totalQty}} @else trống @endif <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach ($productcart as $pr)
								<div class="cart-item">
								<a class="cart-item-delete" href="{{route('delcart',$pr['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$pr['item']['name']}}.jpg" ></a>
										<div class="media-body">
											<span class="cart-item-title">{{$pr['item']['name']}}</span>
											<span class="cart-item-amount">{{$pr['qty']}}x <span>
													@if($pr['item']['promotion_price']==0)
														<span >{{number_format($pr['item']['unit_price'], 0, ',', '.')}} VNĐ</span>
													@else
														<span class="flash-del">{{number_format($pr['item']['unit_price'], 0, ',', '.')}}</span>
														<span class="flash-sale">{{number_format($pr['item']['promotion_price'], 0, ',', '.')}} VNĐ</span>
													@endif</span></span>
										</div>
									</div>
								</div>
								@endforeach
								
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice,0,',','.')}}</span> VNĐ</div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('loaisanpham',0)}}">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($type_product as $type)
								<li><a href="{{route('loaisanpham',$type->id)}}">{{$type->type_name}} </a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->