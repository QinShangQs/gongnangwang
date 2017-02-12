/*    var Gid  = document.getElementById ;
 var showArea = function(){
 Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
 Gid('s_city').value + " - 县/区" +
 Gid('s_county').value + "</h3>"
 }
 Gid('s_county').setAttribute('onchange','showArea()');*/
//选择图片显示到页面上
var imgurl = "";
var imgState = true;
function getPhoto(node) {
    var type = $('#file').val();
    var pos = type.indexOf(".");
    var format = type.substring(pos+1);
    if(format!='jpg' && format!='gif' && format!='png' && format!='JPG' && format!='GIF' && format!='PNG'){
        alert('请选择正确的图片文件');
        imgState = false;
    }else{
        var imgURL = "";
        try{
            var file = null;
            if(node.files && node.files[0] ){
                file = node.files[0];
            }else if(node.files && node.files.item(0)) {
                file = node.files.item(0);
            }
            try{
                imgURL =  file.getAsDataURL();
            }catch(e){
                imgRUL = window.URL.createObjectURL(file);
            }
        }catch(e){
            if (node.files && node.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    imgURL = e.target.result;
                };
                reader.readAsDataURL(node.files[0]);
            }
        }
        creatImg(imgRUL);
        return imgURL;
    }
}

function creatImg(imgRUL){
    var textHtml = "<img src='"+imgRUL+"'width='414px' height='600px'/>";
    $(".ge_pic_icon_Infor").html(textHtml);
    imgState = true;
}


//视频上传
var videourl = "";
function getVideo(node) {
    var type = $('#uploadVideo').val();
    var pos = type.indexOf(".");
    var format = type.substring(pos+1);
    if(format!='mp4' && format!='MP4'){
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
    var textHtml = '<video src="'+videourl+'" controls style="width:740px; height:550px" poster="" data-setup="'+{}+'"></video>';
    $("#videoShow").html(textHtml);
    state = false;
}


function uploadVideo()
{
    var textHtml = $('#example_video1').attr("name");
    if(textHtml=="moren"){
        alert('您并未上传新的视频');
        state = true;
    }else{
        $('#upload').html("上传中...")
        $('#upload').removeAttr('onclick');
        var fd = new FormData();
        fd.append("upfile", $("#uploadVideo").get(0).files[0]);
        $.ajax({
            url: "/myVideoUpdate",
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


var result = false;
//昵称唯一性验证
function nicknameVerify(){
    var nickname = $("#nickname").val();
    if(nickname){
        $('.nick').removeClass("Out");
        $.get("/nicknameVerify", { nickname: nickname },
            function(data){
                if(data==0){
                    $('.s_nickname').html('该昵称已存在');
                    result = false;
                }else{
                    $('.s_nickname').html('');
                    result = true;
                }
            });
    }else{
        $('.nick').addClass("Out");
        result = false;
    }
    return result;
}

//年龄区间为空验证
function s_age(){
    var s_age = $('#s_age').val();
    if(s_age=="0"){
        $('.age').addClass("Out");
        return false;
    }else{
        $('.age').removeClass("Out");
        return true;
    }
}

//用户身份为空验证
function s_identity(){
    var s_identity = $('#s_identity').val();
    if(s_identity=="0"){
        $('.identity').addClass("Out");
        return false;
    }else{
        $('.identity').removeClass("Out");
        return true;
    }
}

//公司名称验证非空
function companyVerify() {
    var company = $('#company').val();
    if(company=='' || company==undefined || company==null){
        $('.company').addClass("Out");
        return false;
    }else{
        $('.company').removeClass("Out");
        return true;
    }
}

//岗位验证非空
function postsVerify() {
    var posts = $('#posts').val();
    if(posts=='' || posts==undefined || posts==null){
        $('.posts').addClass("Out");
        return false;
    }else{
        $('.posts').removeClass("Out");
        return true;
    }
}

//个人宣言为空验证
function sign(){
    var sign = $("#sign").val();

    if(sign){
        $('.signup').removeClass("Out");
        return true;
    }else{
        $('.signup').addClass("Out");
        return false;
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
        $('.city').addClass("Out");5
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

//工作年限为空验证
function working_life(){
    var working_life = $('#working_life').val();

    if(working_life=="0"){
        $('.worklife').addClass("Out");
        return false;
    }else{
        $('.worklife').removeClass("Out");
        return true;
    }
}

//提交
function mySubmit(){
   if(state == false){
        alert('请您先完成视频上传');
        return false;
    }else{
       if(imgState == false){
           alert('请您上传正确格式的图片');
           return false;
       }else{
           if(nicknameVerify() & sign() & s_age() & s_identity() & companyVerify() & postsVerify() & working_life() & s_province() & s_city() & s_county()){
               return true;
           }else{
               return false;
           }
       }

    }
}