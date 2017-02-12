<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="shortcut icon" href="images/18.png">
        <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
		<link rel="stylesheet" type="text/css" href="css/sign.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/publick.css" />
	</head>
	<body>
<div class="conter_con">
	<div class="sign_con Right">
		<!--头部开始-->
		<div class="sign_header">
			<div class="content_con">
				<p class="sign_biao">
					<img src="images/login_biao_n.png" class="Left"/>
					<h3 class="sign_wor Left">注册</h3>
				</p>
				<p class="sign_wors Right">还没有账号？<a href="login">立即登录》</a></p>
			</div>
		</div>
		<!-- 头部结尾 -->
		<div class="sign_bor Both">
			<img src="images/login_bor.png"/>
		</div>
		<!-- 内容开始 -->
		<div class="sign_content">
			<div class="content_con">
              {{--  <form action="register_do" method="post" onsubmit="return register(false)">--}}
					<!-- 用户名 -->
					<div class="sign_name">
						<p class="name Left">
							<img src="images/sign_biao.png" alt="" />
						</p>
						<div class="inpt Left">
							<input type="text" name="phone" id="phone" placeholder="请输入您的手机号" />
						</div>
					</div>
					<!--验证码-->
					<div class="sign_yanz">
						<p class="yanz Left">
							<img src="images/sign_biao-02.png" alt="" />
						</p>
						<div class="inpt_yz Left">
							<input type="text" name="verify" id="verify" placeholder="请输入验证码" />
						</div>
						<span class="inpt_but Right" id="checkPhone" onclick="settime(this)">获取验证码
						</span>
					</div>
					<!--密码-->
					<div class="sign_password">
						<p class="password Left">
							<img src="images/sign_biao-03.png" alt="" />
						</p>
						<div class="inpt Left">
							<input type="password" name="password" id="password" placeholder="请输入密码" />
						</div>
					</div>
					<p class="wrid Both">
                        <label for="agree">
                            <input type="checkbox" name="agree" id="agree" value="1" />
                            阅读并同意共囊网的《共囊网服务协议》  《法律声明 及隐私政策》  《支付宝服务协议》
                        </label>
					</p>
					<div class="sign_but">
                        <span id="point" style="display: block;text-align: center"></span>
						<button id="btn">立即注册</button>
					</div>
					<p class="three">第三方账号登录</p>
              {{--  </form>--}}
			</div>
		</div>
		<!-- 内容结束 -->
		<div class="sign_bor">
			<img src="images/login_bor.png"/>
		</div>
		<div class="three_con">
			<ul class="content_con">
				<li class="three_con_one_li"><a href="javascript:;"><img src="images/login-biao.png"/></a></li>
				<li><a href="javascript:;"><img src="images/login-biao-02.png"/></a></li>
				<li><a href="javascript:;"><img src="images/login-biao-03.png"/></a></li>
			</ul>
		</div>
		
	</div>
</div>
	</body>
</html>
<script type="text/javascript" src='js/jquery1.9.1.min.js'></script>
<script type="text/javascript">
    var countdown=60;

    function settime(val){
        var phone = $('#phone').val();
        var pattern = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!pattern.test(phone))
        {
            $("#point").html("<font color='red'>请输入有效的手机号码</font>").show(1).delay(2000).hide(1);
            $('#phone').val('');
            return false;
        }else{
            if (countdown == 0) {
                $("#checkPhone").attr("onclick", "settime(this)");
                $('#checkPhone').html("获取验证码");
                countdown = 60;
            } else {
                if(countdown==60){
                    $.post("mobile", { phone: phone }, function(json){
                        //  var obj=eval("("+json+")");
                        console.log(json)
                        if(json=='0,0'){
                            $("#point").html("<font color='red'>验证码已发送！</font>").show(1).delay(2000).hide(1);
                        }
                    });
                }

                $("#checkPhone").attr("onclick", "null");
                $('#checkPhone').html("重新发送(" + countdown + ")");
                countdown--;
                setTimeout(function() {
                    settime(val)
                },1000)
            }
        }
    }




    $('#btn').click(function () {
        var phone = $('#phone').val();
        if(phone=='' || phone==undefined || phone==null)
        {
            $("#point").html("<font color='red'>请输入您的手机号</font>").show(1).delay(2000).hide(1);
            return false;
        }
        var verify = $('#verify').val()
        if(verify=='' || verify==undefined || verify==null)
        {
            $("#point").html("<font color='red'>请输入您的验证码</font>").show(1).delay(2000).hide(1);
            return false;
        }
        var password = $('#password').val()
        var reg = /^([0-9a-zA-Z\.]){6,10}$/;
        if(password=='' || password==undefined || password==null)
        {
            $("#point").html("<font color='red'>请输入您的密码！</font>").show(1).delay(2000).hide(1);
            return false;
        }else if(!reg.test(password))
        {
            $("#point").html("<font color='red'>密码由6-10位数字字母组成</font>").show(1).delay(2000).hide(1);
            return false;
        }
        var agree = $("input[type='checkbox']").is(':checked')
        if(agree==false){
            $("#point").html("<font color='red'>请同意协议</font>").show(1).delay(2000).hide(1);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/register_do",
            data: "phone="+phone+"&verify="+verify+"&password="+password,
            success: function(msg){
                if(msg==0){
                    $("#point").html("<font color='red'>您已经注册，请登录！</font>").show(1).delay(2000).hide(1);
                    return false;
                }else if(msg==1){
                    $("#point").html("<font color='red'>请发送验证码！</font>").show(1).delay(2000).hide(1);
                    return false;
                }else if(msg==2){
                    $("#point").html("<font color='red'>验证码不正确！</font>").show(1).delay(2000).hide(1);
                    return false;
                }else if(msg==3){
                    alert('请您先完善信息');
                    location.href='/useradd';
                }
            }
        });
    });

</script>


