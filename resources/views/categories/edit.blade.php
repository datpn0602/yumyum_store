
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
            <form action=" {{ route('category.getEdit', [$data->id]) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Tên danh mục</label>
                  <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{ $data->name }}">
                  @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="description" placeholder="Mô tả ngắn" class="ckeditor" class="form-control" id="editor1" rows="3">{{ $data->description }}</textarea>
                  <script type="text/javascript">  
                     CKEDITOR.replace( 'editor1' );  
                  </script> 
                </div>   
                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>          
            </form>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection