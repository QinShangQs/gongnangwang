
<!--导航开始-->
@include('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/ren_pin.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/js/videojs/video-js.min.css') }}" />
<script type="text/javascript" src="{{ asset('/js/videojs/video.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	setTimeout(function(){
		$(".video-js").removeClass("vjs-controls-disabled");
	}, 1000);
});
</script>
	<!--导航结束-->
<!-- 内容开始 -->
<div class="content_nr">
	<div class="conter_con">
        <input type="hidden" name="par_id" id="par_id" value="{{$data[0]->pid}}"/>
       {{-- @foreach($data as $key=>$data[0])--}}
		<div class="Marriage_both">
			<!-- 左 -->
			<div class="Marriage_left Left">
				<h2 class="Marriage">{{$data[0]->par_title}}</h2>
				<div class="side"></div>
				<div class="Marriage_video">
					<video id="example_video1"  name="example_video1" class="video-js vjs-default-skin" 
							width="705" height="442"
							poster="{{ asset($data[0]->par_video) }}?vframe/jpg/offset/1" data-setup="{}">
							<source src="{{ asset($data[0]->par_video) }}" type='video/mp4' />
					</video>  
				</div>

				<div class="Marriage_word">
					<ul class="Marriage_word_ul">
                        @foreach($pname as $key=>$val)
						<li><a href="javascript:;" id="position" pid="{{$val->id}}">{{$val->par_position}}</a></li>
                        @endforeach
					</ul>
				</div>
                <div id="contents">
				<div class="Marriage_nrg Both">
					<div class="side_left Left"></div>
					<div class="Marriage_nrg_words">
						<h3>合伙人职责</h3>
						<ol class="Marriage_nrg_words_ol" start="1">
							<li></li>
						</ol>
					</div>
				</div>
				<div class="Marriage_nrg Both">
					<div class="side_left Left"></div>
					<div class="Marriage_nrg_words">
						<h3>合伙人要求</h3>
						<ol class="Marriage_nrg_words_ol" start="1">
							<li></li>
						</ol>
					</div>
				</div>
				<div class="Marriage_nrg_two Both">
					<div class="side_left Left"></div>
					<div class="Marriage_nrg_words">
						<h3>薪酬股份回报</h3>
						<ol class="Marriage_nrg_words_ol_mone">
                            <li></li>
                            <li></li>
                        </ol>

                        <ol class="Marriage_nrg_words_ol_mone">
                            <li></li>
                            <li></li>
                        </ol>

                        <ol class="Marriage_nrg_words_ol_mone">
                            <li></li>
                            <li></li>
                        </ol>
					</div>
				</div>
                </div>
				<p class="Delivery Both"><button>投递简历</button></p>
				<h3 class="xiangm">项目点评</h3>
                <div class="text_form">
                    <textarea name="com_content" id="com_content" rows="" cols=""> </textarea>
                </div>

                <div class="foot">
					<ul class="foot_ul Left"> 
						<li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
						<li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
						<li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
						<li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
						<li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
					</ul>
					<p class="ping Right"><button id='comment'>评论</button></p>
				</div>
			</div>
			<!-- 右 -->
			<div class="Marriage_right Right">
				<div class="Personal">
					<div class="Personal_head">
						<div class="Personal_portrait">
							<div class="Personal_portrait_img imgg_Left Left">
								<a href="/users/{{$data[0]->nickname}}" target="_blank"><img src="{{ asset($data[0]->photo) }}" width="98px" hight="98px"/></a>
							</div>
							<div class="Personal_portrait_rz Left">
								<p>
									<span class="lian Left"><a style="color: #333" href="/users/{{$data[0]->nickname}}" target="_blank">{{$data[0]->nickname}}</a></span>
									<span class="ge_renz_icon imgg_Left"><img src="{{ asset('images/ge_renz_icon.png') }}" alt="" /></span>
								</p>
								<ul class="Personal_png Both">
									<li><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></li>
									<li><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></li>
									<li><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></li>
									<li><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></li>
									<li><img src="{{ asset('images/ge_redb_icon-06.png') }}"/></li>
								</ul>
							</div>
						</div>
						<div class="Personal_bor">
							<div class="JoinUs Both">
								<dl>
									<dt>10</dt>
									<dd>想要加入</dd>
								</dl>
								<dl>
									<dt>9</dt>
									<dd>合伙人数量</dd>
								</dl>
							</div>
						</div>
					</div>
					<div class="Personal_words">
						<ul class="Personal_bor_ul">
							<li>项目： {{$data[0]->par_proname}}</li>
							<li>规模 ：
                                @if($data[0]->par_team==1)
                                    少于15人
                                @elseif($data[0]->par_team==2)
                                    15-50人
                                @elseif($data[0]->par_team==3)
                                    50-200人
                                @elseif($data[0]->par_team==4)
                                    200-500人
                                @elseif($data[0]->par_team==5)
                                    500-2000人
                                @elseif($data[0]->par_team==6)
                                    2000人以上
                                @endif
                            </li>
							<li>融资说明：
                                @if($data[0]->par_finance==1)
                                    未融资
                                @elseif($data[0]->par_finance==2)
                                    天使轮
                                @elseif($data[0]->par_finance==3)
                                    A轮
                                @elseif($data[0]->par_finance==4)
                                    B轮
                                @elseif($data[0]->par_finance==5)
                                    C轮
                                @elseif($data[0]->par_finance==6)
                                    D轮
                                @elseif($data[0]->par_finance==7)
                                    上市公司
                                @elseif($data[0]->par_finance==8)
                                    不需要融资
                                @endif
                            </li>
							<li>项目官网 ：<a href="http://{{$data[0]->par_website}}" target="_blank">{{$data[0]->par_website}}</a></li>
							<li>公司地址：{{$data[0]->par_address}}</li>
						</ul>
					</div>
					<div class="Map_img">
						<div class="Personal_bor">
							<img src="{{ asset('images/zhao_di_icon.png') }}" alt="" />
							<p><a href="javascript:;">查看完整地图</a></p>
						</div>
					</div>
				</div>
				<p class="Similar"><a href="javasript:;">相似职位</a></p>
				<div class="Similar_work Both">
					<a href="javascript:;">
						<div class="side_work Left"></div>
						<div class="Left">
							<ul class="Similar_work_ul">
								<li><h3 class="Left">Web前段</h3> <span>(北京)</span></li>
								<li class="Both">让梦想照亮现实</li>
								<li>兼职 / 个人 （婚恋项目）</li>
							</ul>
						</div>
					</a>		
				</div>
				<div class="Similar_work Both">
					<a href="javascript:;">
						<div class="side_work Left"></div>
						<div class="Left">
							<ul class="Similar_work_ul">
								<li><h3 class="Left">PHP程序</h3> <span>(北京)</span></li>
								<li class="Both">最牛的平台让你选择</li>
								<li>全职 / 公司 （千途项目）</li>
							</ul>
						</div>
					</a>		
				</div>
				<div class="Similar_work Both">
					<a href="javascript:;">
						<div class="side_work Left"></div>
						<div class="Left">
							<ul class="Similar_work_ul">
								<li><h3 class="Left">Web前段</h3> <span>(北京)</span></li>
								<li class="Both">让梦想照亮现实</li>
								<li>兼职 / 个人 （婚恋项目）</li>
							</ul>
						</div>
					</a>		
				</div>
				<div class="Similar_work Both Border_none">
					<a href="javascript:;">
						<div class="side_work Left"></div>
						<div class="Left">
							<ul class="Similar_work_ul">
								<li><h3 class="Left">PHP程序</h3> <span>(北京)</span></li>
								<li class="Both">最牛的平台让你选择</li>
								<li>全职 / 公司 （千途项目）</li>
							</ul>
						</div>
					</a>		
				</div>
                <div class="Similar_work Both Border_none">
                    <a href="javascript:;">
                        <div class="side_work Left"></div>
                        <div class="Left">
                            <ul class="Similar_work_ul">
                                <li><h3 class="Left">PHP程序</h3> <span>(北京)</span></li>
                                <li class="Both">最牛的平台让你选择</li>
                                <li>全职 / 公司 （千途项目）</li>
                            </ul>
                        </div>
                    </a>
                </div>
				<p class="Similar_Look"><a href="javascript:;">查看其他相似职位></a></p>
			</div>
		</div>
        {{--@endforeach--}}
	</div>
	
