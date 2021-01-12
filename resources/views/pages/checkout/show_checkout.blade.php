<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:29:31 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/jquery.bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/owl.carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/fancyBox/jquery.fancybox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/new.css')}}" />
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    
    <title>Kute shop</title>
</head>
<body class="product-page">
<!-- HEADER -->
<div id="header" class="header">
<div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="{{asset('public/frontend/images/phone.png')}}" />0906222453</a>
                <a href="#"><img alt="email" src="{{asset('public/frontend/images/email.png')}}" />mypham@gmail.com</a>
            </div>
            

            <div class="support-link">
                <a href="#">Yêu thích</a>
                <?php
                    $customer_id= Session::get('customer_id');
                    $shipping_id= Session::get('shipping_id');
                    if($customer_id != NULL && $shipping_id==NULL){
                ?>
                <a href="{{URL::to('/checkout')}}">Thanh toán</a>
                <?php
                    }elseif($customer_id != NULL && $shipping_id!=NULL){
                ?>
                <a href="{{URL::to('/payment')}}">Thanh toán</a>
                    <?php
                    }else{
                    ?>
                <a href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                <?php
                    }
                ?>
                <a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a>
                <?php
                    $customer_id= Session::get('customer_id');
                    if($customer_id != NULL){
                ?>
                <a href="{{URL::to('/logout-checkout')}}">Đăng xuất</a>
                <?php
                    }else{
                ?>
                <a href="{{URL::to('/login-checkout')}}">Đăng nhập</a>
                    <?php
                    }
                    ?>

            </div>

            <!-- <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Yêu thích</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
        <?php
                $content = Cart::content();
                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
                ?>
            <div class="col-xs-12 col-sm-3 logo">
                <a href="{{URL::to('/trang_chu')}}"><img alt="Kute Shop" src="{{asset('public/frontend/images/logo.png')}}" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
            <form class="form-inline" action="{{URL::to('/tim-kiem')}}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group form-category">
                        <!-- <select class="select-category">
                            <option value="2">All Categories</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                        </select> -->
                      </div>
                      <div class="form-group input-serach">
                        <input type="text" name="keywords_submit"  placeholder="Keyword here...">
                        <button type="submit" class="pull-right btn-search"></button>
                      </div>
                      
                </form>
            </div>

            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                <a class="cart-link" href="{{URL::to('/show_cart')}}">
                
                    <span class="title">Có  sản phẩm </span>

                    <span class="notify notify-left">{{Cart::count()}}</span>
                </a>

                <div class="cart-block">
                    <div class="cart-block-content">
                        <!-- <h5 class="cart-title">2 Items in my cart</h5> -->
                        @foreach($content as $v_content)
                        <div class="cart-block-list">
                            <ul>


                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">{{$v_content->name}}</p>
                                        <p class="p-name">Số lượng: {{$v_content->qty}}</p>
                                        <p class="p-rice">Tiền: <?php
										$total=$v_content->price*$v_content->qty;
										echo number_format($total).' '.'vnđ';
									?></p>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <div class="cart-buttons">
                        <?php
                        $customer_id= Session::get('customer_id');
                        if($customer_id != NULL){
                        ?>
                        <a href="{{URL::to('/checkout')}}" class="btn-check-out">Thanh toán</a>

                        <?php
                            }else{
                        ?>
                        <a href="{{URL::to('/login-checkout')}}" class="btn-check-out">Checkout</a>

                            <?php
                            }
                            ?>

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Danh mục sản phẩm</span>
                        <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
					@foreach($category as $key => $cate)
                        <ul class="vertical-menu-list">
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            
						</ul>
						@endforeach
                        <div class="all-category"><span class="open-cate">All Categories</span></div>
					</div>
                </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Trang chủ</a></li>
                                    

                                    <li class="dropdown">
                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Tin tức</a>
                                            <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                        
                                        </ul>
                                    </li>

                                    
                                    <li><a href="category.html">Liên hệ</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{URL::to('/')}}" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Thanh toán giỏ hàng</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Checkout</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content checkout-page">
            
            <h3 class="checkout-sep">2. THÔNG TIN HÓA ĐƠN</h3>
            <div class="box-border">
                <ul>
                    <!-- <form action="{{URL::to('/save-checkout-customer')}}" method="POST"> -->
                    <form action="" method="POST">
                    {{ csrf_field() }}
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="first_name" class="required">Họ và tên</label>
                                <input type="text" class="input form-control shipping_name" name="shipping_name" id="first_name">
                            </div><!--/ [col] -->
                            
                        </li><!--/ .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="email_address" class="required">Email </label>
                                <input type="text" class="input form-control shipping_email" name="shipping_email" id="email_address">
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row"> 
                            <div class="col-xs-6">

                                <label for="address" class="required">Địa chỉ</label>
                                <input type="text" class="input form-control shipping_address" name="shipping_address" id="address">

                            </div><!--/ [col] -->
                        </li><!-- / .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="telephone" class="required">Phone</label>
                                <input class="input form-control shipping_phone" type="text" name="shipping_phone" id="telephone">
                            </div><!--/ [col] -->                  
                        </li><!--/ .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="telephone" class="required">Ghi chú</label>
                                <textarea style="resize: none" rows="8" name="shipping_notes" class="form-control shipping_notes" id="exampleInputPassword1" ></textarea>
                            </div><!--/ [col] -->                  
                        </li><!--/ .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                    <select name="payment_select" id="city" class="form-control input-sm m-bot15 payment_select">
                                        <option value="0">Thanh toán ATM</option>
                                        <option value="1">Thanh toán tiền mặt</option>
                                    </select>
                                </div>
                            </div><!--/ [col] -->                  
                        </li>
                        @if(Session::get('fee'))
                            <input type="hidden" class="order_fee" name="order_fee" value="{{Session::get('fee')}}">
                        @else
                            <input type="hidden" class="order_fee" name="order_fee" value="10000" >   
                        @endif
                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                            <input type="hidden" class="order_coupon" name="order_coupon" value="{{$cou['coupon_code']}}">
                            @endforeach
                        @else
                            <input type="hidden" class="order_coupon" name="order_coupon" value="Không có">
                        @endif
                        <li>
                            <input type="button" value="Xác nhận đơn hàng" name="send_order" class="button send_order">
                            <!-- <button type="submit" name="send_order" class="button">Đặt hàng</button> -->
                        </li>
                    </form>
                </ul>
            </div>
            <h3 class="checkout-sep">4.VẬN CHUYỂN</h3>
            <div class="position-center">
                                <form >
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">-----Chọn thành phố-----</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                        <option value="">-----Chọn quận huyện-----</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        <option value="">-----Chọn xã phường-----</option>
                                    </select>
                                </div>
                                <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="button calculate_delivery">
                            </form>
                            <!-- -->
                            </div>
            
            <h3 class="checkout-sep">6. Xem lại giỏ hàng</h3>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message')}}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                    {{ session()->get('error')}}
            </div>
        @endif
        <div class="page-content page-order">
            
		
            <div class="order-detail-content">
            
                <form action="{{URL::to('/update-cart')}}" method='POST'>
                @csrf
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                    </thead>
                 
                    <tbody>
                    
                    @php
								$total = 0;
						@endphp
                    @foreach(Session::get('cart') as $key => $cart)
                    @php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp
                     
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" ></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cart['product_name']}}</a></h4>
								<p>Web ID: </p>
                                <!-- <small><a href="#">Color : Beige</a></small><br>   
                                <small><a href="#">Size : S</a></small> -->
                            </td>
                            <td class="price" style="text-align: left;"><span>{{number_format($cart['product_price'],0,',','.')}}đ</span></td>
                            <td class="qty">
                                <form action="" method="POST">
                                <input type="number" class="cart_quantity" value="{{$cart['product_qty']}}" name="cart_qty[{{$cart['session_id']}}]" style="height:30px">
                                </form>
                            </td>
                            <td class="price">
                                <span >
                                {{number_format($subtotal,0,',','.')}}đ
                                </span>
                            </td>
                            <td class="action">
                                <a class="cart_quantity_delete" href="{{URL::to('/del-product/'.$cart['session_id'])}}"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                   
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td colspan="2"><strong>Tổng tiền</strong></td>
                            <td colspan="2"><strong>{{$total}} VNĐ</strong></td>
                        </tr>  
                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition']==1)
                                <tr>
                                    <td colspan="2"><strong></strong></td>
                                    <td colspan="2"><strong>Giảm giá:</strong></td>
                                    <td colspan="2">{{$cou['coupon_number']}} %<strong>
                                    </strong></td></tr>
                                        <?php
                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                            //echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'</li></p>'
                                        ?>
                                        <?php
                                            $total_after_coupon = $total - $total_coupon;
                                        ?> 
                                @else
                                <tr>
                                    <td colspan="2"><strong></strong></td>
                                    <td colspan="2"><strong>Giảm giá:</strong></td>
                                    <td colspan="2">{{number_format($cou['coupon_number'],0,',','.')}} VNĐ<strong>
                                    </strong></td></tr>
                                    
                                        <?php 
                                            $total_coupon= $total - $cou['coupon_number'];
                                        ?>
                                        <?php
                                            $total_after_coupon = $total_coupon;
                                        ?>
                                    
                                @endif
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td colspan="2"><strong>Tổng tiền đã giảm:</strong></td>
                            <?php
                                if(Session::get('fee') && !Session::get('coupon')){
                                     $total_after= $total_after_fee;
                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                    $total_after= $total_after_coupon;
                                }elseif(Session::get('fee') && Session::get('coupon')){
                                    $total_after= $total_after_coupon;
                                    $total_after= $total_after + Session::get('fee');
                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                    $total_after= $total;
                                }
                            ?>
                            <td colspan="2"><strong>{{number_format($total_after,0,',','.')}} VNĐ</strong></td>
                        </tr>
                        @if(Session::get('fee'))
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td colspan="2" class="action">
                                <a class="cart_quantity_delete" href="{{URL::to('/del-fee')}}"></a>
                                <strong>Phí vận chuyển:</strong></td>
                            <td colspan="2"><strong>{{number_format(Session::get('fee'),0,',','.')}} VNĐ</strong></td>
                            <?php 
                                $total_after_fee = $total + Session::get('fee');
                            ?>
                        </tr>
                        @endif
                        <tr>
                            <form action="{{URL::to('/check-coupon')}}" method="POST">
                            @csrf
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="4">
                            <div class="cart__row">
                                <div class="grid">
                                    <div class="grid__item text-right large--one-half">
                                        <p class="border-button update dt-sc-button">
                                            
                                            <i>
                                                <input type="submit" name="update_qty" class="update-cart button-font" value="Cập nhật" ><span></span>
                                            </i>
                                        </p>
                                    
                                    </div>
                                </div>
                            </div>
                        </form>	
                            </td>
                    
                        </tr>
                        <tr>
                            <form action="{{URL::to('/check-coupon')}}" method="POST">
                            @csrf
                            <td colspan="2"><input type="text" class="form-control" name="coupon" placeholder="Nhap ma giam gia"></td>
                            
                            <td colspan="2"><input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tinh ma giam gia"></td>
                            </form>
                        </tr>
                    </tfoot>    
                </table>
                
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    
                    <?php
                    $customer_id= Session::get('customer_id');
                    if($customer_id != NULL){
                    ?>
                    <a class="next-btn" href="{{URL::to('/checkout')}}">Thanh toán</a>
                    <?php 
                        }else{
                    ?>
                    <a class="next-btn" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                        <?php
                        }
                        ?>
                    
                </div> 
            </div>
        </div>
            
        </div>
    </div>
