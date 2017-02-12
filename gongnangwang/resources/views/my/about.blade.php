<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('images/18.png') }}">
		<title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/publick.css"/>
		<link rel="stylesheet" type="text/css" href="css/about.css"/>
	</head>
	<body>
<!--导航开始-->
	@include('header')
<!--导航结束-->
<!--内容部分开始-->
<div class="About_con">
	<div class="conter_con">
        <input type="hidden" value="{{$name}}" id="name">
		<div class="About_sub">
			<div class="Sub_left_nav Left">
				<div class="About_nav">
					<ul class="About_nav_ul" id="About_nav_ul">
						<li class="About_active">关于我们</li>
						<li>品牌介绍</li>
						<li>共囊基金</li>
						<li class="Border_none">联系我们</li>
					</ul>
				</div>
			</div>
			<!--关于我们-->
            <div>
			<div class="Sub_right_con Right"  style="display: block;">
				<p class="Sub_title">关于共囊</p>
				<!--
				<div class="About_video_logo Both">
					<div class="About_video Left">
						<video id="example_video1" class="video-js vjs-default-skin" controls="controls" preload="none" width="750" height="365" data-setup="{}">
						    <source src="video/1.mp4" type='video/mp4' />
						</video>	
					</div>
					<div class="About_logo Left">
						<img src="images/about_logo_icon.png"/>
					</div>		
				</div>
				-->
                <div class="About_word Both">
                    <p>
                        共囊网 www.gongnang.com 隶属于共囊网（北京）科技有限公司，是集合股权众筹、合伙人招募招聘、创业活动创建、商标专利与知识产权拍卖展示的大型创业投资对接平台：
                    </p>
                    <p>1)平台重点解决创业者找钱难、融资难、创业项目无法高逼格高专业展示，无法和投资人的直接资金对接、投资对接……平台为中国所有想创业、正在创业、已经创业的项目和企业提供最专业最精准的需求解决。</p>
                    <p>2)同时共囊网大平台为所有想创业的个人创业者提供与公司同等权益的创业合伙人招募招聘：创业情怀展示、创业梦想说明、股权合伙、兼职合伙、公益合伙、爱心合伙……展示真正有伟大创业想法、有创新挑战勇气的任何人，提供历史级别的见证！</p>
                    <p>3)共囊网深切知道知识产权的重要性！因为任何伟大企业的崛起与发展壮大都离不开知识产权，任何优秀专利、优秀发明、优质商标、优质域名等都是最原始知识产权的构成核心……我们为所有创业者提供情怀与梦想的价值变现。</p>
                    <p>时代赋予我们必须有这样伟大的梦想家，国家和世界的繁荣更离不开我们每一个创新创业梦想家的激情奋斗！我们共囊网为时代而生、我们共囊网将为国家和世界的创新创业挑战提供最牛逼、最完整、最真实、最有意义的伟大见证！！！</p>
                </div>
				<div class="About_foot">
					<img src="images/about_foot.png"/>
					<span>创始人 海歌</span>
				</div>
			</div>
			<!--品牌介绍-->
			<div class="Sub_right_con Right">
				<p class="Sub_title">品牌介绍</p>
				<div class="Brand_introduce Both">
					<img src="images/about_logo-big_icon.png"/>
				</div>
				<div class="About_word Both">
					<h2>共囊品牌介绍</h2>
					<div class="pinpai_img Left">
						<img src="images/nang.gif"/>
					</div>
					<p>囊-读音：náng</p>
					<p>
						指装有东西的口袋 囊,橐也。--《说文》
						括囊。--《易•坤》。疏：“所以贮物。”
						囊括四海。--汉•贾谊《过秦论》
						囊括一空,囊中物:喻稳稳到手或不用费力就可获得的物品
					</p>
					<p>相关人物/囊 </p>
					<p>
					春秋时楚国有囊氏，源自芈姓。楚庄王第三子王子贞字子囊，在楚共王、楚康王两朝任令尹，后人以囊为氏。他的孙子囊瓦字子常，在楚灵王时为车右，在楚平王、楚昭王两朝任令尹，是个误国贪夫，后来被吴王阖闾所败逃到郑国，被迫自杀。
					囊者，助也。辅助的意思，就是共同干一番大事的意思。也是齐心协力完成的意思。。
					</p>
					<p>共囊指齐心协力完成一项重要的任务，亦指在同一片天空下，共同完成任务、事项、愿景、目标等。</p>
                    <p>为什么要共囊？因为我们想把天下最优秀的思想、最棒的IDEA、最强的创意、最伟大的创业目标与激情统统放在一个口袋……实现资源共享、创意共享、能量共享、创新共享！</p>
				</div>
			</div>
			<!--共囊基金-->
			<div class="Sub_right_con Right">
				<p class="Sub_title">共囊产业引导投资基金介绍</p>
				<div class="Fund_word Both">
					<img src="images/jijin_ico.png" alt="" />
				</div>
			</div>
			<!--联系我们-->
			<div class="Sub_right_con Right">
				<p class="Sub_title">联系共囊</p>
				<div class="Contact_us Both">
					<p>客服邮箱： kefu@gongnang.com</p>
					<p>QQ群：  201400298 <span>（备注：非共囊注册会员勿进，滥发信息一概黑名单）</span></p>
					<p>地址：北京市海淀区中关村创业大街</p>
					<p>路线：四号线中关村站A1口出直走800米</p>
					<p>公交路线：中关村西站</p>
					<p>中关村创业大街为全国最著名的创业一条街、这里汇萃了“京东奶茶馆”、“车库咖啡”、“并购咖啡” <br />“创业会客厅”、“36氪”、“联想乐基金”、“黑马会”、“创投圈”、“3W咖啡”、“天使汇”等。</p>
				</div>
				<div class="Contact_us_map">
					<img src="images/about_place_icon.png"/>
				</div>
			</div>
            </div>
		</div>
	</div>
</div>
<!--内容部分结束-->
<!--底部开始-->
@include('footer')
<!--底部结束-->
	</body>
</html>
<script type="text/javascript" src="js/jquery1.9.1.min.js"></script>
<script>
    $(document).ready(function(){
        var name = $('#name').val();
        var n=name.substring(name.length-1);
        $('.About_nav_ul li').click(function () {
            var index=$(this).index();
            $(this).addClass("About_active").siblings().removeClass("About_active");
            $(".Sub_right_con").eq(index).css("display","block").siblings().css("display","none");
        })
        if(name=="about"+n){
            $(".About_nav_ul li").eq(n).addClass("About_active").siblings().removeClass("About_active");
            $(".Sub_right_con").eq(n).css("display","block").siblings().css("display","none");;
        }
    });
</script>
