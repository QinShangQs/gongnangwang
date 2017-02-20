@include('me_header')
<link rel="stylesheet" href="{{ asset('css/chou_list.css') }}" />
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(".chou_nav_ul li").click(function(){
            var index=$(this).index();
            $(this).addClass("active").siblings().removeClass("active");
            $(".content").eq(index).css("display","block").siblings().css("display","none");
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/videojs/video-js.min.css') }}" />
<script type="text/javascript" src="{{ asset('js/videojs/video.min.js') }}"></script>

@include('qiniu.uploader_setter')
<!--导航结束-->
	<section>
		<nav class="chou_nav">
			<div class="conter_con">
				<ul class="chou_nav_ul" id="chou_nav_ul">
					<li class="active">项目资料</li>
					<li>商业模式</li>
					<li>项目团队</li>
					<li>路演活动</li>
					<li>附件资料</li>
				</ul>
			</div>
		</nav>
		
		<div class="conter_con">
            <form enctype="multipart/form-data" method="post" action="/choudo" onsubmit="return mySubmit()">
			<!--项目资料-->
			<div class="content" id="content" style="display: block;">
                {{--<form enctype="multipart/form-data" name="form1" method="post" action="/choudo" onsubmit="return mySubmit(false)">--}}
				<div class="content_one content_margin Both">
					<span class="content_one_span Left">项目名称：</span>
					<div class="input_xm Left projectName">
						<input type="text" id="pro_name" name="pro_name" value="" onblur="projectName()"/>
                        <span id="s_pro_name"></span>
					</div>
				</div>
				<div class="content_two Both content_margin">
					<span class="content_one_span Left">项目logo：</span>
					<div class="input_xm Left s_logo">
						@include('qiniu.uploader', ['number'=>'','text'=>'选择文件','success_text'=>'上传成功'])
						<input type="hidden" name="pro_logo" id="pro_logo" />
						<span id="pro_logo_name"></span>
					</div>
					
				</div>
				<div class="content_three Both content_margin">
					<span class="content_one_span Left">资料介绍：</span>
					<div class="input_xm_text Left projectContent">
						<textarea id="projectContent" name="pro_content" rows="" cols="" placeholder="20字以内..."></textarea>
					</div>
                    <span id="s_pro_content"></span>
				</div>
				<div class="content_one Both content_margin">
					<span class="content_one_span Left">选择地点：</span>
					<div class="info Left">
						<div>
							<div class="s_province province">
								<select id="s_province" name="s_province"></select>  
							</div>
                            <input type="hidden" name="province_value" id="province_value" value=""/>
							<div class="s_province city">
								<select id="s_city" name="s_city" ></select>  
							</div>
                            <input type="hidden" name="city_value" id="city_value" value=""/>
                            <div class="s_province county">
								<select id="s_county" name="s_county"></select>
							</div>
                            <input type="hidden" name="county_value" id="county_value" value=""/>
                            <script class="resources library" src="{{ asset('js/area.js') }}" type="text/javascript"></script>
						    
						    <script type="text/javascript">_init_area();</script>
					    </div>
					    <div id="show"></div>
					</div>
				</div>
				<div class="content_one Both content_margin">
					<span class="content_one_span Left">项目状态：</span>
					<div class="input_xm_three Left state">
						<select id="pro_state"  name="pro_state" class="select">
							<option  value="0" selected = "selected">请选择方向</option>
							<option  value="1">未上线</option>
							<option  value="2">概念阶段</option> 
							<option  value="3">已上线</option>
							<option  value="4">已盈利</option>
							<option  value="5">IPO阶段</option>
						</select>
					</div>
				</div>
				<div class="content_one Both content_margin">
					<span class="content_one_span Left">项目阶段：</span>
					<div class="input_xm_three Left stage">
                        <select id="pro_stage"  name="pro_stage" class="select">
                            <option  value="0" selected = "selected">请选择类型</option>
                            <option  value="1">融资阶段</option>
                            <option  value="2">天使轮</option>
                            <option  value="3">A轮</option>
                            <option  value="4">B轮</option>
                            <option  value="5">C轮</option>
                            <option  value="6">D轮</option>
                            <option  value="7">上市公司</option>
                        </select>
					</div>
				</div>
				<div class="content_for Both content_margin">
					<span class="content_one_span Left">项目估值：</span>
					<div class="input_xmgz Left valuation">
						<input type="text" id="pro_valuation" name="pro_valuation" />
						<span>万元</span>
					</div>
					<p class="word Left">为上线的项目估值不得超过5000万</p>
				</div>
				<div class="content_for Both content_margin">
					<span class="content_one_span Left">项目回报：</span>
					<div class="input_xmgz Left return">
						<input type="text" id="pro_return" name="pro_return"/>
						<span>%</span>
					</div>
					<p class="word Left returnp">请输入5%-30%的数值</p>
				</div>
				<div class="content_for Both content_margin">
					<span class="content_one_span Left">目标众筹：</span>
					<div class="input_xmgz Left target">
						<input type="text" id="target" name="target" />
						<span>万元</span>
					</div>
					<p class="word_02 Left">为降低投资风险保障投资人利益，未上线运营项目第一期均只实现30%内；已上线项目实现40%-70%额度，第一期完成后可发起第二期后续融资。</p>
				</div>
				<div class="content_for Both content_margin">
					<span class="content_one_span Left">金额设置：</span>
					<div class="input_xm_money Left">
                        <select id="work_life" name="pro_value" class="select_money">
                            <option value="1">百元</option>
                            <option value="2">千元</option>
                            <option value="3">万元</option>
                            <option value="4">十万元</option>
                        </select>
					</div>
					<p class="word_02 Left">百元众筹发布费888元=10万元内融资额；千元众筹发布费1888元=50万元内融资额；万元众筹发布费2888元=100万元内融资额；十万元以上众筹发布费8888元=100万元以上融资额</p>
				</div>
				<div class="content_one Both content_margin">
					<span class="content_one_span Left">项目分类：</span>
					<div class="input_xm_three Left type">
						<select id="pro_type"  name="pro_type" class="select">
							<option  value="0" selected = "selected">请选择方向</option>
							<option  value="1">移动互联网</option>
							<option  value="2">电子商务</option> 
							<option  value="3">O2O</option> 
							<option  value="4">互联网金融</option>
                            <option  value="5">网络社区</option>
                            <option  value="6">旅游</option>
                            <option  value="7">娱乐</option>
                            <option  value="8">网络游戏</option>
                            <option  value="9">信息技术</option>
                            <option  value="10">硬件</option>
                            <option  value="11">工具软件</option>
                            <option  value="12">企业服务</option>
                            <option  value="13">农业相关</option>
						</select>
					</div>
				</div>
				<div class="content_two Both content_margin">
					<span class="content_one_span Left">项目图片：</span>
					<div class="input_xm Left s_pic">						
						@include('qiniu.uploader', ['number'=>'2','text'=>'选择文件','success_text'=>'上传成功'])
						<input type="hidden" name="pro_picture" id="pro_picture" />
						<span id="pro_picture_name"></span>
					</div>
				</div>
				<div class="content_two Both content_margin">
					<span class="content_one_span Left">融资顾问：</span>
					<div class="ncial_advisor Left advisor">
						<input type="text" id="pro_advisor" name="pro_advisor" placeholder="姓名/昵称"/>
					</div>
					<div class="ncial_advisor Left advisornum">
						<input type="text" id="pro_advisornum" name="pro_advisornum" placeholder="编号"/>
					</div>
					<p class="ncial_advisor_p Left">额外回报：融资额的2%</p>
				</div>
				<div class="Editor_name_btn Both">
					<span style="cursor: pointer" onclick="form1_sub()">下一页</span>
				</div>
                {{--</form>--}}
			</div>

			<!--项目资料结束-->
			
			
			<!--商业模式-->
			
			<div class="content" id="content">
                {{--<form enctype="multipart/form-data" name="form2" method="post" action="" onsubmit="return false">--}}
				<div class="content_one Both content_margin">
					<p class="content_one_span Left">请上传商业模式视频：用视频详细展示产品的模式、盈利、过程等。
						<span class="time">限制最长时间为3分钟</span>
					</p>
				</div>
				<div class="business_model Both content_margin" style="width:inherit;">
					<span class="content_one_span Left">上传视频：</span>
					
					<table>
						<tr>
							<td>
								<img id="bus_video_pre" src="/images/chou/play-preview.jpg" width="450"	height="300">
								<div id="bus_video_show" style="display: none">
										<video id="bus_video_vj" name="moren"
											class="video-js vjs-default-skin" controls preload="none"
											width="450" height="300" poster="" data-setup="{}">
											<source src="video/1.mp4" type='video/mp4' />
										</video>
								</div>	
							</td>
							
						</tr>
						<tr>
							<td valign="top">
								@include('qiniu.uploader', ['number'=>'3','text'=>'选择文件','success_text'=>'上传成功'])
							</td>
						</tr>
					</table>													
					<input type="hidden" name="bus_video" id="bus_video" />
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">用户数据：</span>
					<div class="input_xm Left bus_u">
						<input type="text" name="bus_userdata" id="bus_userdata" />
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">盈利数据：</span>
					<div class="input_xm Left bus_p">
						<input type="text" name="bus_profit" id="bus_profit"/>
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">其他数据：</span>
					<div class="input_xm Left bus_o">
						<input type="text" name="bus_other" id="bus_other" />
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">运营时间：</span>
					<div class="input_xm Left bus_op">
						<input type="date" name="bus_operate" id="bus_operate" />
					</div>
				</div>
				<div class="Editor_name_btn Both">
					<a id="lastFirst" href="javascript:;">上一页</a>
					<span style="cursor: pointer" onclick="form2_sub()">下一页</span>
				</div>
               {{-- </form>--}}
			</div>
			<!--商业模式结束-->
			
			
			<!--项目团队-->
			<div class="content" id="content">
                {{--<form enctype="multipart/form-data" name="form3" method="post" action="" onsubmit="return false">--}}
				<div class="content_one Both content_margin">
					<p class="content_one_span Left">请上传团队视频：用视频详细展示产品的模式、盈利、过程等。
						<span class="time">限制最长时间为3分钟</span>
					</p>
				</div>
				<div class="business_model Both content_margin">
					<span class="content_one_span Left">上传视频：</span>
					
					<table>
						<tr>
							<td>
								<img id="tea_video_pre" src="/images/chou/play-preview.jpg" width="450"	height="300">
								<div id="tea_video_show" style="display: none">
										<video id="tea_video_vj" name="moren"
											class="video-js vjs-default-skin" controls preload="none"
											width="450" height="300" poster="" data-setup="{}">
											<source src="video/1.mp4" type='video/mp4' />
										</video>
								</div>	
							</td>
							
						</tr>
						<tr>
							<td valign="top">
								@include('qiniu.uploader', ['number'=>'4','text'=>'选择文件','success_text'=>'上传成功'])
							</td>
						</tr>
					</table>													
					<input type="hidden" name="tea_video" id="tea_video" />

				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">核心团队：</span>
					<div class="input_xm Left tea_c">
						<input type="text" name="tea_core" id="tea_core"/>
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">员工总人数：</span>
					<div class="input_xm_peo Left tea_n">
						<input type="text" name="tea_num" id="tea_num"/>
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">高级创业导师：</span>
					<div class="input_xm_dao Left tea_t">
						<input type="text" name="tea_tutor" id="tea_tutor"/>
					</div>
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">企业战略高级顾问：</span>
					<div class="input_xm_wen Left tea_a">
						<input type="text" name="tea_adviser" id="tea_adviser"/>
					</div>
				</div>
				<div class="Editor_name_btn Both">
					<a id="lastSecond" href="javascript:;">上一页</a>
					<span style="cursor: pointer" onclick="form3_sub()">下一页</span>
				</div>
                {{--</form>--}}
			</div>
			<!--项目团队结束-->
			
			<!--路演活动-->
			<div class="content" id="content">
                {{--<form enctype="multipart/form-data" name="form4" method="post" action="" onsubmit="return false">--}}
				<div class="content_one Both content_margin">
					<p class="content_one_span Left">请上传活动路演视频：用视频详细展示产品的模式、盈利、过程等。
						<span class="time">限制最长时间为3分钟</span>
					</p>
				</div>
				<div class="business_model Both content_margin">
					<span class="content_one_span Left">上传视频：</span>
					
					<table>
						<tr>
							<td>
								<img id="roa_video_pre" src="/images/chou/play-preview.jpg" width="450"	height="300">
								<div id="roa_video_show" style="display: none">
										<video id="roa_video_vj" name="moren"
											class="video-js vjs-default-skin" controls preload="none"
											width="450" height="300" poster="" data-setup="{}">
											<source src="video/1.mp4" type='video/mp4' />
										</video>
								</div>	
							</td>
							
						</tr>
						<tr>
							<td valign="top">
								@include('qiniu.uploader', ['number'=>'5','text'=>'选择文件','success_text'=>'上传成功'])
							</td>
						</tr>
					</table>													
					<input type="hidden" name="roa_video" id="roa_video" />
				</div>
				<div class="content_one content_margin">
					<span class="content_one_span Left">现场投资嘉宾：</span>
					<div class="input_xm_dao Left roa_g">
						<input type="text" name="roa_guest" id="roa_guest"/>
					</div>
				</div>
				<div class="Editor_name_btn Both">
					<a id="lastThird" href="javascript:;">上一页</a>
					<span style="cursor: pointer" onclick="form4_sub()">下一页</span>
				</div>
                {{--</form>--}}
			</div>
			<!--路演活动结束-->
			
			<!--附件资料-->
			<div class="content" id="content">
               {{-- <form enctype="multipart/form-data" name="form5" method="post" action="/attachment" onsubmit="return ">--}}
				<div class="content_one_fj Both content_margin">
					<p class="content_one_span">添加附件：</p>
					<p class="content_one_span">附件：<en id="s_att_name"></en></p>
                    
                    @include('qiniu.uploader', ['number'=>'6','text'=>'选择文件','success_text'=>'上传成功'])
					<input type="hidden" name="att_name" id="att_name" />
					<span id="att_name_name"></span>
                    
				</div>
				<br/>
				<br/>
				<span class="label label-info">仅限认证投资人阅读</span>
				<div class="Editor_name_btn Both">
					<a href="javascript:;">预览</a>
					<button onclick="form5_sub()">保存</button>
				</div>
                {{--</form>--}}
			</div>
			<!--附件资料结束-->
            </form>
		</div>
		<!--底部开始-->
      
	<!--底部结束-->
	</section>
	
<!-- 上传模态框 -->
@include('qiniu.uploader_model')

@include('footer')

<script type="text/javascript" src="{{ asset('js/chou.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/qiniu/chou-main.js') }}"></script>