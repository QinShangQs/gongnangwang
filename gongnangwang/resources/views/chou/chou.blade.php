<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="shortcut icon" href="images/18.png">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/chou.css" />
		<link rel="stylesheet" type="text/css" href="css/publick.css" />
	</head>
	<body>

<!--导航开始-->
@include('header')
<!--导航结束-->
<div class="banner" id="box">
    <ul class="banner_ul" id="banner_ul">
        <li style="background: url('images/crowdf_banner.jpg'); background-size: cover; background-position: center center;"><a href="javascript:;"></a></li>
        <li style="background: url('images/crowdf_banner_02.jpg'); background-size: cover; background-position: center center;"><a href="javascript:;"><!--<img src="images/banner_02.jpg"/>--></a></li>
    </ul>
    <ol class="banner_ol" id="banner_ol">
        <li class="active"></li>
        <li></li>
    </ol>
</div>

<div class="content Both">
		<div class="conter_con">
			<div class="content_head">
				<div class="options">
					<ul>
						<li class="first-child"><a href="javascript:;">每日精选</a></li>
						<li><a href="javascript:;">全部</a></li>
						<li><a href="javascript:;">热门项目</a></li>
						<li><a href="javascript:;">最新上线</a></li>
						<li><a href="javascript:;">即将成功</a></li>
						<li class="Margin_none"><a href="javascript:;">成功案例</a></li>
					</ul>
					<ul>
						<li class="first-child"><a href="javascript:;">互联网</a></li>
						<li><a href="javascript:;">全部</a></li>
						<li><a href="javascript:;">移动互联网</a></li>
						<li><a href="javascript:;">电子商务</a></li>
						<li><a href="javascript:;">O2O</a></li>
						<li class="Margin_none"><a href="javascript:;">互联网金融</a></li>
					</ul>
					<ul class="she">
						<li><a href="javascript:;">网络社区</a></li>
						<li><a href="javascript:;">旅游</a></li>
						<li><a href="javascript:;">娱乐</a></li>
						<li class="Margin_none"><a href="javascript:;">网络游戏</a></li>
					</ul>
						<ul>
						<li class="first-child"><a href="javascript:;">科技</a></li>
						<li><a href="javascript:;">全部</a></li>
						<li><a href="javascript:;">信息技术</a></li>
						<li><a href="javascript:;">硬件</a></li>
						<li><a href="javascript:;">工具软件</a></li>
						<li class="Margin_none"><a href="javascript:;">企业服务</a></li>
					</ul>
					<ul>
						<li class="first-child"><a href="javascript:;">农业</a></li>
						<li><a href="javascript:;">全部</a></li>
						<li><a href="javascript:;">农业相关</a></li>
					</ul>
			</div>
				<div class="list">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<th class="first-child">已融资</th>
						<th>未融资</th>
					</tr>
					<td>
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td>企业名称</td>
								<td>共囊网</td>
							</tr>
							<tr>
								<td>融资金额</td>
								<td>50.00万元</td>
							</tr>
							<tr>
								<td>占股份额</td>
								<td>5%</td>
							</tr>
							<tr>
								<td>投资方</td>
								<td>共囊网</td>
							</tr>
						</table>
					</td>
					<td>
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td>共囊网</td>
								<td>共囊网</td>
							</tr>
							<tr>
								<td>500.00万元</td>
								<td>30.00万元</td>
							</tr>
							<tr>
								<td>15%</td>
								<td>3%</td>
							</tr>
							<tr>
								<td>共囊网</td>
								<td>共囊网</td>
							</tr>
						</table>
					</td>
				</table>
			</div>
				<div class="Both"></div>
			</div>	
			<div class="content_middle">
				<div class="content_middle_title">
					<a href="/chouadd" target=_blank>
						<img src="images/content_middle_icon.png">
						<h3>发布我的众筹</h3>
					</a>					
					<div class="Both"></div>
				</div>
				<div class="content_middle_main">
					<div class="main">
                        @foreach($data as $key=>$val)
                            @if($key==3 || $key == 7)
                                <div class="main_list Margin_none">
                            @else
                                <div class="main_list">
                            @endif
							<a href="/chou_m/{{$val->id}}"><img src="{{$val->pro_logo}}" width="274px" height="212px"></a>
                            <a href="/chou_m/{{$val->id}}"><h3>{{$val->pro_name}}</h3></a>
							<div class="span_header">
								<p class="p_head red Left">融资目标:{{$val->pro_target}}万</p>
								<p class="p_over Right">已完成0.00万元</p>
							</div>
							<div class="span_bottom Both">
								<p class="p_over Left"><a style="color: #333" href="/users/{{$val->nickname}}" target="_blank"><img src="images/main_icon_right_18.png">{{$val->nickname}}</a></p>
								<p class="Right p_over"><img src="images/main_icon_2_21.png">
                                @if($val->pro_state==1)
                                    未上线
                                    @elseif($val->pro_state==2)
                                    概念阶段
                                        @endif
                                </p>
							</div>
						</div>
                        @endforeach
						<div class="Both"></div>

					</div>
				</div>
			</div>
			<!--分页-->
			<div class="fenye">
				<ul class="fenye_ul Left">
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li class="fenye_ul_next">下一页</li>
				</ul>
				<p>共100页</p>
				<p>去第<input type="text" />页</p>
				<p class="que">确定</p>
			</div>
		</div>
	</div>
	<!--底部开始-->
    @include('footer')
	<!--底部结束-->
</div>
	</body>
</html>
<script type="text/javascript">
    onload=function(){
        Carousel()
        function Carousel(){
            var oBox=document.getElementById("box");
            var oImg=banner_ul.getElementsByTagName('li');
            var oSide=banner_ol.getElementsByTagName('li');
            var allIndex=0
            var Timer = null;
            time();
            oBox.onmouseover = function(){
                clearInterval(Timer);
            };
            oBox.onmouseout = function(){
                time();
            }
            for(var i=0;i<oImg.length;i++){
                oSide[i].index = i;
                oSide[i].onclick=function(){
                    for(var i=0;i<oSide.length;i++){
                        oSide[i].className ='';
                        oImg[i].style.display = 'none';
                    }
                    oImg[this.index].style.display = 'block';
                    this.className = 'active';
                    allIndex = this.index;
                }
            }
            function startMove(){
                for(var i = 0; i < oSide.length;i++){
                    oSide[i].className = '';
                    oImg[i].style.display = 'none';
                }

                oImg[allIndex].style.display = 'block';
                oSide[allIndex].className = 'active';
            }

            function time(){
                Timer = setInterval(function(){
                    allIndex++;
                    if(allIndex == oSide.length)allIndex=0;
                    startMove();
                },3000);
            }
        }

    }
</script>
