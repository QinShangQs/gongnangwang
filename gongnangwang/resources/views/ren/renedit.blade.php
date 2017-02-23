
    <!--导航开始-->
    @include('me_header')    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ren_list.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/chou_list.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('/js/videojs/video-js.min.css') }}" />
	<script type="text/javascript" src="{{ asset('/js/videojs/video.min.js') }}"></script>
	@include('qiniu.uploader_setter')
	<!--导航结束-->
    <div class="ren_list_con Both">
        <div class="conter_con">
            <form enctype="multipart/form-data" method="post" action="/renedit_do" onsubmit="return mySubmit()">
                @foreach($ren_data as $key=>$val)
                <h2 class="ren_list_con_p">合伙人招募 股权合伙 兼职合伙 公益合伙</h2>
                <div class="ren_list_title ren_list_con_Mar">
                    <div class="ren_list_title_comp">
                        <div class="ren_list_title_one Both">
                            <p class="Font-siz Left">征集标题：</p>
                            <div class="ren_list_title_one_text Left title">
                                <input type="text" name="par_title" id="par_title" value="{{$val->par_title}}" placeholder="请输入该项目标题，如：你想加入创业街第一王者吗" onblur="titleVerify()"/>
                            </div>
                            <p class="second Both s_title">(20字内以内)</p>
                        </div>
                        <div class="ren_list_title_one Both">
                            <p class="Font-siz Left">公司/项目名称：</p>
                            <div class="ren_list_title_two_text Left project">
                                <input type="text" name="par_project" id="par_project" value="{{$val->par_proname}}" placeholder="请输入该项目名称" onblur="projectNameVerify()"/>
                            </div>
                            <div class="single_form Right protype">
                                @if($val->par_protype==1)
                                    <label for="company">
                                        <input type="radio" checked name="par_protype" id="company" value="1"/>
                                        <span>公司<span>(十个岗位999元)</span></span>
                                    </label>
                                    <label for="personal">
                                        <input type="radio" name="par_protype" id="personal" value="2"/>
                                        <span>个人<span>(五个岗位666元)</span></span>
                                    </label>
                                @else
                                    <label for="company">
                                        <input type="radio" name="par_protype" id="company" value="1"/>
                                        <span>公司<span>(十个岗位999元)</span></span>
                                    </label>
                                    <label for="personal">
                                        <input type="radio" checked name="par_protype" id="personal" value="2"/>
                                        <span>个人<span>(五个岗位666元)</span></span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="ren_list_title_one Both ">
                            <p class="Font-siz Left">公司/项目官网：</p>
                            <div class="ren_list_title_two Left website"><input type="text" name="par_website" id="par_website" value="{{$val->par_website}}" placeholder="请输入该项目官网" onblur="projectWebVerify()"/>
                            </div>
                            <span id="s_website"></span>
                        </div>
                        <div class="content_two Both content_margin">
                            <span class="Font-siz content_one_span Left">项目logo：</span>
                            <div class="upup">
                                @include('qiniu.uploader', ['number'=>'','text'=>'选择文件','success_text'=>'上传成功'])
								<input type="hidden" name="par_logo" id="par_logo" value="{{$val->par_logo}}"/>
								<span id="par_logo_name">{{$val->par_logo}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="ren_list_team">
                        <div class="content_two Both content_margin">
                            <p class="Font-siz content_one_span Left">团队现有：</p>
                            <div class="input_xm_team Left team">
                                <select name="par_team" id="pro_team" class="input_xm_team_select">
                                    @if($val->par_team==1)
                                        <option value="0">请选择</option><option value="1" selected>少于15人</option><option value="2">15-50人</option><option value="3">50-200人</option><option value="4">200-500人</option><option value="5">500-2000人</option><option value="6">2000人以上</option>
                                    @elseif($val->par_team==2)
                                        <option value="0">请选择</option><option value="1">少于15人</option><option value="2" selected>15-50人</option><option value="3">50-200人</option><option value="4">200-500人</option><option value="5">500-2000人</option><option value="6">2000人以上</option>
                                    @elseif($val->par_team==3)
                                        <option value="0">请选择</option><option value="1">少于15人</option><option value="2">15-50人</option><option value="3" selected>50-200人</option><option value="4">200-500人</option><option value="5">500-2000人</option><option value="6">2000人以上</option>
                                    @elseif($val->par_team==4)
                                        <option value="0">请选择</option><option value="1">少于15人</option><option value="2">15-50人</option><option value="3">50-200人</option><option value="4" selected>200-500人</option><option value="5">500-2000人</option><option value="6">2000人以上</option>
                                    @elseif($val->par_team==5)
                                        <option value="0">请选择</option><option value="1">少于15人</option><option value="2">15-50人</option><option value="3">50-200人</option><option value="4">200-500人</option><option value="5" selected>500-2000人</option><option value="6">2000人以上</option>
                                    @elseif($val->par_team==6)
                                        <option value="0">请选择</option><option value="1">少于15人</option><option value="2">15-50人</option><option value="3">50-200人</option><option value="4">200-500人</option><option value="5">500-2000人</option><option value="6" selected>2000人以上</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="content_two Both content_margin">
                            <p class="Font-siz content_one_span Left">融资说明：</p>
                            <div class="Equity Font-siz Left trading">
                                @if($val->par_finance==1)
                                    <label for="Never">
                                        <input type="radio" checked name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==2)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" checked name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==3)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" checked name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==4)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" checked name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==5)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" checked name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==6)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" checked name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==7)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" checked name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @elseif($val->par_finance==8)
                                    <label for="Never">
                                        <input type="radio"  name="trading" id="Never" value="1"/>
                                        <span>未融资</span>
                                    </label>
                                    <label for="Received">
                                        <input type="radio" name="trading" id="Received" value="2"/>
                                        <span>天使轮</span>
                                    </label>
                                    <label for="Awheel">
                                        <input type="radio" name="trading" id="Awheel" value="3"/>
                                        <span>A 轮</span>
                                    </label>
                                    <label for="Bwheel">
                                        <input type="radio" name="trading" id="Bwheel" value="4"/>
                                        <span>B 轮</span>
                                    </label>
                                    <label for="Cwheel">
                                        <input type="radio" name="trading" id="Cwheel" value="5"/>
                                        <span>C 轮</span>
                                    </label>
                                    <label for="Dwheel">
                                        <input type="radio" name="trading" id="Dwheel" value="6"/>
                                        <span>D轮及以上</span>
                                    </label>
                                    <label for="listedCompany">
                                        <input type="radio" name="trading" id="listedCompany" value="7"/>
                                        <span>上市公司 </span>
                                    </label>
                                    <label for="noNeed">
                                        <input type="radio" checked name="trading" id="noNeed" value="8"/>
                                        <span>不需要融资 </span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="content_one Both content_margin">
                            <p class="Font-siz content_one_span Left">办公地址：</p>
                            <div class="info Left">
                                <div>
                                    <div class="s_province province">
                                        <select id="s_province" name="s_province"></select>  
                                    </div>
                                    <input type="hidden" name="province_value" id="province_value" value="{{ substr($val->par_address,0,strpos($val->par_address,",")) }}"/>
                                    <div class="s_province city">
                                        <select id="s_city" name="s_city" ></select>  
                                    </div>
                                    <input type="hidden" name="city_value" id="city_value" value="{{ explode(",",$val->par_address)[1] }}"/>
                                    <div class="s_province county">
                                        <select id="s_county" name="s_county"></select>
                                    </div>
                                    <input type="hidden" name="county_value" id="county_value" value="{{ substr($val->par_address,strrpos($val->par_address,",")+1) }}"/>
                                    <script class="resources library" src="js/area.js" type="text/javascript"></script>

                                    <script type="text/javascript">_init_area();</script>
                                </div>
                                <div id="show"></div>
                            </div>
                        </div>
                        
                        <div class="business_model Both content_margin">
                            <span class="content_one_span Left">上传视频：</span>
                                         
                            <table style="margin-left: 10px;">
							<tr>
								<td>
									<div id="par_video_show" >
											<video id="par_video_vj" name="moren"
												class="video-js vjs-default-skin" controls preload="none"
												width="300" height="200" poster="{{$val->par_video}}?vframe/jpg/offset/1" data-setup="{}">
												<source src="{{$val->par_video}}" type='video/mp4' />
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
                        <input type="hidden" name="par_video" id=par_video value="{{$val->par_video}}"/>

                        </div>
                    </div>
                </div>
                {{--   <p class="ren_list_partner_img Both imgg_Left" id="partent">
                       <img src="images/bian_jia_icon.png"/>
                       <span>添加合伙人</span>
                   </p>--}}
                <div class="Editor_name_btn Both">
                    <a href="/my1">返回</a>
                    <button>修改</button>
                </div>
                @endforeach
            </form>
        </div>
    </div>
    
   <!-- 上传模态框 -->
	@include('qiniu.uploader_model')
	<!--底部开始-->
    @include('footer')
	<!--底部结束-->
	<script src="{{ asset('js/ren.js') }}" type="text/javascript" charset="utf-8"></script>
	<script src="{{ asset('js/qiniu/ren-main.js') }}" type="text/javascript" charset="utf-8"></script>