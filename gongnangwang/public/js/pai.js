/*====================================js拖拽上传图片 start==================================*/
/*js拖拽上传*/
document.addEventListener("drop",function(e){  //拖离
    e.preventDefault();
})
document.addEventListener("dragleave",function(e){  //拖后放
    e.preventDefault();
})
document.addEventListener("dragenter",function(e){  //拖进
    e.preventDefault();
})
document.addEventListener("dragover",function(e){  //拖来拖去
    e.preventDefault();
})

var box = document.getElementById('drop_area');
box.addEventListener("drop",function(e){
    var fileList = e.dataTransfer.files;

    if(fileList.length == 0){
        return false;
    }
    Array.prototype.S=String.fromCharCode(2);
    Array.prototype.in_array=function(e){
        var r=new RegExp(this.S+e+this.S);
        return (r.test(this.S+this.join(this.S)+this.S));
    };
    var fileurl = window.URL.createObjectURL(fileList[0]);
    if(fileList[0].type.indexOf('image') === 0){
        var str="<div class='Upload_photos_con Left' id='drop_area'><img width='474px' height='280px' src='"+fileurl+"'></div>";

        document.getElementById('drop_area').innerHTML=str;
    }
    resultfile = fileList[0];
},false);

var box = document.getElementById('drop_area2');
box.addEventListener("drop",function(e){
    var fileList = e.dataTransfer.files;

    if(fileList.length == 0){
        return false;
    }
    Array.prototype.S=String.fromCharCode(2);
    Array.prototype.in_array=function(e){
        var r=new RegExp(this.S+e+this.S);
        return (r.test(this.S+this.join(this.S)+this.S));
    };
    var fileurl = window.URL.createObjectURL(fileList[0]);
    if(fileList[0].type.indexOf('image') === 0){
        var str="<div class='Upload_photos_con Left' id='drop_area2'><img width='474px' height='280px' src='"+fileurl+"'></div>";

        document.getElementById('drop_area2').innerHTML=str;
    }
    protectphoto = fileList[0];
},false);

/*====================================js拖拽上传图片 end==================================*/
$('.ctypes').click(function(){
    $('.types').toggle();
})
$('.cinds').click(function(){
    $('.inds').toggle();
})
/*js 产品类型隐藏显示*/
$("#productType").click(function(){
    $('.open_type').toggle();
});
$(document).bind("click",function(e){
    var target  = $(e.target);
    if(target.closest(".open_type,#productType").length == 0){
        $(".open_type").hide();
    }
    e.stopPropagation();
});

$('.open_type_ul li').click(function () {
    var num=$('#productTypeCheck').children('span').length;
    if(num<1){
        var id=$(this).index();
        var name = $(this).find($("a")).html()
        $('#productTypeCheck').append('<span class="pro_type" id="'+id+'">'+name+'</span>')
        $('#s_pro_type').html("");
    }else{
        alert('您只能选择一个标签')
    }

})
$(document).on("click","#productTypeCheck span",function(){
    $('#productTypeCheck span').remove();
});

/*js 所属行业隐藏显示*/
$("#industry").click(function(){
    $('.trade_open').toggle();
});
$(document).bind("click",function(e){
    var target  = $(e.target);
    if(target.closest(".trade_open,#industry").length == 0){
        $(".trade_open").hide();
    }
    e.stopPropagation();
});

$('.trade_open_ul li').click(function () {
    var num=$('#industryCheck').children('span').length;
    if(num<1){
        var id=$(this).index();
        var name = $(this).find($("a")).html()
        $('#industryCheck').append('<span class="ind" id="'+id+'">'+name+'</span>')
        $('#s_ind').html("");
    }else{
        alert('您只能选择一个标签')
    }
});
$(document).on("click","#industryCheck span",function(){
    $('#industryCheck span').remove();
});


/*js验证 商品类型*/
$("input[name='Mold']").click(function () {
    $('#s_goods_type').html("");
});
function goodsTypeVerify()
{
    var val = $("input[name='Mold']:checked").val();
    if(val=='' || val==undefined || val==null){
        $('#s_goods_type').html("<font color='red'>请选择一个商品类型</font>");
        return false;
    }else{
        $('#s_goods_type').html("");
        return true;
    }
}

