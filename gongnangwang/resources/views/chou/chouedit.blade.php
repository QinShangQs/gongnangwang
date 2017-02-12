<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('images/18.png') }}">
    <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
    <link rel="stylesheet" href="{{ asset('css/publick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/chou_list.css') }}" />
</head>
<script type="text/javascript" src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(".chou_nav_ul li").click(function(){
            var index=$(this).index();
            $(this).addClass("active").siblings().removeClass("active");
            $(".content").eq(index).css("display","block").siblings().css("display","none");
        });

    })

</script>
<body>
<!--导航开始-->
@include('header')
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
        <form enctype="multipart/form-data" method="post" action="/choueditdo" onsubmit="return mySubmit()">
            @foreach($chou_data as $key=>$val)
            <!--项目资料-->
            <div class="content" id="content" style="display: block;">
                <input type="hidden" id="pro_id" name="pro_id" value="{{$val->pid}}">
                <div class="content_one content_margin Both">
                    <span class="content_one_span Left">项目名称：</span>
                    <div class="input_xm Left projectName">
                        <input type="text" id="pro_name" name="pro_name" value="{{$val->pro_name}}" onblur="projectName()"/>
                        <span id="s_pro_name"></span>
                    </div>
                </div>
                <div class="content_two Both content_margin">
                    <span class="content_one_span Left">项目logo：</span>
                    <div class="input_xm Left s_logo">
                        <input type="text" name="logo" id="logo" value="{{$val->pro_logo}}" />
                    </div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload" id="proLogoChange">选   择
                            <input type="file" name="pro_logo" id="pro_logo" value="" title="上传图片"/>
                        </a>
                        <span id="s_pro_logo"></span>
                    </div>
                </div>
                <div class="content_three Both content_margin">
                    <span class="content_one_span Left">资料介绍：</span>
                    <div class="input_xm_text Left projectContent">
                        <textarea id="projectContent" name="pro_content" rows="" cols="" placeholder="20字以内...">{{$val->pro_content}}</textarea>
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
                            <input type="hidden" name="province_value" id="province_value" value="{{ substr($val->pro_address,0,strpos($val->pro_address,",")) }}"/>
                            <div class="s_province city">
                                <select id="s_city" name="s_city" ></select>  
                            </div>
                            <input type="hidden" name="city_value" id="city_value" value="{{ explode(",",$val->pro_address)[1] }}"/>
                            <div class="s_province county">
                                <select id="s_county" name="s_county"></select>
                            </div>
                            <input type="hidden" name="county_value" id="county_value" value="{{ substr($val->pro_address,strrpos($val->pro_address,",")+1) }}"/>
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
                            @if($val->pro_state==1)
                                <option  value="1" selected>未上线</option><option  value="2">概念阶段</option><option  value="3">已上线</option><option  value="4">已盈利</option><option  value="5">IPO阶段</option>
                            @elseif($val->pro_state==2)
                                <option  value="1">未上线</option><option  value="2" selected>概念阶段</option><option  value="3">已上线</option><option  value="4">已盈利</option><option  value="5">IPO阶段</option>
                            @elseif($val->pro_state==3)
                                <option  value="1">未上线</option><option  value="2">概念阶段</option><option  value="3" selected>已上线</option><option  value="4">已盈利</option><option  value="5">IPO阶段</option>
                            @elseif($val->pro_state==4)
                                <option  value="1">未上线</option><option  value="2">概念阶段</option><option  value="3">已上线</option><option  value="4" selected>已盈利</option><option  value="5">IPO阶段</option>
                            @elseif($val->pro_state==5)
                                <option  value="1">未上线</option><option  value="2">概念阶段</option><option  value="3">已上线</option><option  value="4">已盈利</option><option  value="5" selected>IPO阶段</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="content_one Both content_margin">
                    <span class="content_one_span Left">项目阶段：</span>
                    <div class="input_xm_three Left stage">
                        <select id="pro_stage"  name="pro_stage" class="select">
                            <option  value="0" selected = "selected">请选择类型</option>
                            @if($val->pro_stage==1)
                                <option  value="1" selected>融资阶段</option><option  value="2">天使轮</option><option  value="3">A轮</option><option  value="4">B轮</option><option  value="5">C轮</option><option  value="6">D轮</option><option  value="7">上市公司</option>
                                @elseif($val->pro_stage==2)
                                    <option  value="1">融资阶段</option><option  value="2" selected>天使轮</option><option  value="3">A轮</option><option  value="4">B轮</option><option  value="5">C轮</option><option  value="6">D轮</option><option  value="7">上市公司</option>
                                    @elseif($val->pro_stage==3)
                                        <option  value="1">融资阶段</option><option  value="2">天使轮</option><option  value="3" selected>A轮</option><option  value="4">B轮</option><option  value="5">C轮</option><option  value="6">D轮</option><option  value="7">上市公司</option>
                                        @elseif($val->pro_stage==4)
                                            <option  value="1">融资阶段</option><option  value="2">天使轮</option><option  value="3">A轮</option><option  value="4" selected>B轮</option><option  value="5">C轮</option><option  value="6">D轮</option><option  value="7">上市公司</option>
                                            @elseif($val->pro_stage==5)
                                                <option  value="1">融资阶段</option><option  value="2">天使轮</option><option  value="3">A轮</option><option  value="4">B轮</option><option  value="5" selected>C轮</option><option  value="6">D轮</option><option  value="7">上市公司</option>
                                                @elseif($val->pro_stage==6)
                                                    <option  value="1">融资阶段</option><option  value="2">天使轮</option><option  value="3">A轮</option><option  value="4">B轮</option><option  value="5">C轮</option><option  value="6" selected>D轮</option><option  value="7">上市公司</option>
                                                    @elseif($val->pro_stage==7)
                                                        <option  value="1">融资阶段</option><option  value="2">天使轮</option><option  value="3">A轮</option><option  value="4">B轮</option><option  value="5">C轮</option><option  value="6">D轮</option><option  value="7" selected>上市公司</option>
                                                        @endif
                        </select>
                    </div>
                </div>
                <div class="content_for Both content_margin">
                    <span class="content_one_span Left">项目估值：</span>
                    <div class="input_xmgz Left valuation">
                        <input type="text" id="pro_valuation" name="pro_valuation" value="{{$val->pro_valuation}}"/>
                        <span>万元</span>
                    </div>
                    <p class="word Left">为上线的项目估值不得超过5000万</p>
                </div>
                <div class="content_for Both content_margin">
                    <span class="content_one_span Left">项目回报：</span>
                    <div class="input_xmgz Left return">
                        <input type="text" id="pro_return" name="pro_return" value="{{$val->pro_return}}"/>
                        <span>%</span>
                    </div>
                    <p class="word Left returnp">请输入5%-30%的数值</p>
                </div>
                <div class="content_for Both content_margin">
                    <span class="content_one_span Left">目标众筹：</span>
                    <div class="input_xmgz Left target">
                        <input type="text" id="target" name="target" value="{{$val->pro_target}}"/>
                        <span>万元</span>
                    </div>
                    <p class="word_02 Left">为降低投资风险保障投资人利益，未上线运营项目第一期均只实现30%内；已上线项目实现40%-70%额度，第一期完成后可发起第二期后续融资。</p>
                </div>
                <div class="content_for Both content_margin">
                    <span class="content_one_span Left">金额设置：</span>
                    <div class="input_xm_money Left">
                        <select id="work_life" name="pro_value" class="select_money">
                            @if($val->pro_value==1)
                            <option value="1" selected>百元</option><option value="2">千元</option><option value="3">万元</option><option value="4">十万元</option>
                                @elseif($val->pro_value==2)
                                <option value="1">百元</option><option value="2" selected>千元</option><option value="3">万元</option><option value="4">十万元</option>
                                    @elseif($val->pro_value==3)
                                    <option value="1">百元</option><option value="2">千元</option><option value="3" selected>万元</option><option value="4">十万元</option>
                                        @elseif($val->pro_value==4)
                                        <option value="1">百元</option><option value="2">千元</option><option value="3">万元</option><option value="4" selected>十万元</option>
                                            @endif
                        </select>
                    </div>
                    <p class="word_02 Left">百元众筹发布费888元=10万元内融资额；千元众筹发布费1888元=50万元内融资额；万元众筹发布费2888元=100万元内融资额；十万元以上众筹发布费8888元=100万元以上融资额</p>
                </div>
                <div class="content_one Both content_margin">
                    <span class="content_one_span Left">项目分类：</span>
                    <div class="input_xm_three Left type">
                        <select id="pro_type"  name="pro_type" class="select">
                            <option  value="0">请选择方向</option>
                            @if($val->pro_type==1)
                            <option  value="1" selected>移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                @elseif($val->pro_type==2)
                                    <option  value="1">移动互联网</option><option  value="2" selected>电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                    @elseif($val->pro_type==3)
                                        <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3" selected>O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                        @elseif($val->pro_type==4)
                                            <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4" selected>互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                                @elseif($val->pro_type==5)
                                                    <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5" selected>网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                                        @elseif($val->pro_type==6)
                                                            <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6" selected>旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                                                @elseif($val->pro_type==7)
                                                                    <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7" selected>娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                                                                        @elseif($val->pro_type==8)
                                                                            <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8" selected>网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                            @elseif($val->pro_type==9)
                                <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9" selected>信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                            @elseif($val->pro_type==10)
                                <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10" selected>硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                            @elseif($val->pro_type==11)
                                <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11" selected>工具软件</option><option  value="12">企业服务</option><option  value="13">农业相关</option>
                            @elseif($val->pro_type==12)
                                <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12" selected>企业服务</option><option  value="13">农业相关</option>
                            @elseif($val->pro_type==13)
                                <option  value="1">移动互联网</option><option  value="2">电子商务</option><option  value="3">O2O</option><option  value="4">互联网金融</option><option  value="5">网络社区</option><option  value="6">旅游</option><option  value="7">娱乐</option><option  value="8">网络游戏</option><option  value="9">信息技术</option><option  value="10">硬件</option><option  value="11">工具软件</option><option  value="12">企业服务</option><option  value="13" selected>农业相关</option>
                                @endif
                        </select>
                    </div>
                </div>
                <div class="content_two Both content_margin">
                    <span class="content_one_span Left">上传图片：</span>
                    <div class="input_xm Left s_pic">
                        <input type="text" name="pic" id="pic" value="{{$val->pro_picture}}" />
                    </div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload" id="proPictureChange">选   择
                            <input type="file" name="pro_picture" id="pro_picture" />
                        </a>
                        <span id="s_pro_pic"></span>
                    </div>
                </div>
                <div class="content_two Both content_margin">
                    <span class="content_one_span Left">融资顾问：</span>
                    <div class="ncial_advisor Left advisor">
                        <input type="text" id="pro_advisor" name="pro_advisor" placeholder="姓名/昵称" value="{{$val->pro_advisor}}" />
                    </div>
                    <div class="ncial_advisor Left advisornum">
                        <input type="text" id="pro_advisornum" name="pro_advisornum" placeholder="编号" value="{{$val->pro_advisornum}}"/>
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
                <div class="business_model Both content_margin">
                    <span class="content_one_span Left">上传视频：</span>
                    <div class="bus_v bus_video business_model_video Left"><video id="busVideoId" src="{{ asset($val->bus_video) }}" name="bus_video_mo" controls style="width:300px; height:200px" poster="" data-setup="{}"></video></div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload">选   择
                            <input type="file" name="" id="bus_video" value="" onchange="busVideo(this)"/>
                        </a>
                    </div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload" id="busButton" onclick="busVideoUpload()">上    传</a>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">用户数据：</span>
                    <div class="input_xm Left bus_u">
                        <input type="text" name="bus_userdata" id="bus_userdata" value="{{$val->bus_userdata}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">盈利数据：</span>
                    <div class="input_xm Left bus_p">
                        <input type="text" name="bus_profit" id="bus_profit" value="{{$val->bus_profit}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">其他数据：</span>
                    <div class="input_xm Left bus_o">
                        <input type="text" name="bus_other" id="bus_other" value="{{$val->bus_other}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">运营时间：</span>
                    <div class="input_xm Left bus_op">
                        <input type="date" name="bus_operate" id="bus_operate" value="{{$val->bus_operate}}"/>
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
                    <div class="tea_v business_model_video Left"><video src="{{ asset($val->tea_video) }}" id="teaVideoId" name="tea_video_mo" controls style="width:300px; height:200px" poster="" data-setup="{}"></video></div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload">选   择
                            <input type="file" id="tea_video" value="" onchange="teaVideo(this)"/>
                        </a>
                    </div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload" id="teaButton" onclick="teaVideoUpload()">上    传</a>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">核心团队：</span>
                    <div class="input_xm Left tea_c">
                        <input type="text" name="tea_core" id="tea_core" value="{{$val->tea_core}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">员工总人数：</span>
                    <div class="input_xm_peo Left tea_n">
                        <input type="text" name="tea_num" id="tea_num" value="{{$val->tea_num}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">高级创业导师：</span>
                    <div class="input_xm_dao Left tea_t">
                        <input type="text" name="tea_tutor" id="tea_tutor" value="{{$val->tea_tutor}}"/>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">企业战略高级顾问：</span>
                    <div class="input_xm_wen Left tea_a">
                        <input type="text" name="tea_adviser" id="tea_adviser" value="{{$val->tea_adviser}}"/>
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
                    <div class="roa_v business_model_video Left"><video src="{{ asset($val->roa_video) }}" id="roaVideoId" name="roa_video_mo" controls style="width:300px; height:200px" poster="" data-setup="{}"></video></div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload">选   择
                            <input type="file" id="roa_video" value="" onchange="roaVideo(this)"/>
                        </a>
                    </div>
                    <div class="upup">
                        <a href="javascript:;" class="a-upload" id="roaButton" onclick="roaVideoUpload()">上    传</a>
                    </div>
                </div>
                <div class="content_one content_margin">
                    <span class="content_one_span Left">现场投资嘉宾：</span>
                    <div class="input_xm_dao Left roa_g">
                        <input type="text" name="roa_guest" id="roa_guest" value="{{$val->roa_guest}}"/>
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
                    <p class="content_one_span">附件：<en id="s_att_name">{{$val->att_name}}</en></p>
                    <div class="upup_fj">
                        <input type="file" name="att_name" id="att_name" value="{{$val->att_name}}" />
                    </div>
                    <span id="s_att"></span>
                </div>
                <div class="Editor_name_btn Both">
                    <a href="/chou_m/{{$val->pro_name}}">返回</a>
                    <button onclick="form5_sub()">修改</button>
                </div>

            </div>
            <!--附件资料结束-->
            @endforeach
        </form>
    </div>
    <!--底部开始-->
    @include('footer')
    <!--底部结束-->
</section>

</body>

</html>

<script type="text/javascript" src="{{ asset('js/chouedit.js') }}"></script>