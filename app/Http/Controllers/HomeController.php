<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Slider;
use App\SliderRight;
class HomeController extends Controller
{
    //
    public function index(){
        //slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //slider right
        $sliderright = SliderRight::orderby('slider_right_id','DESC')->where('slider_right_status','1')->get();
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        //$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        
        // $all_product = DB::table('tbl_product')
        // ->join('category_product','category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(10)->get();
        return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product)
        ->with('slider',$slider)->with('sliderright',$sliderright)->with('all_product1',$all_product1);
    }
    
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('search_product',$search_product);
    }
}
