@extends('welcome')
@section('content3')
<div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Danh mục sản phẩm</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
						</h4>

                    <div class="vertical-menu-content is-home">
					@foreach($category as $key => $cate)
                        <ul class="vertical-menu-list">
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                            
                            </li>

						</ul>
						@endforeach
                        <div class="all-category"><span >Giao hàng toàn quốc</span></div>
                        <div class="all-category"><span class="open-cate">Tư vấn tận tâm</span></div>
                        <div class="all-category"><span class="open-cate">Cam kết chính hãng</span></div>
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
@endsection
@section('content1')
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
                    <div class="col-sm-9 header-top-right">
                        <div class="homeslider">
                            <div class="content-slide">
                                <ul id="contenhomeslider">
                                @foreach($slider as $key => $slide)
                                <li><img alt="" src="public/uploads/slider/{{$slide->slider_image}}" ></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="header-banner banner-opacity">
                            @foreach($sliderright as $key => $sli)
                            <a href="#"><img alt="" src="public/uploads/slider/{{$sli->slider_right_image}}" /></a>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content2')
<div class="container">
    <div class="service ">
<div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{asset('public/frontend/data/s1.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>Free Shipping</h3></a>
                <span>On order over $200</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{asset('public/frontend/data/s2.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>30-day return</h3></a>
                <span>Moneyback guarantee</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{asset('public/frontend/data/s3.png')}}" />
            </div>

            <div class="info" >
                <a href="#"><h3>24/7 support</h3></a>
                <span>Online consultations</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="{{asset('public/frontend/data/s4.png')}}" />
            </div>
            <div class="info">
                <a href="#"><h3>SAFE SHOPPING</h3></a>
                <span>Safe Shopping Guarantee</span>
            </div>
        </div>
        </div>
</div>
@endsection
@section('content')
<!-- featured category fashion -->

<div class="category-featured">

		<!-- featured category sports -->

        <div class="category-featured">

            <div class="container">
                <div class="brand-showcase">
                    <h2 class="brand-showcase-title">
                        Sản phẩm nổi bật
                    </h2>
                </div>
            </div>
           <div class="product-featured clearfix">
                <div class="product-featured">
                    <div class="product-featured-list">
                        <div class="tab-container">
                            <!-- tab product -->
                            <div class="tab-panel active" id="tab-4">

                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
								@foreach($all_product as $key => $product)
									<li>
                                    <form >
                                    @csrf
                                        <div class="left-block">

                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                            <img class="img-responsive" alt="product" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" />
                                            </a>
                                            <!-- <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                            </div> -->
                                            
                                        <button type="button" class="add-to-cart" data-id="{{$product->product_id}}"
                                        name="add-to-cart">Thêm giỏ hàng</button>
                                        
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="#">{{$product->product_name}}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">{{number_format($product->product_price).' '.'VNĐ'}}</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                        </div>
                                    </form>
									</li>
									@endforeach

								</ul>

                            </div>

                        </div>

                    </div>
                </div>
           </div>
        </div>
        <!-- end featured category sports-->




@endsection
