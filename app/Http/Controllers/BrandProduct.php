<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;
class BrandProduct extends Controller
{
    //
    public function AuthLogin(){
        $admin_id= Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $brand_product = Brand::all();
        // $brand_product = Brand::orderBy('brand_id','DESC')->get();//sắp xếp giảm dần 
        // $brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product= view('admin.all_brand_product')->with('all_brand_product',$brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request){//biến yêu cầu
        $this->AuthLogin();
        // //khai báo data là 1 chuỗi
        // $data = array();
        // // tên cuột = biến yêu cầu ->name tong form
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;
        // $data['brand_status']=$request->brand_product_status;
        // DB::table('tbl_brand')->insert(
        //     $data
        // );
        $data =$request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        $alert='Thêm thương hiệu thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('add-brand-product');

    }
    public function uncative_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        $alert='Kích hoạt danh mục thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-brand-product');

    }
    public function cative_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        $alert='Kích hoạt danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product=Brand::find($brand_product_id);
        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product= view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete(
        );
        //thông báo
        $alert='xóa danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-brand-product');
        
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data =$request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->save();
        //khai báo data là 1 chuỗi
        // $data = array();
        // // tên cuột = biến yêu cầu ->name tong form
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_desc']=$request->brand_product_desc;    
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(
        //     $data
        // );
        //thông báo
        $alert='Cập nhật danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-brand-product');
    }
    //end function admin
    public function sohw_brand_home($brand_id){
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $brand_by_id =DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('all_product1',$all_product1);
    }
}
