/**
 * 众筹上传视频
 */
$(function() {
	var upIndex = 0;

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
				$("#pro_logo").val(link);
				$("#pro_logo_name").text(link);
				
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
	
 // ////////////项目图片2//////////////////
	var Qiniu2 = new QiniuJsSDK();
	var option2 = {
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles2',
		container : 'container2',
		drop_element : 'container2',
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
				upIndex = 2;
				console.log("upIndex = " + upIndex);

				$('#show_model').click();
				$('#success2').hide();
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
				$('#success2').show();
			},
			'FileUploaded' : function(up, file, info) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				progress.setComplete(up, info);

				var res = $.parseJSON(info);
				var link = $('#domain').val() + "/" + res.key;
				$("#pro_picture").val(link);
				$("#pro_picture_name").text(link);				
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
    var uploader2 = Qiniu2.uploader(option2);
    uploader2.bind('FileUploaded', function() {    	
        console.log('hello man,project picture is uploaded');
    });
    
 // ////////////商业模式视频3//////////////////
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
	            $("#bus_video").val(link);

	            videojs("bus_video_vj",{}).ready(function(){
	                 var myPlayer = this;
	                 myPlayer.src(link);
	                 myPlayer.poster(poster);
	            });
	                
	            $("#bus_video_pre").hide();
	            $("#bus_video_show").show();
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
        console.log('hello man,bus video is uploaded');
    });
    
    
    ////////////项目视频4//////////////////
	var Qiniu4 = new QiniuJsSDK();
	var option4 = {
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles4',
		container : 'container4',
		drop_element : 'container4',
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
				upIndex = 4;
				console.log("upIndex = " + upIndex);

				$('#show_model').click();
				$('#success4').hide();
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
				$('#success4').show();
			},
			'FileUploaded' : function(up, file, info) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				progress.setComplete(up, info);

				var res = $.parseJSON(info);
				var link = $('#domain').val() + "/" + res.key;
	            var poster = link + "?vframe/jpg/offset/1";
	            $("#tea_video").val(link);

	            videojs("tea_video_vj",{}).ready(function(){
	                 var myPlayer = this;
	                 myPlayer.src(link);
	                 myPlayer.poster(poster);
	            });
	                
	            $("#tea_video_pre").hide();
	            $("#tea_video_show").show();
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
    var uploader4 = Qiniu4.uploader(option4);
    uploader4.bind('FileUploaded', function() {    	
        console.log('hello man,tea video is uploaded');
    });
    
////////////路演视频5//////////////////
	var Qiniu5 = new QiniuJsSDK();
	var option5 = {
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles5',
		container : 'container5',
		drop_element : 'container5',
		flash_swf_url : 'js/plupload/Moxie.swf',
		dragdrop : true,
		multi_selection : false,
		chunk_size : '5mb',
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
				upIndex = 5;
				console.log("upIndex = " + upIndex);

				$('#show_model').click();
				$('#success5').hide();
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
				$('#success5').show();
			},
			'FileUploaded' : function(up, file, info) {
				var progress = new FileProgress(file, 'fsUploadProgress');
				progress.setComplete(up, info);

				var res = $.parseJSON(info);
				var link = $('#domain').val() + "/" + res.key;
	            var poster = link + "?vframe/jpg/offset/1";
	            $("#roa_video").val(link);

	            videojs("roa_video_vj",{}).ready(function(){
	                 var myPlayer = this;
	                 myPlayer.src(link);
	                 myPlayer.poster(poster);
	            });
	                
	            $("#roa_video_pre").hide();
	            $("#roa_video_show").show();
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
    var uploader5 = Qiniu5.uploader(option5);
    uploader5.bind('FileUploaded', function() {    	
        console.log('hello man,roa video is uploaded');
    });
    
    /////////////附件 6////////////////////    
    var Qiniu6 = new QiniuJsSDK();
    var option6 = {
    		runtimes: 'html5,flash,html4',
            browse_button: 'pickfiles6',
            container: 'container6',
            drop_element: 'container6',
            //max_file_size: '2mb',
            flash_swf_url: 'js/plupload/Moxie.swf',
            dragdrop: true,
            multi_selection: false,
            chunk_size: '2mb',
            uptoken_url: $('#uptoken_url').val(),
            domain: $('#domain').val(),
            auto_start: true,
            filters : {
                max_file_size : '50mb',
                prevent_duplicates: true,
                mime_types: [                   
                    {title : "Word files", extensions : "doc,docx,ppt,pptx,pdf"}
                ]
            },
            init: {
                'FilesAdded': function(up, files) {                	
                	upIndex = 6;
                	console.log("upIndex = " + upIndex);
                	
                    $('#show_model').click();
                    $('#success').hide();
                    plupload.each(files, function(file) {
                        var progress = new FileProgress(file, 'fsUploadProgress');
                        progress.setStatus("等待...");
                    });
                },
                'BeforeUpload': function(up, file) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                    if (up.runtime === 'html5' && chunk_size) {
                        progress.setChunkProgess(chunk_size);
                    }
                },
                'UploadProgress': function(up, file) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    var chunk_size = plupload.parseSize(this.getOption('chunk_size'));

                    progress.setProgress(file.percent + "%", file.speed, chunk_size);
                },
                'UploadComplete': function() {
                    $('#success6').show();
                },
                'FileUploaded': function(up, file, info) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setComplete(up, info);
                    
                    var res = $.parseJSON(info);
                    var link = $('#domain').val() + "/" + res.key;
                    $("#att_name").val(link);
                    $("#att_name_name").text(link);
                    
                    $('#close_model').click();
                },
                'Error': function(up, err, errTip) {
                	$('#show_model').click();
                    var progress = new FileProgress(err.file, 'fsUploadProgress');
                    progress.setError();
                    progress.setStatus(errTip);
                }
            }
    };
    
    var uploader6 = Qiniu6.uploader(option6);
    uploader6.bind('FileUploaded', function() {    	
        console.log('hello man,fujian video is uploaded');
    });
    
    
});