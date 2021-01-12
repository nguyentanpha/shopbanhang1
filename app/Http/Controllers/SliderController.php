<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Slider;
use App\SliderRight;

class SliderController extends Controller
{
    //
    public function manage_slider(){
        $all_slide = Slider::orderby('slider_id','DESC')->get();
        return view('admin.slider.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){
        return view('admin.slider.add_slider');
    }
    public function insert_slider(Request $request){
        $data = $request->all();
        // tên cuột = biến yêu cầu ->name tong form

        $get_image= $request-> file('slider_image');
        if($get_image){
            $get_name_image= $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image= $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            $alert='Thêm sliedr thành công';
            return redirect()->back()->with('alert',$alert);
            return Redirect::to('add-slider');
        }else{
            $alert='Thêm slider thất bại';
            return redirect()->back()->with('alert',$alert);
            return Redirect::to('add-slider');
        }
    }
    public function uncative_slide($slider_id){
      
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        $alert='Kích hoạt slider thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('manage-slider');

    }
    public function cative_slide($slider_id){
       
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        $alert='Kích slider không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('manage-slider');
    }

    //Banner Right
    public function manage_slider_right(){
        $all_slide = SliderRight::orderby('slider_right_id','DESC')->get();
        return view('admin.slider_right.list_slider_right')->with(compact('all_slide'));
    }
    public function add_slider_right(){
        
        return view('admin.slider_right.add_slider_right');
    }
    public function insert_slider_right(Request $request){
        $data = $request->all();
        // tên cuột = biến yêu cầu ->name tong form

        $get_image= $request-> file('slider_right_image');
        if($get_image){
            $get_name_image= $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image= $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $slider = new SliderRight();
            $slider->slider_right_name = $data['slider_right_name'];
            $slider->slider_right_image = $new_image;
            $slider->slider_right_status = $data['slider_right_status'];
            $slider->slider_right_desc = $data['slider_right_desc'];
            $slider->save();
            $alert='Thêm sliedr thành công';
            return redirect()->back()->with('alert',$alert);
            return Redirect::to('add-slider-right');
        }else{
            $alert='Thêm slider thất bại';
            return redirect()->back()->with('alert',$alert);
            return Redirect::to('add-slider-right');
        }
    }
    public function uncative_slide_right($slider_right_id){
      
        DB::table('tbl_slider_right')->where('slider_right_id',$slider_right_id)->update(['slider_right_status'=>0]);
        $alert='Kích hoạt slider right thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('manage-slider-right');

    }
    public function cative_slide_right($slider_right_id){
       
        DB::table('tbl_slider_right')->where('slider_right_id',$slider_right_id)->update(['slider_right_status'=>1]);
        $alert='Kích slider không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('manage-slider-right');
    }
}