</div>
<!-- 内容结束 -->
<!--底部开始-->
@include('footer')
	<!--底部结束-->
</body>
</html>
<script src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var par_id  = $('#par_id').val();
        $.get("/position",{par_id:par_id},
                function(data){
                    var a =  eval('('+ data +')');
                    if(a.par_mode == 1){
                        mode = "全职";
                    }else{
                        mode = "兼职";
                    }

                    if(a.par_work == 1){
                        work = "不限";
                    }else if(a.par_work == 2){
                        work = "1-3年";
                    }else if(a.par_work == 3){
                        work = "3-5年";
                    }else if(a.par_work == 4){
                        work = "5-10年";
                    }else{
                        work = "10年以上";
                    }

                    if(a.par_education == 1){
                        education = "不限";
                    }else if(a.par_education == 2){
                        education = "大专";
                    }else if(a.par_education == 3){
                        education = "本科";
                    }else{
                        education = "博士、硕士、研究生";
                    }

                    if(a.par_age == 1){
                        age = "不限";
                    }else if(a.par_age == 2){
                        age = "20-30岁";
                    }else if(a.par_age == 3){
                        age = "30-40岁";
                    }else{
                        age = "40岁以上";
                    }

                    if(a.par_pay_type == 1){
                        type = "月薪";
                    }else{
                        type = "年薪";
                    }

                    if(a.par_return_type == 1){
                        return_type = "股份回报";
                    }else{
                        return_type = "其他回报";
                    }

                    var obj = '<div class="Marriage_nrg Both">'+
                            '<div class="side_left Left"></div>'+
                    '<div class="Marriage_nrg_words">'+
                    '<h3>合伙人职责</h3>'+
                    '<ol class="Marriage_nrg_words_ol" start="1">'+
                    '<li>'+a.par_duty.replaceAll('\n','<br/>')+'</li>'+
                    '</ol>'+
                    '</div>'+
                    '</div>'+
                    '<div class="Marriage_nrg Both">'+
                    '<div class="side_left Left"></div>'+
                    '<div class="Marriage_nrg_words">'+
                    '<h3>合伙人要求</h3>'+
                    '<ol class="Marriage_nrg_words_ol" start="1">'+
                    '<li>'+ a.par_ask.replaceAll('\n','<br/>')+'</li>'+
                    '</ol>'+
                    '</div>'+
                    '</div>'+
                    '<div class="Marriage_nrg_two Both">'+
                    '<div class="side_left Left"></div>'+
                    '<div class="Marriage_nrg_words">'+
                    '<h3>薪酬股份回报</h3>'+
                    '<ol class="Marriage_nrg_words_ol_mone">'+
                    '<li>工作方式：'+ mode +
                    '<li>工作经验：'+ work+'</li>'+
                    '</ol>'+
                    '<ol class="Marriage_nrg_words_ol_mone">'+
                    '<li>学历要求：'+ education +'</li>'+
                    '<li>年龄要求：'+ age +'</li>'+
                    '</ol>'+
                    '<ol class="Marriage_nrg_words_ol_mone">'+
                    '<li>'+type+'：'+ a.par_pay +'</li>'+
                    '<li>'+return_type+'：'+ a.par_return +'</li>'+
                    '</ol>'+
                    '</div>'+
                    '</div>';
                    $('#contents').html(obj)
                });

        $(".Marriage_word_ul li a").click(function(){
            var pid = $(this).attr("pid");
            var par_id  = $('#par_id').val();
            $.get("/position", { pid:pid , par_id:par_id},
                function(data){
                    var a =  eval('('+ data +')')
                    if(a.par_mode == 1){
                        mode = "全职";
                    }else{
                        mode = "兼职";
                    }

                    if(a.par_work == 1){
                        work = "不限";
                    }else if(a.par_work == 2){
                        work = "1-3年";
                    }else if(a.par_work == 3){
                        work = "3-5年";
                    }else if(a.par_work == 4){
                        work = "5-10年";
                    }else{
                        work = "10年以上";
                    }

                    if(a.par_education == 1){
                        education = "不限";
                    }else if(a.par_education == 2){
                        education = "大专";
                    }else if(a.par_education == 3){
                        education = "本科";
                    }else{
                        education = "博士、硕士、研究生";
                    }

                    if(a.par_age == 1){
                        age = "不限";
                    }else if(a.par_age == 2){
                        age = "20-30岁";
                    }else if(a.par_age == 3){
                        age = "30-40岁";
                    }else{
                        age = "40岁以上";
                    }

                    if(a.par_pay_type == 1){
                        type = "月薪";
                    }else{
                        type = "年薪";
                    }

                    if(a.par_return_type == 1){
                        return_type = "股份回报";
                    }else{
                        return_type = "其他回报";
                    }
                    var obj = '<div class="Marriage_nrg Both">'+
                            '<div class="side_left Left"></div>'+
                            '<div class="Marriage_nrg_words">'+
                            '<h3>合伙人职责</h3>'+
                            '<ol class="Marriage_nrg_words_ol" start="1">'+
                            '<li>'+a.par_duty.replaceAll('\n','<br/>') +'</li>'+
                            '</ol>'+
                            '</div>'+
                            '</div>'+
                            '<div class="Marriage_nrg Both">'+
                            '<div class="side_left Left"></div>'+
                            '<div class="Marriage_nrg_words">'+
                            '<h3>合伙人要求</h3>'+
                            '<ol class="Marriage_nrg_words_ol" start="1">'+
                            '<li>'+ a.par_ask.replaceAll('\n','<br/>') +'</li>'+
                            '</ol>'+
                            '</div>'+
                            '</div>'+
                            '<div class="Marriage_nrg_two Both">'+
                            '<div class="side_left Left"></div>'+
                            '<div class="Marriage_nrg_words">'+
                            '<h3>薪酬股份回报</h3>'+
                            '<ol class="Marriage_nrg_words_ol_mone">'+
                            '<li>工作方式：'+ mode +
                            '<li>工作经验：'+ work+'</li>'+
                            '</ol>'+
                            '<ol class="Marriage_nrg_words_ol_mone">'+
                            '<li>学历要求：'+ education +'</li>'+
                            '<li>年龄要求：'+ age +'</li>'+
                            '</ol>'+
                            '<ol class="Marriage_nrg_words_ol_mone">'+
                            '<li>'+type+'：'+ a.par_pay +'</li>'+
                            '<li>'+return_type+'：'+ a.par_return +'</li>'+
                            '</ol>'+
                            '</div>'+
                            '</div>';
                    $('#contents').html(obj)
                });
        });
        $('#comment').click(function(){
            var com_content = $('#com_content').val()
            var par_id      = $('#par_id').val()
            if(com_content == '' || com_content == undefined || com_content == null){
                alert('你闹呢？啥都不写，评论个毛线。');
            }else{
                $.get("/comment", { com_content:com_content , par_id:par_id},
                    function(data){
                        if(data){
                            alert('不错嘛，小子评论居然成功啦')
                        }
                    });
            }
        })
    })
</script>