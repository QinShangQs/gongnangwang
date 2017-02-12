<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="shortcut icon" href="images/18.png">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/publick.css" />
	</head>
	<body>
<div class="wrap">
	<!--导航开始-->
	@include('header')
	<!--导航结束-->
	<!--banner开始-->
    <div class="banner Both" id="box">
        <ul class="banner_ul" id="banner_ul">
        	<li style="background: url('images/banner_02.jpg'); background-size: cover; background-position: center center;"><a href="javascript:;"></a></li>
            <li style="background: url('images/banner.png'); background-size: cover; background-position: center center;"><a href="javascript:;"></a></li>
            <li style="background: url('images/banner_03.jpg'); background-size: cover; background-position: center center;"><a href="javascript:;"></a></li>
            
        </ul>
        <ol class="banner_ol" id="banner_ol">
            <li class="active"></li>
            <li></li>
            <li></li>
        </ol>
    </div>
	<!--banner结束-->
	<!--中间内容部分开始-->
	<div class="content">
		<div class="content_one">
			<div class="conter_con">
				<div class="con_head">
					<div class="Left">
						<div class="Left">
							<img src="images/biao_1.png" alt="" />
						</div>
						<h3 class="con_head_word Left">项目火热发售中</h3>
					</div>
					<div class="Right">
                        <a style="color: #333" href="/chou"><span>更多</span></a>
					</div>
				</div>

				<div class="picture Both">
                    <ul>
                    @foreach($pro as $k=>$v)

                        @if($k==0 || $k==4)
						<li class="one"><a href="/chou_m/{{$v->pro_name}}"><img src="{{$v->pro_logo}}" width="274px" height="212px"/></a></li>
                        @else
						<li><a href="/chou_m/{{$v->pro_name}}"><img src="{{$v->pro_logo}}" width="274px" height="212px"/></a></li>
                        @endif

                        @endforeach
                    </ul>
				</div>

			</div>
		</div>
		<div class="content_two">
			<div class="conter_con">
				<div class="con_head">
					<div class="Left">
						<div class="Left">
							<img src="images/biao_2.png" alt="" />
						</div>
						<h3 class="con_head_word_two Left">征集合伙人</h3>
					</div>
					<div class="Right">
                        <a style="color: #333" href="/ren"><span>更多</span></a>
					</div>
				</div>
                <div class="Both">
                    @foreach($par as $k=>$v)
                @if($k==0)
                    <div class="partenr Left partenr_bor">
                        @else
                            <div class="partenr Left">
                                @endif
                                <div class="partenr_one">
                                    <p class="partenr_img"><a href="/users/{{$v->nickname}}"><img src="{{$v->photo}}" width="222px" height="207px"/></a></p>
                                    <p class="partenr_img2">
                                        <img src="images/rent.png" width="17px" height="18px"/>
                                        <a href="/users/{{$v->nickname}}" style="color: #333">{{$v->nickname}}</a>
                                    </p>
                                    <p>项目名称：<a href="/ren_m/{{$v->par_proname}}" style="color: #333">{{$v->par_proname}}</a></p>
                                </div>
                            </div>
                    @endforeach
                </div>
			</div>
		</div>
		<div class="content_three">
			<div class="conter_con">
				<div class="con_head">
					<div class="Left">
						<div class="Left">
							<img src="images/biao_3.png" alt="" />
						</div>
						<h3 class="con_head_word_three Left">路演活动</h3>
					</div>
					<div class="Right">
                        <a style="color: #333" href="/dong"><span>更多</span></a>
					</div>
				</div>
				<div class="Both">
					<div class="luyan Left luyan_bor">
						<a href="javascript:;">
							<p class="luyan_img"><img src="images/luyan.png"/></p>
							<div class="luyan_one">
								<h3>测试</h3>
								<p class="luyan_img2">
									<img src="images/biao_4.png"/> 
									2016-07-20    00:13:00  
									<span class="Right">
										<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
										<img src="images/biao_7.png"/><sub>0</sub>
									</span>
								</p>
								<p><img src="images/biao_5.png"/>北京市海淀区中关村创业大街</p>
							</div>
						</a>
					</div>
					<div class="luyan Left">
						<a href="javascript:;">
							<p class="luyan_img"><img src="images/luyan.png"/></p>
							<div class="luyan_one">
								<h3>测试</h3>
								<p class="luyan_img2">
									<img src="images/biao_4.png"/> 
									2016-07-20    00:13:00 
									<span class="Right">
										<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
										<img src="images/biao_7.png"/><sub>0</sub>
									</span>
								</p>
								<p><img src="images/biao_5.png"/>北京市海淀区中关村创业大街</p>
							</div>
						</a>
					</div>
					<div class="luyan Left">
						<a href="javascript:;">
							<p class="luyan_img"><img src="images/luyan.png"/></p>
							<div class="luyan_one">
								<h3>测试</h3>
								<p class="luyan_img2">
									<img src="images/biao_4.png"/> 
									2016-07-20    00:13:00  
									<span class="Right">
										<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
										<img src="images/biao_7.png"/><sub>0</sub>
									</span>
								</p>
								<p><img src="images/biao_5.png"/>北京市海淀区中关村创业大街</p>
							</div>
						</a>
					</div>
					<div class="luyan Left">
						<a href="javascript:;">
							<p class="luyan_img"><img src="images/luyan.png"/></p>
							<div class="luyan_one">
								<h3>测试</h3>
								<p class="luyan_img2">
									<img src="images/biao_4.png"/> 
									2016-07-20    00:13:00  
									<span class="Right">
										<img src="images/biao_6.png"/><sub class="shou">1</sub>   |
										<img src="images/biao_7.png"/><sub>0</sub>
									</span>
								</p>
								<p><img src="images/biao_5.png"/>北京市海淀区中关村创业大街</p>
							</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<!--中间内容部分结束-->
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
