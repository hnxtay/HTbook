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
                <div class="card col-md-6">
                @if (Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag')}}"> {{Session::get('message')}}</div>
                @endif
                <form action="{{route('admin_editbook_post')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                     @if (Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div> 
                    @endif
                    @foreach($product as $pr)
                    <input type="hidden" name="id" value="{{$pr->id}}">
                    <div class="row card-body">
                        <h2 class="card-title col-md-12">Chỉnh sửa sách</h2>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Tên Sách</label>
                            <input id="ip" value="{{$pr->name}}" type="text" class="form-control" name="name" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Tác Giả</label>
                            <input id="ip" value="{{$pr->author}}" type="text" class="form-control" name="author" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Thể Loại</label>
                            <select id="ip" name="id_type">
                                @foreach ($type as $item)
                                    <option value="{{$item->id}}">{{$item->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Giá gốc</label>
                            <input id="ip" value="{{$pr->unit_price}}" type="text" class="form-control" name="unit_price" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Giá khuyến mãi</label>
                            <input id="ip" value="{{$pr->promotion_price}}" type="text" class="form-control" name="promotion_price" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Số Lượng</p>
                            <input id="ip" value="{{$pr->quantity}}" type="text" class="form-control" name="quantity" placeholder="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-form-label">Ảnh</label>
                            <input type="file"  name="image" required="">
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-form-label">Mô tả</label>
                            <textarea name="description" value="">{{$pr->description}}</textarea>
                        </div>
                        <div class="col-md-12" style="text-align:center;"><button type="submit" class="btn btn-primary">Cập nhật</button></div>
                </div>
                @endforeach
            </form>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>
<script> 
    config = {};
     config.height = '80px';
     config.width = '565px';
    config.entities_latin = false;
    config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Undo,Redo,Anchor,Strike,Subscript,Superscript,NumberedList,Outdent,Link,About';
    CKEDITOR.replace('description',config);
    
</script>
@endif
@endsection