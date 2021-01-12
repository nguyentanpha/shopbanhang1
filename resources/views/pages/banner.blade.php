@extends('welcome')
@section('content1')
<div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                          <li><img alt="Funky roots" src="{{asset('public/frontend/images/quangcao.png')}}" title="Funky roots" /></li>
                          <li><img alt="Funky roots" src="{{asset('public/frontend/images/quangcao2.png')}}" title="Funky roots" /></li>
                          <li><img  alt="Funky roots" src="{{asset('public/frontend/images/quangcao3.png')}}" title="Funky roots" /></li>
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <a href="#"><img alt="Funky roots" src="{{asset('public/frontend/images/quangcaosonmoi.png')}}" /></a>
                </div>
            </div>
@endsection