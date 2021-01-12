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
    
    <title>Kute shop</title>
</head>
<body class="product-page">
<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="{{asset('public/frontend/images/phone.png')}}" />00-62-658-658</a>
                <a href="#"><img alt="email" src="{{asset('public/frontend/images/email.png')}}" />Contact us today!</a>
            </div>
            <div class="currency ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Dollar</a></li>
                        <li><a href="#">Euro</a></li>
                      </ul>
                </div>
            </div>
            <div class="language ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                      <img alt="email" src="{{asset('public/frontend/images/fr.jpg')}}" />French
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="{{asset('public/frontend/images/en.jpg')}}" />English</a></li>
                        <li><a href="#"><img alt="email" src="{{asset('public/frontend/images/fr.jpg')}}" />French</a></li>
                    </ul>
                </div>
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
                <a href="{{URL::to('/show_cart')}}">Giỏ hàng</a>
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
            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Wishlists</a></li>
                    </ul>
                </div>
            </div>
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
                      <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            
            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                <a class="cart-link" href="{{URL::to('/show_cart')}}">
                    <span class="title">Có {{Cart::count()}} sản phẩm </span>
                   
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
                        <span class="title-menu">Categories</span>
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
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">Asian</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Vietnamese Pho</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Noodles</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Seafood</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Sausages</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Meat Dishes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Desserts</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">European</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Greek Potatoes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Famous Spaghetti</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Famous Spaghetti</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Chicken</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Italian Pizza</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">French Cakes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">FAST</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Hamberger</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Pizza</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Noodles</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Sandwich</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Salad</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Paste</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <img src="{{asset('public/frontend/data/banner-topmenu.jpg')}}" alt="Banner">
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    
                                    <li><a href="category.html">Giỏ hàng</a></li>
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
            
            
            <h3 class="checkout-sep">5. Chọn hình thức thanh toán</h3>
            <form action="{{URL::to('/order-place')}}" method="POST">
            {{ csrf_field() }}
            <div class="box-border">
                <ul>
                    <li>
                        <label ><input name="payment_option" value=" 1"  type="checkbox"  id="radio_button_5">Thanh toán bằng thẻ ATM</label>
                    </li>

                    <li>
            
                        <label ><input name="payment_option" value=" 2" type="checkbox" id="radio_button_6">Thanh toán tiền mặt</label>
                    </li>

                </ul>
                <button class="button" name="send_order_place">Đặt hàng</button>
            </div>
            </form>
            <h3 class="checkout-sep">6. Xem lại giỏ hàng</h3>
            <div class="box-border">
            <?php
                $content = Cart::content();
                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
                ?>
            <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                    </thead>
                    @foreach($content as $v_content)
                    <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
								<p>Web ID: {{$v_content->id}}</p>
                                <!-- <small><a href="#">Color : Beige</a></small><br>   
                                <small><a href="#">Size : S</a></small> -->
                            </td>
                            <td class="price" style="text-align: left;"><span>{{number_format($v_content->price).' '.'vnđ'}}</span></td>
                            <td class="qty">
                                <form action="{{URL::to('update-cart-quantity')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" value="{{$v_content->qty}}" name="cart_quantity" style="height:30px">
                            </td>
                            <td class="price">
                                <span >
                                <?php
										$subtotal=$v_content->price*$v_content->qty;
										echo number_format($subtotal).' '.'vnđ';
									?>
                                </span>
                            </td>
                            <td class="action">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">Delete item</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach 
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="2">Tổng số sản phẩm</td>
                            <td colspan="2">{{Cart::count()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Thành tiền</strong></td>
                            <td colspan="2"><strong><?php
										$total=$v_content->price*$v_content->qty;
										echo number_format($total).' '.'vnđ';
									?></strong></td>
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
                                            // echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'</li></p>'
                                        ?>
                                    <tr>
                                        <td colspan="2"><strong></strong></td>
                                        <td colspan="2"><strong>Tổng tiền đã giảm:</strong></td>
                                        <td colspan="2">{{number_format($total-$total_coupon,0,',','.')}} VNĐ<strong>
                                        </strong></td></tr>
                                    
                                @else
                                <tr>
                                    <td colspan="2"><strong></strong></td>
                                    <td colspan="2"><strong>Giảm giá:</strong></td>
                                    <td colspan="2">{{number_format($cou['coupon_number'],0,',','.')}} vnd<strong>
                                    </strong></td></tr>
                                    
                                        <?php 
                                            $total_coupon= $total - $cou['coupon_number'];
                                        ?>
                                    <tr>
                                        <td colspan="2"><strong></strong></td>
                                        <td colspan="2"><strong>Tổng tiền đã giảm:</strong></td>
                                        <td colspan="2">{{number_format($total_coupon,0,',','.')}} VNĐ<strong>
                                        </strong></td></tr>
                                @endif
                            @endforeach
                        @endif
                    </tfoot>     
                </table>
                
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
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@business.com</div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Company</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">My Account</div>
                            <ul id = "introduce-Account" class="introduce-list">
                                <li><a href="#">My Order</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">My Credit Slip</a></li>
                                <li><a href="#">My Addresses</a></li>
                                <li><a href="#">My Personal In</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Support</div>
                            <ul id = "introduce-support"  class="introduce-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">Newsletter</div>
                        <div class="input-group" id="mail-box">
                          <input type="text" placeholder="Your Email Address"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">OK</button>
                          </span>
                        </div><!-- /input-group -->
                        <div class="introduce-title">Let's Socialize</div>
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
            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Accepted Payment Methods</li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-ups.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-qiwi.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-wu.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-cn.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-visa.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-mc.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-ems.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-dhl.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-fe.jpg')}}"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('public/frontend/data/trademark-wm.jpg')}}"  alt="ups"/></a>
                        </li>
                    </ul> 
                </div>
            </div> <!-- /#trademark-box -->
            
            <!-- #trademark-text-box -->
            <div id="trademark-text-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-search-list" class="trademark-list">
                        <li class="trademark-text-tit">HOT SEARCHED KEYWORDS:</li>
                        <li><a href="#" >Xiaomio Mi3</a></li>
                        <li><a href="#" >Digiflipo Pro XT 712 Tablet</a></li>
                        <li><a href="#" >Mi 3 Phones</a></li>
                        <li><a href="#" >Iphoneo 6 Plus</a></li>
                        <li><a href="#" >Women's Messenger Bags</a></li>
                        <li><a href="#" >Wallets</a></li>
                        <li><a href="#" >Women's Clutches</a></li>
                        <li><a href="#" >Backpacks Totes</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-tv-list" class="trademark-list">
                        <li class="trademark-text-tit">TVS:</li>
                        <li><a href="#" >Sonyo TV</a></li>
                        <li><a href="#" >Samsing TV</a></li>
                        <li><a href="#" >LGG TV</a></li>
                        <li><a href="#" >Onidai TV</a></li>
                        <li><a href="#" >Toshibao TV</a></li>
                        <li><a href="#" >Philipsi TV</a></li>
                        <li><a href="#" >Micromaxo TV</a></li>
                        <li><a href="#" >LED TV</a></li>
                        <li><a href="#" >LCD TV</a></li>
                        <li><a href="#" >Plasma TV</a></li>
                        <li><a href="#" >3D TV</a></li>
                        <li><a href="#" >Smart TV</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-mobile-list" class="trademark-list">
                        <li class="trademark-text-tit">MOBILES:</li>  
                        <li><a href="#" >Moto E</a></li>
                        <li><a href="#" >Samsing Mobile</a></li>
                        <li><a href="#" >Micromaxi Mobile</a></li>
                        <li><a href="#" >Nokian Mobile</a></li>
                        <li><a href="#" >HTCi Mobile</a></li>
                        <li><a href="#" >Sonyo Mobile</a></li>
                        <li><a href="#" >Appleo Mobile</a></li>
                        <li><a href="#" >LGG Mobile</a></li>
                        <li><a href="#" >Karbonni Mobile</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-laptop-list" class="trademark-list">
                        <li class="trademark-text-tit">LAPTOPS::</li> 
                        <li><a href="#" >Appleo Laptop</a></li>
                        <li><a href="#" >Acer Laptop</a></li>
                        <li><a href="#" >Samsing Laptop</a></li>
                        <li><a href="#" >Lenov Laptop</a></li>
                        <li><a href="#" >Sonyo Laptop</a></li>
                        <li><a href="#" >Delli Laptop</a></li>
                        <li><a href="#" >Asuso Laptop</a></li>
                        <li><a href="#" >Toshibao Laptop</a></li>
                        <li><a href="#" >LGG Laptop</a></li>
                        <li><a href="#" >HPo Laptop</a></li>
                        <li><a href="#" >Notebook</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-watches-list" class="trademark-list">
                        <li class="trademark-text-tit">WATCHES:</li>  
                        <li><a href="#" >FCUKo Watches</a></li>
                        <li><a href="#" >Titan Watches</a></li>
                        <li><a href="#" >Casioo Watches</a></li>
                        <li><a href="#" >Fastrack Watches</a></li>
                        <li><a href="#" >Timexi Watches</a></li>
                        <li><a href="#" >Fossili Watches</a></li>
                        <li><a href="#" >Dieselo Watches</a></li>
                        <li><a href="#" >Toshibao Laptop</a></li>
                        <li><a href="#" >Luxury Watches</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul id="trademark-shoes-list" class="trademark-list">
                        <li class="trademark-text-tit">FOOTWEAR:</li>  
                        <li><a href="#" >Shoes</a></li>
                        <li><a href="#" >Casual Shoes</a></li>
                        <li><a href="#" >Sports Shoes</a></li>
                        <li><a href="#" >Adidasi Shoes</a></li>
                        <li><a href="#" >Gas Shoes</a></li>
                        <li><a href="#" >Pumai Shoes</a></li>
                        <li><a href="#" >Reeboki Shoes</a></li>
                        <li><a href="#" >Woodlandi Shoes</a></li>
                        <li><a href="#" >Red tape Shoes</a></li>
                        <li><a href="#" >Nikeo Shoes</a></li>
                    </ul>
                </div>
            </div><!-- /#trademark-text-box -->
            <div id="footer-menu-box">
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Online Shopping</a></li>
                        <li><a href="#" >Promotions</a></li>
                        <li><a href="#" >My Orders</a></li>
                        <li><a href="#" >Help</a></li>
                        <li><a href="#" >Site Map</a></li>
                        <li><a href="#" >Customer Service</a></li>
                        <li><a href="#" >Support</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Most Populars</a></li>
                        <li><a href="#" >Best Sellers</a></li>
                        <li><a href="#" >New Arrivals</a></li>
                        <li><a href="#" >Special Products</a></li>
                        <li><a href="#" >Manufacturers</a></li>
                        <li><a href="#" >Our Stores</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Warantee</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Checkout</a></li>
                        <li><a href="#" >Discount</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Terms & Conditions</a></li>
                        <li><a href="#" >Policy</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Returns</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Warrantee</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>
                <p class="text-center">Copyrights &#169; 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com</p>
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

</body>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:30:46 GMT -->
</html>