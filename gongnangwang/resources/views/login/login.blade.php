<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/18.png">
    <title>共囊网 股权众筹 合伙人 活动 拍卖 共囊</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/publick.css" />
</head>
<body>
<div class="conter_con">
    <div class="login_con Right">
        <!--头部开始-->
        <div class="login_header">
            <div class="content_con">
                <p class="login_biao">
                    <img src="images/login_biao_n.png" class="Left"/>
                <h3 class="login_wor Left">登录</h3>
                </p>
                <p class="login_wors Right">还没有账号？<a href="register">点击立即注册》</a></p>
            </div>
        </div>
        <!-- 头部结尾 -->
        <div class="login_bor Both">
            <img src="images/login_bor.png"/>
        </div>
        <!-- 内容开始 -->
        <div class="login_content">
            <div class="content_con">

                <div class="login_name">
                    <p class="name Left">
                        用户名:
                    </p>
                    <div class="inpt Left">
                        <input type="text" name="user_name" id="user_name"  placeholder="请输入用户名" />
                    </div>
                </div>
                <div class="login_password">
                    <p class="password Left">
                        <span>密</span>码:
                    </p>
                    <div class="inpt Left">
                        <input type="password" name="" id="pass_word" placeholder="请输入密码" />
                    </div>
                </div>
                <div class="login_remb">
                    <form action="" method="post" class="remb Left">
                        <label for="rember">
                            <input type="checkbox" name="" id="rember" value="" />
                            <span>&nbsp;记住密码</span>
                        </label>
                    </form>
                    <p class="sign Right"><a href="register">注册</a></p>
                </div>
                <div class="login_but">
                    <span id="point" style="display: block;text-align: center"></span>
                    <button id='login'>立即登录</button>
                </div>
                <p class="wang"><a href="javascript:;">忘记密码</a></p>
                <p class="three">第三方账号登录</p>

            </div>
        </div>
        <!-- 内容结束 -->
        <!--底部开始-->
        <div class="login_bor">
            <img src="images/login_bor.png"/>
        </div>
        <div class="three_con">
            <ul class="content_con">
                <li class="three_con_one_li"><a href="javascript:;"><img src="images/login-biao.png"/></a></li>
                <li><a href="javascript:;"><img src="images/login-biao-02.png"/></a></li>
                <li><a href="javascript:;"><img src="images/login-biao-03.png"/></a></li>
            </ul>
        </div>
        <!--底部结束-->
    </div>

</div>
</body>
</html>
<script type="text/javascript" src="js/jquery1.9.1.min.js"></script>
<script type="text/javascript">
    $('#login').click(function(){
        var user_name = $('#user_name').val();
        var user_pass = $('#pass_word').val();
        var remember = $("input[type='checkbox']").is(':checked')

        $.ajax({
            type: "POST",
            url: "/logindo",
            data: "user_name="+user_name+"&user_pass="+user_pass+"&remember="+remember,
            success: function(msg){
                //console.log(msg);
                if(msg==0){
                    $("#point").html("<font color='red'>用户名或密码不正确</font>").show(1).delay(2000).hide(1);
                    return false;
                }else if(msg==1 || msg==2){
                    alert('请您先完善信息');
                    location.href='/useradd';
                }else{
                    location.href='/user';
                }
            }
        });

    })
</script>
