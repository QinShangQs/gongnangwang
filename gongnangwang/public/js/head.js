$(document).ready(function(){

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


    var temp = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));
    //alert(window.location.pathname);
    //return false;

    if(window.location.pathname=='/chou' || window.location.pathname=='/chouadd' || window.location.pathname=='/chouedit' || temp=='/chou_m'){
        $('.a1').addClass('active_a');
    }

    if(window.location.pathname=='/ren' || window.location.pathname=='/renadd' || temp=='/ren_m' || window.location.pathname=='/renedit' || window.location.pathname=='/pinadd' || window.location.pathname=='/ren_s' || window.location.pathname=='/ren_p' || window.location.pathname=='/position_edit' ){
        $('.a2').addClass('active_a');
    }

    if(window.location.pathname=='/dong'){
        $('.a3').addClass('active_a');
    }

})



