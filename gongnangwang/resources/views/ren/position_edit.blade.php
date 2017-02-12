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
            @foreach($pos_data as $key=>$val)
                <input type="hidden" name="pos_id" id="pos_id" value="{{$val->id}}"/>
            <div class="append_ren" id="append_ren">
                <div class="ren_list_partner">
                    <div class="ren_list_title_one Both">
                        <p class="Font-siz Left">合伙人/工作岗位：</p>
                        <div class="ren_list_partner_text Left Font-siz position">
                            <input type="text" name="par_position" id="par_position" value="{{$val->par_position}}" placeholder="如：PHP程序员"/>
                        </div><span id="s_position"></span>
                    </div>
                    <div class="ren_list_title_one Both">
                        <p class="Font-siz Left">工作经验：</p>
                        <div class="hands_on Left work">
                            <select name="par_work" id="par_work">
                                @if($val->par_work==1)
                                    <option value="0">请选择工作经验</option><option value="1" selected>不限</option><option value="2">1-3年</option><option value="3">3-5年</option><option value="4">5-10年</option><option value="5">十年以上</option>
                                @elseif($val->par_work==2)
                                    <option value="0">请选择工作经验</option><option value="1">不限</option><option value="2" selected>1-3年</option><option value="3">3-5年</option><option value="4">5-10年</option><option value="5">十年以上</option>
                                @elseif($val->par_work==3)
                                    <option value="0">请选择工作经验</option><option value="1">不限</option><option value="2">1-3年</option><option value="3" selected>3-5年</option><option value="4">5-10年</option><option value="5">十年以上</option>
                                @elseif($val->par_work==4)
                                    <option value="0">请选择工作经验</option><option value="1">不限</option><option value="2">1-3年</option><option value="3">3-5年</option><option value="4" selected>5-10年</option><option value="5">十年以上</option>
                                @elseif($val->par_work==5)
                                    <option value="0">请选择工作经验</option><option value="1">不限</option><option value="2">1-3年</option><option value="3">3-5年</option><option value="4">5-10年</option><option value="5" selected>十年以上</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="ren_list_title_one Both">
                        <p class="Font-siz Left">学历要求：</p>
                        <div class="hands_on Left education">
                            <select name="par_education" id="par_education">
                                @if($val->par_education==1)
                                    <option value="0">请选择学历</option><option value="1" selected>不限</option><option value="2">大专</option><option value="3">本科</option><option value="4">博士、硕士、研究生</option>
                                @elseif($val->par_education==2)
                                    <option value="0">请选择学历</option><option value="1">不限</option><option value="2" selected>大专</option><option value="3">本科</option><option value="4">博士、硕士、研究生</option>
                                @elseif($val->par_education==3)
                                    <option value="0">请选择学历</option><option value="1">不限</option><option value="2">大专</option><option value="3" selected>本科</option><option value="4">博士、硕士、研究生</option>
                                @elseif($val->par_education==4)
                                    <option value="0">请选择学历</option><option value="1">不限</option><option value="2">大专</option><option value="3">本科</option><option value="4" selected>博士、硕士、研究生</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="ren_list_title_one Both">
                        <p class="Font-siz Left">年龄要求：</p>
                        <div class="hands_on Left age">
                            <select name="par_age" id="par_age">
                                @if($val->par_age==1)
                                    <option value="0">请选择年龄要求</option><option value="1" selected>不限</option><option value="2">20-30岁</option><option value="3">30-40岁</option><option value="4">40岁以上</option>
                                @elseif($val->par_age==2)
                                    <option value="0">请选择年龄要求</option><option value="1">不限</option><option value="2" selected>20-30岁</option><option value="3">30-40岁</option><option value="4">40岁以上</option>
                                @elseif($val->par_age==3)
                                    <option value="0">请选择年龄要求</option><option value="1">不限</option><option value="2">20-30岁</option><option value="3" selected>30-40岁</option><option value="4">40岁以上</option>
                                @elseif($val->par_age==4)
                                    <option value="0">请选择年龄要求</option><option value="1">不限</option><option value="2">20-30岁</option><option value="3">30-40岁</option><option value="4" selected>40岁以上</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="content_two Both content_margin">
                        <span class="Font-siz content_one_span Left">工作方式：</span>
                        <div class="single_form Left">
                            @if($val->par_mode==1)
                                <label for="full_time">
                                    <input type="radio" checked name="par_mode" id="full_time" value="1"/>
                                    <span>全职</span>
                                </label>
                                <label for="part_time">
                                    <input type="radio"  name="par_mode" id="part_time" value="2"/>
                                    <span>兼职</span>
                                </label>
                            @else
                                <label for="full_time">
                                    <input type="radio" name="par_mode" id="full_time" value="1"/>
                                    <span>全职</span>
                                </label>
                                <label for="part_time">
                                    <input type="radio" checked  name="par_mode" id="part_time" value="2"/>
                                    <span>兼职</span>
                                </label>
                            @endif
                        </div>
                    </div>
                    <div class="content_two Both content_margin">
                        <span class="Font-siz content_one_span Left">薪酬：</span>
                        <div class="single_form Left">
                            @if($val->par_pay_type==1)
                                <label for="monthly_pay">
                                    <input type="radio" checked="true" name="par_pay_type" id="monthly_pay" value="1"/>
                                    <span>月薪：</span>
                                </label>
                                <div class="Monthly Left mon">
                                    <input type="text" name="par_mon" id="par_mon" value="{{$val->par_pay}}" />
                                </div>
                                <label for="years_pay">
                                    <input type="radio" name="par_pay_type" id="years_pay" value="2"/>
                                    <span>年薪：</span>
                                </label>
                                <div class="Monthly Left ann">
                                    <input type="text" name="par_ann" id="par_ann" value="" />
                                </div>
                            @else
                                <label for="monthly_pay">
                                    <input type="radio" name="par_pay_type" id="monthly_pay" value="1"/>
                                    <span>月薪：</span>
                                </label>
                                <div class="Monthly Left mon">
                                    <input type="text" name="par_mon" id="par_mon" value="" />
                                </div>
                                <label for="years_pay">
                                    <input type="radio" checked="true" name="par_pay_type" id="years_pay" value="2"/>
                                    <span>年薪：</span>
                                </label>
                                <div class="Monthly Left ann">
                                    <input type="text" name="par_ann" id="par_ann" value="{{$val->par_pay}}" />
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="content_two Both content_margin">
                        <span class="Font-siz content_one_span Left">股权回报：</span>
                        <div class="single_form Left">
                            @if($val->par_return_type==1)
                                <label for="Share_return ">
                                    <input type="radio" checked="true" name="par_return_type" id="Share_return " value="1"/>
                                    <span>股份回报：</span>
                                </label>
                                <div class="Monthly Left shares">
                                    <input type="text" name="par_shares" id="par_shares" value="{{$val->par_return}}" />
                                </div>
                                <label for="Other_return ">
                                    <input type="radio" name="par_return_type" id="Other_return " value="2"/>
                                    <span>其他回报：</span>
                                </label>
                                <div class="Other Left other">
                                    <input type="text" name="par_other" id="par_other" value="" />
                                </div>
                            @else
                                <label for="Share_return ">
                                    <input type="radio" name="par_return_type" id="Share_return " value="1"/>
                                    <span>股份回报：</span>
                                </label>
                                <div class="Monthly Left shares">
                                    <input type="text" name="par_shares" id="par_shares" value="" />
                                </div>
                                <label for="Other_return ">
                                    <input type="radio" checked="true" name="par_return_type" id="Other_return " value="2"/>
                                    <span>其他回报：</span>
                                </label>
                                <div class="Other Left other">
                                    <input type="text" name="par_other" id="par_other" value="{{$val->par_return}}" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ren_list_responsibility Both content_margin" >
                    <span class="Font-siz content_one_span Left">合伙人职责	：</span>
                    <div class="Rich_text Left duty">
                        <textarea name="par_duty" id="par_duty" rows="" cols="">{{$val->par_duty}}</textarea>
                    </div>
                </div>
                <div class="ren_list_responsibility Both content_margin" >
                    <span class="Font-siz content_one_span Left">合伙人要求	：</span>
                    <div class="Rich_text Left ask">
                        <textarea name="par_ask" id="par_ask" rows="" cols="">{{$val->par_ask}}</textarea>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="Editor_name_btn Both">
            <img src="images/pos_update.png" id="btn" onclick="mySubmit()"/>
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
<script src="js/position_edit.js" type="text/javascript"></script>
