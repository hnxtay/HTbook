@extends('master')
@section('content')
    <div class="space50">&nbsp;</div>   
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{route('profile')}}">Thông tin tài khoản</a></li>
                <li><a href="{{route('user_bill',)}}">Quản lý đơn hàng</a></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="login-form col-md-6" >
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header panel" style="background-color:#428bca; height:40px;"><p style="color:#fff;font-size:20px">Thông tin tài khoản</p></div>
                            <div class="card-body">
                                @if (Session::has('flag'))
                                    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}} </div>
                                @endif
                                <form action="{{route('profile')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">Họ tên</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{Auth::user()->fullname}}" id="email_address" class="form-control" name="name" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 col-form-label text-md-right">Số điện thoại</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{Auth::user()->phone}}" id="password" class="form-control" name="phone" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">E-Mail </label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{Auth::user()->email}}" id="email_address" class="form-control" name="email" disabled autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">Địa chỉ</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{Auth::user()->address}}" id="email_address" class="form-control" name="address" required autofocus>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">Ngày sinh</label>
                                        <div class="col-md-8">
                                            <input type="date" value="{{Auth::user()->birthday}}" id="email_address" class="form-control" name="birthday" required autofocus>
                                            <p style="font-size:12px">(Không bắt buộc)</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9 offset-md-4" >
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
        </div>

    <div class="space50">&nbsp;</div> 
@endsection