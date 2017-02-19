/*global Qiniu */
/*global plupload */
/*global FileProgress */
/*global hljs */

$(function() {
	var upIndex = 0;
    
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'pickfiles',
        container: 'container',
        drop_element: 'container',
        //max_file_size: '500mb',
        flash_swf_url: 'js/plupload/Moxie.swf',
        dragdrop: true,
        multi_selection: false,
        chunk_size: '4mb',
        uptoken_url: $('#uptoken_url').val(),
        domain: $('#domain').val(),
        auto_start: true,
        filters : {
            max_file_size : '500mb',
            prevent_duplicates: true,
            mime_types: [                   
                {title : "Video files", extensions : "mp4"}, //mp4
            ]
        },
        init: {
            'FilesAdded': function(up, files) {
            	upIndex = 1;
            	console.log("upIndex = " + upIndex);
            	
                $('#table').show();
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
                $('#success').show();
            },
            'FileUploaded': function(up, file, info) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setComplete(up, info);
                var res = $.parseJSON(info);
                var link = $('#domain').val() + "/" + res.key;
                var poster = link + "?vframe/jpg/offset/1";
                $("#person_video").val(link);

                videojs("example_video1",{}).ready(function(){
                    var myPlayer = this;
                    myPlayer.src(link);
                    myPlayer.poster(poster);
                });
                
                $("#video_def_page").hide();
                $("#videoShow").show();
                
                $('#table').hide();
                $('#close_model').click();
            },
            'Error': function(up, err, errTip) {
                $('table').show();
                var progress = new FileProgress(err.file, 'fsUploadProgress');
                progress.setError();
                progress.setStatus(errTip);
            }
        }
    });

   
    //////////////2个人照片//////////////////
    var Qiniu2 = new QiniuJsSDK();
    var option2 = {
    		runtimes: 'html5,flash,html4',
            browse_button: 'pickfiles2',
            container: 'container2',
            drop_element: 'container2',
            //max_file_size: '2mb',
            flash_swf_url: 'js/plupload/Moxie.swf',
            dragdrop: true,
            multi_selection: false,
            chunk_size: '1mb',
            uptoken_url: $('#uptoken_url').val(),
            domain: $('#domain').val(),
            auto_start: true,
            filters : {
                max_file_size : '5mb',
                prevent_duplicates: true,
                mime_types: [                   
                    {title : "Image files", extensions : "jpg,jpeg,gif,png"}, // 限定jpg,gif,png后缀上传
                ]
            },
            init: {
                'FilesAdded': function(up, files) {                	     		
	                	upIndex = 2;
	                	console.log("upIndex = " + upIndex);
	                	
	                    $('#table').show();
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
                    $('#success2').show();
                },
                'FileUploaded': function(up, file, info) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setComplete(up, info);
                    
                    var res = $.parseJSON(info);
                    var link = $('#domain').val() + "/" + res.key;
                    $("#person_photo").val(link);
                    $(".ge_pic_icon_Infor img").attr("src", link);
                    
                    $('#table').hide();
                    $('#close_model').click();
                },
                'Error': function(up, err, errTip) {
                    $('#table').show();
                    var progress = new FileProgress(err.file, 'fsUploadProgress');
                    progress.setError();
                    progress.setStatus(errTip);
                }
            }
    };
    
    var uploader2 = Qiniu2.uploader(option2);

    /////////////3简历////////////////////
    
    var Qiniu3 = new QiniuJsSDK();
    var option3 = {
    		runtimes: 'html5,flash,html4',
            browse_button: 'pickfiles3',
            container: 'container3',
            drop_element: 'container3',
            //max_file_size: '2mb',
            flash_swf_url: 'js/plupload/Moxie.swf',
            dragdrop: true,
            multi_selection: false,
            chunk_size: '1mb',
            uptoken_url: $('#uptoken_url').val(),
            domain: $('#domain').val(),
            auto_start: true,
            filters : {
                max_file_size : '10mb',
                prevent_duplicates: true,
                mime_types: [                   
                    {title : "Word files", extensions : "doc,docx,pdf"}
                ]
            },
            init: {
                'FilesAdded': function(up, files) {                	
                	upIndex = 3;
                	console.log("upIndex = " + upIndex);
                	
                    $('#table').show();
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
                    $('#success3').show();
                },
                'FileUploaded': function(up, file, info) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setComplete(up, info);
                    
                    var res = $.parseJSON(info);
                    var link = $('#domain').val() + "/" + res.key;
                    $("#person_intro").val(link);
                    $("#person_intro_name").text(res.key);
                    
                    $('#table').hide();
                    $('#close_model').click();
                },
                'Error': function(up, err, errTip) {
                    $('#table').show();
                    var progress = new FileProgress(err.file, 'fsUploadProgress');
                    progress.setError();
                    progress.setStatus(errTip);
                }
            }
    };
    
    var uploader3 = Qiniu3.uploader(option3);
    
    ////////////////////////////////////
    
    uploader.bind('FileUploaded', function() {    	
        console.log('hello man,a file is uploaded');
    });
    
    uploader2.bind('FileUploaded', function() {    	
        console.log('hello man,uploader2 a file is uploaded');
    });
    
    uploader3.bind('FileUploaded', function() {    
        console.log('hello man,uploader3 a file is uploaded');
    });
    
    /////////////////////////////////
    $('body').on('click', 'table button.btn', function() {
        $(this).parents('tr').next().toggle();
    });

    var uploaderArr = [uploader, uploader2,uploader3];
    $('#up_load').on('click', function(){
    	var currentUploader = uploaderArr[upIndex-1];
    	currentUploader.start();
    	$("#up_load").hide();
    	$('#stop_load').show();
    });
    
    $('#stop_load').on('click', function(){
    	var currentUploader = uploaderArr[upIndex-1];
    	currentUploader.stop();
    	$("#up_load").show();
    	$('#stop_load').hide();
    });

});
