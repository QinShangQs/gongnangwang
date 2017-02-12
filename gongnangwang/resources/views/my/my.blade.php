<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/My.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/ren.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/publick.css') }}"/>
	</head>
	<body>
<!--导航开始-->
	@include('myheader')
<!--导航结束-->

<!--我的共囊-->
<div class="per_con">
	<div class="My_conter_con">
		<div class="My_item per_item_p">
            <input type="hidden" value="{{$name}}" id="name">
			<p class="More Left">我的项目</p>
			<div class="tuijian Right"><a href="/chouadd">
				<img src="images/content_middle_icon.png"/>
				<p class="Left">发布众筹 </p></a>
			</div>
		</div>
		<div class="per_item Both">
            @foreach($chou_data as $key=>$val)
			<div class="per_content_nar per_content_nar_none Left">
				<p class="compile"><a href="/chouedit/{{$val->pro_name}}" target="_blank"><img src="images/per_bian_icon.png"/>编辑</a></p>
				<div class="per_user Both">
					<a href="/chou_m/{{$val->pro_name}}"><img src="{{$val->pro_logo}}" width="140px" height="140px" /></a>
				</div>
				<p class="per_newspeo"><img src="images/main_icon_right_18.png" /><span class="Left">
                        @if($val->identity==1)
                            创始人
                            @elseif($val->identity==2)
                                投资人
                                @elseif($val->identity==3)
                                    律师
                                    @elseif($val->identity==4)
                                        上市高管
                                        @elseif($val->identity==5)
                                            职业经理
                                            @elseif($val->identity==6)
                                                设计师
                                                @elseif($val->identity==7)
                                                    技术开发
                                                    @elseif($val->identity==8)
                                                        融资顾问
                                                        @elseif($val->identity==9)
                                                            明星名人
                                                            @elseif($val->identity==10)
                                                                在校大学生
                                                                @elseif($val->identity==11)
                                                                    海外海归
                                                                    @elseif($val->identity==12)
                                                                        总裁董事长
                                                                        @elseif($val->identity==13)
                                                                            创业导师
                                                                            @endif

                    </span></p>
				<p class="per_newspeo Both"><a href="/chou_m/{{$val->pro_name}}" style="color: #333">项目：{{$val->pro_name}}</a></p>
				<div class="per_newspeo_p">
					<ul class="per_newspeo_p_ul">
						<li class="high">已上线</li>
						<li class="coil">已下线</li>
						<li class="per_newspeo_p_li Audit">审核中</li>
					</ul>
				</div>
			</div>
            @endforeach
		</div>
		<div class="per_item_p Both">
			<p>投资项目</p>
		</div>
		<div class="per_item">

			<div class="per_content_nar per_content_nar_none Left Margin_none">
				<div class="user Both">
					<img src="images/user.jpg"/>
				</div>
				<p class="newspeo"><img src="images/main_icon_right_18.png"/><span class="Left">创始人</span></p>
				<p class="newspeo Both">项目：千途项目</p>
				<div class="newspeo_p">
					<p>已投资金：<span>50.00元</span></p>
				</div>
			</div>

		</div>
	</div>
</div>


<!--合伙人-->
<div class="My_conter_con">
	<div class="main_hhr">
		<div class="main_hhr_div">
			<ul class="main_hhr_ul Left" id="main_hhr_ul">
				<li class="My_ren_active">我的岗位</li>
				<li>我的简历</li>
			</ul>
			<p class="partner Right"><a href="/renedit" target="_blank"><img src="images/content_middle_icon-02.png"/>合伙人管理</a></p>
			<!-- <p class="partner Right"><a href="/renadd" target="_blank"><img src="images/content_middle_icon.png"/>合伙人</a></p> -->
		</div>
		<p class="partner Right"><a href="/pinadd" target="_blank"><img src="images/content_middle_icon.png"/>岗位添加</a></p>
    	<div class="wdgn Both" style="display: block;">
            @foreach($pos_data as $key=>$val)
    		<div class="main_hhr_zhize">
    			<p><a style="color: #333" href="/ren_m/{{$val->par_proname}}/{{$val->id}}" target="_blank">{{$val->par_position}}</a></p>
    			<ul>
    				<li>{{$val->par_duty}}<span class="posDelete" id="{{$val->id}}">删除</span><span>下线</span><span><a style="color: #01a590" href="/position_edit?pos_id={{$val->id}}">编辑</a></span></li>
    			</ul>
    		</div>
            @endforeach
    	</div>
    	<div class="wdgn">
    		<div class="jian">
    			<ul class="jian_ul Both">
    				<li>文件名称</li>
    				<li>上传时间</li>
    				<li>操作</li>
    			</ul>
    			<ul class="jian_ul_ul Both">
    				<li>个人资料</li>
    				<li>2016年9月28日</li>
    				<li class="">
    					<span class="gai">更改</span>
    					<span class="shan">删除</span>
    				</li>
    			</ul>
    		</div>
    	</div>
    </div>
</div>


	
<!--我的活动-->
<div class="My_conter_con">	
	<div class="main_gn_huodong">
		<div class="p_top">
			<p class="p_left">我的活动</p>
			<p class="p_right Right"><a href="javascript:;">发布活动</a></p>
		</div>
		<div class="huodong_main" id="huodong_main">
			<ul>
				<li class="huodong_main_active">
					<a href="javascript:;">已经发布</a>
				</li>
				<li>
					<a href="javascript:;">草稿</a>
				</li>
				<li>
					<a href="javascript:;">已结束</a>
				</li>
				<li>
					<a href="javascript:;">轻活动</a>
				</li>
			</ul>
		</div>
		<div class="fabu_01" style="display: block;">
			<div class="fabu_1">
				<div class="fabu_1_rz">
					<p class="rz_p1">[共囊网] 包你融资，无效退款！10月14中关村创业大街投资路演</p>
					<div class="rz">
						<p class="rz_p2 Left"><span>开始时间2016-10-14 13：00</span></p>
						<div class="rz_right Right">
							<p class="p1 lq">票款领取</p>
							<p class="p1 exercise">活动管理</p>
							<p class="p1 name_list">名单管理</p>
							<p class="p1 copy">复制活动</p>
							<p class="p1 share">分享</p>
						</div>
					</div>
				</div>
			</div>
			<div class="fabu_1">
				<div class="fabu_1_rz">
					<p class="rz_p1">[共囊网] 包你融资，无效退款！10月14中关村创业大街投资路演</p>
					<div class="rz">
						<p class="rz_p2 Left"><span>开始时间2016-10-14 13：00</span></p>
						<div class="rz_right Right">
							<p class="p1 lq">票款领取</p>
							<p class="p1 exercise">活动管理</p>
							<p class="p1 name_list">名单管理</p>
							<p class="p1 copy">复制活动</p>
							<p class="p1 share">分享</p>
						</div>
					</div>
				</div>
			</div>
			<div class="fabu_1">
				<div class="fabu_1_rz">
					<p class="rz_p1">[共囊网] 包你融资，无效退款！10月14中关村创业大街投资路演</p>
					<div class="rz">
						<p class="rz_p2 Left"><span>开始时间2016-10-14 13：00</span></p>
						<div class="rz_right Right">
							<p class="p1 lq">票款领取</p>
							<p class="p1 exercise">活动管理</p>
							<p class="p1 name_list">名单管理</p>
							<p class="p1 copy">复制活动</p>
							<p class="p1 share">分享</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fabu_01">
			<div class="never_wei">
				<img src="images/my_dong_icon.png"/>
			</div>
		</div>
		<div class="fabu_01">
			<div class="never_wei">
				<img src="images/my_dong_icon.png"/>
			</div>
		</div>
		<div class="fabu_01">
			<div class="never_wei">
				<img src="images/my_dong_icon.png"/>
			</div>
		</div>
	</div>
</div>

<!--我的拍卖-->
<div class="My_pai_con">
	<div class="My_conter_con">
		<div class="My_pai_bg">
			<div class="My_Auction">
				<p class="More Left">我的项目</p>
				<div class="tuijian Right">
					<a href="chou_list.html">
						<img src="images/content_middle_icon.png"/>
						<p class="Left">发布拍卖 </p>
					</a>
				</div>
			</div>
			<div class="patent">
				<div class="invent_patent Left">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="invent_patent Left Margin_none">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="invent_patent Left">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="invent_patent Left Margin_none">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="invent_patent Left">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="invent_patent Left Margin_none">
					<div class="invent_patent_img Left">
						<img src="images/zhuanli_03.png" alt="" />
					</div>
					<div class="invent_patent_words Left">
						<p class="invent_patent_words_p">发明专利</p>
						<div class="mai_property_foot Both">
							<p class="mai_property_img_p Left imgg_Left">
								<img src="images/biao_4.png"/> 
								<span>10-22 14：00</span>
							</p>
							<div class="mai_property_foot_img Right">
								<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
								<img src="images/biao_7.png"/><sub>0</sub>
							</div>
						</div>
						<div class="invent_patent_p Both">
							<ul class="invent_patent_ul">
								<li class="high">已上线</li>
								<li class="coil">已下线</li>
								<li class="newspeo_p_li">审核中</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--分页-->
			<div class="pagination">
				<ul class="pagination_ul Left">
					<li class="pagination_active">1</li>
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
	</div>
</div>

<!-- 我的留言 -->
<div class="My_message_con">
	<div class="My_conter_con">
		<div class="My_Message_title">
			<p class="More Left">留言（1463）</p>
			<div class="message Right">
				<ul>
					<li>上一页</li>
					<li>下一页</li>
				</ul>
			</div>
		</div>
		<div class="My_Message_main">
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第120条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第119条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第118条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第117条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第116条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_column Both">
				<a href="javascript:;">
					<div class="column_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="column_head_right Left">
						<p class="column_name"><span>刘赫 </span>第115条留言</p>
						<div class="column_sub">
							<p>让梦想照亮现实</p>
						</div>
						<div class="column_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
								<li class="answer">回复</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
			<div class="My_Message_discuss Both">
				<div class="discuss_title">
					<div class="discuss_head Left">
						<img src="images/liuyan_head.png"/>
					</div>
					<div class="discuss_right Left">
						<p class="discuss_name"><span>刘赫 </span>投资一定要平台</p>
						<div class="discuss_date">
							<ul>
								<li>2016-12-05</li>
								<li>11:27</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="discuss_con" id="discuss_con"> 
					<textarea name="" rows="" cols="" placeholder="我也说一句..." id="discuss_con_text"></textarea>
				</div>
				<!-- 展开 -->
				<div class="discuss_con_open" id="discuss_con_open">
					<div class="open_text">
						<textarea name="" rows="" cols="" placeholder="" id="open_text"></textarea>
					</div>
					<div class="open_foot">
						<div class="open_btn Left">
							<ul>
								<li class="sure">确定</li>
								<li class="cancel">取消</li>
							</ul>
						</div>
						<div class="open_word Right">
							0/200
						</div>
					</div>
				</div>
				<script type="text/javascript">
                    discuss_con_text.onfocus=function(){
                        discuss_con_open.style.display="block";
                        discuss_con.style.display="none";
                    }
                    open_text.onblur=function(){
                        document.getElementById("discuss_con").focus();
                        discuss_con_open.style.display="none";
                        discuss_con.style.display="block";

                    }
				</script>
			</div>
		</div>
		<!--分页-->
		<div class="pagination">
			<ul class="pagination_ul Left">
				<li class="pagination_active">1</li>
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
</div>

<!--账户设置-->
<div class="My_deng">
	<div class="My_conter_con">
		<div class="My_deng_con">
			<div class="My_Deng_left Left">
				<div class="My_deng_head">
					<a href="ren.html">
						<div class="My_deng_head_tou Left">
							
						</div>
						<p class="My_deng_head_name Left">海哥</p>
					</a>
				</div>
				<div class="My_deng_con_nav Both">
					<ul id="My_deng_con_nav">
						<li class="My_deng_con_nav_active">我的资金</li>
						<li>修改密码</li>
						<li>账号绑定</li>
						<li>认证中心</li>
					</ul>
					<div class="Oneself Both"><a href="/user">个人主页</a></div>
				</div>
			</div>
			<!--我的资金-->
			<div class="My_Deng_right Left" style="display: block;">
				<div class="Black_figure_Alipay" style="display: block;">
					<div class="Black_figure Both">
						<img src="images/zhi_nang_icon.png"/>
						<span class="Left">共币余额：</span><div class="money Left"></div><span>&nbsp;￥</span>
						<p class="Black_figure_p Left"><a href="javascript:;">提现</a></p>
					</div>
					<div class="Recharge_Check">
						<p class="Recharge Left"><a href="javascript:;">共币充值</a></p>
						<p class="Check Left"><a href="javascript:;">账单流水</a></p>
					</div>
					<div class="promptly Both">
						<div class="promptly_input">
							<form action="" method="post">
								<input type="text" value="" placeholder="请输入充值金额"/>
							</form>
						</div>
						<div class="Alipay">
							<a href="javascript:;">
								<img src="images/zhi_zhi_icon.png"/>
								<span class="">支付宝充值</span>
							</a>
						</div>
					</div>
				</div>
				<!--提现-->
				<div class="Black_figure_Alipay">
					<div class="Black_figure Both">
						<img src="images/zhi_nang_icon.png"/>
						<span class="Left">共币余额：</span><div class="money Left">50.00</div><span>&nbsp;￥</span>
					</div>
					<div class="Black_figure_form">
						<form action="">
							<div class="withdraw_cash_line Both">
								<div class="withdraw_cash_left Left">
									<p>姓 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 名：</p>
								</div>
								<div class="withdraw_cash_right Left">
									<input type="text" name="" id="" value="" />
								</div>
							</div>
							<div class="withdraw_cash_line Both">
								<div class="withdraw_cash_left Left">
									<p>卡 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 号：</p>
								</div>
								<div class="withdraw_cash_right Left">
									<input type="text" name="" id="" value="" />
								</div>
							</div>
							<div class="withdraw_cash_line Both">
								<div class="withdraw_cash_left Left">
									<p>手&nbsp; 机&nbsp; 号：</p>
								</div>
								<div class="withdraw_cash_right_phone Left">
									<input type="text" name="" id="" value="" />
								</div>
								<div class="withdraw_cash_right_phone_btn Left">
									<button>获取验证码</button>
								</div>
							</div>
							<div class="withdraw_cash_line Both">
								<div class="withdraw_cash_left Left">
									<p>验&nbsp; 证&nbsp; 码：</p>
								</div>
								<div class="withdraw_cash_right Left">
									<input type="text" name="" id="" value="" />
								</div>
							</div>
							<div class="withdraw_cash_line Both">
								<div class="withdraw_cash_left Left">
									<p>提现金额：</p>
								</div>
								<div class="withdraw_cash_right Left">
									<input type="text" name="" id="" value="" />
								</div>
							</div>
							<div class="withdraw_cash_line_fastener">
								<button><a href="javascript:;">提现</a></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--修改密码-->
            <div class="My_Deng_right Left">
                <div class="Modify_password">
                    {{--<form action="">--}}
                    <div class="withdraw_cash_line Both">
                        <div class="withdraw_cash_left Left">
                            <p>旧&nbsp; 密&nbsp; 码：</p>
                        </div>
                        <div class="withdraw_cash_right Left">
                            <input type="password" name="old_pass" id="old_pass" value="" />
                        </div>
                    </div>
                    <div class="withdraw_cash_line Both">
                        <div class="withdraw_cash_left Left">
                            <p>新&nbsp; 密&nbsp; 码：</p>
                        </div>
                        <div class="withdraw_cash_right Left">
                            <input type="password" name="new_pass" id="new_pass" value="" />
                        </div>
                    </div>
                    <div class="withdraw_cash_line Both">
                        <div class="withdraw_cash_left Left">
                            <p>确认密码：</p>
                        </div>
                        <div class="withdraw_cash_right Left">
                            <input type="password" name="re_pass" id="re_pass" value="" />
                        </div>
                    </div>
                    <div class="withdraw_cash_line Both">
                        <div class="withdraw_cash_left Left">
                            <p>验&nbsp; 证&nbsp; 码：</p>
                        </div>
                        <div class="Modify_password_yz Left">
                            <input type="text" name="captcha" id="captcha" value="" />
                        </div>

                        <div class="Modify_password_yz_yanm">
                            {{--<img src="images/pas_yanz_icon.png"/>--}}
                            <a onclick="re_captcha();"><img src="{{ URL('captcha/1') }}"  alt="验证码" title="刷新图片" width="117" height="47" id="verify" border="0"></a>
                        </div>
                        {{--<div class="Modify_password_shua Left">
                            <img src="images/xiu_shua_icon.png"/>
                        </div>--}}
                    </div>
                    <div class="withdraw_cash_line_fastener">
                        <button onclick="re_update();">确认修改</button>
                    </div>
                    {{--</form>--}}
                </div>
            </div>
			
			<!--帐号绑定-->
			<div class="My_Deng_right Left">
				<div class="Bundling">
					<div class="Wechat Both">
						<div class="WeChat_img Left">
							<img src="images/bang_biaohei_icon.png"/>
						</div>
						<div class="Bundling_words Left">
							<p class="Bundling_wei">您还未绑定微信</p>
							<p class="Bundling_dian"><a href="javascript:;">点击绑定</a></p>
						</div>
					</div>
					<div class="Wechat Both">
						<div class="WeChat_img Left">
							<img src="images/bang_biao_icon-02.png"/>
						</div>
						<div class="Bundling_words Left">
							<p class="Bundling_wei">穿鞋不系带</p>
							<p class="Bundling_dian"><a href="javascript:;">取消绑定</a></p>
						</div>
					</div>
					<div class="Wechat Both">
						<div class="WeChat_img Left">
							<img src="images/bang_biaohei_icon-03.png"/>
						</div>
						<div class="Bundling_words Left">
							<p class="Bundling_wei">您还未绑定微博</p>
							<p class="Bundling_dian"><a href="javascript:;">点击绑定</a></p>
						</div>
					</div>
				</div>
			</div>
			<!--认证中心 -->
			<div class="My_Deng_right Left">
				<!--编辑-->
				<div class="Group_center">
					<h1>认证中心</h1>
					<div class="Group_center_con">
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>真 实 姓 名 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="" placeholder="请填写真实姓名"/>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>身 份 证 号 ：</p>
							</div>
							<!--<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value=""  placeholder="请填写真实的身份证号"/>
							</div>-->
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填写真实的身份证号" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="" id="" value="" />
								</a>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>有 效 邮 箱 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="" placeholder="请填写真实的邮箱" />
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>营 业 执 照 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填上传真实的营业执照照片" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="" id="" value="" />
								</a>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>投资人身份 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填上传真实的营业执照照片" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="identity_photo" id="identity_photo" value="" />
								</a>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>微 信 号 码 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="chat" id="chat" value="" placeholder="请填写真实的微信号" />
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>手 机 号 码 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填写真实的手机号" />
							</div>
							<div class="withdraw_cash_right_phone_btn Left">
								<button>获取验证码</button>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>验 &nbsp; 证 &nbsp; 码  ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="" placeholder="请填写有效的验证码" />
							</div>
						</div>
					</div>
					<div class="keep_hold">
							<input type="submit" name="" id="" value="保存" />
						</div>
				</div>
				<!--展示-->
				<div class="Group_center"  style="display: block;">
					<div class="Group_center_title">
						<h1 class="Left">认证中心</h1>
						<div class="Group_center_title_r Right">
							<img src="images/zheng_bian_icon.png"/>
							<span>编辑</span>
						</div>
					</div>
					<div class="Group_center_con">
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>真 实 姓 名 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="海哥" placeholder=""/>
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>身 份 证 号 ：</p>
							</div>
							<!--<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value=""  placeholder="请填写真实的身份证号"/>
							</div>-->
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="240819155602275568" placeholder="" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="" id="" value="" />
								</a>
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="renZ Both">
							<div class="right_logo Left">
								<img src="images/zheng_logo_icon.png" alt="" />
							</div>
							<div class="renZ_ul Left">
								<ul>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon.png"/>
											<span class="Left">删除</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-03.png"/>
											<span class="Left">上传</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-04.png"/>
											<span class="Left">选择</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="renZ_word Left">
								<p>上传身份证照片需 本人手持身份证以 使用的字样  </p>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>有 效 邮 箱 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="844584509@qq.com" placeholder="" />
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>营 业 执 照 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填上传真实的营业执照照片" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="" id="" value="" />
								</a>
							</div>
						</div>
						<div class="renZ Both">
							<div class="right_logo Left">
								<img src="images/zheng_logo_icon.png" alt="" />
							</div>
							<div class="renZ_ul Left">
								<ul>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon.png"/>
											<span class="Left">删除</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-03.png"/>
											<span class="Left">上传</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-04.png"/>
											<span class="Left">选择</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>投资人身份 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="" placeholder="请填上传真实的营业执照照片" />
							</div>
							<div class="upup Left">
								<a href="javascript:;" class="a-upload">选   择
									<input type="file" name="" id="" value="" />
								</a>
							</div>
						</div>
						<div class="renZ Both">
							<div class="right_logo Left">
								<img src="images/zheng_logo_icon.png" alt="" />
							</div>
							<div class="renZ_ul Left">
								<ul>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon.png"/>
											<span class="Left">删除</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-03.png"/>
											<span class="Left">上传</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="images/zheng_biao_icon-04.png"/>
											<span class="Left">选择</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="renZ_word Left">
								<p>上传身份证照片需 本人手持身份证以 使用的字样  </p>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>微 信 号 码 ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="1320230801" placeholder="" />
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>手 机 号 码 ：</p>
							</div>
							<div class="withdraw_cash_right_phone Left">
								<input type="text" name="" id="" value="1320230801" placeholder="" />
							</div>
							<div class="withdraw_cash_right_phone_btn Left">
								<button>获取验证码</button>
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="withdraw_cash_line Both">
							<div class="withdraw_cash_left Left">
								<p>验 &nbsp; 证 &nbsp; 码  ：</p>
							</div>
							<div class="withdraw_cash_right Left">
								<input type="text" name="" id="" value="" placeholder="请填写有效的验证码" />
							</div>
							<div class="withdraw_cash_right_img Left">
								<img src="images/zheng_biao_icon-05.png"/>
							</div>
						</div>
						<div class="keep_hold">
							<input type="submit" name="" id="" value="保存" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--底部开始-->
