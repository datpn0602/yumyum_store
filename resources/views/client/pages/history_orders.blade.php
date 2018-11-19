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
              <div class="title-buttons"><strong>Recent Orders</strong> </div>
              <div class="table-responsive">
                <table class="data-table" id="my-orders-table">
                  
                  <thead>
                    <tr class="first last">
                      <th>Họ tên</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Ngày lập hóa đơn</th>
                      <th>Status</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                        <tr class="first odd">
                          <td>{{ $order->full_name }}</td>
                          <td>{{ $order->phone }}</td>
                          <td>{{ $order->address }}</td>
                          <td>{{ $order->date }}</span></td>
                          <td>
                            @if($order->status == 1)
                                Đã xử lý
                            @elseif($order->status == 2)
                                Hủy
                            @elseif($order->status == 3)
                                Đã hủy đơn
                            @else
                                Đang chờ
                            @endif
                          </td>
                          <td class="a-center last"><span class="nobr"> <a href="{{ route('getHistoryOrderDetail', $order->id) }}">View Detail</a> <span class="separator">|</span> <a onclick="return confirm_delete('Bạn có chắc là muốn hủy đơn hàng không?')" href="{{ route('getDelete', $order->id) }}">
                            @if($order->status == 0)
                                Hủy
                            @endif
                          </a> </span></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection
