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
        </div>
    </div>    
    <div>
        <div class="table table-bored">
                <table class="">
                    <tr>
                        <td>ID</td>
                        <td>Ngày đặt hàng</td>
                        <td>Tổng tiền</td>
                        <td>Hình thức thanh toán </td>
                        <td>Ghi chú</td>
                        <td>Trạng thái</td>
                    </tr>
                    <tr>
                        @foreach ($bill as $bill)
                             <tr>
                                <td><a href="{{route('admin_billdetail',$bill->id)}}">{{$bill->id}}</a></td>
                                <td>{{$bill->date_order}}</td>
                                <td>{{$bill->total}}</td>
                                <td>{{$bill->payment}}</td>
                                <td>{{$bill->note}}</td>
                                <td><a href="{{route('edit_status',$bill->id)}}">{{$bill->status}}</a></td>
                             </tr>
                        @endforeach
                    </tr>
                </table>
            </div>
    </div>
    @endif
@endsection