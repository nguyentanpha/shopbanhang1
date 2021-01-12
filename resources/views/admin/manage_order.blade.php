@extends('admin_layout')
@section('admin_content')
@if(session('alert'))
    <section class='alert alert-success'>{{session('alert')}}</section>
@endif
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
      
      
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            <?php 
              $i = 0;
            
            ?>
            @foreach($order as $key => $ord)
            <?php $i++; ?>
          <tr>
            <td>{{$i}}</td>
            <td>{{$ord->order_code}}</td>
            <td>{{$ord->created_at}}</td>
            <td>@if($ord->order_status == 1)
                  Đơn hàng mới
                @else
                  Đã xử lý
                @endif
            </td>
            <td>
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-eye text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục không?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-trash text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    </div>
    
  </div>
</div>
@endsection