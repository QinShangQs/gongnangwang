<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('images/18.png') }}">
	<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
	
    <link rel="stylesheet" type="text/css" href="{{ asset('css/publick.css') }}"/>
</head>
<body>
<!--导航开始-->
@if(!Session::get('user_name'))
<div class="nav">
    <div class="conter_con">
    <div class="logo Left">
        <a href="/"><img src="{{ asset('images/logo_icon.png') }}" alt="" /></a>
    </div>
    <div class="conter_con">
        <ul class="nav_word" id="nav_word">
            <li><a href="/chou">众筹</a></li>
            <li><a href="/ren">合伙人</a></li>
            <li><a href="/dong">活动&拍卖</a></li>
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
<div class="nav Both">
    <div class="conter_con">
    <div class="logo Left">
        <a href="/"><img src="{{ asset('images/logo_icon.png') }}" alt="" /></a>
    </div>
    <div class="conter_con">
        <ul class="nav_word">
            <li><a href="/chou">众筹</a></li>
            <li><a href="/ren">合伙人</a></li>
            <li><a href="/dong">活动&拍卖</a></li>
        </ul>
        <div class="nav_search Left">
            <span class="search_img Left"><img src="{{ asset('images/search_btn.png') }}" alt="" /></span>
            <input type="search" name="" id="" placeholder="全站综合搜索" />
        </div>
    </div>
        <div class="posit">
    <div class="login Left">
        <ul class="login_ul">
            @if(empty($user_data[0]->photo) || ($user_data[0]->photo)=="")
            <li class="login_ul_img imgg_Left"><a href="/user"><img src="{{ asset('images/mo.png') }}" width="98px" height="98px"/></a></li>
                @else
                <li class="login_ul_img imgg_Left"><a href="/user"><img src="{{ asset($user_data[0]->photo) }}" width="98px" height="98px"/></a></li>
                    @endif
                <li id="login_ul">{{$user_data[0]->nickname}}<img src="{{ asset('images/zc_biao.png') }}"/></li>
        </ul>
    </div>
    <div class="xial" id="xial" style="display: none;">
        <ul class="xial_ul">
            <li><a href="/my0">我的共囊</a></li>
            <li><a href="/my1">合伙人</a></li>
            <li><a href="/my2">我的活动</a></li>
            <li><a href="/my3">我的拍卖</a></li>
            <li><a href="/my4">我的留言</a></li>
            <li><a href="/my5">账户设置</a></li>
            <li class="tui"><a href="/exit">退出登录</a></li>
        </ul>
    </div></div>
</div>
</div>
<!--导航结束-->
@endif

<!--个人页面开头导航开始-->
<div class="bang_head">
    <div class="bang_head_img">
        <div class="bang_head_yuan">
            @if(empty($user_data[0]->photo) || ($user_data[0]->photo)=="")
            <a href="/user"><img src="{{ asset('images/mo.png') }}" width="258px" height="262px"/></a>
                @else
                <a href="/user"><img src="{{ asset($user_data[0]->photo) }}" width="258px" height="262px"/></a>
                    @endif
        </div>
        <p>
            @if(empty($user_data[0]->nickname) || ($user_data[0]->nickname)=="")
            共囊
                @else
                {{$user_data[0]->nickname}}
                    @endif
        </p>
    </div>
    <div class="bang_head_footer">
        <ul class="bang_head_nav conter_con" id="bang_head_nav">
            <li class="bang_moren">我的共囊</li>
            <li id="bar">合伙人</li>
            <li >我的活动</li>
            <li >我的拍卖</li>
            <li >我的留言</li>
            <li >账户设置</li>
        </ul>
    </div>
</div>
<!--个人页面开头导航开始-->
</body>
</html>
<script src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var name = $('#name').val();
        var n=name.substring(name.length-1);
        if(name=="my"){
            $(".My_conter_con").eq(0).css("display","block");
        }
        if(name=="my"+n){
            $("#bang_head_nav li").eq(n).addClass("bang_moren").siblings().removeClass("bang_moren");
            $(".My_conter_con").eq(n).css("display","block");
        }
        //var bar = $('#bang_head_nav li').index(document.getElementById('bar'));

        $("#login_ul").click(function(){
            $('.xial').toggle();
        });
        $(document).bind("click",function(e){
            var target  = $(e.target);
            if(target.closest(".xial,#login_ul").length == 0){
                $(".xial").hide();
            };
            e.stopPropagation();
        })
    });
</script>
