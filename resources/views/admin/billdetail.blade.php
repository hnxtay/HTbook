@extends('master_admin')
@section('content')
@if (Auth::guest() || Auth::user()->email != "admin@gmail.com")
<div class="row" style="padding:100px">
  <div class="col-md-5"></div>
  <div class="col-md-7">
    <div><p>Bạn vui lòng đăng nhập !</p></div>
    <div class="space30"></div>
    <div style=" padding-top:30px">
      <a href="{{route('dangnhap')}}"><button type="button" class="btn btn-primary">Đăng nhập</button></a>
    </div>
  </div>
</div>
@else
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="" class="tip-bottom"><i class="icon-home"></i>Quản lý khách hàng</a>
            <a href="{{route('admin_customer')}}" class="tip-bottom" >Khách hàng</a>
            <a href="#" class="tip-bottom" >Đơn hàng</a>
            <a href="#" class="tip-bottom" >Chi tiết đơn hàng</a>
        </div>
    </div>    
    <div>
        <div class="table table-bored">
                <table class="">
                    <tr>
                        <td>ID</td>
                        <td>Mã hoá đơn</td>
                        <td>Mã sản phẩm</td>
                        <td>Số lượng </td>
                        <td>Giá</td>
                    </tr>
                    <tr>
                        @foreach ($billdetail as $detail)
                             <tr>
                                <td>{{$detail->id}}</td>
                                <td>{{$detail->id_bill}}</td>
                                <td>{{$detail->id_product}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{$detail->unit_price}}</td>
                             </tr>
                        @endforeach
                    </tr>
                </table>
            </div>
    </div>
    @endif
@endsection