<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<!--富文本编辑器-->
		<script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.js"></script>
	    <script src="js/summernote.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="http://cdn.gbtags.com/font-awesome/4.1.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/summernote.css"/>
		<!--富文本编辑器-->
		<!--时间 日期-->
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
		<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
		<!--时间 日期-->
		<link rel="stylesheet" type="text/css" href="css/dong_edit.css"/>
		<link rel="stylesheet" type="text/css" href="css/knowledge.css"/>
		<link rel="stylesheet" type="text/css" href="css/chou_list.css"/>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
	</head>
	<body>
    <style>
        .stretch_list{
            display: none;
        }
        .add_list {
            display: none;
        }
    </style>
<!--导航开始-->
@include('header')
<!--导航结束-->
<div class="Edit_con">
	<div class="conter_con">
		<h2 class="knowledge_con_p">填写基本信息</h2>
		<div class="knowledge_con_head knowledge_Pad">
			<!--填写名称-->
			<div class="trade_name Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>填写名称：</p>
				</div>
				<div class="trade_name_right Left activityName">
                    <input type="text" name="act_name" id="act_name" placeholder="请输入活动标题，不少于5个字" onblur="activityNameVerify()"/>
				</div>
                <span id="s_act_name"></span>
			</div>
			<!--选择地址-->
			<div class="content_one Both content_margin">
				<div class="Mold_left Left">
					<p>选择地址：</p>
				</div>
				<div class="content_one_right Left">
					<div class="info Left">
						<div>
							<div class="s_province province">
								<select id="s_province" name="s_province"></select>  
							</div>
							<div class="s_province city">
								<select id="s_city" name="s_city" ></select>  
							</div>
							<div class="s_province county">
								<select id="s_county" name="s_county"></select>
							</div>
						    <script class="resources library" src="js/area.js" type="text/javascript"></script>
						    
						    <script type="text/javascript">_init_area();</script>
					    </div>
					    <div id="show"></div>
					</div>
				</div>
			</div>
			<!--活动时间-->
			<div class="Edit_activity_time knowledge_Mar">
				<div class="Mold_left Left">
					<p>活动时间<span>*</span></p>
				</div>
				<div class="Edit_activity_time_right Edit_all_right Left">
					<p>开始时间：</p>
					<div class="Edit_activity_time_right_input">
						<div class="Begin_time Left">
							<img src="images/edit_li_icon.png"/>
							<input type="text" name="start_date" id="datetimepicker3" value="" />
						</div>
						<div class="Finish_time Left">
							<img src="images/edit_li_icon-02.png"/>
							<input type="text" name="start_time" id="datetimepicker1" value="" />
						</div>
					</div>
				</div>
				<div class="Edit_activity_time_right Edit_all_right Left">
					<p>结束时间：</p>
					<div class="Edit_activity_time_right_input">
						<div class="Begin_time Left">
							<img src="images/edit_li_icon.png"/>
							<input type="text" name="end_date" id="datetimepicker4" value="" />
						</div>
						<div class="Finish_time Left">
							<img src="images/edit_li_icon-02.png"/>
							<input type="text" name="end_time" id="datetimepicker2" value="" />\
						</div>
					</div>
				</div>
			</div>
			<!--上传照片-->
			<div class="Upload_photos Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>上传照片：</p>
				</div>
				<div class="Upload_photos_con Left" id="drop_area">
					<div class="Upload_photos_con_img">
						<img src="images/quan_pic_icon.png"/>
					</div>
					<p>图片小于2M（jpg、gif、png、bmp）</p>
					<p class="size">尺寸不可小于<span>800*600</span>PX!</p>
				</div>
				<div class="Upload_photos_Right Left">
					<div class="Upload_photos_Right_btn">
						<a href="javascript:;"><img src="images/quan_up_icon.png"/><span>上传</span></a>
						<input type="file" name="" id="upfile" value="" />
					</div>
					<p>温馨提示： <br />优先选择拖拽上传图片、两者都选择的话会自动采用点击上传的效果</p>
					<p class="last">一张清晰的专利图、能让你的生活更加精彩、带来更多的投资 人带来更大的效益。</p>
				</div>
			</div>
			<!--活动人数-->
			<div class="trade_name Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>活动人数：</p>
				</div>
				<div class="trade_name_right Left act_peo_name">
                    <input type="text" name="act_peo_name" id="act_peo_name" value="" onblur="peoNumVerify()"/>
				</div>
                <span id="s_act_peo_name"></span>
			</div>
			<!--活动分类-->
			<div class="product_type Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>活动分类：</p>
				</div>
				<div class="product_type_right Left">
					<div class="quan_jia_icon Left">
						<img src="images/quan_jia_icon.png" id="activityClass"/>
					</div>
                    <div class="Left" id="chance"></div>
					<div class="pai_biao_icon Left">
						<img src="images/pai_biao_icon-09.png"/>
					</div>
				</div>
			</div>
			<!--活动分类展开-->
			<div class="stretch_list">
				<div class="list_sub Both category">
					<span class="Left">活动类别：<span>*</span></span>
						<li><a href="javascript:;">创业</a></li>
						<li><a href="javascript:;">投资</a></li>
				</div>
			</div>
			<!--添加标签-->
			<div class="product_type Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>添加标签：</p>
				</div>
				<div class="product_type_right Left">
					<div class="quan_jia_icon Left">
						<img src="images/quan_jia_icon.png" id="addSign"/>
					</div>
                    <div class="Left" id="signContent"></div>
					<div class="pai_biao_icon Left">
						<img src="images/pai_biao_icon-09.png"/>
					</div>
				</div>
			</div>
			<!--添加标签展开-->
			<div class="add_list">
				<div class="list_sub activitySign">
					<ul class="add_list_ul Left">
						<li><a href="javascript:;">IT</a></li>
						<li><a href="javascript:;">互联网</a></li>
						<li><a href="javascript:;">移动互联网</a></li>
						<li><a href="javascript:;">电商</a></li>
						<li><a href="javascript:;">创业</a></li>
						<li><a href="javascript:;">创新</a></li>
						<li><a href="javascript:;">科技</a></li>
						<li><a href="javascript:;">公益</a></li>
						<li><a href="javascript:;">慈善</a></li>
						<li><a href="javascript:;">环保</a></li>
						<li><a href="javascript:;">分享会</a></li>
						<li><a href="javascript:;">志愿者</a></li>
						<li><a href="javascript:;">分享</a></li>
						<li><a href="javascript:;">户外</a></li>
						<li><a href="javascript:;">教育</a></li>
						<li><a href="javascript:;">讲座</a></li>
						<li><a href="javascript:;">公开课</a></li>
						<li><a href="javascript:;">培训</a></li>
						<li><a href="javascript:;">英语</a></li>
						<li><a href="javascript:;">口才</a></li>
						<li><a href="javascript:;">沙龙</a></li>
						<li><a href="javascript:;">聚会</a></li>
						<li><a href="javascript:;">论坛</a></li>
						<li><a href="javascript:;">会议</a></li>
						<li><a href="javascript:;">交流</a></li>
						<li><a href="javascript:;">展览</a></li>
						<li><a href="javascript:;">摄影</a></li>
						<li><a href="javascript:;">展会</a></li>
						<li><a href="javascript:;">创意</a></li>
						<li><a href="javascript:;">文艺</a></li>
						<li><a href="javascript:;">艺术</a></li>
						<li><a href="javascript:;">文学</a></li>
						<li><a href="javascript:;">文化</a></li>
						<li><a href="javascript:;">活动</a></li>
						<li><a href="javascript:;">设计</a></li>
						<li><a href="javascript:;">校园</a></li>
						<li><a href="javascript:;">儿童</a></li>
						<li><a href="javascript:;">亲子</a></li>
						<li><a href="javascript:;">读书</a></li>
						<li><a href="javascript:;">交友</a></li>
						<li><a href="javascript:;">演讲</a></li>
						<li><a href="javascript:;">手工</a></li>
						<li><a href="javascript:;">融资</a></li>
						<li><a href="javascript:;">理财</a></li>
						<li><a href="javascript:;">金融</a></li>
						<li><a href="javascript:;">营销</a></li>
						<li><a href="javascript:;">投资</a></li>
						<li><a href="javascript:;">时尚</a></li>
						<li><a href="javascript:;">媒体</a></li>
						<li><a href="javascript:;">职场</a></li>
						<li><a href="javascript:;">免费</a></li>
						<li><a href="javascript:;">音乐</a></li>
						<li><a href="javascript:;">游戏</a></li>
						<li><a href="javascript:;">休闲</a></li>
						<li><a href="javascript:;">心理</a></li>
						<li><a href="javascript:;">健康</a></li>
						<li><a href="javascript:;">电影</a></li>
						<li><a href="javascript:;">音乐会</a></li>
						<li><a href="javascript:;">演唱会</a></li>
						<li><a href="javascript:;">舞台剧</a></li>
						<li><a href="javascript:;">首映</a></li>
						<li><a href="javascript:;">开幕式</a></li>
						<li><a href="javascript:;">发布会</a></li>
					</ul>
				</div>
			</div>
			<!--详细内容-->
			<div class="Detailed_content Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>详细内容：</p>
				</div>
				<div class="Detailed_content_right Left Edit_all_right">
					<div id="editor_Mold"></div>
				</div>
			</div>
			<!--设置报名表单-->
			<div class="Enroll knowledge_Mar Both">
				<div class="Enroll_fit">
					设置报名表单
				</div>
				<div class="Enroll_list">
				<p class="Enroll_list_p">联系方式<span>（报名用户注册资料，必填）</span></p>
				<div class="Enroll_list_con">
					<form action="" method="post">
						<div class="con_radio Both">
							<label class="con_radio_radio Left">
								<input type="radio" checked="checked" name="" id="" value="" />
								<span>必填  | 公司名/项目名</span>
							</label>
							<div class="con_radio_text Left">
								<input type="text" name="" id="" value="" placeholder="报名用户的姓名或昵称"/>
							</div>
						</div>
						<div class="con_radio Both">
							<label class="con_radio_radio Left">
								<input type="radio" checked="checked" name="" id="" value="" />
								<span>必填  | 手机号码</span>
							</label>
							<div class="con_radio_text Left">
								<input type="text" name="" id="" value="" placeholder="报名用户的手机号码"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			</div>
			<!--设置报名表单展开-->
			
			<!--设置活动票种-->
			<div class="Set_ticket knowledge_Mar Both">
				<div class="Set_ticket_head">
					<div class="Enroll_fit Left">
						设置活动票种
					</div>
					<div class="Enroll_fit_img Left">
						<img src="images/pai_biao_icon-09.png"/>
					</div>
					<p class="Set_ticket_add">
						目前还没有添加任何票种，请至少添加一个。
					</p>
				</div>
				<div class="Set_ticket_con Both">
					<div class="ticket_free Both">
						<p class="ticket_free_p">免费票种</p>
					 	<div class="gratis Left">
					 		<a href="javascript:;">
						 		<img src="images/edit_jia_icon.png"/>
						 		免费票种
					 		</a>
					 	</div>
					</div>
				 	<div class="ticket_free_dep Both">
						<p class="ticket_free_p">免费票种</p>
					 	<div class="ticket_deploy Left">
							<ul class="ticket_deploy_ul Both">
								<li><a href="javascript:;">票种名称</a></li>
								<li><a href="javascript:;">限额</a></li>
								<li><a href="javascript:;">价格(元)</a></li>
								<li><a href="javascript:;">状态</a></li>
								<li><a href="javascript:;">操作</a></li>
							</ul>
							<ul class="ticket_deploy_ul_02 Both">
								<li class="shuzi"><a href="javascript:;">收费票</a></li>
								<li class="shuzi"><a href="javascript:;">0</a></li>
								<li class="shuzi"><a href="javascript:;">0.01</a></li>
								<li><a href="javascript:;">售票尚未开始</a></li>
								<li class="handle">
									<a href="javascript:;">
										<img src="images/bianji_she_ico-02.png"/>
									</a>
									<a href="javascript:;">
										<img src="images/bianji_she_ico.png"/>
									</a>
								</li>
							</ul> 
							<div class="explain Both">
								<p class="explain_p Left">票种说明：</p>
								<div class="explain_inpt Left">
									<input type="text" name="" id="" value="" placeholder="限制20字"/>
								</div>
							</div>
							<div class="explain Both">
								<p class="explain_p Left">套票设置：</p>
								<div class="explain_sec Left">
									<select name="explain_sec" class="explain_secaaa">
										<option value="">1人票</option>
										<option value="">2人票</option>
										<option value="">3人票</option>
										<option value="">4人票</option>
										<option value="">5人票</option>
										<option value="">6人票</option>
										<option value="">7人票</option>
									</select>
								</div>
								<p class="explain_p_02 Left"> 订购限制  单次订购至少</p>
								<div class="explain_sec Left">
									<select name="explain_sec" class="explain_secaaa">
										<option value="">1</option>
										<option value="">2</option>
										<option value="">3</option>
										<option value="">4</option>
										<option value="">5</option>
										<option value="">6</option>
										<option value="">7</option>
									</select>
								</div>
								<p class="explain_p_02 Left">最多</p>
								<div class="explain_sec Left">
									<select name="explain_sec" class="explain_secaaa">
										<option value="">1</option>
										<option value="">2</option>
										<option value="">3</option>
										<option value="">4</option>
										<option value="">5</option>
										<option value="">6</option>
										<option value="">7</option>
									</select>
								</div>
								<p class="explain_p_02 Left">张</p>
							</div>
							<div class="explain_two Both">
								<p class="explain_p Left">是否审核：</p>
								<form action="" method="post">
									<label>
										<input type="checkbox" value=""/>
										<span>凡报名/订购此类票需要经过我审核</span>
									</label>
								</form>
							</div>
							<div class="explain_two Both">
								<p class="explain_p Left">订购日期：</p>
								<form action="" method="post">
									<label>
										<input type="checkbox" value=""/>
										<span>默认为活动结束前</span>
									</label>
								</form>
							</div>
							<div class="explain_two Both">
								<p class="explain_p Left">有效日期：</p>
								<form action="" method="post">
									<label>
										<input type="checkbox" value=""/>
										<span>默认为活动期间内有效</span>
									</label>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
				</div>
			</div>
		</div>
		<p class="spease">【特别说明*只能发布创业与投资相关的活动信息】</p>
		<div class="Editor_name_btn Both">
			<a href="javascript:;">预览</a>
			<button id="aaa">保存</button>
		</div>
	</div>
</div>
<!--底部开始-->
@include('footer')
<!--底部结束-->
	</body>
</html>
<script  src="js/dong.js"></script>
