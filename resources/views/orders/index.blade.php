@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách món ăn</h2>
          {{-- <div class="x_button_helper">
            <a href="{{ route('food.getAdd') }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div> --}}
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( $orders->count() > 0 )
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td></td>
                                <td><a href="#" class="text-primary">{{ $order->full_name }}</a></td>
                                <td><a href="#" class="text-primary">{{ $order->phone }}</a></td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->status == 1)
                                        Đã xử lý
                                    @elseif($order->status == 2)
                                        Hủy
                                    @elseif($order->status == 3)
                                        Khách đã hủy đơn
                                    @else
                                        Đang chờ
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('order.getDetail', $order->id) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('order.getEdit', $order->id) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $order->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
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