</div>

<!-- Footer -->
<!-- Footer -->
<footer id="footer" style="background: #eee;" >
<div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img src="{{asset('public/frontend/data/introduce-logo.png')}}" alt="" /></a>
                        <div id="address-list">
                            <div class="tit-name">Địa chỉ:</div>
                            <div class="tit-contain">Số 61, đường Bến Than, huyền Củ Chi</div>
                            <div class="tit-name">Liên hệ:</div>
                            <div class="tit-contain">0906222453</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">mypham@gamil.com</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title"></div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">66 Nguyễn Đình Chiểu,
P.Phú Cường, TP.Thủ Dầu Một</a></li>
<li><a href="#">47 Ngô Quyền,
P.Phú Cường, TP Thủ Dầu Một</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title"></div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">47 Ngô Quyền,
P.Phú Cường, TP Thủ Dầu Một</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title"></div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">804 CMT8,
P.Chánh Nghĩa, TP.Thủ Dầu Một</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        
                        <div class="introduce-title">Kết nối với chúng tôi</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>

                </div>
            </div><!-- /#introduce-box -->

            <!-- #trademark-box -->
                            

            <!-- #trademark-text-box -->
            <div id="trademark-text-box" class="row">
                
                
                
                
                
            </div><!-- /#trademark-text-box -->
            <div id="footer-menu-box">
                
               
            </div><!-- /#footer-menu-box -->
        </div>
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{asset('public/frontend/lib/jquery/jquery-1.11.2.min.js')}}"></script>