/*js验证 商品名称*/
function goodsNameVerify()
{
    var goods_name = $('#goods_name').val();
    var reg = /^([a-zA-Z\u4e00-\u9fa5]){3,12}$/
    if(goods_name){
        $('.goods_name').removeClass("Out");
        if(!reg.test(goods_name)){
            $('#s_goods_name').html("<font color='red'>商品名称最好是3-16位字符</font>")
            return false;
        }else{
            $('#s_goods_name').html("")
            return true;
        }
    }else{
        $('.goods_name').addClass("Out");
        return false;
    }
}

/*js验证 商品专利号*/
function goodsKnowledgeVerify()
{
    var goods_knowledge = $('#goods_knowledge').val();
    var reg = /^([a-zA-Z\u4e00-\u9fa5]){3,12}$/
    if(goods_knowledge){
        $('.goods_knowledge').removeClass("Out");
        if(!reg.test(goods_knowledge)){
            $('#s_goods_knowledge').html("<font color='red'>商品专利号最好是3-16位字符</font>");
            return false;
        }else{
            $('#s_goods_knowledge').html("");
            return true;
        }
    }else{
        $('.goods_knowledge').addClass("Out");
        return false;
    }
}

/*js验证 有效期*/
function  goodsTermVerify()
{
    var goods_term = $('#goods_term').val();
    var reg = /^([a-zA-Z\u4e00-\u9fa5]){3,12}$/
    if(goods_term){
        $('.goods_term').removeClass("Out");
        if(!reg.test(goods_term)){
            $('#s_goods_term').html("<font color='red'>有效期</font>");
            return false;
        }else{
            $('#s_goods_term').html("");
            return true;
        }
    }else{
        $('.goods_term').addClass("Out");
        return false;
    }
}
/*js验证 产品信息*/
function goodsContentVerify()
{
    var goods_content = $('#goods_content').val();
    var reg = /^([0-9a-zA-Z\u4e00-\u9fa5]){3,50}$/
    if(goods_content){
        $('.goods_content').removeClass("Out");
        if(!reg.test(goods_content)){
            $('#s_goods_content').html("<font color='red'>最好控制在50字符以内</font>");
            return false;
        }else{
            $('#s_goods_content').html("");
            return true;
        }
    }else{
        $('.goods_content').addClass("Out");
        return false;
    }
}

/*js验证 价格类型*/
function goodsPriceVerify()
{
    var type = $("input[name='Price']:checked").val();
    var reg = /^[1-9]\d{2,7}$/;
    if(type=='' || type==undefined || type==null){
        $('#s_goods_price').html("<font color='red'>请准确填写价格类型</font>");
        return false;
    }else{
        $('#s_goods_price').html("");
        if(type==1){
            $('.priceOne').removeClass("Out");
            var goods_price = $('#goods_price').val();
            if(goods_price=='' || goods_price==undefined || goods_price==null){
                $('.price').addClass("Out");
                return false;
            }else{
                $('.price').removeClass("Out");
                if(!reg.test(goods_price)){
                    $('#s_goods_price').html("<font color='red'>请准确填写价格类型</font>");
                    return false;
                }else{
                    $('#s_goods_price').html("");
                    return true;
                }
            }
        }else{
            $('.price').removeClass("Out");
            var goods_price_one = $('#goods_price_one').val();
            if(goods_price_one=='' || goods_price_one==undefined || goods_price_one==null){
                $('.priceOne').addClass("Out");
                return false;
            }else{
                $('.priceOne').removeClass("Out");
                if(!reg.test(goods_price_one)){
                    $('#s_goods_price').html("<font color='red'>请准确填写价格类型</font>");
                    return false;
                }else{
                    $('#s_goods_price').html("");
                    return true;
                }
            }
        }
    }
}

/*==============================js验证 联系方式 start=================================================*/
/*js验证 手机号码*/
function phoneVerify()
{
    var phone = $('#phone').val();
    var reg = /^1(3|4|5|7|8)\d{9}$/
    if(phone=='' || phone==undefined || phone==null){
        $('.phoneVer').addClass("Out");
        return false;
    }else{
        $('.phoneVer').removeClass("Out");
        if(!reg.test(phone)){
            $('#s_phone').html("<font color='red'>请准确填写手机号码</font>");
            return false;
        }else{
            $('#s_phone').html("");
            return true;
        }
    }
}

/*js验证 微信号*/
function wechatVerify()
{
    var wechat = $('#wechat').val();
    var reg = /^[a-zA-Z][0-9a-zA-Z_]{5,20}$/
    if(wechat=='' || wechat==undefined || wechat==null){
        $('.wechatVer').addClass("Out");
        return false;
    }else{
        $('.wechatVer').removeClass("Out");
        if(!reg.test(wechat)){
            $('#s_wechat').html("<font color='red'>请准确填写微信号</font>");
            return false;
        }else{
            $('#s_wechat').html("");
            return true;
        }
    }
}

/*js验证 qq号*/
function qqnumberVerify()
{
    var qqnumber = $('#qqnumber').val();
    var reg = /^\d{5,11}$/
    if(qqnumber=='' || qqnumber==undefined || qqnumber==null){
        $('.qqnumberVer').addClass("Out");
        return false;
    }else{
        $('.qqnumberVer').removeClass("Out");
        if(!reg.test(qqnumber)){
            $('#s_qqnumber').html("<font color='red'>请准确填写qq号码</font>");
            return false;
        }else{
            $('#s_qqnumber').html("");
            return true;
        }
    }
}

/*js验证 电子邮箱*/
function emailVerify()
{
    var email = $('#email').val();
    var reg = /^([0-9a-zA-Z_]+)@(qq|163|126|sina)\.(com|cn)$/
    if(email=='' || email==undefined || email==null){
        $('.emailVer').addClass("Out");
        return false;
    }else{
        $('.emailVer').removeClass("Out");
        if(!reg.test(email)){
            $('#s_email').html("<font color='red'>请准确填写邮箱地址</font>");
            return false;
        }else{
            $('#s_email').html("");
            return true;
        }
    }
}

/*js验证 拖拽上传图片*/
function size(){
    var size = $('.size').html();
    //alert(size)
    if(size == '' || size == undefined){
        return true;
    }else{
        alert('请拖拽上传图片');
        return false;
    }
}

/*js验证 产品类型*/
function proTypeVerify()
{
    var pro_type = $('.pro_type').html();
    if(pro_type=='' || pro_type==undefined || pro_type==null){
        $('#s_pro_type').html("<font color='red'>请选择专利的所属行业</font>");
        return false;
    }else{
        $('#s_pro_type').html("");
        return true;
    }
}

/*js验证 所属行业*/
function indVerify()
{
    var ind = $('.ind').html();
    if(ind=='' || ind==undefined || ind==null){
        $('#s_ind').html("<font color='red'>请选择专利的所属行业</font>");
        return false;
    }else{
        $('#s_ind').html("");
        return true;
    }
}
/*==============================js验证 联系方式 end=================================================*/

/*js验证 表单提交*/
$('#btn').click(function () {
    var val = $("input[name='Mold']:checked").val();
    var goods_name = $('#goods_name').val();
    var goods_knowledge = $('#goods_knowledge').val();
    var goods_term = $('#goods_term').val();
    var goods_content = $('#goods_content').val();
    var ind = $('.ind').html();
    var pro_type = $('.pro_type').html();
    var price_type = $("input[name='Price']:checked").val();
    var goods_price = $('#goods_price').val();
    var goods_price_one = $('#goods_price_one').val();

    var phone = $('#phone').val();
    var wechat = $('#wechat').val();
    var qqnumber = $('#qqnumber').val();
    var email = $('#email').val();

    if(goodsTypeVerify() & goodsNameVerify() & goodsKnowledgeVerify() & goodsTermVerify() & goodsContentVerify() & goodsPriceVerify() & phoneVerify() & wechatVerify() & qqnumberVerify() & emailVerify() & size() & proTypeVerify() & indVerify()){

        var fd = new FormData();
        //fd.append("upload", 1);
        fd.append("auc_type", val);
        fd.append("auc_name", goods_name);
        fd.append("auc_number", goods_knowledge);
        fd.append("auc_term", goods_term);
        fd.append("auc_content", goods_content);
        fd.append("auc_product_type", pro_type);
        fd.append("auc_industry", ind);
        fd.append("auc_price_type", price_type);
        fd.append("goods_price", goods_price);
        fd.append("goods_price_one", goods_price_one);


        fd.append("auc_phone", phone);
        fd.append("auc_wechat", wechat);
        fd.append("auc_qqnumber", qqnumber);
        fd.append("auc_email", email);

        fd.append("upfile",  resultfile);
        fd.append("protectphoto", protectphoto);
        $.ajax({
            url: "/paido",
            type: "POST",
            processData: false,
            contentType: false,
            data: fd ,
            success : function(msg){
                if(msg){
                    console.log(msg)
                }
            }
        });

    }else{
        return false;
    }
});