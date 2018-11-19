@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Sửa khuyễn mãi</h2>
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
            <form action=" {{ route('promotion.getEdit', [$data->id]) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Discount</label>
                  <input type="number" class="form-control" name="discount" placeholder="" value="{{ $data->discount }}">
                </div>
                <div class="form-group">
                  <label>Ngày bắt đầu</label>
                  <input type="date" class="form-control" name="start_date" placeholder="Nhập ngày bắt đầu" value="{{ $data->start_date }}">
                </div>   
                <div class="form-group">
                  <label>Ngày kết thúc</label>
                  <input type="date" class="form-control" name="end_date" placeholder="Nhập ngày kết thúc" value="{{ $data->end_date }}">
                </div>
                    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>          
            </form>
      </div>
      </div>
      </div>
    </div>
</div>
@endsection