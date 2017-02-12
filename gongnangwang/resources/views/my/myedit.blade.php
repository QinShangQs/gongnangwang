<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/18.png">
    <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
    <link rel="stylesheet" type="text/css" href="css/publick.css"/>
    <link rel="stylesheet" type="text/css" href="css/ren_xinxi.css"/>
    <link rel="stylesheet" type="text/css" href="css/chou_list.css"/>
    <link rel="stylesheet" type="text/css" href="css/geren.css"/>
</head>
<body>
<!--导航开始-->
@include('header')
<!--导航结束-->
<!--内容部分开始-->
<div class="Information_nr">
    <div class="conter_con">
        <form enctype="multipart/form-data" method="post" action="/usereditdo" onsubmit="return mySubmit()">
            @foreach($user_data as $key=>$val)
            <div class="Information">
                <h2 class="Information_word">个人信息</h2>
                <p>个人照片：</p>
            </div>
            <div class="content_head_Infor Both">
                <!--左侧-->
                <div class="content_head_left_Infor Left">
                    <div class="ge_pic_icon_Infor">
                        @if(isset($val->photo))
                            <img src="{{$val->photo}}" width="414px" height="600px"/>
                        @else
                            <img src="images/mo.png" width="414px" height="600px"/>
                        @endif
                    </div>
                    <div class="Infor_file">
                        <input type="file" name="uploadPicture" id="file" value="" title="上传照片" onchange="getPhoto(this)"/>
                    </div>
                </div>
                <!--右侧-->
                <div class="content_head_right Right">
                    <div id="videoShow">
                    <video src="{{ asset($val->video) }}" name="moren" id="example_video1" class="video-js vjs-default-skin" controls preload="controls" width="740" height="550" poster="" data-setup="{}">

                    </video></div>
                    <div class="Infor_inpt_word">
                        <div class="Infor_inpt Left">
                            <a href="javascript:;" class="a-upload">选择
                                <input type="file" id="uploadVideo" value="" onchange="getVideo(this)"/>
                            </a>
                            <a href="javascript:;" class="a-upload" id="upload" onclick="uploadVideo()">上   传</a>
                        </div>
                        <p class="money Left">注：上传个人视频不能超过1分钟</p>
                    </div>
                </div>
            </div>
            <!--下-->
            <div class="Editor Both">
                <div class="Editor_word">
                    <div class="Editor_name Both">
                        <span class="Left">昵称：</span>
                        <div class="Editor_name_inpt Left nick">
                            <input type="text" name="nickname" id="nickname" onblur="nicknameVerify()"  value="{{$val->nickname}}" />
                        </div><p class="tian Left s_nickname"></p>
                    </div>
                    <div class="Editor_name Both">
                        <span class="Left">年龄区间：</span>
                        <div class="working_life Left age">
                            <select id="s_age" name="s_age">
                                <option value="0">请选择年龄区间</option>
                                @if($val->age==1)
                                <option value="1" selected>18-25</option><option value="2">25-30</option><option value="3">30-40</option><option value="4">40-50</option><option value="5">50以上</option>
                                @elseif($val->age==2)
                                <option value="1">18-25</option><option value="2" selected>25-30</option><option value="3">30-40</option><option value="4">40-50</option><option value="5">50以上</option>
                                @elseif($val->age==3)
                                <option value="1">18-25</option><option value="2">25-30</option><option value="3" selected>30-40</option><option value="4">40-50</option><option value="5">50以上</option>
                                @elseif($val->age==4)
                                <option value="1">18-25</option><option value="2">25-30</option><option value="3">30-40</option><option value="4" selected>40-50</option><option value="5">50以上</option>
                                @elseif($val->age==5)
                                <option value="1">18-25</option><option value="2">25-30</option><option value="3">30-40</option><option value="4">40-50</option><option value="5" selected>50以上</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="Editor_name Both">
                        <div class="Left">
                            <span class="Left">身份：</span>
                            <div class="working_life Left identity">
                                <select id="s_identity" name="identity">
                                    <option value="0">请选择身份</option>
                                    @if($val->identity==1)
                                        <option value="1" selected>创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==2)
                                        <option value="1">创始人</option><option value="2" selected>投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==3)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3" selected>律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==4)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4" selected>上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==5)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5" selected>职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==6)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6" selected>设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==7)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7" selected>技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==8)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8" selected>融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==9)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9" selected>明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==10)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10" selected>在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==11)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11" selected>海外海归</option><option value="12">总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==12)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12" selected>总裁董事长</option><option value="13">创业导师</option>
                                    @elseif($val->identity==13)
                                        <option value="1">创始人</option><option value="2">投资人</option><option value="3">律师</option><option value="4">上市高管</option><option value="5">职业经理</option><option value="6">设计师</option><option value="7">技术开发</option><option value="8">融资顾问</option><option value="9">明星名人</option><option value="10">在校大学生</option><option value="11">海外海归</option><option value="12">总裁董事长</option><option value="13" selected>创业导师</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="compay_name Left">
                            <span class="Left">公司名：</span>
                            <div class="Editor_name_inpt_com Left company">
                                <input type="text" name="company" id="company" onblur="companyVerify()"  value="{{$val->company}}" />
                            </div>
                        </div>
                        <div class="compay_name Left">
                            <span class="Left">职位：</span>
                            <div class="Editor_name_inpt_gang Left posts">
                                <input type="text" name="posts" id="posts" onblur="postsVerify()"  value="{{$val->posts}}" />
                            </div>
                        </div>
                        <p class="tian Left">认证请到认证中心</p>
                    </div>
                    <div class="content_one Both content_margin">
                        <span class="content_one_span Left">选择地点：</span>
                        <div class="info Left">
                            <div>
                                <div class="s_province province">
                                    <select id="s_province" name="s_province"></select>  
                                </div>
                                <input type="hidden" name="province_value" id="province_value" value="{{ substr($val->address,0,strpos($val->address,",")) }}"/>
                                <div class="s_province city">
                                    <select id="s_city" name="s_city" ></select>  
                                </div>
                                <input type="hidden" name="city_value" id="city_value" value="{{ explode(",",$val->address)[1] }}"/>
                                <div class="s_province county">
                                    <select id="s_county" name="s_county"></select>
                                </div>
                                <input type="hidden" name="county_value" id="county_value" value="{{ substr($val->address,strrpos($val->address,",")+1) }}"/>

                                <script class="resources library" src="js/area.js" type="text/javascript"></script>

                                <script type="text/javascript">_init_area();</script>
                            </div>
                            <div id="show"></div>
                        </div>
                    </div>
                    <div class="Editor_name Both">
                        <span class="Left">工作年限：</span>
                        <div class="working_life Left worklife">
                            <select id="working_life" name="worklife">
                                <option value="0">请选择工作年限</option>
                                @if($val->worklife==1)
                                    <option value="1" selected>1~3年</option><option value="2">3~5年</option><option value="3">5~10年</option><option value="4">10~20年</option>
                                @elseif($val->worklife==2)
                                    <option value="1">1~3年</option><option value="2" selected>3~5年</option><option value="3">5~10年</option><option value="4">10~20年</option>
                                @elseif($val->worklife==3)
                                    <option value="1">1~3年</option><option value="2">3~5年</option><option value="3" selected>5~10年</option><option value="4">10~20年</option>
                                @elseif($val->worklife==4)
                                    <option value="1">1~3年</option><option value="2">3~5年</option><option value="3">5~10年</option><option value="4" selected>10~20年</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="Editor_name_textarea Both">
                        <span class="Left">个人宣言：</span>
                        <div class="Editor_name_text Left signup">
                            <textarea id="sign" name="sign" rows="" cols="">{{$val->sign}}</textarea>
                        </div>
                    </div>
                    <div class="Editor_name Both">
                        <span class="Left">添加个人简历：</span>
                        <div class="Editor_name_file Left">
                            <input type="file" name="uploadResume" id="uploadResume" value="" title="上传简历"/>
                            <span>(注：此简历只用于合伙人招聘岗位投递、单位可查看不对外公开)</span>
                        </div>
                    </div>
                    <div class="Editor_name_btn Both">
                        <a href="/user">返回</a>
                        <button id="btn">修改</button>
                    </div>
                </div>
            </div>
            @endforeach
        </form>
    </div>
</div>
<!--内容部分结束-->
</body>
</html>
<script type="text/javascript" src="js/jquery1.9.1.min.js"></script>
<script type="text/javascript" src="js/myedit.js"></script>