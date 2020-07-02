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
<div class="">
        <div class="row" style="padding=0.5em; ">
            <div class="col-md-3"></div>
                <form action="{{route('admin_edit_status')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                     @if (Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div> 
                    @endif
                    @foreach($bill as $bill)
                    <div class="row card-body">
                        <h2 class="card-title col-md-12">Chỉnh sửa trạng thái</h2>
                        <div class="form-group col-xs-6 col-md-6">
                            <input type="hidden" name="id" value="{{$bill->id}}">
                            <label  class="col-form-label">Trạng thái</label>
                            <select id="ip" name="status">
                                    <option value="Chờ lấy hàng">Chờ lấy hàng</option>
                                    <option value="Đang giao hàng">Đang giao hàng</option>
                                    <option value="Đã giao hàng">Đã giao hàng</option>
                            </select>
                        </div>
                        <div class="col-md-12" ><button type="submit" class="btn btn-primary">Cập nhật</button></div>
                </div>
                @endforeach
            </form>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>
@endif
@endsection