/*========================上一页START======================== */
$('#lastFirst').click(
		function() {
			var index = $(".chou_nav_ul li").eq(0).addClass("active")
					.siblings().removeClass("active");
			$(".content").eq(0).css("display", "block").siblings().css(
					"display", "none");
		});
$('#lastSecond').click(
		function() {
			var index = $(".chou_nav_ul li").eq(1).addClass("active")
					.siblings().removeClass("active");
			$(".content").eq(1).css("display", "block").siblings().css(
					"display", "none");
		});
$('#lastThird').click(
		function() {
			var index = $(".chou_nav_ul li").eq(2).addClass("active")
					.siblings().removeClass("active");
			$(".content").eq(2).css("display", "block").siblings().css(
					"display", "none");
		});
/* =============================上一页END======================== */
/* =======================上传框选择START====================== */
$('#proLogoChange').change(function() {
	// 项目logo
	var logo = $('#pro_logo').val();
	$('.s_logo').removeClass('Out');
	document.getElementById("logo").value = logo;
});

$('#proPictureChange').change(function() {
	// 项目pic
	var pic = $('#pro_picture').val();
	// parent.document.form1.pic.value= pic;
	$('.s_pic').removeClass('Out');
	document.getElementById("pic").value = pic;
});
/* =========================上传框选择END======================= */

/* =====================项目资料js验证 START===================== */
// 项目名称验证
function projectName() {
	var projectName = $('#pro_name').val();
	var reg = /^([0-9a-zA-Z_\u4e00-\u9fa5]){1,10}$/;
	if (projectName) {
		$('.projectName').removeClass("Out");
		if (!reg.test(projectName)) {
			$('#s_pro_name').html(
					"<font color='red'>请输入至少一位字母或汉字格式的项目名称</font>");
			return false;
		} else {
			$('#s_pro_name').html("");
			return true;
		}
	} else {
		$('.projectName').addClass("Out");
		return false;
	}
}
// logo
function projectLogo() {
	var logo = $('#pro_logo').val();
	var pos = logo.indexOf(".");
	var format = logo.substring(pos + 1);
	if (logo == '' || logo == undefined || logo == null) {
		$('#container').addClass('Out');
		return false;
	} else {
		$('#container').removeClass('Out');
		return true;
	}
}
// 项目资料介绍验证
function projectContent() {
	var projectContent = $('#projectContent').val();
	var reg = /^([0-9a-zA-Z_\u4e00-\u9fa5]){0,20}$/
	if (projectContent) {
		$('.projectContent').removeClass("Out");
		if (!reg.test(projectContent)) {
			$('#s_pro_content').html("<font color='red'>请输入20位以内的纯文字内容</font>");
			return false;
		} else {
			$('#s_pro_content').html("");
			return true;
		}
	} else {
		$('.projectContent').addClass("Out");
		return false;
	}
}

// 省份为空验证
function s_province() {
	var s_province = $("#s_province").val();
	if (s_province == "省份") {
		$('.province').addClass("Out");
		return false;
	} else {
		$('.province').removeClass("Out");
		return true;
	}
}

// 市为空验证
function s_city() {
	var s_city = $("#s_city").val();

	if (s_city == "地级市") {
		$('.city').addClass("Out");
		return false;
	} else {
		$('.city').removeClass("Out");
		return true;
	}
}

// 县为空验证
function s_county() {
	var s_county = $("#s_county").val();

	if (s_county == "市、县级市") {
		$('.county').addClass("Out");
		return false;
	} else {
		$('.county').removeClass("Out");
		return true;
	}
}

// 项目状态为空验证
function projectState() {
	var projectState = $('#pro_state').val();
	if (projectState == 0) {
		$('.state').addClass("Out");
		return false;
	} else {
		$('.state').removeClass("Out");
		return true;
	}
}

// 项目阶段为空验证
function projectStage() {
	var projectStage = $('#pro_stage').val();
	if (projectStage == '0') {
		$('.stage').addClass("Out");
		return false;
	} else {
		$('.stage').removeClass("Out");
		return true;
	}
}

