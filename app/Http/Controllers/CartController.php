<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Coupon;
use Cart;
class CartController extends Controller
{
    //
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    } 
    public function gio_hang(Request $request){
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('all_product1',$all_product1);
    }
    public function delete_product($session_id){
         $cart = Session::get('cart');
        //  echo '<pre>';
        //  print_r($cart);
        //  echo '</pre>';
         if($cart==true){
             foreach($cart as $key => $val){
                 if($val['session_id']==$session_id){
                     unset($cart[$key]);
                 }
             }
             Session::put('cart',$cart);
             return redirect()-> back()->with('message','xoa san pham thanh cong');
         }else{
             return redirect()->back()->with('message','xoa san pham that bai');
         }
    }
    public function update_cart(Request $request){
            $data=$request->all();
            $cart=Session::get('cart');
            if($cart == true ){
                $mesage='';
                foreach($data['cart_qty'] as $key => $qty){
                    foreach($cart as $session =>$val){
                        if($val['session_id']== $key && $qty < $cart[$session]['product_quantity']){
                            $cart[$session]['product_qty'] = $qty;
                            $mesage.='<p style="color:blue">Cập nhật số lượng :'.$cart[$session]['product_name'].'thành công</p>';
                        }elseif($val['session_id']== $key && $qty > $cart[$session]['product_quantity']){
                            $mesage.='<p style="color:red">Cập nhật số lượng :'.$cart[$session]['product_name'].'thất bại</p>';
                        }
                    }
                }
                Session::put('cart',$cart);
                return redirect()-> back()->with('message',$mesage);
            }else{
                return redirect()->back()->with('message','cap nhat san pham that bai');
            }
    }
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info =DB::table('tbl_product')->where('product_id',$productId)->first();
        //$data=DB::table('tbl_product')->where('product_id',$productId)->get();

         //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        $data['id']=$product_info->product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']='123';
        $data['options']['image']=$product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show_cart');
        // $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // return view('pages.cart.show_cart')->with('category',$cate_product);
    }
    public function show_cart(){
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        $cate_product = DB::table('category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('all_product1',$all_product1);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show_cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');

    }
    //coupon
    public function check_coupon(Request $request){
        $data=$request->all();
        //print_r($data);
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_condition'=>$coupon->coupon_condition,
                            'coupon_number'=>$coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code'=>$coupon->coupon_code,
                        'coupon_condition'=>$coupon->coupon_condition,
                        'coupon_number'=>$coupon->coupon_number,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Nhập mã thành công');
            }
        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }

    }
}
