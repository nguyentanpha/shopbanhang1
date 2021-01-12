@extends('admin_layout')
@section('admin_content')
@if(session('alert'))
    <section class='alert alert-success'>{{session('alert')}}</section>
@endif
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương ma giam gia
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                {{ csrf_field()}} <!-- tạo _token bảo mật form gửi đi -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giảm giá</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã</label>
                                    <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                    <select name="coupon_condition" class="form-control input-sm m-bot15">
                                        <option value="0">Chọn</option>
                                        <option value="1">Giarm theo phần trăm</option>
                                        <option value="2">Giarm theo tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc số tiền giảm</label>
                                    <textarea style="resize: none" rows="8" name="coupon_number" class="form-control" id="exampleInputPassword1" ></textarea>
                                </div>
                                
                                
                                <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã giảm giá</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection