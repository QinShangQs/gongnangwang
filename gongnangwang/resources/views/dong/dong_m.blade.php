<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>活动&拍卖</title>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
		<link rel="stylesheet" type="text/css" href="css/pai_dong.css"/>
		<script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/calendar.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
	<!--导航开始-->
    @include('header')
	<!--导航结束-->
	<div class="pai_content">
        @foreach($data as $key=>$val)
		<div class="conter_con">
			<div class="pai_content_head">
				<div class="pai_content_head_img Left">
                    <img src="{{$val->act_photo}}" width="488px" height="290px"/>
				</div>
				<div class="pai_content_head_right Left">
					<h3>{{$val->act_name}}</h3>
					<ul class="pai_content_head_right_ul Both">
						<li>
							<p class="pai_content_head_right_ul_img imgg_Left"><img src="images/mai_tim_icon.png"/></p>
                            {{$val->act_start}}～{{$val->act_end}}</li>
						<li>
							<p class="pai_content_head_right_ul_img imgg_Left"><img src="images/biao_5.png"/></p>
							<span>{{$val->act_address}} </span>
						</li>
						<li>
							<p class="pai_content_head_right_ul_img imgg_Left"><img src="images/pai_biao_icon.png"/></p>
							限额3000人 
						</li>
						<li>
							<p class="pai_content_head_right_ul_img imgg_Left"><img src="images/pai_biao_icon-03.png"/></p>
							<p class="pai_content_head_right_ul_lang imgg_Left">
								<a href="http://www.sina.com.cn/"><img src="images/pai_three_icon.png"/></a>
							</p>
							<span>限额3000人</span>
							<button class="touch"><a href="javascript:;">联系主办人</a></button>
						</li>
					</ul>
					<div class="pai_content_head_right_foot">
						<ul class="pai_content_head_right_foot_ul Left">
							<li class="Sign_up"><a href="javascript:;">我要报名</a></li>
							<li class="Collect imgg_Left"><a href="javascript:;"><img src="images/pai_three_icon-04.png"/>收藏 813</a></li>
							<li class="Look_through Margin_none"><a href="javascript:;">18888浏览</a></li>
						</ul>
						<ul class="Share_ul Left">
							<li>分享</li>
							<li><a href="javascript:;"><img src="images/pai_three_icon-06.png"/></a></li>
							<li><a href="javascript:;"><img src="images/pai_three_icon-07.png"/></a></li>
							<li><a href="javascript:;"><img src="images/pai_three_icon-05.png"/></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="pai_content_con Both">
				<div class="pai_content_con_ticket Left">
					<div class="pai_content_con_p">
						<p class="Left">活动票种</p>
						<p class="Refund Right imgg_Left">
							<a href="javascript:;">
								<img src="images/pai_biao_icon-09.png"/>退款说明
							</a>
						</p>
					</div>
					<div class="pai_content_con_img Both">
						<ul class="pai_content_con_img_ul Both">
							<li><a href="javascript:;"><img src="images/pai_piao_icon.png"/></a></li>
							<li class="pai_Margin_none"><a href="javascript:;"><img src="images/pai_piao_icon.png"/></a></li>
						</ul>
					</div>
					<div class="pai_content_con_banner Both">
						<img src="images/pai_news_icon.png" alt="" />
					</div>
					<div class="pai_content_con_about">
                        {{$val->act_content}}
					</div>
					<div class="pai_content_con_sub">
						<ol class="pai_content_con_sub_ol">
							<li>
								主办单位：
								<span>新浪新闻</span>
							</li>
							<li>
								报名平台：
								<span>共囊网</span>
							</li>
							<li>
								活动主题：
								<span>创业路演</span>
							</li>
							<li>
								活动时间：
								<span>2016年10月14日</span>
							</li>
							<li>
								活动地点：
								<span>中关村创业大街</span>
							</li>
						</ol>
					</div>
					<div class="ai_content_con_Guest Both">
						<div class="ai_content_con_Guest_name Both">
							<h3 class="Left">嘉宾介绍</h3>
							<span class="Left">(部分、排名不分先后)</span>
						</div>
						<div class="Resume Both">
							<div class="Resume_list Left">
								<div class="Resume_list_img">
									<img src="images/pai_hai_icon.png"/>
								</div>
								<div class="Resume_list_p">
									<p>Steven Feiner</p>
									<p>哥伦比亚大学计算机图形 和用户界面实验室主任, “虚拟现实之父”</p>
								</div>
							</div>
							<div class="Resume_list Left">
								<div class="Resume_list_img">
									<img src="images/pai_hai_icon.png"/>
								</div>
								<div class="Resume_list_p">
									<p>Steven Feiner</p>
									<p>哥伦比亚大学计算机图形 和用户界面实验室主任, “虚拟现实之父”</p>
								</div>
							</div>
							<div class="Resume_list Left Resume_list_mar">
								<div class="Resume_list_img">
									<img src="images/pai_hai_icon.png"/>
								</div>
								<div class="Resume_list_p">
									<p>Steven Feiner</p>
									<p>哥伦比亚大学计算机图形 和用户界面实验室主任, “虚拟现实之父”</p>
								</div>
							</div>
						</div>
						<div class="Summit">
							<h3>峰会议程</h3>
							<ul class="Summit_ul">
								<li>未来媒体VS黑科技</li>
								<li>14:05--14:20</li>
								<li>开幕致辞</li>
								<li>演讲人：周晓鹏，</li>
								<li>新浪网副总裁\新闻总编辑</li>
							</ul>
							<ul class="Summit_ul Summit_last">
								<li>14:20--14:35</li>
								<li>从增强现实角度讲述AR的奇妙世界</li>
								<li>演讲人：Graham Roberts，</li>
								<li>《纽约时报》虚拟现实项目首席编辑</li>
							</ul>
							<h3 class="contact_us">联系我们</h3>
							<ul class="Summit_ul">
								<li>参会联系：周一清 yiqing1@staff.sina.com.cn</li>
								<li>媒体合作：王丽丽 lili43@staff.sina.com.cn</li>
								<li>商务合作：张莘 zhangshen1@staff.sina.com.cn</li>
								<li>参展申请：谭文娟 wenjuan6@staff.sina.com.cn</li>
							</ul>
						</div>
						<div class="money_foot">
							<ul class="pai_content_head_right_foot_ul Left">
								<li class="Collect_second imgg_Left"><a href="javascript:;"><img src="images/pai_xing_icon.png"/>收藏 813</a></li>
								<li class="Look_through Margin_none"><a href="javascript:;">18888浏览</a></li>
							</ul>
							<ul class="Share_ul Left">
								<li>分享</li>
								<li><a href="javascript:;"><img src="images/pai_three_icon-06.png"/></a></li>
								<li><a href="javascript:;"><img src="images/pai_three_icon-07.png"/></a></li>
								<li><a href="javascript:;"><img src="images/pai_three_icon-05.png"/></a></li>
							</ul>
						</div>
						<h3 class="last_activity">最近活动</h3>
						<div class="last_activity_enroll">
							<ul class="last_activity_enroll_ul Left">
								<a href="javascript:;">
									<li><img src="images/pai_red_icon.png"/></li>
									<li class="black">红人推</li>
									<li class="enlist">报名</li>
									<li><img src="images/pai_dian_icon.png"/></li>
									<li class="black">2小时前</li>
								</a>
							</ul>
							<ul class="last_activity_enroll_ul Left">
								<a href="javascript:;">
									<li><img src="images/pai_red_icon.png"/></li>
									<li class="black">红人推</li>
									<li class="enlist">报名</li>
									<li><img src="images/pai_dian_icon.png"/></li>
									<li class="black">2小时前</li>
								</a>
							</ul>
							<ul class="last_activity_enroll_ul Left">
								<a href="javascript:;">
									<li><img src="images/pai_red_icon.png"/></li>
									<li class="black">红人推</li>
									<li class="enlist">报名</li>
									<li><img src="images/pai_dian_icon.png"/></li>
									<li class="black">2小时前</li>
								</a>
							</ul>
							<ul class="last_activity_enroll_ul Left">
								<a href="javascript:;">
									<li><img src="images/pai_red_icon.png"/></li>
									<li class="black">红人推</li>
									<li class="enlist">报名</li>
									<li><img src="images/pai_dian_icon.png"/></li>
									<li class="black">2小时前</li>
								</a>
							</ul>
						</div>
						<div class="Question">
							<p class="Question_p">您有任何问题，在这里提问！</p>
							<div class="Question_textarea">
								<textarea name="Question" rows="" cols="" placeholder="有好多心里话，相对主办方说..."></textarea>
							</div>
							<div class="Question_button">
								<a href="javascript:;">提问</a>
							</div>
						</div>
						<h3 class="last_activity">全部评论</h3>
						<div class="Discuss">
							<div class="Discuss_img Left">
								<img src="images/pai_mu_icon.png"/>
							</div>
							<div class="Discuss_ull Left">
								<ul class="Discuss_ul Both">
									<li class="Discuss_jiao Left">修远家庭教育</li>
									<li class="Discuss_time Right">1天前</li>
								</ul>
								<div class="Discuss_ul Both">
									<p class="Left">各位家长有什么问题，在这里我都会一一解答。</p>
									<ul class="Right Discuss_time Discuss_right_ul">
										<li><img src="images/pai_biaoz_icon.png"/></li>
										<li>顶</li>
										<li>1</li>
										<li><img src="images/pai_biaoz_icon-03.png"/></li>
										<li>回复</li>
										<li>1</li>
									</ul>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pai_content_con_sina Right">
				<div class="sina_head Both">
					<div class="sina_head_img Left">
						<img src="images/pai_lang_icon.png"/>
					</div>
					<div class="sina_head_word Left">
						<h3>新浪新闻</h3>
						<p>新浪网新闻中心是新浪网最重要的频道之一,24小时滚动报道国内、国际及社会新闻。每日编发新闻数以。</p>
					</div>
				</div>
				<div class="sina_cont Both">
					<ul class="sina_ul">
						<li>
							<a href="javascript:;">
								<div class="sina_side Left"></div>
								<span>2016新浪未来媒体峰会——迎接浸媒体时代</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<div class="sina_side Left"></div>
								<span>创想日沙龙第五期：《自媒体+》——制造现象级传播与商业</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<div class="sina_side Left"></div>
								<span>创想日沙龙第四期：《新媒说》——深度解读新媒体未来视角</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<div class="sina_side Left"></div>
								<span>创想日沙龙第三期：智媒体——新闻媒体</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="pai_map_icon">
					<img src="images/pai_map_icon.png"/>
				</div>
				<!--微信分享-->
				<div class="WeChat">
					<div class="WeChat_friends Left">
						<p class="WeChat_Scan">微信 <span>扫一扫</span><br />分享～才精彩</p>
						<p class="WeChat_Scan_sec">分享此活动到 <img src="images/pai_jian_icon.png"/><br /><span>微信朋友圈!</span></p>
					</div>
					<div class="WeChat_Code Right">
						<img src="images/foot_er_icon.png"/>
					</div>
				</div>
				<!--日历-->
				<div class="calendar">
					<div id="Demo">
						<div id="CalendarMain">
						  <div id="title"> <a class="selectBtn month" href="javascript:" onClick="CalendarHandler.CalculateLastMonthDays();"><</a><a class="selectBtn selectYear" href="javascript:" onClick="CalendarHandler.CreateSelectYear(CalendarHandler.showYearStart);">2014年</a><a class="selectBtn selectMonth" onClick="CalendarHandler.CreateSelectMonth()">6月</a> <a class="selectBtn nextMonth" href="javascript:" onClick="CalendarHandler.CalculateNextMonthDays();">></a><a class="selectBtn currentDay" href="javascript:" onClick="CalendarHandler.CreateCurrentCalendar(0,0,0);">今天</a></div>
						  <div id="context">
						    <div class="week">
						      <h3> 一 </h3>
						      <h3> 二 </h3>
						      <h3> 三 </h3>
						      <h3> 四 </h3>
						      <h3> 五 </h3>
						      <h3> 六 </h3>
						      <h3> 日 </h3>
						    </div>
						    <div id="center">
						      <div id="centerMain">
						        <div id="selectYearDiv"></div>
						        <div id="centerCalendarMain">
						          <div id="Container"></div>
						        </div>
						        <div id="selectMonthDiv"></div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
            @endforeach
	</div>
	
</div>
<!--底部开始-->
@include('footer')
<!--底部结束-->
	</body>
</html>
