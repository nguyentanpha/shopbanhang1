<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;
class CategoryProduct extends Controller
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
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $category_product = DB::table('category_product')->get();
        $manager_category_product= view('admin.all_category_product')->with('all_category_product',$category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){//biến yêu cầu
        $this->AuthLogin();
        //khai báo data là 1 chuỗi
        $data = array();
        // tên cuột = biến yêu cầu ->name tong form
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;
        DB::table('category_product')->insert(
            $data
        );
        $alert='Thêm danh mục thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('add-category-product');

    }
    public function uncative_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        $alert='Kích hoạt danh mục thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-category-product');

    }
    public function cative_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        $alert='Kích hoạt danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product= view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category_product')->where('category_id',$category_product_id)->delete(
        );
        //thông báo
        $alert='xóa danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-category-product');
        
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        //khai báo data là 1 chuỗi
        $data = array();
        // tên cuột = biến yêu cầu ->name tong form
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;    
        DB::table('category_product')->where('category_id',$category_product_id)->update(
            $data
        );
        //thông báo
        $alert='Cập nhật danh mục không thành công';
        return redirect()->back()->with('alert',$alert);
        return Redirect::to('all-category-product');
    }
    //end function admin
    public function sohw_category_home($category_id){
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_by_id =DB::table('tbl_product')->join('category_product','tbl_product.category_id','=','category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->paginate(6);
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        $category_name = DB::table('category_product')->where('category_product.category_id',$category_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('all_product1',$all_product1);
    }

    
}
