@extends('admin_layout')
@section('admin_content')
@if(session('alert'))
    <section class='alert alert-success'>{{session('alert')}}</section>
@endif
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương slider right
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-slider-right')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}} <!-- tạo _token bảo mật form gửi đi -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slider right</label>
                                    <input type="text" name="slider_right_name" class="form-control" id="exampleInputEmail1" placeholder="Tên slider">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh </label>
                                    <input type="file" name="slider_right_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh slider">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slider right</label>
                                    <textarea style="resize: none" rows="8" name="slider_right_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả slider right"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị right</label>
                                    <select name="slider_right_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn slider right</option>
                                        <option value="1">Hiển thị slider right</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm slider right</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection