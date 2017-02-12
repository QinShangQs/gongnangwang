<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/ren_more.css"/>
		<link rel="stylesheet" type="text/css" href="css/ren.css"/>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
	</head>
	<body>
<!--导航开始-->
	@include('header')
<!--导航结束-->
<!--内容开始-->
<div class="more_con">
	<div class="conter_con">
		<!--头部-->
		<div class="more_con_head Both">
			<div class="more_con_left Left">
				<!-- 地区 -->
				<div class="more_place Both">
					<p class="more_place_p Left">地区</p>
					<ul class="more_place_ul Left">
						<li class="more_place_ul_active"><a href="javascript:;">全部</a></li>
						<li><a href="javascript:;">北京</a></li>
						<li><a href="javascript:;">上海</a></li>
						<li><a href="javascript:;">广州</a></li>
						<li><a href="javascript:;">深圳</a></li>
						<li><a href="javascript:;">山东</a></li>
						<li><a href="javascript:;">杭州</a></li>
						<li><a href="javascript:;">成都</a></li>
						<li><a href="javascript:;">天津</a></li>
						<li><a href="javascript:;">福建</a></li>
						<li><a href="javascript:;">四川</a></li>
						<li><a href="javascript:;">河北</a></li>
						<li><a href="javascript:;">甘肃</a></li>
					</ul>
				</div>
				<!--类型-->
				<div class="more_place Both">
					<p class="more_place_p Left">类型</p>
					<p class="more_place_all more_place_ul_active Left"><a href="javascript:;">全部</a></p>
					<ul class="more_mold_ul Left" id="more_mold_ul">
						<li><a href="javascript:;">创始人</a></li>
						<li><a href="javascript:;">投资人</a></li>
						<li><a href="javascript:;">律师</a></li>
						<li><a href="javascript:;">上市高管</a></li>
						<li><a href="javascript:;">职业经理</a></li>
						<li><a href="javascript:;">设计师</a></li>
						<li><a href="javascript:;">技术开发</a></li>
					</ul>
					<p class="more_place_rong Left"><a href="/rong">融资顾问</a></p>
				</div>
			</div>
			<div class="more_con_right Right">
				<a href="javascript:;">
					<div class="more_con_right_img Left">
						<img src="images/more_rz_icon.png"/>
					</div>
					<p class="Left">认证申请</p>
				</a>
			</div>
		</div>
		<!--头部结束-->
		<!--人数开始-->
		<div class="more_numb Both">
			<div class="more_founder Left">
				<div class="more_founder_block Left">
					<p>108位</p>
				</div>
				<p class="more_founder_start Left">认证创始人</p>
			</div>
			<div class="more_founder more_numb_left Left">
				<div class="more_founder_block Left">
					<p>98位</p>
				</div>
				<p class="more_founder_start Left">认证投资人</p>
			</div>
			<div class="more_founder more_numb_left Left">
				<div class="more_founder_block Left">
					<p>168位</p>
				</div>
				<p class="more_founder_start Left">融资顾问</p>
			</div>
			<div class="more_founder more_numb_left Left">
				<div class="more_founder_block Left">
					<p>204位</p>
				</div>
				<p class="more_founder_start Left">技术开发</p>
			</div>
		</div>
		<!--人数结束-->
		<!--内容-->
		<!--创始人-->
		<div class="more_con_nr Both" style="display: block;">
			<div class="more_con_nr_start">
                @foreach($ren_data as $k=>$v)
                    @if($k==0 || $k==4 ||$k==8)

                    <div class="content_footer_nar content_footer_mar_none Left Both">
                        @else
                            <div class="content_footer_nar content_footer_mar Left">
                                @endif

                        <div class="user Both">
                            <a href="/users/{{$v->nickname}}">
                                @if(empty($v->photo) || $v->photo=="")
                                    <img src="images/mo.png" width="140px" height="140px"/>
                                @else
                                    <img src="{{$v->photo}}" width="140px" height="140px"/>
                                @endif
                            </a>
                        </div>
                        <p class="newspeo"><img src="images/main_icon_right_18.png" width="24px" height="24px"/>
                        <span class="Left">
                             @if($v->identity==1)
                                创始人
                            @elseif($v->identity==2)
                                投资人
                            @elseif($v->identity==3)
                                律师
                            @elseif($v->identity==4)
                                上市高管
                            @elseif($v->identity==5)
                                职业经理
                            @elseif($v->identity==6)
                                设计师
                            @elseif($v->identity==7)
                                技术开发
                            @elseif($v->identity==8)
                                融资顾问
                            @endif
                        </span>
                    </p>
                    <p class="newspeo Both">公司名称：{{$v->company}}</p>
                    <div class="newspeo_p Both">
                        <ul class="newspeo_p_ul">
                            <li>
                                @if($v->worklife==1)
                                    1-3年
                                @elseif($v->worklife==2)
                                    3-5年
                                @elseif($v->worklife==3)
                                    5-10年
                                @elseif($v->worklife==4)
                                    10-20年
                                @endif
                            </li>
                            <li>
                                @if($v->age==1)
                                    18-25
                                @elseif($v->age==2)
                                    25-30
                                @elseif($v->age==3)
                                    30-40
                                @elseif($v->age==4)
                                    40-50
                                @elseif($v->age==5)
                                    50岁以上
                                @endif
                            </li>

                            <li class="newspeo_p_li">{{ substr($v->address,0,strpos($v->address,",")) }}  </li>
                        </ul>
                    </div>

                </div>
                @endforeach
                </div>

			</div>
			<!--分页-->
			<div class="pagination">
				<ul class="pagination_ul Left">
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li class="pagination_ul_next">下一页</li>
				</ul>
				<p>共100页</p>
				<p>去第<input type="text" />页</p>
				<p class="que">确定</p>
			</div>
		</div>
		<!--创始人结束-->

	</div>
</div>
<!--内容结束-->
<!--底部开始-->
@include('footer')
	<!--底部结束-->
	</body>
</html>
