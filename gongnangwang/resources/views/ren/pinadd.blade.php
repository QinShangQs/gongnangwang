<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="shortcut icon" href="images/18.png">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
		<link rel="stylesheet" type="text/css" href="css/ren_list.css"/>
		<link rel="stylesheet" type="text/css" href="css/chou_list.css" />
		<link rel="stylesheet" type="text/css" href="css/pin.css"/>
	</head>
	<body>
<!--导航开始-->
	@include('header')
<!--导航结束-->
<!---->
	<div class="ren_list_con Both">
		<div class="conter_con">
			<h2 class="ren_list_con_p">合伙人岗位信息</h2>
			<div class="ren_list_title ren_list_con_Mar">
				<div class="append_ren" id="append_ren">
					<div class="ren_list_partner">
						<div class="ren_list_title_one Both">
							<p class="Font-siz Left">合伙人/工作岗位：</p>
							<div class="ren_list_partner_text Left Font-siz position">
                                <input type="text" name="par_position" id="par_position" value="" placeholder="如：PHP程序员"/>
							</div><span id="s_position"></span>
						</div>
						<div class="ren_list_title_one Both">
							<p class="Font-siz Left">工作经验：</p>
							<div class="hands_on Left work">
								<select name="par_work" id="par_work">
									<option value="0">请选择工作经验</option>
									<option value="1">不限</option>
									<option value="2">1-3年</option>
									<option value="3">3-5年</option>
									<option value="4">5-10年</option>
									<option value="5">十年以上</option>
								</select>
							</div>
						</div>
						<div class="ren_list_title_one Both">
							<p class="Font-siz Left">学历要求：</p>
							<div class="hands_on Left education">
								<select name="par_education" id="par_education">
									<option value="0">请选择学历</option>
									<option value="1">不限</option>
									<option value="2">大专</option>
									<option value="3">本科</option>
									<option value="4">博士、硕士、研究生</option>
								</select>
                                <!-- <input type="text"  name="par_education" id="par_education" value="" placeholder="如：本科"/> -->
							</div>
						</div>
						<div class="ren_list_title_one Both">
							<p class="Font-siz Left">年龄要求：</p>
							<div class="hands_on Left age">
								<select name="par_age" id="par_age">
									<option value="0">请选择年龄要求</option>
									<option value="1">不限</option>
									<option value="2">20-30岁</option>
									<option value="3">30-40岁</option>
									<option value="4">40岁以上</option>
								</select>
                                <!-- <input type="text"  name="par_age" id="par_age" value="" placeholder="如：24岁"/> -->
							</div>
						</div>
						<div class="content_two Both content_margin">
							<span class="Font-siz content_one_span Left">工作方式：</span>
							<div class="single_form Left">
                                <label for="full_time">
                                    <input type="radio" checked name="par_mode" id="full_time" value="1"/>
                                    <span>全职</span>
                                </label>
                                <label for="part_time">
                                    <input type="radio"  name="par_mode" id="part_time" value="2"/>
                                    <span>兼职</span>
                                </label>
							</div>
						</div>
						<div class="content_two Both content_margin">
							<span class="Font-siz content_one_span Left">薪酬：</span>
							<div class="single_form Left">
                                <label for="monthly_pay">
                                    <input type="radio" checked="true" name="par_pay_type" id="monthly_pay" value="1"/>
                                    <span>月薪：</span>
                                </label>
                                <div class="Monthly Left mon">
                                    <input type="text" name="par_mon" id="par_mon" value="" />
                                </div>
                                <label for="years_pay">
                                    <input type="radio" name="par_pay_type" id="years_pay" value="2"/>
                                    <span>年薪：</span>
                                </label>
                                <div class="Monthly Left ann">
                                    <input type="text" name="par_ann" id="par_ann" value="" />
                                </div>
							</div>
						</div>
						<div class="content_two Both content_margin">
							<span class="Font-siz content_one_span Left">股权回报：</span>
							<div class="single_form Left">
                                <label for="Share_return ">
                                    <input type="radio" checked="true" name="par_return_type" id="Share_return " value="1"/>
                                    <span>股份回报：</span>
                                </label>
                                <div class="Monthly Left shares">
                                    <input type="text" name="par_shares" id="par_shares" value="" />
                                </div>
                                <label for="Other_return ">
                                    <input type="radio" name="par_return_type" id="Other_return " value="2"/>
                                    <span>其他回报：</span>
                                </label>
                                <div class="Other Left other">
                                    <input type="text" name="par_other" id="par_other" value="" />
                                </div>
							</div>
						</div>
					</div>
					<div class="ren_list_responsibility Both content_margin" >
						<span class="Font-siz content_one_span Left">合伙人职责	：</span>
						<div class="Rich_text Left duty">
							<textarea name="par_duty" id="par_duty" rows="" cols=""></textarea>
						</div>
					</div>
					<div class="ren_list_responsibility Both content_margin" >
						<span class="Font-siz content_one_span Left">合伙人要求	：</span>
						<div class="Rich_text Left ask">
							<textarea name="par_ask" id="par_ask" rows="" cols=""></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="Editor_name_btn Both">
				<img src="images/append_li.png" id="btn" onclick="mySubmit()"/>
				<!-- <button>添加下个岗位</button> -->
			</div>
		</div>
	</div>
<!---->
	<!--底部开始-->
@include('footer')
	<!--底部结束-->
	</body>
</html>
<script src="js/jquery1.9.1.min.js" type="text/javascript"></script>
<script src="js/pin.js" type="text/javascript"></script>
