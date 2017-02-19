

<!-- 模态框（Modal） -->
<!-- 按钮触发模态框 -->
<button id="show_model" class="btn btn-primary btn-lg"
	style="display: none" data-toggle="modal" data-target="#myModal">显示模式框</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"
	data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">大文件上传比较慢，请耐心等待...</h4>
			</div>
			<div class="modal-body">
				<table id="table" style="display:;" class="table table-striped table-hover text-left">
					<thead>
						<tr>
							<th class="col-md-4">文件名</th>
							<th class="col-md-2">大小</th>
							<th class="col-md-6">详情</th>
						</tr>
					</thead>
					<tbody id="fsUploadProgress">

					</tbody>
				</table>
			</div>
			<div class="modal-footer" style="display: none">
				<button id="close_model" style="display: none" type="button"
					class="btn btn-default" data-dismiss="modal">关闭模式框</button>
				<button type="button" id="up_load" style="display: none"
					class="btn btn-default">继续上传</button>
				<button type="button" id="stop_load" class="btn btn-primary">暂停上传</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<!-- 模态框结束（Modal） -->
<?php
