<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
	<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>

	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />	
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/publick.css') }}"/>
	<script type="text/javascript" src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
	<script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="{{ asset('js/head.js') }}" ></script>	

</head>
<body>
	<!--导航开始-->
    @if(!Session::get('user_name'))
    <!--================用户未登录=============================-->
	<div class="nav">
		<div class="conter_con">
            <div class="logo Left">
    			<a href="/"><img src="{{ asset('images/logo_icon.png') }}" alt="" /></a>
    		</div>
    		<div class="conter_con">
    			<ul class="nav_word" id="nav_word">
                    <li><a class="a1" href="/chou">众筹</a></li>
                    <li><a class="a2" href="/ren">合伙人</a></li>
                    <li><a class="a3" href="/dong">活动&拍卖</a></li>
    			</ul>
    			<div class="nav_search Left">
    				<span class="search_img Left"><img src="{{ asset('images/search_btn.png') }}" alt="" /></span>
    				<input type="search" name="" id="" placehoLider="全站综合搜索" />
    			</div>
    		</div>
    		<div class="login Left">
    			<p><a href="/login">登录</a></p>
    			<p class="Border_none"><a href="/register">注册</a></p>
    		</div>
        </div>
	</div>
	<!--导航结束-->

    @else
<!--导航开始-->
    <!--=====用户已登录=====-->
    <div class="nav">
        <div class="conter_con">
            <div class="logo Left">
                <a href="/"><img src="{{ asset('images/logo_icon.png') }}" alt="" /></a>
            </div>
            <div class="conter_con">
                <ul class="nav_word">
                    <li><a class="a1" href="/chou">众筹</a></li>
                    <li><a class="a2" href="/ren">合伙人</a></li>
                    <li><a class="a3" href="/dong">活动&拍卖</a></li>
                </ul>
                <div class="nav_search Left">
                    <span class="search_img Left"><img src="{{ asset('images/search_btn.png') }}" alt="" /></span>
                    <input type="search" name="" id="" placeholder="全站综合搜索" />
                </div>
            </div>
            <div class="posit">
                <div class="login Left">
                    <ul class="login_ul">
                        <li class="login_ul_img imgg_Left"><a href="/user">
                                @if(!empty(Session::get('user_photo')))
                                    <img src="{{ asset(Session::get('user_photo')) }}" width="98px" height="98px"/>
                                @else
                                    <img src="images/mo.png" width="98px" height="98px"/>
                                @endif
                            </a></li>
                        <li id="login_ul">{{Session::get('user_nickname')}}<img src="{{ asset('images/zc_biao.png') }}"/></li>
                    </ul>
                </div>

                <div class="xial" id="xial" style="display: none;">
                    <ul class="xial_ul">
                        <li><a href="/my0">我的共囊</a></li>
                        <li><a href="/my1">合伙人</a></li>
                        <li><a href="/my2">我的拍卖</a></li>
                        <li><a href="/my3">我的活动</a></li>
                        <li><a href="/my4">我的留言</a></li>
                        <li><a href="/my5">账户设置</a></li>
                        <li class="tui"><a href="/exit">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
<!--导航结束-->