// 项目估值验证
function projectValuation() {
	var projectValuation = $('#pro_valuation').val();
	var projectState = $('#pro_state').val();
	var pos = projectValuation.substr(0, 1);
	var reg = /^([0-9]){0,}$/
	if (projectValuation) {
		$('.valuation').removeClass("Out");
		if (!reg.test(projectValuation) || pos == 0) {
			alert('请填写正确的数字信息');
			return false;
		} else {
			if (projectState == 1 && projectValuation > 5000) {
				alert('未上线的项目估值不得超过5000万');
				return false;
			} else {
				return true;
			}
		}
	} else {
		$('.valuation').addClass("Out");
		return false;
	}
}

// 项目回报验证
function projectReturn() {
	var projectReturn = $('#pro_return').val();
	var reg = /^([0-9]){0,}$/;
	if (projectReturn) {
		$('.return').removeClass("Out");
		if (!reg.test(projectReturn)) {
			alert('请填写正确的数字信息');
			return false;
		} else {
			if (projectReturn < 5 || projectReturn > 30) {
				alert('请输入5%-30%的数值');
				$('.returnp').html("<font color='red'>请输入5%-30%的数值</font>")
				return false;
			} else {
				return true;
			}
		}
	} else {
		$('.return').addClass("Out");
		return false;
	}
}

// 项目众筹为空验证
function projectTarget() {
	var projectTarget = $('#target').val();
	var reg = /^([0-9]){0,}$/;
	var pos = projectTarget.substr(0, 1);
	if (projectTarget) {
		$('.target').removeClass("Out");
		if (!reg.test(projectTarget) || pos == 0) {
			alert('请填写正确的数字信息');
			return false;
		} else {
			return true;
		}
	} else {
		$('.target').addClass("Out");
		return false;
	}
}

// 项目分类为空验证
function projectType() {
	var projectType = $('#pro_type').val();
	if (projectType == '0') {
		$('.type').addClass("Out");
		return false;
	} else {
		$('.type').removeClass("Out");
		return true;
	}
}

// pic
function projectPic() {
	var pic = $('#pro_picture').val();
	if (pic == '' || pic == undefined || pic == null) {
		$('#container2').addClass('Out');
		return false;
	} else {
		$('#container2').removeClass('Out');
		return true;
	}
}

// 融资顾问为空验证
function projectAdvisor() {
	var projectAdvisor = $('#pro_advisor').val();
	if (projectAdvisor) {
		$('.advisor').removeClass("Out");
		return true;
	} else {
		$('.advisor').addClass("Out");
		return false;
	}
}

// 融资顾问编号为空验证
function projectAdvisornum() {
	var projectAdvisornum = $('#pro_advisornum').val();
	if (projectAdvisornum) {
		$('.advisornum').removeClass("Out");
		return true;
	} else {
		$('.advisornum').addClass("Out");
		return false;
	}
}
// 表单提交
function form1_sub() {
	if (projectName() & projectLogo() & projectContent() & s_province()
			& s_city() & s_county() & projectState() & projectStage()
			& projectValuation() & projectReturn() & projectTarget()
			& projectType() & projectPic() & projectAdvisor()
			& projectAdvisornum()) {
		var index = $(".chou_nav_ul li").eq(1).addClass("active").siblings()
				.removeClass("active");
		$(".content").eq(1).css("display", "block").siblings().css("display",
				"none");
		return true;
	} else {
		return false;
	}
}
/* =====================项目资料js验证 END===================== */

/* =================商业模式js验证 START=================== */
// 商业模式（视频）
var videourl = "";
function busVideo(node) {
	var type = $('#bus_video').val();
	var pos = type.indexOf(".");
	var format = type.substring(pos + 1);
	if (format != 'mp4') {
		alert('请选择正确的视频文件')
	} else {
		var videourl = "";
		try {
			var file = null;
			if (node.files && node.files[0]) {
				file = node.files[0];
			} else if (node.files && node.files.item(0)) {
				file = node.files.item(0);
			}
			try {
				videourl = file.getAsDataURL();
			} catch (e) {
				videourl = window.URL.createObjectURL(file);
			}
		} catch (e) {
			if (node.files && node.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					videourl = e.target.result;
				};

				reader.readAsDataURL(node.files[0]);
			}
		}
		creatVideo1(videourl);
		return videourl;
	}
}

function creatVideo1(videourl) {
	var textHtml = '<video src="'
			+ videourl
			+ '" controls style="width:300px; height:200px" poster="" data-setup="'
			+ {} + '"></video>';
	$(".bus_v").html(textHtml);
}

