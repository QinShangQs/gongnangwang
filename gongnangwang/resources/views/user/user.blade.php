<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="shortcut icon" href="{{ asset('images/18.png') }}">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/publick.css') }}" />
	</head>
	<body>
<div class="wrap">
	<!--导航开始-->
@include('header')
	<!--导航结束-->
	<!--内容部分-->
	<div class="content_ge">
		<div class="conter_con">

			<div class="nang">

                @if(!isset($data) || empty($data))
                <p style="text-align: center"><a href="/useradd" style="color: red;">（必须完善个人信息填写）</a></p>
                <p class="nang imgg_Left Right">
                    <a href="/useradd" class="she">
                        <img src="{{ asset('images/ge_biao_icon-02.png') }}" alt="" />
                        <span>共囊设置</span>
                    </a>
                </p>

                @else
                    <p class="nang imgg_Left Left">
                        <a href="javascript:;">
                            <img src="{{ asset('images/ge_biao_icon.png') }}" alt="" />
                            共囊主页
                        </a>
                    </p>
                @endif

                @foreach($data as $key=>$val)
                @if($val->user_id == Session::get('user_id'))
                    <p class="nang imgg_Left Right">
                        <a href="/useredit" class="she" target="_blank">
                            <img src="{{ asset('images/ge_biao_icon-02.png') }}" alt="" />
                            <span>共囊设置</span>
                        </a>
                    </p>
                @endif
			</div>
			<div class="content_head Both">
				<!--左侧-->
				<div class="content_head_left Left">
					<div class="ge_pic_icon">
                        @if(empty($val->photo) || ($val->photo)=="")
                         <img src="{{ asset('images/moren.jpg') }}"/>
                            @else
                            <img src="{{ asset($val->photo) }}" width="414px" height="550px"/>
                                @endif
					</div>
					<div class="ge_pic_icon_words">
						<p class="Left">{{$val->nickname}}<span class="ge_renz_icon"><img src="{{ asset('images/ge_renz_icon.png') }}"/></span></p>
						<p class="Both">
                            年龄区间：
                            @if($val->age == 1)
                                18-25岁
                            @elseif($val->age == 2)
                                25-30岁
                            @elseif($val->age == 3)
                                30-40岁
                            @elseif($val->age == 4)
                                40-50岁
                            @endif
                        </p>
						<p>
                            身份：
                            @if($val->identity == 1)
                            创始人
                                @elseif($val->identity == 2)
                                    投资人
                                    @elseif($val->identity == 3)
                                        律师
                                        @elseif($val->identity == 4)
                                            上市高管
                                            @elseif($val->identity == 5)
                                                职业经理
                                                @elseif($val->identity == 6)
                                                    设计师
                                                    @elseif($val->identity == 7)
                                                        技术开发
                                                        @elseif($val->identity == 8)
                                                            融资顾问
                                                            @endif
                        </p>
                        <p>公司：{{$val->company}}</p>
                        <p>职位：{{$val->posts}}</p>
                        <p>地址：{{$val->address}}</p>
                        <p>
                            工作年限：
                            @if($val->worklife == 1)
                                1~3年
                                @elseif($val->worklife == 2)
                                    3~5年
                                    @elseif($val->worklife == 3)
                                        5~10年
                                        @elseif($val->worklife == 4)
                                            10~20年
                                            @endif
                        </p>
						<p>获得投资：50.00万元</p>
						<ul class="ge_redb_icon">
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-02.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-03.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-04.png') }}"/></a></li>
							<li class="ge_redb_icon_li"><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-05.png') }}"/></a></li>
						</ul>
						<ul class="ge_redb_icon-06">
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></a></li>
							<li><a href="javascript:;"><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></a></li>
						</ul>
					</div>
				</div>
				<!--右侧-->
				<div class="content_head_right Right">
                    <video src="{{ asset($val->video) }}" controls="controls" width="740" height="550" poster="" data-setup="{}">

                    </video>
					<div class="red_packet">
						<div class="red_packet_one Left">
							<a href="javascript:;" class="Left">
								<div class="red_packet_img Left">
									<img src="{{ asset('images/red_bao_icon-04.png') }}"/>
								</div>
							</a>
								<!--<p class="red_packet_one_p Left">梦想发发发</p>-->
								<div class="red_packet_words Left">
									<input type="text" name="" id="" value="" placeholder="梦想发发发"/>
								</div>
							
						</div>
						<div class="red_packet_one Left">
							<a href="javascript:;" class="Left">
								<div class="red_packet_img Left">
									<img src="{{ asset('images/red_bao_icon-02.png') }}"/>
								</div>
							</a>
								<!--<p class="red_packet_jiu_p Left">咱俩天 长地久</p>-->
								<div class="red_packet_words Left">
									<input type="text" name="" id="" value="" placeholder="梦想即是人生"/>
								</div>
							
						</div>
						<div class="red_packet_one Left">
							<a href="javascript:;" class="Left">
								<div class="red_packet_img Left">
									<img src="{{ asset('images/red_bao_icon-03.png') }}"/>
								</div>
							</a>
								<!--<p class="red_packet_one_p Left">事业顺顺顺</p>-->
								<div class="red_packet_words Left">
									<input type="text" name="" id="" value="" placeholder="梦想万一实现了"/>
								</div>
							
						</div>
						<div class="red_packet_one Left Margin_none">
							<a href="javascript:;" class="Left">
								<div class="red_packet_img Left">
									<img src="{{ asset('images/red_bao_icon.png') }}"/>
								</div>
							</a>
								<!--<p class="red_packet_one_p Left">百里挑一的王者</p>-->
								<div class="red_packet_words Left">
									<input type="text" name="" id="" value="" placeholder="先实现小目标"/>
								</div>
							
						</div>
						<div class="private_letter Left">
							<a href="javascript:;" id='private_letter'>私信</a>
						</div>
					</div>
					<div class="private_letter_list">
						<h2>留言</h2>
						<div class="letter_list_area">
							<textarea name="" rows="" cols="" placeholder="请输入您的留言"></textarea>
						</div>
						<div class="letter_list_submit">
							<button>提  交</button>
						</div>
					</div>
					<div class="Personal_declaration Both">
						<p class="nang_peo imgg_Left nang_xuan">
							<a href="javascript:;"> 
								<img src="{{ asset('images/ge_biao_icon.png') }}" alt="" />
								共囊宣言
							</a>
						</p>
						<p class="Personal Both">
                            {{$val->sign}}
						</p>
					</div>
				</div>
			</div>
            @endforeach
			<!-- 底部 -->
			<div class="content_center Both">
				<p class="nang imgg_Left Both nang_dong">
					<a href="javascript:;">
						<img src="{{ asset('images/ge_biao_icon.png') }}" alt="" />
						共囊动态
					</a> 
				</p>
				<div class="content_center_both">
				<!-- 左 -->
					<div class="content_center_left Left">
                        @foreach($chou_data as $k=>$v)
						<div class="ge_shou_icon">
							<a href="/chou_m/{{ $v->pro_name }}"><img src="{{ asset($v->pro_logo) }}" width="379px" height="131px" /></a>
						</div>
						<div class="qiantu">
							<p><a style="color: #333" href="/chou_m/{{ $v->pro_name }}">项目：{{ $v->pro_name }}</a></p>
							<p>已获资金：50.00元</p>
							<p><img src="{{ asset('images/blue_03.jpg') }}" /></p>
						</div>
						<div class="qiantu_2">
							<p>已投资金：30.00元</p>
							<p>已投项目：5个</p>
							<ul class="qiantu_2_ul">
								<li>
									<a href="javascript:;">
										<img src="{{ asset('images/ge_bott_icon.png') }}">
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<img src="{{ asset('images/ge_bott_icon.png') }}">
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<img src="{{ asset('images/ge_bott_icon.png') }}">
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<img src="{{ asset('images/ge_bott_icon.png') }}">
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<img src="{{ asset('images/ge_bott_icon.png') }}">
									</a>
								</li>
							</ul>
								
						</div>
                        @endforeach
					</div>
					<!-- 中 -->
					<div class="content_center_left Left">
                        @foreach($ren_data as $key=>$val)
						<div class="ge_lagou_icon Both">
							<a href="/ren_m/{{ $val->par_proname }}/{{ $val->id }}" target="_blank">
								<div class="lagou_icon imgg_Left Left">
									<img src="{{ asset($val->par_logo) }}" width="90px" height="90px">
								</div>
								<div class="bian Left"></div>
								<ul class="lagou_icon_ul Left">
									<li><h3 class="Left">{{ $val->par_position }}</h3> <span>({{ explode(',',$val->par_address)[1] }})</span></li>
									<li>{{ substr($val->par_title,0,15)  }}...</li>
									<li>@if($val->par_mode==1)全职@else兼职@endif / @if($val->par_protype==1)公司@else个人@endif （{{ $val->par_proname }}）</li>
								</ul>
							</a>
						</div>
                        @endforeach

					</div>
					<!-- 右 -->
					<div class="content_center_left Left Margin_none">
						<div class="ge_lagou_icon Both">
							<a href="javascript:;">
								<div class="lagou_icon imgg_Left Left">
									<img src="{{ asset('images/ge_lagou_icon.png') }}">
								</div>
								<ul class="lagou_icon_ul_v Left">
									<li><h3>专利拍卖</h3> </li>
									<li>起拍价：50.00元</li>
								</ul>
							</a>
						</div>
						<div class="ge_lagou_icon Both">
							<a href="javascript:;">
								<div class="lagou_icon imgg_Left Left">
									<img src="{{ asset('images/ge_lagou_icon.png') }}">
								</div>
								<ul class="lagou_icon_ul_v Left">
									<li><h3>专利拍卖</h3> </li>
									<li>起拍价：50.00元</li>
								</ul>
							</a>
						</div>
						<div class="ge_lagou_icon Both">
							<a href="javascript:;">
								<div class="lagou_icon imgg_Left Left">
									<img src="{{ asset('images/ge_lagou_icon.png') }}">
								</div>
								<ul class="lagou_icon_ul_v Left">
									<li><h3>专利拍卖</h3> </li>
									<li>起拍价：50.00元</li>
								</ul>
							</a>
						</div>
						<div class="ge_lagou_icon Both Border_none">
							<a href="javascript:;">
								<div class="lagou_icon imgg_Left Left">
									<img src="{{ asset('images/ge_lagou_icon.png') }}">
								</div>
								<ul class="lagou_icon_ul_v Left">
									<li><h3>专利拍卖</h3> </li>
									<li>起拍价：50.00元</li>
								</ul>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--内容部分结束-->
	<!--底部开始-->
@include('footer')
	<!--底部结束-->
</div>		
	</body>
</html>
<script type="text/javascript" src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
<script type="text/javascript">
    $('#private_letter').click(function () {
        $('.private_letter_list').css("display","block")
    })
    $(document).bind("click",function(e){
        var target  = $(e.target);
        if(target.closest(".private_letter_list,#private_letter").length == 0){
            $(".private_letter_list").hide();
        };
        e.stopPropagation();
    })
</script>
