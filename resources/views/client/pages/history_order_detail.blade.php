@extends('client.master')   
@section('content') 
<div class="main-container col2-right-layout wow bounceInUp animated animated" style="visibility: visible;">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="my-account">
          <div class="page-title">
            <h2>{{trans('messeage.history_order')}}</h2>
          </div>
          <div class="dashboard">
            <div class="welcome-msg"> <strong>Hello, {{ Auth::user()->name }}!</strong>
              <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
            </div>
            <div class="recent-orders">
              <div class="title-buttons"><strong>View Detail Order</strong><a href="{{ route('getHistoryOrder') }}">View All </a></div>
              <div class="table-responsive">
                <table class="data-table" id="my-orders-table">
                  
                  <thead>
                    <tr class="first last">
                      <th>Tên món ăn</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Khuyễn mãi</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_detail as $order)
                        <tr>
                            <td><a href="#" class="text-primary">{{ $order->food->name }}</a></td>
                            <td><a href="#" class="text-primary">{{ $order->quantity }}</a></td>
                            <td>{{ $order->price }} VNĐ</td>
                            <td>{{ isset($order->food->promotion->discount) ? $order->food->promotion->discount.'%': " "}}</td>
                            <td>
                                @if(isset($order->food->promotion->discount))
                                    {{ number_format($order->quantity*$order->price*(100-$order->food->promotion->discount)/100,0,",",".") }} 
                                @else
                                    {{ number_format($order->quantity*$order->price,0,",",".") }} VNĐ
                                @endif
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="pull-right">Tổng tiền thanh toán: {{ number_format($total,0,",",".") }} VNĐ</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection
