@include('me_header')

<!--个人页面开头导航开始-->
<div class="bang_head">
    <div class="bang_head_img">
        <div class="bang_head_yuan">
            @if(empty($user_data[0]->photo) || ($user_data[0]->photo)=="")
            <a href="/user"><img src="{{ asset('images/mo.png') }}" width="258px" height="262px"/></a>
                @else
                <a href="/user"><img src="{{ asset($user_data[0]->photo) }}" width="258px" height="262px"/></a>
                    @endif
        </div>
        <p>
            @if(empty($user_data[0]->nickname) || ($user_data[0]->nickname)=="")
            共囊
                @else
                {{$user_data[0]->nickname}}
                    @endif
        </p>
    </div>
    <div class="bang_head_footer">
        <ul class="bang_head_nav conter_con" id="bang_head_nav">
            <li class="bang_moren">我的共囊</li>
            <li id="bar">合伙人</li>
            <li >我的活动</li>
            <li >我的拍卖</li>
            <li >我的留言</li>
            <li >账户设置</li>
        </ul>
    </div>
</div>
<!--个人页面开头导航开始-->
</body>
</html>
<script src="{{ asset('js/jquery1.9.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var name = $('#name').val();
        var n=name.substring(name.length-1);
        if(name=="my"){
            $(".My_conter_con").eq(0).css("display","block");
        }
        if(name=="my"+n){
            $("#bang_head_nav li").eq(n).addClass("bang_moren").siblings().removeClass("bang_moren");
            $(".My_conter_con").eq(n).css("display","block");
        }
        //var bar = $('#bang_head_nav li').index(document.getElementById('bar'));

        $("#login_ul").click(function(){
            $('.xial').toggle();
        });
        $(document).bind("click",function(e){
            var target  = $(e.target);
            if(target.closest(".xial,#login_ul").length == 0){
                $(".xial").hide();
            };
            e.stopPropagation();
        })
    });
</script>
