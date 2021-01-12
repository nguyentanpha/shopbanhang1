@extends('admin_layout')
@section('admin_content')
@if(session('alert'))
    <section class='alert alert-success'>{{session('alert')}}</section>
@endif
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê banner right
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên banner right</th>
            <th>Hình ảnh</th>
            <th>Mô tả right</th>
            <th>Trình trạng right</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_slide as $key => $slide)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$slide -> slider_right_name}}</td>
            <td><img src="public/uploads/slider/{{$slide->slider_right_image}}" height="100" with="100"></td>
            <td>{{$slide -> slider_right_desc}}</td>
            <td><span class="text-ellipsis">
                <?php
                    if($slide ->slider_right_status==1){
                        ?>
                        <a href="{{URL::to('/uncative-slide-right/'.$slide->slider_right_id)}}"><span class="fa fa-thumb-tyling fa fa-thumbs-up"></span></a>
                        <?php
                    }else{
                        ?>
                        <a href="{{URL::to('/cative-slide-right/'.$slide->slider_right_id)}}"><span class="fa fa-thumb-tyling fa fa-thumbs-down"></span></a>
                        <?php
                    }
                ?>
            </span></td>

            <td>
                    
                <a onclick="return confirm('Bạn có chắc là muốn xóa banner right không?')" href="{{URL::to('/delete-slide-right/'.$slide->slider_right_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-trash text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection