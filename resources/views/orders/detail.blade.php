@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Chi tiết hóa đơn </h2><br>
            <div class="panel panel-body">
                <ul>
                    <li>Tên: {{ $order->full_name }}</li>
                    <li>Số điện thoại : {{ $order->phone }}</li>
                    <li>Địa chỉ : {{ $order->address }}</li>
                </ul>    
            </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( $order_detail->count() > 0 )
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên món ăn</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Giá khuyễn mãi</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail as $order)
                            <tr>
                                <td></td>
                                <td><a href="#" class="text-primary">{{ $order->food->name }}</a></td>
                                <td><a href="#" class="text-primary">{{ $order->quantity }}</a></td>
                                <td>{{ $order->price }}</td>
                                <td>{{ isset($order->food->promotion->discount) ? $order->food->promotion->discount.'%': " "}}</td>
                                <td>
                                    @if(isset($order->food->promotion->discount))
                                        {{ number_format($order->quantity*$order->price*(100-$order->food->promotion->discount)/100,0,",",".") }}
                                    @else
                                        {{ number_format($order->quantity*$order->price,0,",",".") }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="6" class="text-right"><b>Tổng tiền {{ number_format($total,0,",",".") }}</b></td>
                            </tr>
                    </tbody>
                </table>
            @else
                <blockquote>
                  <p>Chưa có hóa đơn nào để hiển thị.</p>
                </blockquote>
            @endif
            <form action="{{ route('order.getHandle', $order_id) }}" enctype="multipart/form-data" method="POST" class="pull-right">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Hình thức</label>
                        <div>
                            <select class="select2_single form-control" tabindex="-1" name="status" data-placeholder="Status">
                                <option value="{{ 1 }}">Đã xử lý</option> 
                                <option value="{{ 2 }}">Hủy</option> 
                            </select>
                        </div>
                </div>
                <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Xác nhận</button>
            </form>
      </div>
      </div>
    </div>
</div>
@endsection