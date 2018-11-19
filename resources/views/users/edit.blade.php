
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
            <form action=" {{ route('user.getEdit', [$data->id]) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="name" placeholder="Tên đầy đủ" value="{{ $data->name }}">
                  @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $data->email }}">
                  @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                  <label>User name</label>
                  <input type="text" class="form-control" name="username" placeholder="User name" value="{{ $data->username }}">
                  @if($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{ $data->phone }}">
                  @if($errors->has('phone'))
                    <span class="help-block">{{ $errors->first('phone') }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ $data->address }}">
                  @if($errors->has('address'))
                    <span class="help-block">{{ $errors->first('address') }}</span>
                  @endif
                </div>
         
                <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>          
            </form>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection