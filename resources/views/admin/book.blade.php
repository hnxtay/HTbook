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
        <a href="" class="tip-bottom"><i class="icon-home"></i>Quản lý sản phẩm</a>
        <a href="" class="tip-bottom" >Toàn bộ sản phẩm</a>
    </div>
</div>
<div class="table table-bored">
        <table>
            <tr>
                <td>BookID</td>
                <td>Tên sách</td>
                <td >Ảnh</td>
                <td>Tác Giả</td>
                <td>Giá</td>
                <td>Giá khuyến mãi</td>
                <td>Loại Sách</td>
                <td>Số Lượng</td>
                <td colspan="2" style="text-align:center">Thao tác</td>
            </tr>
           @foreach ($product as $pr)
               <tr>
                    <td>{{$pr->id}}</td>
                    <td>{{$pr->name}}</td>
                    <td><img src="source/image/product/{{$pr->name}}.jpg" style="width:75px; height:100px;"></td>
                    <td>{{$pr->author}}</td>
                    <td>{{$pr->unit_price}}</td>
                    <td>{{$pr->promotion_price}}</td>
                    <td><a href="{{route('admin_type_of_book',$pr->id_type)}}">{{$pr->type_name}}</a></td>
                    <td>{{$pr->quantity}}</td>
                    <td><a href="{{route('admin_editbook',$pr->id)}}"><button type="button" class="btn btn-primary">Sửa</button></a></td>
                    <td><a href="{{route('admin_delbook',$pr->id)}}"><button type="button" class="btn btn-danger">Xoá</button></a></td>
               </tr>
           @endforeach
        </table>
    </div>
    @endif
@endsection