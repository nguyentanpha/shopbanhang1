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
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/sweetalert.css')}}" />
    
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
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{URL::to('/')}}" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
           
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Giỏ hàng của bạn</span>
        </h2>
        <!-- ../page heading-->
        @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                    {!! session()->get('error') !!}
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
								$total += $subtotal;
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
                            <td class="price" style="text-align: left;"><span>{{number_format($cart['product_price'],0,',','.')}} VNĐ</span></td>
                            <td class="qty">
                                
                                <input type="number" min="1" class="cart_quantity" value="{{$cart['product_qty']}}" name="cart_qty[{{$cart['session_id']}}]" style="height:30px">
                               
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
                        <tr></tr>
                   
                    <tfoot>
                    
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td colspan="2"><strong>Tổng tiền</strong></td>
                            <td colspan="2"><strong>{{number_format($total,0,',','.')}} VNĐ</strong></td>
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
                        <tr>
                            
                            <td colspan="2" ></td>
                            <td colspan="2" ></td>
                            <td colspan="2">
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
                            </td>
                            </form>	
                        </tr>
                        
                        
                        <tr>
                            <form action="{{URL::to('/check-coupon')}}" method="POST">
                            @csrf
                            <td colspan="2"></td>
                            <td colspan="2"><input type="text" class="form-control" name="coupon" placeholder="Nhap ma giam gia"></td>
                            
                            <td colspan="2"><input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tinh ma giam gia"></td>
                            </form>
                        </tr>
                    </tfoot>    
                </table>
                
                <div class="cart_navigation">
                    
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
<!-- ./page wapper-->

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
<script  src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script  src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
</body>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:30:46 GMT -->
</html>