/*=========================合伙人招聘START======================== */
/*=======================上传框选择START====================== */
$('#logoChange').change(function(){
    //项目logo
    var logo = $('#par_logo').val();
    $('.slogo').removeClass('Out');
    document.getElementById("logo_name").value = logo;
})

//征集标题验证
function titleVerify()
{
    var par_title = $('#par_title').val();
    var reg = /^([\u4e00-\u9fa5]|[a-z]|[A-Z][0-9]|[,]|[，]|[！]|[!]|[、]|[。]|[.]|[？]|[?]){1,25}$/;
    if(par_title){
        $('.title').removeClass("Out");
        if(!reg.test(par_title)){
            $('.s_title').html("<font color='#ff0000'>您最多输入20位的标题（特殊符号不可）</font>");
            return false;
        }else{
            $('.s_title').html("(20字内以内)");
            return true;
        }
    }else{
        $('.title').addClass("Out");
        return false;
    }
}
//项目名称验证
function projectNameVerify()
{
    var par_project = $('#par_project').val();
    var reg = /^([a-zA-Z\u4e00-\u9fa5]){1,10}$/
    if(par_project){
        if(!reg.test(par_project)){
            $('.project').addClass("Out");
            return false;
        }else{
            $('.project').removeClass("Out");
            return true;
        }
    }else{
        $('.project').addClass("Out");
        return false;
    }
}
//项目官方验证
function projectWebVerify()
{
    var par_website = $('#par_website').val();
    var reg = /^([a-zA-Z]+\.)([0-9a-zA-Z]+\.)(com|cn)$/
    if(par_website){
        $('.website').removeClass("Out");
        if(!reg.test(par_website)){
            $('#s_website').html("<font color='#ff0000'>请输入正确的网址</font>")
            return false;
        }else{
            $('#s_website').html("")
            return true;
        }
    }else{
        $('.website').addClass("Out");
        return false;
    }
}
//项目类型验证
function projectTypeVerify()
{
    var val = $("input[name='par_protype']:checked").val();
    if(val=='' || val==undefined || val==null){
        // alert("您还没选择项目类型");
        $('.protype').addClass('Out');
        return false;
    }else{
        $('.protype').removeClass('Out');
        return true;
    }
}
//项目logo验证
function projectLogoVerify()
{
    var logo_name = $('#logo_name').val();
    var pos = logo_name.indexOf(".");
    var format = logo_name.substring(pos+1);
    if(logo_name=='' || logo_name==undefined || logo_name==null){
        $('.slogo').addClass('Out');
        return false;
    }else{
        $('.slogo').removeClass('Out');
        if(format!='png' && format!='jpg' && format!='gif' && format!='JPG'){
            $('#s_logo').html('<font color="red">请选择正确的图片文件</font>');
            return false;
        }else {
            $('#s_logo').html('');
            return true;
        }
    }
}
function projectTeamVerify()
{
    var teamnum = $('#pro_team').val();
    if(teamnum==0){
        $('.team').addClass("Out");
        return false;
    }else{
        $('.team').removeClass("Out");
        return true;
    }
}

//省份为空验证
function s_province(){
    var s_province = $("#s_province").val();
    if(s_province=="省份"){
        $('.province').addClass("Out");
        return false;
    }else{
        $('.province').removeClass("Out");
        return true;
    }
}

//市为空验证
function s_city(){
    var s_city = $("#s_city").val();

    if(s_city=="地级市"){
        $('.city').addClass("Out");
        return false;
    }else{
        $('.city').removeClass("Out");
        return true;
    }
}

//县为空验证
function s_county(){
    var s_county = $("#s_county").val();

    if(s_county=="市、县级市"){
        $('.county').addClass("Out");
        return false;
    }else{
        $('.county').removeClass("Out");
        return true;
    }
}

function tradingVerify(){
    var val = $("input[name='trading']:checked").val();
    if(val=='' || val==undefined || val==null){
        // alert("您还没选择项目类型");
        $('.trading').addClass('Out');
        return false;
    }else{
        $('.trading').removeClass('Out');
        return true;
    }
}


var videourl = "";
function getVideo(node) {
    var type = $('#file').val();
    var pos = type.indexOf(".");
    var format = type.substring(pos+1);
    if(format!='mp4'){
        alert('请选择正确的视频文件')
    }else{
        var videourl = "";
        try{
            var file = null;
            if(node.files && node.files[0] ){
                file = node.files[0];
            }else if(node.files && node.files.item(0)) {
                file = node.files.item(0);
            }
            try{
                videourl =  file.getAsDataURL();
            }catch(e){
                videourl = window.URL.createObjectURL(file);
            }
        }catch(e){
            if (node.files && node.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    videourl = e.target.result;
                };

                reader.readAsDataURL(node.files[0]);
            }
        }

        creatVideo(videourl);
        return videourl;
    }
}
var state = true;
function creatVideo(videourl){
    var textHtml = '<video src="'+videourl+'" id="current" controls style="width:300px; height:200px" poster="" data-setup="'+{}+'"></video>';
    $(".business_model_video").html(textHtml);
    state = false;
}


function uploadVideo()
{
    var current = $('#current').attr('src');

    if(current=="" || current==undefined || current==null){
        //视频没变动
        alert('并未修改视频');
        state = true;
    }else{
        $('#upload').html("上传中...")
        $('#upload').removeAttr('onclick');
        var fd = new FormData();
        fd.append("upfile", $("#file").get(0).files[0]);
        $.ajax({
            url: "/renUploadUpdate",
            type: "POST",
            processData: false,
            contentType: false,
            data: fd ,
            success : function(msg){
                if(msg==1){
                    $('#upload').html("已完成")
                    alert('视频上传完成')
                    state = true;
                }else{
                    state = false;
                }
            }
        });
    }
}

//form 提交验证
function mySubmit(){
    if(state == true){
        if(titleVerify() & projectNameVerify() & projectWebVerify() & projectTypeVerify() & projectLogoVerify() & projectTeamVerify() & tradingVerify() & s_province() & s_city() & s_county()){
            return true;
        }else{
            return false;
        }
    }else{
        alert('请您先完成视频上传')
        return false;
    }
}
/*=========================合伙人招聘END========================= */