var state = false;
function busVideoUpload() {
	var textHtml = $('.bus_v').html();
	if (textHtml == "" || textHtml == undefined || textHtml == null) {
		alert('请选择视频上传');
		return false;
	} else {
		$('#busButton').html("上传中...")
		$('#busButton').removeAttr('onclick');
		var fd = new FormData();
		fd.append("upfile", $("#bus_video").get(0).files[0]);
		$.ajax({
			url : "/busUpload",
			type : "POST",
			processData : false,
			contentType : false,
			data : fd,
			success : function(msg) {
				console.log(msg);
				if (msg == 1) {
					alert('视频上传完成')
					$('#busButton').html("已完成")
					state = true;
				} else {
					state = false;
				}
			}
		});
	}
}

// 用户数据
function s_bus_userdata() {
	var bus_userdata = $('#bus_userdata').val();
	if (bus_userdata == '' || bus_userdata == undefined || bus_userdata == null) {
		$('.bus_u').addClass('Out');
		return false;
	} else {
		$('.bus_u').removeClass('Out');
		return true;
	}
}
// 盈利数据
function s_bus_profit() {
	var bus_profit = $('#bus_profit').val();
	if (bus_profit == '' || bus_profit == undefined || bus_profit == null) {
		$('.bus_p').addClass('Out');
		return false;
	} else {
		$('.bus_p').removeClass('Out');
		return true;
	}
}
// 其他数据
function s_bus_other() {
	var bus_other = $('#bus_other').val();
	if (bus_other == '' || bus_other == undefined || bus_other == null) {
		$('.bus_o').addClass('Out');
		return false;
	} else {
		$('.bus_o').removeClass('Out');
		return true;
	}
}
// 运营时间
function s_bus_operate() {
	var bus_operate = $('#bus_operate').val();
	if (bus_operate == '' || bus_operate == undefined || bus_operate == null) {
		$('.bus_op').addClass('Out');
		return false;
	} else {
		$('.bus_op').removeClass('Out');
		return true;
	}
}

function form2_sub() {
	var name = $('#bus_video').val();
	if (name == '' || name == undefined || name == null) {
		alert('请先完成商务模式视频上传');		
		return false;
	} else {
		$(".content").eq(2).css("display", "block").siblings().css("display", "none");
		return true;
	}
}
/* =================商业模式js验证 END=================== */

/* =================项目团队js验证 START=================== */
// （项目团队）视频
var videourl = "";
function teaVideo(node) {
	var type = $('#tea_video').val();
	var pos = type.indexOf(".");
	var format = type.substring(pos + 1);
	if (format != 'mp4') {
		alert('请选择正确的视频文件')
	} else {
		var videourl = "";
		try {
			var file = null;
			if (node.files && node.files[0]) {
				file = node.files[0];
			} else if (node.files && node.files.item(0)) {
				file = node.files.item(0);
			}
			try {
				videourl = file.getAsDataURL();
			} catch (e) {
				videourl = window.URL.createObjectURL(file);
			}
		} catch (e) {
			if (node.files && node.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					videourl = e.target.result;
				};

				reader.readAsDataURL(node.files[0]);
			}
		}
		creatVideo2(videourl);
		return videourl;
	}
}

function creatVideo2(videourl) {
	var textHtml = '<video src="'
			+ videourl
			+ '" controls style="width:300px; height:200px" poster="" data-setup="'
			+ {} + '"></video>';
	$(".tea_v").html(textHtml);
}

var tea_state = false;
function teaVideoUpload() {
	var textHtml = $('.tea_v').html();
	if (textHtml == "" || textHtml == undefined || textHtml == null) {
		alert('请选择视频上传');
		return false;
	} else {
		$('#teaButton').html("上传中...")
		$('#teaButton').removeAttr('onclick');
		var fd = new FormData();
		fd.append("upfile", $("#tea_video").get(0).files[0]);
		$.ajax({
			url : "/teaUpload",
			type : "POST",
			processData : false,
			contentType : false,
			data : fd,
			success : function(msg) {
				console.log(msg)
				if (msg == 1) {
					$('#teaButton').html("已完成")
					alert('视频上传完成')
					tea_state = true;
				} else {
					tea_state = false;
				}
			}
		});
	}
}

