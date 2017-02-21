<!--导航开始-->
@include('header')

<link rel="stylesheet" type="text/css" href="/js/videojs/video-js.min.css" />
<script type="text/javascript" src="/js/videojs/video.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/chou_m.css') }}"/>
<script src="{{ asset('js/echarts.js') }}"  type="text/javascript"></script>

<!--导航结束-->
	<!--内容开始-->
	<div class="content">
        <div class="conter_con">
            @foreach($data as $key=>$val)
            <!--左部分-->
            <div class="con_left Both">
                <div class="head_choum">
                    <ul class="ul01 Both">
                        <li class="Margin_none">商业模式认可(100人)</li>
                        <li>项目团队认可(147人)</li>
                        <li>项目路演认可(207人)</li>
                    </ul>
                    <ul class="ul02 Both">
                        <li class="Margin_none"><img src="{{ asset('images/red_03.jpg') }}"/></li>
                        <li><img src="{{ asset('images/green_03.jpg') }}"/></li>
                        <li><img src="{{ asset('images/blue_03.jpg') }}"/></li>
                    </ul>
                    <ul class="ul03 Both" id="ul03">
                        <li class="ul03_active" id="Margin_none">商业模式</li>
                        <li>项目团队</li>
                        <li>活动路演</li>
                        <li>附件资料</li>
                    </ul>
                </div>

                <div class="tab_list Both" style="display: block;">
                    <div class="radio">                       
                        <video id="bus_video_vj"  name="bus_video_vj" class="video-js vjs-default-skin" 
								width="780" height="550"
								poster="{{ asset($val->bus_video) }}?vframe/jpg/offset/1" data-setup="{}">
								<source src="{{ asset($val->bus_video) }}" type='video/mp4' />
						</video>  
                    </div>
                    <div class="show">
                        <ul class="show01_ul Both">
                            <li class="Border_none">商业模式说明</li>
                            <li>项目状态：
                                @if($val->pro_state == 1)
                                    未上线
                                @elseif($val->pro_state == 2)
                                    概念阶段
                                @elseif($val->pro_state == 3)
                                    已上线
                                @elseif($val->pro_state == 4)
                                    已盈利
                                @elseif($val->pro_state == 5)
                                    IPO阶段
                                @endif
                                <span  class="Right">用户数据：{{$val->bus_userdata}}</span></li>
                            <li>项目运营时间：{{$val->bus_operate}}<span class="Right">盈利数据：{{$val->bus_profit}}</span></li>
                            <li class="Border_none">其它数据：{{$val->bus_other}}</li>
                        </ul>
                        <div class="review Both">
                            <div class="review_nr">
                                <p class="review_p">投资人商业模式点评</p>
                                <div class="review_text">
                                    <textarea name="" rows="" cols="" placeholder="请您输入"></textarea>
                                </div>
                                <div class="foot Both">
                                    <ul class="foot_ul Left">
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                    </ul>
                                    <p class="foot_more Right">您还可以输入20字</p>
                                </div>
                                <div class="pinglun Both">
                                    <p class="ping"><button>评论</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_list Both">
                    <div class="radio">                        
                        <video id="tea_video_vj" name="tea_video_vj" class="video-js vjs-default-skin" 
								width="780" height="550"
								poster="{{ asset($val->tea_video) }}?vframe/jpg/offset/1" data-setup="{}">
								<source src="{{ asset($val->tea_video) }}" type='video/mp4' />
						</video> 
                    </div>
                    <div class="show">
                        <ul class="show01_ul Both">
                            <li>核心团队：{{$val->tea_core}}</li>
                            <li>员工总人数：{{$val->tea_num}}</li>
                            <li>高级创业导师：{{$val->tea_tutor}}</li>
                            <li class="Border_none">企业战略高级顾问：{{$val->tea_adviser}}</li>
                        </ul>
                        <div class="review Both">
                            <div class="review_nr">
                                <p class="review_p">投资人商业模式点评</p>
                                <div class="review_text">
                                    <textarea name="" rows="" cols="" placeholder="请您输入"></textarea>
                                </div>
                                <div class="foot Both">
                                    <ul class="foot_ul Left">
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                    </ul>
                                    <p class="foot_more Right">您还可以输入20字</p>
                                </div>
                                <div class="pinglun Both">
                                    <p class="ping"><button>评论</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_list Both">
                    <div class="radio">
                        <video id="roa_video_vj" name="roa_video_vj" class="video-js vjs-default-skin" 
								width="780" height="550"
								poster="{{ asset($val->roa_video) }}?vframe/jpg/offset/1" data-setup="{}">
								<source src="{{ asset($val->roa_video) }}" type='video/mp4' />
						</video> 
                    </div>
                    <div class="show">
                        <div class="shou_xcjb">
                            <p class="xcjb">现场投资嘉宾：{{$val->roa_guest}}</p>
                        </div>
                        <div class="review Both">
                            <div class="review_nr">
                                <p class="review_p">投资人商业模式点评</p>
                                <div class="review_text">
                                    <textarea name="" rows="" cols="" placeholder="请您输入"></textarea>
                                </div>
                                <div class="foot Both">
                                    <ul class="foot_ul Left">
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                        <li><img src="{{ asset('images/ge_xing_icon.png') }}"></li>
                                    </ul>
                                    <p class="foot_more Right">您还可以输入20字</p>
                                </div>
                                <div class="pinglun Both">
                                    <p class="ping"><button>评论</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_list Both">
                    <div class="tab_list_jian">
                        <div class="jian">
                            <ul class="jian_ul Both">
                                <li style="width:72%;">文件名称</li>
                                <li style="width:15%;">上传时间</li>
                                <li style="width:13%">操作</li>
                            </ul>
                            <ul class="jian_ul_ul Both">
                                <li style="width:72%;">
                                <?php 
                                	$att_names = explode("/", $val->att_name);
                                	echo $att_names[count($att_names) -1];
                                ?></li>
                                <li style="width:15%">{{ substr($val->pro_datetime,0,strpos($val->pro_datetime," ")) }}</li>
                                <li style="width:13%">
                                    <div class="chou_upload">
                                        <a href="{{$val->att_name}}" target="_blank"><span class="gai">公开阅览</span></a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!--右部分-->
            <div class="con_right">
                <div class="main_right Right">
                    <div class="mr_top">
                        <div class="mr_title">
                            <div class="mr_title_logo Left">
                                <a href="javascript:;">
                                    <img src="{{ asset($val->pro_logo) }}" width="187px" height="104px">
                                </a>
                            </div>
                            <div class="Left mr_title_right">
                                @if($val->user_id==Session::get('user_id'))
                                <p class="ml_editor Right"><a href="/chouedit/{{$val->pro_name}}" target="_blank"><img src="{{ asset('images/ml_title_img_03.png') }}"/></a></p>
                                @endif
                                <h3 class="Both">{{$val->pro_name}}</h3>
                                <p>{{$val->pro_content}}</p>
                                <p><a href="#"><img src="{{ asset('images/mr_icon_10.png') }}">{{ substr($val->pro_address,0,strpos($val->pro_address,",")) }}</a></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="mr_middle Both">
                            <div class="mr_border">
                                <a href="/users/{{$val->nickname}}" target="_blank">
                                    @if(empty($val->photo) || ($val->photo)=="")
                                    <img src="{{ asset('images/moren.jpg') }}" width="98px" height="98px"/>
                                        @else
                                        <img src="{{ asset($val->photo) }}" width="98px" height="98px" />
                                            @endif</a>
                                <div class="nexname Left">
                                    <p><a style="color: #333" href="/users/{{$val->nickname}}" target="_blank">{{$val->nickname}}</a></p>
                                    <p>发起时间:{{ substr($val->pro_datetime,0,strpos($val->pro_datetime," "))}}</p>
                                    <h3>项目估值:<span>{{$val->pro_valuation}}万元</span></h3>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="money Both">
                            <div class="mr_border">
                                <dl class="rong">
                                    <h4>融资金额</h4>
                                    <dd>{{$val->pro_target}}万元</p>
                                </dl>
                                <dl>
                                    <h4>在线众筹</h4>
                                    <dd>{{$val->pro_target}}万元</p>
                                    <input type="hidden" id="onlineMoney" value="{{$val->pro_target}}"/>
                                </dl>
                                <dl>
                                    <h4>股份回报</h4>
                                    <dd>{{$val->pro_return}}%</p>
                                    <input type="hidden" id="return_money" value="{{$val->pro_return}}" />
                                </dl>
                                <div class="clear"></div>
                            </div>

                        </div>

                        <div class="invest Both">
                            <div class="mr_border">
                                <div class="invest_money">在线投资：<input type="text" name="line" id="line" value="" onkeyup="KeyP(this);"/>
                                    <span class="Right" id="amount">@if($val->pro_value==1)百元@elseif($val->pro_value==2)千元@elseif($val->pro_value==3)万元@else十万元@endif</span></div>
                                <div class="reback">获取项目股份：<input type="text" name="share" id="share" value="" disabled="disabled"/><span class="Right">%</span></div>
                                <p class="invest_btn"><button>立即投资</button></p>
                                <p class="invest_btn_zhu"><span>注:</span>在线众筹人数不得超过100人</p>
                            </div>
                        </div>

                        <div class="record Both">
                            <div class="mr_border">
                                <p class="main_echarts">项目已完成67%的融资</p>
                                <div id="main"></div>
                                <div class="main_portrait_both Both">
                                    <div class="Bow_out Left">
                                        <ul class="Bow_out_ul">
                                            <li><a href="/risk">共囊投资说明</a></li>
                                        </ul>
                                    </div>
                                    <div class="main_portrait Right">
                                        <ul class="main_portrait_ul Left">
                                            <li class="advisor">融资顾问</li>
                                            <li>姓名：{{$val->pro_advisor}}</li>
                                        </ul>
                                        <div class="main_portrait_img Left">
                                            <img src="{{ asset('images/list_tou_icon.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mr_bottom">
                        <a href="#"><img src="{{ asset('images/xmgn.png') }}"/></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        <!--内容结束-->
	
	