<script type="text/javascript" src="{{asset('public/frontend/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/lib/owl.carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/lib/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/lib/jquery.elevatezoom.js')}}"></script>

<script type="text/javascript" src="{{asset('public/frontend/lib/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript" src="{{asset('public/frontend/lib/fancyBox/jquery.fancybox.js')}}"></script>

<script type="text/javascript" src="{{asset('public/frontend/js/jquery.actual.min.js')}}"></script>


<script type="text/javascript" src="{{asset('public/frontend/js/theme-script.js')}}"></script>
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(matp);
            // alert(_toke);
            if(action == 'city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh == '' && xaid == ''){
                alert('Làm ơn chọn để tính vận chuyển');
            }else{
                $.ajax({
                url : '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                success:function(){
                    location.reload();
                    //$('#'+result).html(data);
                }
            });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Mua hàng",
                    cancelButtonText: "Đóng, không mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            var shipping_name = $('.shipping_name').val();
                            var shipping_email = $('.shipping_email').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_coupon = $('.order_coupon').val();
                            var order_fee = $('.order_fee').val();
                            
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: '{{url('/confirm-order')}}',
                                method: 'POST',
                                data:{shipping_name:shipping_name,shipping_email:shipping_email,shipping_address:shipping_address,
                                    shipping_phone:shipping_phone,shipping_notes:shipping_notes,
                                    order_coupon:order_coupon,order_fee:order_fee,_token:_token,
                                    shipping_method:shipping_method},
                                success:function(){
                                    swal("Đơn hàng", "Đơn hàng của bạn đã được gủi thành công", "success"); 
                                }
                            });
                            window.setTimeout(function(){
                                location.reload();
                            },3000);
                            window.location.href = "{{url('/trang_chu')}}";
                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                        }   
                });
                
            });
        });
</script>
</body>
</html>