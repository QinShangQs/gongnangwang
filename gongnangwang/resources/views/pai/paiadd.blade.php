<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
		<link rel="stylesheet" type="text/css" href="css/knowledge.css"/>
	</head>
	<body>
	<!--导航开始-->
	@include('header')
<!--导航结束-->
<div class="knowledge_con">
	<div class="conter_con">
		<h2 class="knowledge_con_p">知识产权编辑</h2>

		<div class="knowledge_con_head knowledge_Pad">
			<!--商品类型-->
			<p style="color: #ff0000;font-size: 14px;line-height: 60px;">（发布知识产权每项收费100元）</p>
			<div class="Mold Both">

				<div class="Mold_left Left">
					<p>商品类型：</p>
				</div>
				<div class="Mold_right Left">
                    <label for="brand">
                        <input type="radio" name="Mold" id="brand" value="1"/>
                        <span>单商标</span>
                    </label>
                    <label for="patent">
                        <input type="radio" name="Mold" id="patent" value="2"/>
                        <span>单专利</span>
                    </label>
                    <label for="realm_name">
                        <input type="radio" name="Mold" id="realm_name" value="3"/>
                        <span>单域名</span>
                    </label>
                    <label for="realm_other">
                        <input type="radio" name="Mold" id="realm_other" value="4"/>
                        <span>其他</span>
                    </label>
                    <span id="s_goods_type"></span>
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
						{{--<input type="file" name="" id="" value="" />--}}
					</div>
					<p>温馨提示： <br />可以点击上传选择图片、也可以直接拖拽或粘贴图片至此窗口</p>
					<p class="last">一张清晰的专利图、能让你的生活更加精彩、带来更多的投资 人带来更大的效益。</p>
				</div>
			</div>
			<!--商品名称-->
			<div class="trade_name Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>商品名称：</p>
				</div>
				<div class="trade_name_right Left goods_name">
					<input type="text" name="goods_name" id="goods_name" value="" onblur="goodsNameVerify()"/>
				</div>
                <span id="s_goods_name"></span>
			</div>
			<div class="trade_name Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>专 利 号&nbsp;：</p>
				</div>
				<div class="trade_name_right Left goods_knowledge">
					<input type="text" name="goods_knowledge" id="goods_knowledge" value="" onblur="goodsKnowledgeVerify()"/>
				</div>
                <span id="s_goods_knowledge"></span>
			</div>
			<div class="trade_name Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>有 效 期&nbsp;：</p>
				</div>
				<div class="trade_name_right Left goods_term">
					<input type="text" name="goods_term" id="goods_term" value="" onblur="goodsTermVerify()"/>
				</div>
                <span id="s_goods_term"></span>
			</div>
			<!--产品类型-->
			<div class="product_type Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>产品类型：</p>
				</div>
				<div class="product_type_right Left">
					<div class="quan_jia_icon Left" id="productType">
						<img src="images/quan_jia_icon.png"/>
					</div>
                    <div class="Left" id="productTypeCheck"></div>
					<div class="pai_biao_icon ctypes Left">
						<img src="images/pai_biao_icon-09.png"/>
					</div>
                    <div class="pai_biao_icon_words types Left">
                        <p>添加合适的产品类型有利于用户在站内、站外发现您的拍卖</p>
                    </div>
                    <span id="s_pro_type"></span>
				</div>
			</div>
            <!--产品类型展开-->
            <div class="open_type Both">
                <p class="Left">产品类型:</p>
                <ul class="open_type_ul Left">
                    <li><a href="javascript:;">发明专利</a></li>
                    <li><a href="javascript:;">实用新型专利</a></li>
                    <li><a href="javascript:;">外观设计专利</a></li>
                </ul>
            </div>
			<div class="product_type Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>所属行业：</p>
				</div>
				<div class="product_type_right Left">
					<div class="quan_jia_icon Left" id="industry">
						<img src="images/quan_jia_icon.png"/>
					</div>
                    <div class="Left" id="industryCheck"></div>
					<div class="pai_biao_icon cinds Left">
						<img src="images/pai_biao_icon-09.png"/>
					</div>
                    <div class="pai_biao_icon_words inds Left">
                        <p>添加合适的所属行业有利于用户在站内、站外发现您的拍卖</p>
                    </div>
                    <span id="s_ind"></span>
				</div>
			</div>
            <!--所属行业展开-->
            <div class="trade_open Both">
                <p class="Left">所属行业:</p>
                <ul class="trade_open_ul Left">
                    <li><a href="javascript:;">畜牧业</a></li>
                    <li><a href="javascript:;">农业</a></li>
                    <li><a href="javascript:;">林业</a></li>
                    <li><a href="javascript:;">渔业</a></li>
                    <li><a href="javascript:;">食品饮料</a></li>
                    <li><a href="javascript:;">航空航天</a></li><br />
                    <li><a href="javascript:;">畜牧业</a></li>
                    <li><a href="javascript:;">农业</a></li>
                    <li><a href="javascript:;">林业</a></li>
                    <li><a href="javascript:;">渔业</a></li>
                    <li><a href="javascript:;">食品饮料</a></li>
                    <li><a href="javascript:;">航空航天</a></li>
                </ul>
            </div>
			<!--产品详情-->
			<div class="Product_details Both knowledge_Mar">
				<div class="Mold_left  Left">
					<p>产品详情：</p>
				</div>
				<div class="Product_details_right Left goods_content">
					<!--<div id="editor"></div>-->	
					<textarea name="goods_content" id="goods_content" rows="" cols=""></textarea>
				</div>
                <span id="s_goods_content"></span>
			</div>

			<!--上传照片-->
			<div class="Upload_photos Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>产品展示：</p>
				</div>
				<div class="Upload_photos_con Left" id="drop_area2">
					<div class="Upload_photos_con_img">
						<img src="images/quan_pic_icon.png"/>
					</div>
					<p>图片小于2M（jpg、gif、png、bmp）</p>
					<p class="size">尺寸不可小于<span>800*600</span>PX!</p>
				</div>
				<div class="Upload_photos_Right Left">
					<div class="Upload_photos_Right_btn">
						<a href="javascript:;"><img src="images/quan_up_icon.png"/><span>上传</span></a>
						{{--<input type="file" name="" id="" value="" />--}}
					</div>
					<p>温馨提示： <br />可以点击上传选择图片、也可以直接拖拽或粘贴图片至此窗口</p>
					<p class="last">一张清晰的专利图、能让你的生活更加精彩、带来更多的投资 人带来更大的效益。</p>
				</div>
			</div>
			
			<!--价格类型-->
			<div class="Price Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>价格类型：</p>
				</div>
				<div class="Price_right Left">
                    <label for="beat">
                        <ul>
                            <li>
                                <input type="radio" name="Price" id="beat" value="1"/>
                                <span>拍价格</span>
                                <div class="Right input_field price">
                                    <input type="text" name="goods_price" id="goods_price" value="" />
                                </div>
                            </li>
                            <li class="Both Right">（如有一口价则无效)</li>
                        </ul>
                    </label>
                    <label for="OPrice">
                        <ul>
                            <li>
                                <input type="radio" name="Price" id="OPrice" value="2"/>
                                <span>一口价</span>
                                <div class="Right input_field priceOne">
                                    <input type="text" name="goods_price_one" id="goods_price_one" value="" />
                                </div>
                            </li>
                            <li class="Both">（有一口价格及以一口价格为准)</li>
                        </ul>
                    </label>
				</div>
                <span id="s_goods_price"></span>
			</div>
			
		</div>
			
		<!--卖家联系方式-->
		
		<div class="Contact_way">
			<p class="Both Contact_way_head knowledge_Pad"><span>卖家联系方式</span>（请认真填写您的联系方式）</p>
			<div class="Contact_way_con">
				<div class="Contact_way_con_center">
					<div class="phone Both">
						<div class="Mold_left Left">
							<p>手机号：</p>
						</div>
						<div class="phone_right Left phoneVer">
							<input type="text" name="phone" id="phone" value="" placeholder="请填写真实的手机号码" onblur="phoneVerify()"/>
                            <span id="s_phone"></span>
                        </div>

					</div>
					<div class="phone Both">
						<div class="Mold_left Left">
							<p>微 &nbsp; 信：</p>
						</div>
						<div class="phone_right Left wechatVer">
							<input type="text" name="wechat" id="wechat" value="" placeholder="请填写真实的微信号码" onblur="wechatVerify()"/>
                            <span id="s_wechat"></span>
						</div>
					</div>
					<div class="phone Both">
						<div class="Mold_left Left">
							<p>Q Q号：</p>
						</div>
						<div class="phone_right Left qqnumberVer">
							<input type="text" name="qqnumber" id="qqnumber" value="" placeholder="请填写真实的QQ号码" onblur="qqnumberVerify()"/>
                            <span id="s_qqnumber"></span>
                        </div>
					</div>
					<div class="phone Both">
						<div class="Mold_left Left">
							<p>邮 &nbsp; 箱：</p>
						</div>
						<div class="phone_right Left emailVer">
							<input type="text" name="email" id="email" value="" placeholder="请填写真实的邮箱" onblur="emailVerify()"/>
                            <span id="s_email"></span>
						</div>
					</div>
					<div class="Editor_name_btn Both">
						<a href="javascript:;">预览</a>
						<button id="btn">保存</button>
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
<script type="text/javascript" src="js/jquery1.9.1.min.js"></script>
<script type="text/javascript" src="js/pai.js"></script>