</div>
<!--底部开始-->
@include('footer')
<!--底部结束-->
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			$(".video-js").removeClass("vjs-controls-disabled");
		}, 1000);

		var teaPlayer = videojs('tea_video_vj');
		var roaPlayer = videojs('roa_video_vj');
		var busPlayer = videojs('bus_video_vj');
		// 开始或恢复播放
		teaPlayer.on('play', function() {  
			roaPlayer.pause();
			busPlayer.pause();
			console.log('roaPlayer,busPlayer停止播放');
		});
		roaPlayer.on('play', function() {  
			teaPlayer.pause();
			busPlayer.pause();
			console.log('teaPlayer,busPlayer停止播放');
		});
		busPlayer.on('play', function() {  
			teaPlayer.pause();
			roaPlayer.pause();
			console.log('roaPlayer,busPlayer停止播放');
		});
		
	});
</script>

	<script type="text/javascript">
        function KeyP(v){
            var line = $('#line').val();
            var onlineMoney = $('#onlineMoney').val() * 10000;
            var return_money = $('#return_money').val();
            var amount = $('#amount').html();
            var line_value = 0;
            var money_value = 0;
            if(amount=="百元"){
                line_value = line * 100
            }else if(amount=="千元"){
                line_value = line * 1000
            }else if(amount=="万元"){
                line_value = line * 10000
            }else{
                line_value = line * 10000
            }
            if(amount=="百元"){
                money_value = 100
            }else if(amount=="千元"){
                money_value = 1000
            }else if(amount=="万元"){
                money_value = 10000
            }else{
                money_value = 100000
            }

            var reg = /^\d{1,4}$/;
            if(!reg.test(line)){
                $('#line').val("")
                document.getElementById("share").value = "";
                return false;
            }else if(line_value>onlineMoney){
                alert('输入的值不允许大于在线众筹')
                $('#line').val("")
                document.getElementById("share").value = "";
            }else{
                document.getElementById("share").value = v.value * money_value / onlineMoney * return_money ;
            }
        }

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
tab(ul03,'tab_list','ul03_active')
		//饼图
	var myChart = echarts.init(document.getElementById('main'));
	option = {
		title: {
	        text: '融资'
	    },
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: {c} ({d}%)"
	    },
	    color:['#2d405c','#fd3881'], 
	    legend: {
	        orient: 'vertical',
	        x: 'right',
	        data:['未融资','融资']
	    },
	    series: [
	        {
	            name:'访问来源',
	            type:'pie',
	            radius: ['33%', '67%'],
	            avoidLabelOverlap: false,
	            label: {
	                normal: {
	                    show: false,
	                    position: 'center'
	                },
	                emphasis: {
	                    show: true,
	                    textStyle: {
	                        fontSize: '20',
	                        fontWeight: 'bold'
	                    }
	                }
	            },
	            labelLine: {
	                normal: {
	                    show: false
	                }
	            },
	            data:[
	            	{value:33, name:'未融资'},
	                {value:67, name:'融资'},
	            ]
	        }
	    ]
	};
myChart.setOption(option);

	</script>
