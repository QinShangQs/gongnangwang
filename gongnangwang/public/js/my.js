/*    var Gid  = document.getElementById ;
 var showArea = function(){
 Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
 Gid('s_city').value + " - 县/区" +
 Gid('s_county').value + "</h3>"
 }
 Gid('s_county').setAttribute('onchange','showArea()');*/
//选择图片显示到页面上
var imgurl = "";
function getPhoto(node) {
    var type = $('#file').val();
    var pos = type.indexOf(".");
    var format = type.substring(pos+1);
    if(format!='jpg' && format!='gif' && format!='png' && format!='JPG' && format!='GIF' && format!='PNG'){
        alert('请选择正确的图片文件')
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

var ImgState = false;
function creatImg(imgRUL){
    var textHtml = "<img src='"+imgRUL+"'width='414px' height='600px'/>";
    $(".ge_pic_icon_Infor").html(textHtml);
    ImgState = true;
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

function creatVideo(videourl){
    var textHtml = '<video src="'+videourl+'" controls style="width:740px; height:550px" poster="" data-setup="'+{}+'"></video>';
    $("#videoShow").html(textHtml);
}

var state = false;
function uploadVideo()
{
    var textHtml = $('#example_video1').attr("name");
    if(textHtml=="moren"){
        alert('请选择视频上传');
        return false;
    }else{
        $('#upload').html("上传中...")
        $('#upload').removeAttr('onclick');
        var fd = new FormData();
        fd.append("upfile", $("#uploadVideo").get(0).files[0]);
        $.ajax({
            url: "/myVideoUpload",
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
        $('#nickname').removeClass("Out");
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
        $('#nickname').addClass("Out");
        result = false;
    }
    return result;
}

//年龄区间为空验证
function checkAge(){
    var s_age = $('#s_age').val();
    if(s_age=="0"){
        $('#s_age').addClass("Out");
        return false;
    }else{
        $('#s_age').removeClass("Out");
        return true;
    }
}

//用户身份为空验证
function checkIdentity(){
    var s_identity = $('#s_identity').val();
    if(s_identity=="0"){
        $('#s_identity').addClass("Out");
        return false;
    }else{
        $('#s_identity').removeClass("Out");
        return true;
    }
}

//公司名称验证非空
function companyVerify() {
    var company = $('#company').val();
    if(company=='' || company==undefined || company==null){
        $('#company').addClass("Out");
        return false;
    }else{
        $('#company').removeClass("Out");
        return true;
    }
}

//岗位验证非空
function postsVerify() {
    var posts = $('#posts').val();
    if(posts=='' || posts==undefined || posts==null){
        $('#posts').addClass("Out");
        return false;
    }else{
        $('#posts').removeClass("Out");
        return true;
    }
}

//个人宣言为空验证
function xuanyan(){
    var sign = $("#sign").val();

    if(sign){
        $("#sign").removeClass("Out");
        return true;
    }else{
        $("#sign").addClass("Out");
        return false;
    }
}

//省份为空验证
function checkProvince(){
    var s_province = $("#s_province").val();

    if(s_province=="省份"){
        $('#s_province').addClass("Out");
        return false;
    }else{
        $('#s_province').removeClass("Out");
        return true;
    }
}

//市为空验证
function checkCity(){
    var s_city = $("#s_city").val();

    if(s_city=="地级市"){
    	 $("#s_city").addClass("Out");5
        return false;
    }else{
    	 $("#s_city").removeClass("Out");
        return true;
    }
}

//县为空验证
function checkCounty(){
    var s_county = $("#s_county").val();

    if(s_county=="市、县级市"){
    	$("#s_county").addClass("Out");
        return false;
    }else{
    	$("#s_county").removeClass("Out");
        return true;
    }
}

//工作年限为空验证
function checkWorkingLife(){
    var working_life = $('#working_life').val();

    if(working_life=="0"){
    	$('#working_life').addClass("Out");
        return false;
    }else{
    	$('#working_life').removeClass("Out");
        return true;
    }
}

//提交
function mySubmit(){
    if(!$("#person_photo").val()){
        alert('请上传个人照片');
        return false;
    }else if(!$("#person_video").val()){
        alert('请上传个人视频');
        return false;
    }else{
        if(nicknameVerify() & xuanyan() & checkAge() & checkIdentity() & companyVerify() & postsVerify() & checkWorkingLife() & checkProvince() & checkCity() & checkCounty()){
            return true;
        }else{
            return false;
        }
    }
}