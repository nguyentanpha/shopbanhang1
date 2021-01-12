@extends('admin_layout')
@section('admin_content')
@if(session('alert'))
    <section class='alert alert-success'>{{session('alert')}}</section>
@endif
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin đăng nhập
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên khách hàng</th>
            <th>Số điện toại</th>
            <th>Email</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>        
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>

          
        </tbody>
      </table>
    </div>
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển hàng hóa
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>Số điện toại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Hình thức thanh toán</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           
          <tr>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_phone}}</td>
            <td>{{$shipping->shipping_email}}</td>
            <td>{{$shipping->shipping_notes}}</td>
            <td>@if($shipping->shipping_method == 0) Thanh toán ATM @else Thanh toán tiền mặt @endif</td>
          </tr>

          
        </tbody>
      </table>
    </div>
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng kho</th>
            <th>Mã giảm giá</th>
            <th>Phí ship hàng</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php $i=0; $total = 0; ?>
        @foreach($order_details as $key => $detail)
        <?php 
          $i++; 
          $subtotal=$detail->product_price*$detail->product_sales_quantity; 
          $total+=$subtotal; ?>
          <tr class="color_qty_{{$detail->product_id}}">
            <td>{{$i}}</td>
            <td>{{$detail->product_name}}</td>
            <td>{{$detail->product->product_quantity}}</td>
            <td>@if($detail->product_coupon !='no')
                  {{$detail->product_coupon}}
              @else
                  Không có mã giảm
              @endif
            </td>
            <td>{{number_format($detail->product_feeship,0,',','.')}} VNĐ</td>
            <td>
              <input type="number" {{$order_status==2 ? 'disabled' : ''}} min="1" class="order_qty_{{$detail->product_id}}" 
                      value="{{$detail->product_sales_quantity}}" name="product_sales_quantity">
              <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$detail->product_id}}"
                      value="{{$detail->product->product_quantity}}">
              <input type="hidden" name="order_code" class="order_code" value="{{$detail->order_code}}">
              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$detail->product_id}}">
              @if($order_status != 2)
              <button class="btn btn-default update_quantity_order" data-product_id="{{$detail->product_id}}"  name="update_quantity_order">Cập nhật</button>
              @endif
            </td> 
            <td>{{number_format($detail->product_price,0,',','.')}} VNĐ</td>
            <td>{{number_format($subtotal,0,',','.')}} VNĐ</td>
          </tr>
          @endforeach 
          <tr>
            <td colspan="2">
              <?php $total_coupon = 0; ?>
              @if($coupon_condition == 1)
                <?php 
                  $total_after_coupon = ($total * $coupon_number)/100;
                  echo 'Tổng giảm : '.number_format($total_after_coupon,0,',','.').'</br>';
                  $total_coupon = $total - $total_after_coupon + $detail->product_feeship;
                ?>
              @else
                <?php 
                  echo 'Tổng giảm : '.number_format($coupon_number,0,',','.').' VNĐ'.'</br>';
                  $total_coupon = $total - $coupon_number + $detail->product_feeship;
                ?>
              @endif
              Phí ship hàng: {{number_format($detail->product_feeship,0,',','.')}} VNĐ </br>
              Thanh toán: {{number_format($total_coupon,0,',','.')}} VNĐ
            </td>
          </tr>
          <tr>
            <td colspan="6">
            @foreach($order as $key =>$or)
            @if($or->order_status == 1)
              <form >
              @csrf
                <select class="form-control order_details">
                  <option value="">-----Chọn hình thức đơn hàng----</option>
                  <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                  <option id="{{$or->order_id}}" value="2">Đã xử lý đơn hàng</option>
                  <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                </select>
              </form>
            @elseif($or->order_status == 2)
              <form >
              @csrf
                <select class="form-control order_details">
                  <option value="">-----Chọn hình thức đơn hàng----</option>
                  <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                  <option id="{{$or->order_id}}" selected value="2">Đã xử lý đơn hàng</option>
                  <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                </select>
              </form>
            @else
            <form >
            @csrf
                <select class="form-control order_details">
                  <option value="">-----Chọn hình thức đơn hàng----</option>
                  <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                  <option id="{{$or->order_id}}" value="2">Đã xử lý đơn hàng</option>
                  <option id="{{$or->order_id}}" selected value="3">Hủy đơn hàng</option>
                </select>
              </form>
            </td>
            @endif
          @endforeach
          </tr>
        </tbody>
      </table>
      <i class="fa fa-print" style="font-size:24px">
      <a target="_blank" href="{{url('/print-order/'.$detail->order_code)}}" 
      style="font-size:24px; color:black">In đơn hàng</a>
      </i>

    </div>
    
  </div>
</div>
@endsection