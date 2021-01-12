<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    //
    public function insert_coupon(){
     return view('admin.coupon.insert_coupon');
    }
    public function insert_coupon_code(Request $request){
        $data = $request->all();
        
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        $alert='Thêm mã giảm giá thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('insert-coupon');
    }
    public function list_coupon(){
        $coupon = Coupon::orderby('coupon_id','DESC')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function delete_coupon($coupon_id){
        //$coupon = Coupon::where('coupon_id',$coupon_id); vẫn được
        $coupon = Coupon::find($coupon_id);
        $coupon ->  delete();
        $alert='Xóa mã giảm giá thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('list-coupon');
    }
}
