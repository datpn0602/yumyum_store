@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách món ăn</h2>
          <div class="x_button_helper">
            <a href="{{ route('food.getAdd') }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( $foods->count() > 0 )
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Mô tả ngắn</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td></td>
                                <td><a href="#"><img src="/{{ config('image.paths.resource') }}/{{ $food->image }}" width="40" height="40"></img></a></td>
                                <td><a href="#" class="text-primary">{{ $food->name }}</a></td>
                                <td>{{ $food->price }}</td>
                                <td>{!! $food->description !!}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('food.getEdit', $food->id) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm_delete('Bạn có chắc là muốn xóa không?')" href="{{ route('food.getDelete', $food->id) }}"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ route('food.getDelete', $food->id) }}" title="Xóa"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <blockquote>
                  <p>Chưa có món ăn nào để hiển thị.</p>
                </blockquote>
            @endif
      </div>
      </div>
    </div>
</div>
@endsection