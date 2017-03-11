@include('me_header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/resume.css') }}"/>
<!--导航结束-->
<div class="resume_main">
	<div class="conter_con">
		
		<div class="incolumm Both">
			<div class="shop_title">
				<h3>应聘：{{$position->par_position}} （{{count($datas)}}）</h3>
			</div>
			@foreach($datas as $k=>$v)
			<div class="apply_list Left">
				<a href="javascript:;">
					<div class="apply_list_head Left">
						<a href="/users/{{$v->nickname}}" target="_blank"><img src="{{$v->photo}}"></a>
					</div>
					<div class="apply_list_sumary Left">
						<ul>
							<li class="list_title">
								<span><a href="/users/{{$v->nickname}}" target="_blank">{{$v->nickname}}</a></span>
								@if($v->invited_id)
									<button type="button" invited_id="{{$v->invited_id}}" class="btn btn-default btn-xs show"
									data-toggle="tooltip"   data-html="true"
									title="<p align='left'>面试时间:{{$v->interview_time}}<br/>	面试地址：{{$v->interview_address}}<br/>联系方式：{{$v->interview_contact}}<br/>面试留言：{{$v->add_time}}</p>"
							
									>邀请详情</button>
								@else
									<button type="button" job_deliver_id="{{$v->deliver_id}}" class="btn btn-primary btn-xs add">面试邀请</button>
								@endif
								
								
							</li>
							<li>{{_getUserAgeById($v->age)}}岁/<span>{{_getUserWorkById($v->worklife)}}</span>/<span>{{$v->address}}</span></li>
							<li>手机：{{$v->phone}} </li>
							<li>投递时间：{{$v->deliver_time}}</li>
						</ul>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		
	</div>
</div>

<!-- 面试邀请触发模态框 -->
<button class="btn btn-primary btn-lg" style="display:none" data-toggle="modal" id="add-invisted-btn" data-target="#add-invisted">
	开始演示模态框
</button>
<!-- 面试邀请模态框 -->
<div class="modal fade" id="add-invisted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					面试邀请
				</h4>
			</div>
			<div class="modal-body">
				<div id="error-tips">
				
				</div>
			
				<form class="form-horizontal" role="form" id="add-form">
					<input type="hidden" name="job_deliver_id" id="job_deliver_id" value="0">
					  <div class="form-group">
					    <label for="firstname" class="col-sm-3 control-label"><font color="red">*</font>面试时间：</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="interview_time" name="interview_time" placeholder="2017.xx.xx 下午x点">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="firstname" class="col-sm-3 control-label"><font color="red">*</font>面试地址：</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="interview_address" name="interview_address" placeholder="您的地址">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="firstname" class="col-sm-3 control-label"><font color="red">*</font>联系方式：</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="interview_contact" name="interview_contact" placeholder="您的联系方式">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="firstname" class="col-sm-3 control-label">面试留言：</label>
					    <div class="col-sm-7">
					      <textarea class="form-control" rows="3" id="interview_remark" name="interview_remark" placeholder="说点什么"></textarea>
					    </div>
					  </div>					  
					  <div class="form-group">
					    <div class="col-sm-12">
					      <button type="submit" id="btn-submit" class="btn btn-success btn-lg btn-block">发送</button>
					    </div>
					  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--底部开始-->
@include('footer')
<script>
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<script type="text/javascript">
	$(function(){
		$(".add").click(function(){
			$("#add-form")[0].reset();
			
			var job_deliver_id = $(this).attr('job_deliver_id');
			$("#job_deliver_id").val(job_deliver_id);
			$('#add-invisted-btn').click();
		});

		function getWarning(text,alertType,alertTypeText){
			if(!alertType) alertType = "alert-warning";
			if(!alertTypeText) alertTypeText = "警告！";
			
			var temp = '<div class="alert #type#">'
						+ '<a href="#" class="close" data-dismiss="alert">'
						+ '&times;'
						+ '</a>'
						+ '<strong>#type-text#</strong>#text#'
						+ '</div>';
			temp = temp.replace('#type#', alertType)
					.replace('#type-text#',alertTypeText)
					.replace('#text#',text);
			return $(temp);
		}
		
		$("#add-form").submit(function(){
			var flag = true;
			if(!$('#interview_time').val()){
				flag = false;
				$("#error-tips").append(getWarning('请填写面试时间！'));
			}

			if(!$('#interview_address').val()){
				flag = false;
				$("#error-tips").append(getWarning('请填写面试地址！'));
			}

			if(!$('#interview_contact').val()){
				flag = false;
				$("#error-tips").append(getWarning('请填写联系方式！'));
			}

			if(flag){
				$.post('/ren/resumes/sendinvited',$("#add-form").serialize(),function(obj){
					alert(obj.msg);
					if(obj.code == 0){
						$("#add-invisted .close").click();
						location.reload();
					}
				})
			}		
			
			return false;
		});
	});
</script>

