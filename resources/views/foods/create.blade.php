@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm món ăn mới</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-xs-12 col-sm-5">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <form action=" {{ route('food.getAdd') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                {{ isset($food) ? method_field('PUT') : ''}}
                <div class="form-group">
                    <label>Các loại món ăn</label>
                        <div>
                            <select class="select2_single form-control" tabindex="-1" name="type" data-placeholder="Chọn loại món ăn">
                                <option></option> 
                                @foreach($types as $type)
                                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Tên món ăn</label>
                  <input type="text" class="form-control" name="name" placeholder="Tên món ăn" value="{{ old('name') }}">
                  @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('food_id') ? 'has-error' : '' }}">
                  <label>Giá món ăn</label>
                  <input type="number" class="form-control" name="price" placeholder="Giá món ăn" value="{{ old('price') }}">
                  @if($errors->has('price'))
                    <span class="help-block">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label>Khuyễn mãi</label>
                        <div>
                            <select class="select2_single form-control" tabindex="-1" name="promotion" data-placeholder="Chọn khuyễn mãi">
                                <option></option> 
                                @foreach($promotions as $promotion)
                                  <option value="{{ $promotion->id }}">{{ $promotion->discount }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                  <label>Kích cỡ</label>
                  <input type="text" class="form-control" name="size" placeholder="Giá món ăn" value="{{ old('size') }}">
                  @if($errors->has('size'))
                    <span class="help-block">{{ $errors->first('size') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="description" placeholder="Mô tả ngắn" class="ckeditor" class="form-control" id="editor1" rows="3">{{ old('description') }}</textarea>
                  <script type="text/javascript">  
                     CKEDITOR.replace( 'editor1' );  
                  </script> 
                </div>
                <div class="form-group">
                  <label>Thông tin</label>
                  <textarea name="information" placeholder="Thông tin món ăn" class="form-control" id="editor2" rows="3">{{ old('information') }}</textarea>
                  <script type="text/javascript">  
                     CKEDITOR.replace( 'editor2' );  
                  </script> 
                </div>
                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                  <label for="avatar">Ảnh đại diện<br>
                    <img src="{{ '/img/food_default.jpg' }}" class="avatar_preview" width="200">
                  </label>
                  <input type="file" name="avatar" id="avatar" data-img=".avatar_preview" class="need_preview" accept="image/*">
                  @if($errors->has('avatar'))
                    <span class="help-block">{{ $errors->first('avatar') }}</span>
                  @endif
                </div>   
                <div class="form-group">
                  <label for="avatar">Ảnh chi tiết<br>
                  </label>
                  <input type="file" class="form-control" name="photos[]" multiple />
                </div> 
                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Thêm sản phẩm</button>          
            </form>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection