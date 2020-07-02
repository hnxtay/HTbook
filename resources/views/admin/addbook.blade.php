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
                <form id="addBook" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                     @if (Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div> 
                    @endif
                    <div class="row card-body">
                        <h2 class="card-title col-md-12">Thêm sách</h2>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Tên Sách</label>
                            <input id="ip" type="text" class="form-control" name="name" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Tác Giả</label>
                            <input id="ip" type="text" class="form-control" name="author" placeholder="" required>
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
                            <input id="ip" type="text" class="form-control" name="unit_price" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Giá khuyến mãi</label>
                            <input id="ip" type="text" class="form-control" name="promotion_price" placeholder="" required>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label  class="col-form-label">Số Lượng</p>
                            <input id="ip" type="text" class="form-control" name="quantity" placeholder="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-form-label">Ảnh</label>
                            <input type="file"  name="image" required="">
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-form-label">Mô tả</label>
                            <textarea name="description"></textarea>
                        </div>
                        <div class="col-md-12" style="text-align:center;"><button type="submit" class="btn btn-primary">Thêm</button></div>
                </div>
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
    let editor = CKEDITOR.replace('description',config);

    $.ajax({
        method: 'POST',
        url: '{{route('admin_addbook')}}',
        data: JSON.stringify(('#addBook').serializeArray())
    }).done(() => {
        $('#ip').val("")
    })
</script>
@endif
@endsection