@include('footer')
	<!--底部结束-->
	</body>
</html>
<script src="js/jquery1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //验证码
    function re_captcha() {
        $url = "{{ URL('captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('verify').src=$url;
    }

    function re_update()
    {
        var old_pass = $('#old_pass').val();
        var new_pass = $('#new_pass').val();
        var re_pass = $('#re_pass').val();
        var captcha = $('#captcha').val();
        $.ajax({
            type: "POST",
            url: "/pass_update",
            data: "old_pass="+old_pass+"&new_pass="+new_pass+"&re_pass="+re_pass+"&captcha="+captcha,
            success: function(msg){
                var jsonobj =  eval('('+msg+')') ;

                if( jsonobj.state == 0 ){
                    alert('旧密码为空');
                    false;
                }else if( jsonobj.state == 1 )
                {
                    alert('新密码为空');
                    false;
                }else if( jsonobj.state == 2 )
                {
                    alert('确认密码为空');
                    false;
                }else if( jsonobj.state == 3 )
                {
                    alert('验证码为空');
                    false;
                }else if( jsonobj.state == 4 )
                {
                    alert('验证码出错');
                    false;
                }else if( jsonobj.state == 5 )
                {
                    alert('新密码与旧密码重复');
                    false;
                }else if( jsonobj.state == 6 )
                {
                    alert('确认密码与新密码不一致');
                    false;
                }else if( jsonobj.state == 7 )
                {
                    alert('旧密码错误');
                    false;
                }else if( jsonobj.state == 8 )
                {
                    alert('修改密码成功');
                    location.reload()
                }else if( jsonobj.state == 9 )
                {
                    alert('修改密码失败');
                    false;
                }
            }
        });
    }
    /*职位删除*/
    $('.posDelete').click(function () {
        var pos_id = $(this).attr('id');
        if(confirm("确认删除吗")){

            $.get("/position_delete", { pos_id: pos_id } , function () {
                location.href='/my1';
            } );
        }
    })

    function tab(x,y,z){
        var oLi= x.getElementsByTagName('li');
        var ODiv=document.getElementsByClassName(y);
        var i=0;
        for(var i=0;i<oLi.length;i++){
            oLi[i].a=i;
            oLi[i].onclick=function(){
                for(var j=0;j<oLi.length;j++){
                    oLi[j].className="";
                    ODiv[j].style.display='none';
                }
                ODiv[this.a].style.display='block';
                this.className=z;
            }
        }
    }
    tab(bang_head_nav,'My_conter_con','bang_moren')
    tab(My_deng_con_nav,'My_Deng_right','My_deng_con_nav_active')
    tab(main_hhr_ul,'wdgn','My_ren_active')
    tab(huodong_main,'fabu_01','huodong_main_active')
</script>