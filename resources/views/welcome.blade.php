<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:11:25 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/jquery.bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/owl.carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}" />
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/a.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/lib/fancyBox/jquery.fancybox.css')}}" />

    <title>Kute shop</title>
    <style>
#footer {
    background: white;
    margin-top: 10px;
}
</style>
</head>
<body class="home">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
        <span class="btn-close"></span>
    </div>
</div>-->
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
    @yield('content3')
</div>
<!-- end header -->
<!-- Home slideder-->

        @yield('content1')
       
<!-- END Home slideder-->
<!-- servives -->

    @yield('content2')

<!-- end services -->


<div class="content-page">
    <div class="container">
		@yield('content')
    </div>
</div>





<!-- Footer -->
<footer id="footer" >
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
                            <div class="introduce-title">Địa chỉ 2</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">66 Nguyễn Đình Chiểu,
P.Phú Cường, TP.Thủ Dầu Một</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Địa chỉ 3</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a href="#">47 Ngô Quyền,
P.Phú Cường, TP Thủ Dầu Một</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Địa chỉ 4</div>
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
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/theme-script.js')}}"></script>
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                    alert('làm ơn đặt nhỏ lại');
                }else{
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,
                    cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                    success:function(){
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                    }
                });
                }
            });
        });
    </script>
</body>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:15:06 GMT -->
</html>
