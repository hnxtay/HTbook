@extends('master')
@section('content')
<div class="space50">&nbsp;</div>   
<div class="row mb-5">
    <div class="col-md-1"></div>
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{route('profile')}}">Thông tin tài khoản</a></li>
            <li class="active"><a href="{{route('user_bill')}}">Quản lý đơn hàng</a></li>
        </ul>
    </div>
    <div class="col-md-1"></div>
    <div class="login-form col-md-6" >
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
                            <td><a href="{{route('user_billdetail',$bill->id)}}">{{$bill->id}}</a></td>
                            <td>{{$bill->date_order}}</td>
                            <td>{{$bill->total}}</td>
                            <td>{{$bill->payment}}</td>
                            <td>{{$bill->note}}</td>
                            <td>{{$bill->status}}</td>
                         </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
{{-- <div class="space50">&nbsp;</div> 
<div class="space50">&nbsp;</div>  --}}
@endsection