<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="shortcut icon" href="images/18.png">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
        <link rel="stylesheet" type="text/css" href="css/ren_m.css"/>
		<link rel="stylesheet" type="text/css" href="css/ren.css" />
		<link rel="stylesheet" type="text/css" href="css/publick.css" />
	</head>
	<body>
<!--导航开始-->
@include('header')
	<!--导航结束-->
<!--banner开始-->
<div class="ren_banner Both">
    {{--<img src="images/ren_banner_ico.png"/>--}}
</div>
<!--banner结束-->
<div class="ren_con_head">
    <div class="conter_con">
        <div class="tabulation Both tabulation_Mar">
            <p class="technique_p imgg_Left Left">
                <a href="javascript:;">
                    <img src="images/station_biao_icon-05.png" alt="" />
                    <span>行业</span>
                </a>
            </p>
            <ul class="industry_ul Left">
                <li class="technique_active"><a href="javascript:;">能源</a></li>
                <li><a href="javascript:;">环保</a></li>
                <li><a href="javascript:;">农业</a></li>
                <li><a href="javascript:;">科研</a></li>
                <li><a href="javascript:;">金融</a></li>
                <li><a href="javascript:;">医药</a></li>
                <li><a href="javascript:;">传媒</a></li>
                <li><a href="javascript:;">影视</a></li>
                <li><a href="javascript:;">通信</a></li>
                <li><a href="javascript:;">生产</a></li>
                <li><a href="javascript:;">印刷</a></li>
                <li><a href="javascript:;">建筑</a></li>
                <li><a href="javascript:;">房地产</a></li>
                <li><a href="javascript:;">互联网</a></li>
                <li><a href="javascript:;">IT科技</a></li>
            </ul>
        </div>
        <div class="tabulation Both tabulation_Mar">
            <p class="technique_p imgg_Left Left">
                <a href="javascript:;">
                    <img src="images/station_biao_icon-06.png" alt="" />
                    <span>城市</span>
                </a>
            </p>
            <ul class="tabulation_ul Left">
                <li class="technique_active"><a href="javascript:;">全部</a></li>
                <li><a href="javascript:;">北京</a></li>
                <li><a href="javascript:;">上海</a></li>
                <li><a href="javascript:;">广州</a></li>
                <li><a href="javascript:;">深圳</a></li>
                <li><a href="javascript:;">杭州</a></li>
                <li><a href="javascript:;">成都</a></li>
                <li><a href="javascript:;">南京</a></li>
                <li><a href="javascript:;">苏州</a></li>
                <li><a href="javascript:;">武汉</a></li>
                <li><a href="javascript:;">亲子</a></li>
                <li><a href="javascript:;">重庆</a></li>
                <li><a href="javascript:;">西安</a></li>
                <li><a href="javascript:;">厦门</a></li>
                <li><a href="javascript:;">石家庄</a></li>
            </ul>
        </div>
    </div>
