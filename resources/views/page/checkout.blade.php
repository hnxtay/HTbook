@extends('master')
@section('content')
@if (Auth::guest())
	<div class="row" style="padding:100px">
		<div class="col-md-5"></div>
		<div class="col-md-7">
			<div><p>Bạn vui lòng đăng nhập để thanh toán!</p></div>
			<div class="space30"></div>
			<div style="padding-left:75px; padding-top:30px">
				<a href="{{route('dangnhap')}}"><button type="button" class="btn btn-primary">Đăng nhập</button></a>
			</div>
		</div>
	</div>
@else
@if (isset($productcart))
<div class="container">
		<div id="content">		
			<form action="{{route('checkout')}}" method="POST">	
            <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" name="name" value="{{Auth::user()->fullname}}" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input name="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input name="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" value="{{Auth::user()->email}}" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" value="{{Auth::user()->phone}}" name="phone_number" required>
						</div>
						
						<div class="form-block">
							<label for="note">Ghi chú</label>
							<textarea name="note" required="required"></textarea>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của quý khách, quý khách vui lòng kiểm tra rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 109868929435
											<br>- Chủ TK: Hồ Nguyễn Xuân Tây 
											<br>- Ngân hàng TMCP Công Thương Việt Nam, Chi nhánh sông Hàn 
										</div>						
									</li>
								</ul>
							</div>
                        <div class="text-center"><button type="submit" name="checkout" class="btn btn-primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</form>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									<form action="{{route('updatecart')}}" method="POST">
									@foreach ($productcart as $pr)
										<div class="media">
											<img width="25%" src="source/image/product/{{$pr['item']['name']}}.jpg" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$pr['item']['name']}}</p>
												<span class="color-gray your-order-info">{{$pr['item']['Author']}}</span>
												@if($pr['item']['promotion_price']==0)
													<span >{{number_format($pr['item']['unit_price'], 0, ',', '.')}} VNĐ</span>
                                                @else
                                                    <span class="flash-del">{{number_format($pr['item']['unit_price'], 0, ',', '.')}}</span>
                                                    <span class="flash-sale">{{number_format($pr['item']['promotion_price'], 0, ',', '.')}} VNĐ</span>
												@endif
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<span class="your-order-info"><input min="0" type="number" name="qty[{{$pr['item']['id']}}]" value="{{$pr['qty']}}"></span>
												
											</div>
											<a class="pull-right"  href="{{route('delcart',$pr['item']['id'])}}">Xoá</a>
										</div>
									@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
									<div class="space30">&nbsp;</div>
									<div><a href="{{route('updatecart')}}"><button type="submit"  name="update" class="btn ">Cập nhật giỏ hàng</button></a></div>
								</form>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice,0,',','.')}} VNĐ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							
						</div> <!-- .your-order -->
					</div>
				</div>
		</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@else
	<div class="row" style="padding-top: 50px;">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7" style="min-height:300px;">
			<img src="source/image/product/mascot-tiki.png"  style="margin-left:-50px"> <br><br>
			<p>Giỏ hàng trống!</p>
		</div>
	</div>
	<div class="row" >
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7" style="min-height:50px;">
		<a href="{{route('trangchu')}}" class="btn btn-warning"> Mua hàng</a>
		</div>
	</div>
	@endif
	@endif
@endsection
