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
    <div class="row" id="content" style="padding-top:20px;">
        <form action="{{route('admin_turnover')}}" method="POST" class="col-md-12" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            Từ Ngày <input class="" id="ip" type="date" name="date_strt" value="" required="required">
            Đến <input class="" id=ip type="date" name="date_end" value="" required="required">
           <a href=""><input type="submit" name="ok" value="OK"></a>
            <a href="{{route('admin_turnover_month',date('m'))}}"><input type="button" name="month" value="Tháng này"></a>
        </form>
    </div>
    @if (isset($bill) && $bill!=null)
    <div id="content">
        <div class="table table-bored">
            @php
            $total =0;
            $count=0
            @endphp
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
                            <td>{{$bill->total}}</td> @php $total+=$bill->total; $count++; @endphp
                            <td>{{$bill->payment}}</td>
                            <td>{{$bill->note}}</td>
                            <td>{{$bill->status}}</td>
                        </tr>
                    @endforeach
                </tr>
            </table>
        </div>
        <div>
            <h4>Có {{$count}} đơn hàng</h4>
            <h4>Tổng doanh thu là: {{number_format($total, 0, ',', '.')}} VNĐ</h4>
        </div>
    </div>
 @endif
 @endif
@endsection