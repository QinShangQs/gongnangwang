<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
		<link rel="stylesheet" type="text/css" href="css/pai_mai.css"/>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
	</head>
	<body>
	<!--导航开始-->
@include('header')
	<!--导航结束-->
		<div class="gongnang_content">
			<div class="gongnang_content-1">
                @foreach($data as $key=>$val)
				<div class="gongnang_left">
					<div class="gongnang_img">
                        <img src="{{$val->auc_photo}}" width="420px" height="314px"/>
					</div>
					<div class="gongnang_dianzan">
						<a href="javascript:;">
							<img src="images/gongnang_xing_11.png" />
							收藏:<b>813</b>
						</a>
					</div>
					<div class="gongnang_fenxiang">
						<span>分享:</span>
						<a href="javascript:;"><img src="images/gongnang_xing_03.png" class="gongnang_fenxiang-img1"/></a>
						<a href="javascript:;"><img src="images/gongnang_xing_08.png"/></a>
						<a href="javascript:;"><img src="images/gongnang_xing_05.png"/></a>
					</div>
				</div>	
				<div class="gongnang_left2">
					<p>{{$val->auc_name}}</p>
					<ul>
						<li>商品类型：
                            @if($val->auc_type==1)
                            单商标
                            @elseif($val->auc_type==2)
                            单专利
                            @elseif($val->auc_type==3)
                            单域名
                            @elseif($val->auc_type==4)
                            其他
                            @endif
                        </li>
						<li>专 利 号：{{$val->auc_number}}</li>
						<li>专利类型：{{$val->auc_product_type}}</li>
						<li>所属行业：{{$val->auc_industry}}</li>
						<li>有效期限：{{$val->auc_term}}</li>
						<li>出售类型：转让</li>
						<li>当前价格：{{$val->auc_price}}</li>
					</ul>
					<label>加&nbsp;&nbsp;价:
						<input type="text" class="gongnang_left2-input2"/>
						<input type="text" class="gongnang_left2-input2"/>
						<input type="text" class="gongnang_left2-input2"/>
						<input type="text" placeholder="输入价格" class="gongnang_left2-input"/>
						<input type="button" value="提交" class="gongnang_left2-input3" />
					</label>
				</div>
				<div class="gongnang_right">
					<ul>
						<li>联系方式</li>
						<li>卖家姓名:海哥</li>
						<li>手&nbsp;&nbsp;机:{{$val->con_phone}}</li>
						<li>Q&nbsp;&nbsp;&nbsp;Q:{{$val->con_qqnumber}}</li>
						<li>邮&nbsp;&nbsp;箱:{{$val->con_email}}</li>
						<li>微&nbsp;&nbsp;信:{{$val->con_wechat}}</li>
					</ul>
					<div>与我联系</div>
				</div>	
			</div>
			<div class="gongnang_main">
				<div class="gongnang_main-chanpin">
					<h4>产品详情</h4>
					<p>{{$val->auc_content}}</p>

                    <hr /> 
                    <h5>产品展示</h5>
                    <div>
	                    <img src="{{$val->auc_product_display}}" width="215px" height="158px"/>
	                    <img src="images/zhuanli_03.png" />
	                    <img src="images/zhuanli_03.png" />
	                    <img src="images/zhuanli_03.png" />
	                    <img src="images/zhuanli_03.png" />
	                    <img src="images/zhuanli_03.png" />
                    </div>
				</div>
                @endforeach
				<div class="gongnang_main-right">
					<img src="images/quantou_03.png" /><h3>推荐</h3>
					<div class="gongnang_tuijian">
						<p>网站域名:<b>yhsp.com</b></p><span class="gongnang_tuijian-sp1"><b>浏览量（5）</b></span>
						<p class="gongnang_tuijian-p1"></p>
						<p class="gongnang_tuijian-p2">￥12,888</p><span class="gongnang_tuijian-sp2">2016年9月28日</span>
					</div>
					<div class="gongnang_tuijian gao">
						<p>网站域名:<b>yhsp.com</b></p><span class="gongnang_tuijian-sp1"><b>浏览量（5）</b></span>
						<p class="gongnang_tuijian-p1"></p>
						<p class="gongnang_tuijian-p2">￥12,888</p><span class="gongnang_tuijian-sp2">2016年9月28日</span>
					</div>
					<div class="gongnang_tuijian gao">
						<p>网站域名:<b>yhsp.com</b></p><span class="gongnang_tuijian-sp1"><b>浏览量（5）</b></span>
						<p class="gongnang_tuijian-p1"></p>
						<p class="gongnang_tuijian-p2">￥12,888</p><span class="gongnang_tuijian-sp2">2016年9月28日</span>
					</div>
					<div class="gongnang_tuijian gao">
						<p>网站域名:<b>yhsp.com</b></p><span class="gongnang_tuijian-sp1"><b>浏览量（5）</b></span>
						<p class="gongnang_tuijian-p1"></p>
						<p class="gongnang_tuijian-p2">￥12,888</p><span class="gongnang_tuijian-sp2">2016年9月28日</span>
					</div>
					<div class="gongnang_main-right-erweima">
						<div class="erweima-sao">
							<p class="gongnang_tuijian-p3">微信 <b>扫一扫</b>
							    <br />
							          分享~才精彩
							</p>
							<p class="gongnang_tuijian-p4">分享此活动到→
								<br />
							    <b>微信朋友圈</b>
							</p>
						</div>
						<div class="erweima-img">
							<img src="images/foot_er_icon.png"/>
						</div>
						</div>
					</div>	
			    </div>
			<div class="gongnang_liucheng">
				<div class="gongnang_jiaoyi">
					<h6>交易流程</h6>
					<ul>
						<li>1.买家选商品</li>
						<li>2.买家拍到商品</li>
						<li>3.提供卖家联系<br/>方式开始交易</li>
						<li>4.交易完成</li>
					</ul>
				</div>
			</div>
		</div>
	<!--底部开始-->
    @include('footer')
	<!--底部结束-->	
	</body>
</html>
