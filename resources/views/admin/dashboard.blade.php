@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        p.title_thongke{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top:5px;
        }
    </style>
</div>
<div class="row" style="background:white;">
        <p class="title_thongke">THỐNG KÊ ĐƠN HÀNG DANH SỐ</p>

        <form autocomplete="off">
        @csrf

            <div class="col-md-2">
            <p style="font-weight: bold;">Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
            
            <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả" style="margin-top: 5px; font-size: 14px;">
            </div>
            <div class="col-md-2">
            <p style="font-weight: bold;">Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
            </div>
            <div class="col-md-2">
            <p style="font-weight: bold;">
                Lọc theo:
                <select class="dashboard-filter form-control">
                    <option>--Chọn--</option>
                    <option value="7ngay">7 ngày</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="365ngayqua">365 ngày qua</option>
                </select>
            </p>
            </div>
        
        </form>
        <div class="col-md-12">
        <div id="myfirstchart" style="height: 250px;"></div>
        </div>
</div>
<!--  -->
@endsection