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
</div>
{{-- <div class="space50">&nbsp;</div> 
<div class="space50">&nbsp;</div>  --}}
@endsection