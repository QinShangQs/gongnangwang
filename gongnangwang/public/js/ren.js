/*=========================合伙人招聘START======================== */
//征集标题验证
function titleVerify()
{
    var par_title = $('#par_title').val();
    var reg = /^[\u4e00-\u9fa5a-zA-Z0-9]{1,20}$/;
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
    var reg = /^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/;
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
    var logo_name = $('#par_logo').val();
    if(logo_name=='' || logo_name==undefined || logo_name==null){
        $('#container').addClass('Out');
        return false;
    }else{
        $('#container').removeClass('Out');
        return true;
    }
}
//项目logo验证
function projectVideoVerify()
{
    var logo_name = $('#par_video').val();
    if(logo_name=='' || logo_name==undefined || logo_name==null){
        $('#container3').addClass('Out');
        return false;
    }else{
        $('#container3').removeClass('Out');
        return true;
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

//form 提交验证
function mySubmit(){
	if(titleVerify() & projectNameVerify() & projectWebVerify() & projectVideoVerify()
			& projectTypeVerify() & projectLogoVerify() & projectTeamVerify() 
			& tradingVerify() & s_province() & s_city() & s_county()){
		return true;
	}
	return false;
}
/*=========================合伙人招聘END========================= */