/*=========================职位招聘START========================= */

    var ok1=false;var ok2=false;var ok3=false;var ok4=false;var ok5=false;var ok6=false;var ok7=false;var ok8=false;var ok9=false;
    //合伙人/工作岗位

    function par_positionVerify()
    {
        var reg = /^([0-9a-zA-Z_\u4e00-\u9fa5]){1,8}$/;
        var par_position = $('#par_position').val();
        if(par_position == '' || par_position == undefined || par_position == null){
            $('.position').addClass('Out');
            return false;
        }else{
            if(!reg.test(par_position)){
                $('#s_position').html("<font color='red'>请输入8位以下的职位名称</font>");
                return false;
            }else{
                $('#s_position').html("");
                $('.position').removeClass('Out');
                return true;
            }
        }
    }

    //工作经验
    function par_workVerify()
    {
        var par_work = $('#par_work').val();
        if(par_work==0)
        {
            $('.work').addClass('Out');
            return false;
        }else{
            $('.work').removeClass('Out');
            return true;
        }
    }


    //学历要求
    function par_educationVerify()
    {
        var par_education = $("#par_education").val();
        if(par_education==0)
        {
            $('.education').addClass('Out');
            return false;
        }else{
            $('.education').removeClass('Out');
            return true;
        }
    }


    //年龄要求
    function par_ageVerify()
    {
        var par_age = $("#par_age").val();
        if(par_age==0)
        {
            $('.age').addClass('Out');
            return false;
        }else{
            $('.age').removeClass('Out');
            return true;
        }
    }

    function par_dutyVerify()
    {
        var par_duty = $('#par_duty').val();
        if(par_duty== '' || par_duty == undefined || par_duty == null){
            $('.duty').addClass('Out');
            return false;
        }else{
            $('.duty').removeClass('Out');
            return true;
        }
    }

    function par_askVerify()
    {
        var par_ask = $('#par_ask').val();
        if(par_ask== '' || par_ask == undefined || par_ask == null){
            $('.ask').addClass('Out');
            return false;
        }else{
            $('.ask').removeClass('Out');
            return true;
        }
    }

function mySubmit(){
    if(par_positionVerify() & par_workVerify() & par_educationVerify() & par_ageVerify() & par_dutyVerify() & par_askVerify()){
        var par_position = $('#par_position').val()
        var par_work = $('#par_work').val()
        var par_education = $('#par_education').val()
        var par_age = $('#par_age').val()
        var par_duty = $('#par_duty').val();
        var par_ask = $('#par_ask').val();
        var par_mode = $("input[name='par_mode']:checked").val();
        var par_pay_type = $("input[name='par_pay_type']:checked").val();
        if(par_pay_type == 1){
            var par_mon = $('#par_mon').val()
            if(par_mon== '' || par_mon == undefined || par_mon == null){
                $('.mon').addClass('Out');
                ok5 =  false;
            }else{
                $('.mon').removeClass('Out');
                ok5 =  true;
            }
        }else{
            var par_ann = $('#par_ann').val();
            if(par_ann== '' || par_ann == undefined || par_ann == null){
                $('.ann').addClass('Out');
                ok6 =  false;
            }else{
                $('.ann').removeClass('Out');
                ok6 =  true;
            }
        }
        var par_return_type = $("input[name='par_return_type']:checked").val();
        if(par_return_type == 1){
            $('.other').removeClass('Out');
            var par_shares = $('#par_shares').val()
            if(par_shares== '' || par_shares == undefined || par_shares == null){
                $('.shares').addClass('Out');
                ok7 =  false;
            }else{
                $('.shares').removeClass('Out');
                ok7 =  true;
            }
        }else{
            $('.shares').removeClass('Out');
            var par_other = $('#par_other').val()
            if(par_other== '' || par_other == undefined || par_other == null){
                $('.other').addClass('Out');
                ok8 =  false;
            }else{
                $('.other').removeClass('Out');
                ok8 =  true;
            }
        }
        if((ok5 || ok6) & (ok7 || ok8)){
            $.ajax({
                type: "POST",
                url: "/pindo",
                data: "par_position="+par_position+"&par_work="+par_work+"&par_education="+par_education+"&par_age="+par_age+"&par_duty="+par_duty+"&par_pay_type="+par_pay_type+"&par_mode="+par_mode+"&par_mon="+par_mon+"&par_ann="+par_ann+"&par_return_type="+par_return_type+"&par_shares="+par_shares+"&par_other="+par_other+"&par_ask="+par_ask,
                success: function(msg){
                    if(msg){
                        alert('添加职位成功');
                        location.href='/pinadd';
                    }else{
                        alert('添加职位失败');
                    }
                }
            });
        }
    }
}

/*=========================职位招聘招聘END========================= */