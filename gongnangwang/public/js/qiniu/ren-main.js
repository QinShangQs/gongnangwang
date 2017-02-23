/**
 * 合伙人上传视频
 */
$(function() {
	// ////////////项目logo 1//////////////////
	var Qiniu = new QiniuJsSDK();
	var option = {
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles',
		container : 'container',
		drop_element : 'container',
		flash_swf_url : 'js/plupload/Moxie.swf',
		dragdrop : true,
		multi_selection : false,
		chunk_size : '1mb',
		uptoken_url : $('#uptoken_url').val(),
		domain : $('#domain').val(),
		auto_start : true,
		filters : {
			max_file_size : '5mb',
			prevent_duplicates : true,
			mime_types : [ {
				title : "Image files",
				extensions : "jpg,jpeg,gif,png"
			}, // 限定jpg,gif,png后缀上传
			]
		},
		init : {
			'FilesAdded' : function(up, files) {
				upIndex = 1;
				console.log("upIndex = " + upIndex);

				$('#show_model').click();
				$('#success').hide();
				plupload.each(files, function(file) {
					var progress = new FileProgress(file, 'fsUploadProgress');
					progress.setStatus("等待...");
				});
			},
			'BeforeUpload' : function(up, file) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				var chunk_size = plupload.parseSize(this
						.getOption('chunk_size'));
				if (up.runtime === 'html5' && chunk_size) {
					progress.setChunkProgess(chunk_size);
				}
			},
			'UploadProgress' : function(up, file) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				var chunk_size = plupload.parseSize(this
						.getOption('chunk_size'));

				progress
						.setProgress(file.percent + "%", file.speed, chunk_size);
			},
			'UploadComplete' : function() {
				$('#success').show();
			},
			'FileUploaded' : function(up, file, info) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				progress.setComplete(up, info);

				var res = $.parseJSON(info);
				var link = $('#domain').val() + "/" + res.key;
				$("#par_logo").val(link);
				$("#par_logo_name").text(link);
				
				$('#close_model').click();
			},
			'Error' : function(up, err, errTip) {
				$('#show_model').click();
				var progress = new FileProgress(err.file, 'fsUploadProgress');
				progress.setError();
				progress.setStatus(errTip);
			}
		}
	};
    var uploader = Qiniu.uploader(option);
    uploader.bind('FileUploaded', function() {    	
        console.log('hello man,project logo is uploaded');
    });
	 // ////////////视频3//////////////////
	var Qiniu3 = new QiniuJsSDK();
	var option3 = {
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles3',
		container : 'container3',
		drop_element : 'container3',
		flash_swf_url : 'js/plupload/Moxie.swf',
		dragdrop : true,
		multi_selection : false,
		chunk_size : '4mb',
		uptoken_url : $('#uptoken_url').val(),
		domain : $('#domain').val(),
		auto_start : true,
		filters : {
			 max_file_size : '500mb',
	         prevent_duplicates: true,
	         mime_types: [                   
	             {title : "Video files", extensions : "mp4"}, //mp4
	         ]
		},
		init : {
			'FilesAdded' : function(up, files) {
				upIndex = 3;
				console.log("upIndex = " + upIndex);

				$('#show_model').click();
				$('#success3').hide();
				plupload.each(files, function(file) {
					var progress = new FileProgress(file, 'fsUploadProgress');
					progress.setStatus("等待...");
				});
			},
			'BeforeUpload' : function(up, file) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				var chunk_size = plupload.parseSize(this
						.getOption('chunk_size'));
				if (up.runtime === 'html5' && chunk_size) {
					progress.setChunkProgess(chunk_size);
				}
			},
			'UploadProgress' : function(up, file) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				var chunk_size = plupload.parseSize(this
						.getOption('chunk_size'));

				progress
						.setProgress(file.percent + "%", file.speed, chunk_size);
			},
			'UploadComplete' : function() {
				$('#success3').show();
			},
			'FileUploaded' : function(up, file, info) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				progress.setComplete(up, info);

				var res = $.parseJSON(info);
				var link = $('#domain').val() + "/" + res.key;
	            var poster = link + "?vframe/jpg/offset/1";
	            $("#par_video").val(link);

	            videojs("par_video_vj",{}).ready(function(){
	                 var myPlayer = this;
	                 myPlayer.src(link);
	                 myPlayer.poster(poster);
	            });
	                
	            $("#par_video_pre").hide();
	            $("#par_video_show").show();
	            $('#close_model').click();
			},
			'Error' : function(up, err, errTip) {
				$('#show_model').click();
				var progress = new FileProgress(err.file, 'fsUploadProgress');
				progress.setError();
				progress.setStatus(errTip);
			}
		}
	};
    var uploader3 = Qiniu3.uploader(option3);
    uploader3.bind('FileUploaded', function() {    	
        console.log('hello man,uploader3 video is uploaded');
    });
});