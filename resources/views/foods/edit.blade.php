
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Sửa danh mục </h2>
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
            <form action=" {{ route('food.getEdit', [$data->id]) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Tên món ăn</label>
                  <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{ $data->name }}">
                  @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                  <label>Loại món ăn món ăn</label>
                    <div>
                        <select class="select2_single form-control" tabindex="-1" name="type" data-placeholder="Chọn loại món ăn">
                            @foreach($types as $type)
                              <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  @if($errors->has('type'))
                    <span class="help-block">{{ $errors->first('type') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Giá món ăn</label>
                  <input type="text" class="form-control" name="price" placeholder="Giá món ăn" value="{{ $data->price }}">
                  @if($errors->has('price'))
                    <span class="help-block">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                  <label>Khuyễn mãi</label>
                    <div>
                        <select class="select2_single form-control" tabindex="-1" name="promotion" data-placeholder="Chọn loại món ăn"> 
                            @foreach($promotions as $promotion)
                              <option value="{{ $promotion->id }}">{{ $promotion->discount }}%</option>
                            @endforeach
                        </select>
                    </div>
                  @if($errors->has('promotion'))
                    <span class="help-block">{{ $errors->first('promotion') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Size</label>
                  <input type="text" class="form-control" name="size" placeholder="Kích cỡ" value="{{ $data->size }}">
                  @if($errors->has('size'))
                    <span class="help-block">{{ $errors->first('size') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="description" placeholder="Mô tả ngắn" class="ckeditor" class="form-control" id="editor1" rows="3">{{ $data->description }}</textarea>
                  <script type="text/javascript">  
                     CKEDITOR.replace( 'editor1' );  
                  </script> 
                </div>   
                <div class="form-group">
                  <label>Thông tin</label>
                  <textarea name="information" placeholder="Thông tin" class="ckeditor" class="form-control" id="editor2" rows="3">{{ $data->information }}</textarea>
                  <script type="text/javascript">  
                     CKEDITOR.replace( 'editor2' );  
                  </script> 
                </div> 
                <div class="form-group">
                    <label for="avatar">
                      Avatar
                      <div class="img-preview" style="height:100px;overflow:hidden;">
                        <img src="/{{ config('image.paths.resource') }}/{{ $data->image }}" style="max-height:100%" alt="" class="img-thumbnail">
                      </div>
                    </label>
                    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*" >
                </div>
                <div class="form-group">
                    <label for="avatar">
                      Ảnh chi tiết
                      @foreach($image_detail as $image)
                      <div class="img-preview" style="height:100px;overflow:hidden;">
                        <img src="/{{ $image->image }}" style="max-height:100%" alt="" class="img-thumbnail"> 
                      </div>
                      @endforeach
                    </label>
                    <input type="file" id="avatar" data-img=".img-preview img" name="photos[]" class="need_preview" name="avatar" accept="image/*" >
                </div>
                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>          
            </form>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection