@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách món ăn</h2>
          <div class="x_button_helper">
            <a href="{{ route('promotion.getAdd') }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( $promotions->count() > 0 )
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Dicount</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td></td>
                                <td><a href="#" class="text-primary">{{ $promotion->discount }}%</a></td>
                                <td>{{ $promotion->start_date }}</td>
                                <td>{{ $promotion->end_date }}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('promotion.getEdit', $promotion->id) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm_delete('Bạn có chắc là muốn xóa không?')" href="{{ route('promotion.getDelete', $promotion->id) }}"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ route('promotion.getDelete', $promotion->id) }}" title="Xóa"><i class="fa fa-trash"></i></button></a>
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