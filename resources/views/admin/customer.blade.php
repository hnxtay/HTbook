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
            <a href="" class="tip-bottom" >Toàn bộ khách hàng</a>
        </div>
    </div>
    <div class="table table-bored">
        <table class="">
            <tr>
                <td>ID</td>
                <td>Tên khách hàng</td>
                <td>Giới tính</td>
                <td>Email</td>
                <td>Địa chỉ</td>
                <td>Số điện thoại</td>
                <td>Ghi chú</td>
            </tr>
            @foreach ($customer as $cus)
                <tr>
                    <td>{{$cus->id_customer}}</td>
                    <td><a href="{{route('admin_bill',$cus->id_customer)}}">{{$cus->name}}</a></td>
                    <td>{{$cus->gender}}</td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->address}}</td>
                    <td>{{$cus->phone_number}}</td>
                    <td>{{$cus->note}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    @endif
@endsection