// 核心团队
function s_tea_core() {
	var tea_core = $('#tea_core').val();
	if (tea_core == '' || tea_core == undefined || tea_core == null) {
		$('.tea_c').addClass('Out');
		return false;
	} else {
		$('.tea_c').removeClass('Out');
		return true;
	}
}
// 员工总人数
function s_tea_num() {
	var tea_num = $('#tea_num').val();
	if (tea_num == '' || tea_num == undefined || tea_num == null) {
		$('.tea_n').addClass('Out');
		return false;
	} else {
		$('.tea_n').removeClass('Out');
		return true;
	}
}
// 高级创业导师
function s_tea_tutor() {
	var tea_tutor = $('#tea_tutor').val();
	if (tea_tutor == '' || tea_tutor == undefined || tea_tutor == null) {
		$('.tea_t').addClass('Out');
		return false;
	} else {
		$('.tea_t').removeClass('Out');
		return true;
	}
}
// 高级创业导师
function s_tea_advise() {
	var tea_adviser = $('#tea_adviser').val();
	if (tea_adviser == '' || tea_adviser == undefined || tea_adviser == null) {
		$('.tea_a').addClass('Out');
		return false;
	} else {
		$('.tea_a').removeClass('Out');
		return true;
	}
}

function form3_sub() {
	var name = $('#tea_video').val();
	if (name == '' || name == undefined || name == null) {
		alert('请先完成团队视频上传');
		return false;
	} else {
		$(".content").eq(3).css("display", "block").siblings().css("display", "none");
		return true;
	}
}
/* =================项目团队js验证 END=================== */

/* =================路演活动js验证 START=================== */
// （项目团队）视频
function roaVideo(node) {
	var type = $('#roa_video').val();
	var pos = type.indexOf(".");
	var format = type.substring(pos + 1);
	if (format != 'mp4') {
		alert('请选择正确的视频文件')
	} else {
		var videourl = "";
		try {
			var file = null;
			if (node.files && node.files[0]) {
				file = node.files[0];
			} else if (node.files && node.files.item(0)) {
				file = node.files.item(0);
			}
			try {
				videourl = file.getAsDataURL();
			} catch (e) {
				videourl = window.URL.createObjectURL(file);
			}
		} catch (e) {
			if (node.files && node.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					videourl = e.target.result;
				};

				reader.readAsDataURL(node.files[0]);
			}
		}
		creatVideo3(videourl);
		return videourl;
	}
}

function creatVideo3(videourl) {
	var textHtml = '<video src="'
			+ videourl
			+ '" controls style="width:300px; height:200px" poster="" data-setup="'
			+ {} + '"></video>';
	$(".roa_v").html(textHtml);
}

var roa_state = false;
function roaVideoUpload() {
	var textHtml = $('.roa_v').html();
	if (textHtml == "" || textHtml == undefined || textHtml == null) {
		alert('请选择视频上传');
		return false;
	} else {
		$('#roaButton').html("上传中...")
		$('#roaButton').removeAttr('onclick');
		var fd = new FormData();
		fd.append("upfile", $("#roa_video").get(0).files[0]);
		$.ajax({
			url : "/roaUpload",
			type : "POST",
			processData : false,
			contentType : false,
			data : fd,
			success : function(msg) {
				console.log(msg)
				if (msg == 1) {
					$('#roaButton').html("已完成")
					alert('视频上传完成')
					roa_state = true;
				} else {
					roa_state = false;
				}
			}
		});
	}
}

// 路演嘉宾
function s_roa_guest() {
	var roa_guest = $('#roa_guest').val();
	if (roa_guest == '' || roa_guest == undefined || roa_guest == null) {
		$('.roa_g').addClass('Out');
		return false;
	} else {
		$('.roa_g').removeClass('Out');
		return true;
	}
}

function form4_sub() {
	var att_name = $('#roa_video').val();
	if (att_name == '' || att_name == undefined || att_name == null) {
		alert('请完成路演视频上传');
		return false;
	} else {
		$(".content").eq(4).css("display", "block").siblings().css("display", "none");
		return true;
	}
}
function form5_sub() {
	var att_name = $('#att_name').val();
	if (att_name == '' || att_name == undefined || att_name == null) {
		alert('请上传附件！');
		return false;
	} else {
		return true;
	}
}
function mySubmit() {
	if (form1_sub() & form2_sub() & form3_sub() & form4_sub() & form5_sub()) {
		return true;
	} else {
		return false;
	}
}
