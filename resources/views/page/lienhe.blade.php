@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="beta-map">
	
	<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1156.968959356335!2d108.24998901735007!3d15.973328918253149!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2538815e3a624d58!2zS2hvYSBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiAmIFRydXnhu4FuIFRow7RuZyAtIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1576090578318!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		
		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Liên hệ</h2>
				<div class="space20">&nbsp;</div>
				<div class="space20">&nbsp;</div>
				<form action="#" method="post" class="contact-form">	
					<div class="form-block">
						<input name="your-name" type="text" placeholder="Tên của bạn">
					</div>
					<div class="form-block">
						<input name="your-email" type="email" placeholder=" Email ">
					</div>
					<div class="form-block">
						<input name="your-subject" type="text" placeholder="Vấn đề">
					</div>
					<div class="form-block">
						<textarea name="your-message" placeholder=" "></textarea>
					</div>
					<div class="form-block">
						<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<h2>Thông tin liên lạc</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title">Địa Chỉ</h6>
				<p>
					Khoa Công nghệ Thông tin và Truyền thông - Đại học Đà Nẵng
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title">Email</h6>
				<p>
					Mọi thắc mắc xin vui lòng liên hệ <br>
					<a href="mailto:hnxtay.18it3@sict.udn.vn">hnxtay.18it3@sict.udn.vn</a>
				</p>
				<div class="space20">&nbsp;</div>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection