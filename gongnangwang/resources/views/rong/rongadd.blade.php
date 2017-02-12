<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/knowledge.css"/>
		<link rel="stylesheet" type="text/css" href="css/rong.css"/>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
	</head>
	<body>
<!--导航开始-->
	@include('header')
<!--导航结束-->
<!--内容部分开始-->
<div class="rong_con">
	<div class="conter_con">
		<div class="rong_title">
			<h2 class="knowledge_con_p">融资顾问申请</h2>
		</div>
		<div class="rong_con_nr">
			<!--姓名-->
			<div class="rong_con_name Both rong_mar_top">
				 <div class="rong_con_name_left Left">
				 	<p>姓  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名  &nbsp;：</p>
				 </div>
				 <div class="rong_con_name_inpt Left">
				 	<input type="text" name="" id="" value="" />
				 </div>
				 <div class="rong_con_name_left Left rong_mar_left">
				 	<p>年  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄  &nbsp;：</p>
				 </div>
				 <div class="rong_con_name_inpt Left">
				 	<input type="text" name="" id="" value="" />
				 </div>
			</div>
			<!--常住城市-->
			<div class="rong_con_name Both rong_mar_top">
				 <div class="rong_con_name_left Left">
				 	<p>常住城市：</p>
				 </div>
				 <div class="rong_con_name_inpt Left">
				 	<input type="text" name="" id="" value="" />
				 </div>
				 <div class="rong_con_name_left Left rong_mar_left">
				 	<p>毕业院校：</p>
				 </div>
				 <div class="rong_con_school_inpt Left">
				 	<input type="text" name="" id="" value="" />
				 </div>
			</div>
			<!--上传照片-->
			<div class="Upload_photos Both knowledge_Mar">
				<div class="Mold_left Left">
					<p>上传照片：</p>
				</div>
				<div class="Upload_photos_con Left">
					<div class="Upload_photos_con_img">
						<img src="images/quan_pic_icon.png"/>
					</div>
					<p>图片小于2M（jpg、gif、png、bmp）</p>
					<p class="size">尺寸不可小于<span>800*600</span>PX!</p>
				</div>
				<div class="Upload_photos_Right Left">
					<div class="Upload_photos_Right_btn">
						<a href="javascript:;"><img src="images/quan_up_icon.png"/><span>上传</span></a>
					</div>
					<p>温馨提示： <br />可以点击上传选择图片、也可以直接拖拽或粘贴图片至此窗口</p>
					<p class="last">可以上传毕业证书或者相关的资质证书。</p>
				</div>
			</div>
			<!--现工作单位-->
			<div class="rong_con_name Both rong_mar_top">
				 <div class="Mold_left Left">
					<p>现工作单位：</p>
				</div>
				 <div class="Work_unit Left">
				 	<input type="text" name="" id="" value="" />
				 </div>
			</div>
			<!--现工作时长-->
			<div class="rong_con_name Both rong_mar_top">
				 <div class="Mold_left Left">
				 	<p>现工作时长：</p>
				 </div>
				 <div class="rong_con_time_both Left">
				 	<div class="rong_con_time_inpt Left">
				 		<input type="text" name="" id="" value="" />
				 	</div>
				 	<span class="rong_years Left">年</span>
				 </div>
				 <div class="Mold_left Left  rong_mar_left">
				 	<p>总工作年限：</p>
				 </div>
				 <div class="rong_con_time_both Left">
				 	<div class="rong_con_time_inpt Left">
				 		<input type="text" name="" id="" value="" />
				 	</div>
				 	<span class="rong_years Left">年</span>
				 </div>
			</div>
			<!--社会资源优势-->
			<div class="rong_con_Social Both rong_mar_top">
				 <div class="Mold_left Left">
					<p>社会资源优势：</p>
				</div>
				 <div class="Social Left">
				 	<textarea name="" rows="" cols="" placeholder="请填写您的优势"></textarea>
				 </div>
			</div>
			<!--申请独白-->
			<div class="rong_con_Social Both rong_mar_top">
				 <div class="Mold_left Left">
					<p>申请独白：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
				 <div class="Social Left">
				 	<textarea name="" rows="" cols="" placeholder="是否有组织能力、挑战能力。"></textarea>
				 </div>
			</div>
			<!--展现自己-->
			<div class="rong_con_Social Both rong_mar_top">
				 <div class="Mold_left Left">
					<p>展现自己：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
				 <div class="Social Left">
				 	<textarea name="" rows="" cols="" placeholder="一句话对外展现自己"></textarea>
				 </div>
			</div>
		</div>
		<div class="Editor_name_btn Both">
			<button>提交申请</button>
		</div>	
	</div>
</div>

<!--内容部分结束-->
<!--底部开始-->
@include('footer')
	<!--底部结束-->
	</body>
</html>
