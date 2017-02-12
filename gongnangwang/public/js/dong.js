$(function(){
        $('#editor_Mold').summernote();
        $('#datetimepicker1').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });
        $('#datetimepicker2').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });
        $('#datetimepicker3').datetimepicker({
            timepicker:false,
            format:'Y/m/d',
            formatDate:'Y/m/d',
            minDate:'-1970/01/02', 
            maxDate:'+2020/01/02' 
        });
        $('#datetimepicker4').datetimepicker({
            timepicker:false,
            format:'Y/m/d',
            formatDate:'Y/m/d',
            minDate:'-1970/01/02',
            maxDate:'+2020/01/02' 
        });
    })  


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

/*拖拽式上传文件（图片）*/

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

/*活动分类隐藏显示*/
$("#activityClass").click(function(){
    $('.stretch_list').toggle();
});
$(document).bind("click",function(e){
    var target  = $(e.target);
    if(target.closest(".stretch_list,#activityClass").length == 0){
        $(".stretch_list").hide();
    };
    e.stopPropagation();
})

$('.category li').click(function(){
    var num=$('#chance').children('span').length;
    if(num<1){
        var id=$(this).index();
        var name = $(this).find($("a")).html()
        $('#chance').append('<span class="list_active" id="'+id+'">'+name+'</span>')
    }else{
        alert('您只能选择一个标签')
    }
});

$(document).on("click","#chance span",function(){
    $('#chance span').remove();
});

$('.activityFormat li').click(function(){
    var num=$('#chance').children('font').length;
    if(num<1){
        var id=$(this).index();
        var name = $(this).find($("a")).html()
        $('#chance').append('<font class="list_active" id="'+id+'">'+name+'</font>')
    }else{
        alert('您只能选择一个活动形式标签')
    }
});
$(document).on("click","#chance font",function(){
    $('#chance font').remove();
});


/*添加标签*/
$("#addSign").click(function(){
    $('.add_list').toggle();
});
$(document).bind("click",function(e){
        var target  = $(e.target);
        if(target.closest(".add_list,#addSign").length == 0){
            $(".add_list").hide();
        };
        e.stopPropagation();
});

$('.activitySign li').click(function () {
    var num=$('#signContent').children('span').length;
    if(num<5){
        var id=$(this).index();
        var name = $(this).find($("a")).html();
        var con = $('#signContent').html();
        if((con.indexOf('<span class="list_active signs" name="tag[]" id="'+id+'">'+name+'</span>'))!=-1){
            return;
        }else{
            $('#signContent').append('<span class="list_active signs" name="tag[]" id="'+id+'">'+name+'</span>')
        }
    }else{
        alert('您最多添加5个标签')
    }
})

$(document).on("click","#signContent span",function(){
    var id=$(this).attr('id');
    $('#signContent span[id='+id+']').remove();
});

/*活动名称js验证*/
function activityNameVerify()
{
    var activityName = $('#act_name').val();
    var reg = /^([a-zA-Z\u4e00-\u9fa5]){5,16}$/
    if(activityName){
        $('.activityName').removeClass("Out");
        if(!reg.test(activityName)){
            $('#s_act_name').html("<font color='red'>请输入5-16位字母或汉字的格式</font>");
            return false;
        }else{
            $('#s_act_name').html("");
            return true;
        }
    }else{
        $('.activityName').addClass("Out");
        return false;
    }
}

/*省份为空验证*/
function s_province()
{
    var s_province = $("#s_province").val();
    if(s_province=="省份"){
        $('.province').addClass("Out");
        return false;
    }else{
        $('.province').removeClass("Out");
        return true;
    }
}

/*市为空验证*/
function s_city()
{
    var s_city = $("#s_city").val();

    if(s_city=="地级市"){
        $('.city').addClass("Out");
        return false;
    }else{
        $('.city').removeClass("Out");
        return true;
    }
}

/*县为空验证*/
function s_county()
{
    var s_county = $("#s_county").val();

    if(s_county=="市、县级市"){
        $('.county').addClass("Out");
        return false;
    }else{
        $('.county').removeClass("Out");
        return true;
    }
}

/*活动人数js验证*/
function peoNumVerify()
{
    var act_peo_name = $('#act_peo_name').val();
    var reg = /^([0-9\u4e00-\u9fa5]){3,9}$/
    if(act_peo_name){
        $('.act_peo_name').removeClass("Out");
        if(!reg.test(act_peo_name)){
            $('#s_act_peo_name').html("<font color='red'>请输入5-16位字母或汉字的格式</font>");
            return false;
        }else{
            $('#s_act_peo_name').html("");
            return true;
        }
    }else{
        $('.act_peo_name').addClass("Out");
        return false;
    }
}

function contentVerify()
{
    var act_content =$(".note-editable").html()
    if(act_content=="<p><br></p>" || act_content=='' || act_content==undefined || act_content==null){
        $('.note-editable').addClass("Out");
        return false;
    }else{
        $('.note-editable').removeClass("Out");
        return true;
    }
}

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

/*ajax提交表单*/
$('#aaa').click(function(){
    var act_name = $('#act_name').val();
    var province = $("#s_province").val();
    var city = $("#s_city").val();
    var county = $("#s_county").val();
    var act_peo_num = $('#act_peo_name').val();
    //获取时间的值
    var start_date = $('#datetimepicker3').val();
    var start_time = $('#datetimepicker1').val();
    var end_date   = $('#datetimepicker4').val();
    var end_time   = $('#datetimepicker2').val();
    //获取标签的值
    var act_class  = $('#chance span').html();
    var act_format = $('#chance font').html();

    var str=""
    $("#signContent span").each(function() {
        str += $(this).html()+","
    });
    str = str.substr(0,str.length-1);

    //获取内容
    var act_content =$(".note-editable").html()

    if(activityNameVerify() & s_province() & s_city() & s_county() & peoNumVerify() & size() & contentVerify()){
        var fd = new FormData();
        fd.append("upload", 1);
        fd.append("act_name", act_name);
        fd.append("s_province", province);
        fd.append("s_city", city);
        fd.append("s_county", county);
        fd.append("act_peo_num", act_peo_num);
        fd.append("act_content", act_content);
        fd.append("start_date", start_date);
        fd.append("start_time", start_time);
        fd.append("end_date", end_date);
        fd.append("end_time", end_time);
        fd.append("act_class", act_class);
        fd.append("act_format", act_format);
        fd.append("sign_content", str);
        fd.append("upfile", $("#upfile").get(0).files[0] || resultfile);
        $.ajax({
            url: "/dongdo",
            type: "POST",
            processData: false,
            contentType: false,
            data: fd ,
            success : function(msg){
                if(msg){
                    alert("添加活动成功啦！！！")
                }
            }
        });

    }else{
        return false;
    }
});