</div>
	<!--内容开始-->
	<nav class="con_nav Both">
		<div class="conter_con">
			<ul class="conter_con_ul Left">
				<li class="conter_con_ul_z">综合</li>
				<li>最近活跃</li>
				<li>最新加入</li>
			</ul>
			<p class="partner Right"><a href="/renadd" target=_blank><img src="images/content_middle_icon.png"/>合伙人</a></p>
		</div>
	</nav>
	<div class="ren_con">
		<div class="conter_con">
			<!--左侧-->
			<div class="content_left Both ren_one_margin Left">
				<div class="content_left_title">
					<div class="zhaopin Left">
						<img src="images/ren_zhi.png"/>
						<h3 class="Left">招聘需求</h3>
						<span>(共22个)</span>
					</div>
					<div class="title_right Right">
						<p><a href="/ren_p">更多</a></p>
					</div>
				</div>
                <div id="reply_content">
                @foreach ($data as $user)

                <div class="Left_One">
					<a href="/ren_m/{{ $user->par_proname }}/{{ $user->id }}">
						<div class="Left_One_bor Left"></div>
						<div class="Left_One_wor Left">
							<div class="beij">
								<h3 class="Left">{{ $user->par_position }}</h3>
								<span>({{ explode(',',$user->par_address)[1] }})</span>
								<p class="search_text Right">浏览量（{{ $user->par_browse }}）</p>
							</div>
							<div>{{ $user->par_title }}</div>
							<div>
								<p class="Left">@if($user->par_mode==1)全职@else兼职@endif / @if($user->par_protype==1)公司@else个人@endif  （{{ $user->par_proname }}）</p>
								<p class="Right">{{ substr($user->par_datetime,0 , strpos($user->par_datetime, ' ')) }}</p>
							</div>
						</div>
					</a>
				</div>

                @endforeach



                            <!--分页-->
				<div class="fenye">
                   {{-- {!! $data->render() !!}--}}


                  {{--  {!! $data->currentPage() !!} ||| {{$data->lastPage()}} ||||| {{$data->hasMorePages()}} ||| {{$data->total()}}--}}

                    <ul class="fenye_ul Left">
                        <li class="page">1</li>
                        <li class="page">2</li>
                        <li class="page">3</li>
                        <li class="page">4</li>
                        <li class="page">5</li>
                        <li class="fenye_ul_next">下一页</li>
                    </ul>
                    <p>共100页</p>
                    <p>去第<input type="text" />页</p>
                    <p class="que">确定</p>
				</div></div>
			</div>
			<!--右侧-->
			<div class="content_right ren_one_margin Right">
				<div class="content_right_bor">
					<div class="tuijian">
						<img src="images/ren_zhi-02.png"/>
						<h3 class="Left">推荐</h3>
					</div>
					<div class="Right_One Both">
						<a href="javascript:;">
							<div class="Right_One_bor Left"></div>
							<div class="Right_One_wor Left">
								<div class="beij">
									<h3 class="Left">PHP程序员</h3>
									<span>(北京)</span> 
									<p class="search_text Right">浏览量（5）</p>
								</div>
								<div>最牛的平台让你选择</div>
								<div>
									<p class="Left">全职 / 公司  (千途项目)</p>
									<p class="Right">2016年9月28日</p>
								</div>
							</div>
						</a>
					</div>
					<div class="Right_One Both Right_One_margin">
						<a href="javascript:;">
							<div class="Right_One_bor Left"></div>
							<div class="Right_One_wor Left">
								<div class="beij">
									<h3 class="Left">WAP前端</h3>
									<span>(北京)</span> 
									<p class="search_text Right">浏览量（3）</p>
								</div>
								<div>让梦想照亮现实</div>
								<div>
									<p class="Left">兼职 / 个人  (婚恋项目)</p>
									<p class="Right">2016年9月28日</p>
								</div>
							</div>
						</a>
					</div>
					<div class="Right_One Both Right_One_margin">
						<a href="javascript:;">
							<div class="Right_One_bor Left"></div>
							<div class="Right_One_wor Left">
								<div class="beij">
									<h3 class="Left">PHP程序员</h3>
									<span>(北京)</span> 
									<p class="search_text Right">浏览量（5）</p>
								</div>
								<div>最牛的平台让你选择</div>
								<div>
									<p class="Left">全职 / 公司  (千途项目)</p>
									<p class="Right">2016年9月28日</p>
								</div>
							</div>
						</a>
					</div>
					<div class="Right_One Both Right_One_margin">
						<a href="javascript:;">
							<div class="Right_One_bor Left"></div>
							<div class="Right_One_wor Left">
								<div class="beij">
									<h3 class="Left">WAP前端</h3>
									<span>(北京)</span> 
									<p class="search_text Right">浏览量（3）</p>
								</div>
								<div>让梦想照亮现实</div>
								<div>
									<p class="Left">兼职 / 个人  (婚恋项目)</p>
									<p class="Right">2016年9月28日</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="content_footer Both">
			<div class="conter_con">
				<div class="People">
					<div class="tuijian Left">
						<img src="images/ren_zhi.png"/>
						<h3 class="Left">合伙人</h3>
					</div>
					<p class="partner Right"><a href="/ren_s">更多</a></p>
				</div>

                @foreach($ren_data as $k=>$v)
                @if($k==0 || $k==4)

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
	<!--内容结束-->
	<!--底部开始-->
@include('footer')
	<!--底部结束-->
	</body>
</html>
<script type="text/javascript" src="js/jquery1.9.1.min.js"></script>
<script type="text/javascript">
    $('.page').click(function () {
        var page = $(this).html();
        $.get("/position_page", { page: page },
            function(data){
//                console.log(data);
//                return false;
                $('#reply_content').html(data);
            });

    })
</script>
